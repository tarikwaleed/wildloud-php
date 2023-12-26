<?php
ob_start();
session_start();
require_once 'phpqrcode/qrlib.php';


if (isset($_SESSION['clientid'])) {

  $pageTitle = "Wild & Loud - Dashboard";
  include 'init.php';
  $_SESSION['time'] = '0';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();


  $stmt = $conn->prepare("SELECT * FROM users WHERE id  =? ");
  $stmt->execute(array($_SESSION['clientid']));
  $user = $stmt->fetch();

  $place = 0;
  $stmt2 = $conn->prepare("SELECT * FROM users WHERE  type = 0 ORDER BY points DESC ");
  $stmt2->execute();
  $sd = $stmt2->fetchAll();
  $me = 0;
  foreach ($sd as $s) {
    if ($s['id'] != $_SESSION['clientid']) {
      $place += 1;
    }
    if ($s['id'] == $_SESSION['clientid']) {
      $me = $place + 1;
    }
  }
  ?>
  <div class="content-ad-show">

  </div>

  <!-- start dashboard main contnent -->
  <div class="dashboard_container " id="dashboard">
    <div class="row dashboard_header  align-items-center justify-content-between">
      <div
        class="content shadow  flex-column flex-lg-row text-md-center d-flex align-items-center justify-content-center">
        <div class="icon">
          <img class="mr-0 mr-lg-3   " src="<?php echo $images ?>click.png" alt="">
        </div>
        <div class="details">
          <p> total hits</p>

          <span class="nbr">
            <?php echo $user['hits']; ?>
          </span>
        </div>
      </div>
      <div
        class="content shadow d-flex  flex-column flex-lg-row text-md-center align-items-center  justify-content-center">
        <div class="icon users-icon">
          <img class="mr-0 mr-lg-3   " src="<?php echo $images ?>place.png" alt="">

        </div>
        <div class="details">
          <a href="webpage.php?page=comp">
            <p> your place</p>
          </a>
          <span class="nbr">
            <?php echo $me; ?>
          </span>
        </div>
      </div>
      <div
        class="content shadow  flex-column flex-lg-row text-md-center d-flex align-items-center justify-content-center">
        <div class="icon users-icon">
          <img class="mr-0 mr-lg-3   " src="<?php echo $images ?>ad.png" alt="">

        </div>
        <div class="details">
          <p> click credit</p>
          <span class="nbr">
            <?php echo Total($conn, 'players') ?>
          </span>
        </div>
      </div>
    </div>
    <!-- start form -->
    <div class="row">
      <div class="col-12 form_header mt-5 mb-4">
        <span class="dashboard-overview">Your submit</span>
      </div>
      <div class="col-12">
        <form method="POST" id="adform">
          <div class="msg mb-4"></div>
          <div class="row justify-content-center ">
            <div class="col-xl-5 col-12">
              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class="text-capitalize col-12 col-md-3 px-0">type</label>
                <?php
                $stmt = $conn->prepare("SELECT * FROM services  ORDER BY id DESC");
                $stmt->execute();
                $services = $stmt->fetchAll();
                ?>
                <select class="form-control col-12 col-md-9" name="service" id="service">
                  <?php
                  foreach ($services as $service) {
                    ?>
                    <option value="<?php echo $service['id'] ?>">
                      <?php echo $service['name'] ?>
                    </option>

                    <?php
                  }
                  ?>
                  <option value="99">Free points</option>

                </select>
              </div>

              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class="text-capitalize col-12 col-md-3 px-0 m-0">service type</label>
                <?php
                $stmt = $conn->prepare("SELECT * FROM services  ORDER BY id DESC");
                $stmt->execute();
                $services = $stmt->fetchAll();
                ?>
                <select class="form-control  col-12 col-md-9" name="servicetype" id="servicetype">
                  <option value="default">select service type first</option>
                </select>
              </div>
              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class="text-capitalize col-12 col-md-3 px-0 m-0">total click</label>
                <div class="input-group  col-12 col-md-9 px-0">
                  <input type="text" id="mpr" name="tclicks" class="form-control" placeholder="Total clicks"
                    aria-label="Total clicks" aria-describedby="basic-addon2">
                  <!-- <div class="input-group-append">
                    <a id="on" class="btn " style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="a">on</a>
                    <a id="off" class="btn " style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="a">off</a>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-12 ">
              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class=" col-12 col-md-3 px-0 m-0">points</label>
                <div class="col-12 col-md-9 px-0 ">
                  <input type="text" name="points" class="form-control form-control-sm" id="colFormLabelSm"
                    placeholder="Points">
                </div>
              </div>

              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class="col-12 col-md-3 px-0 m-0">url / account</label>
                <div class=" col-12 col-md-9 px-0">
                  <input type="text" name="uacc" class="form-control form-control-sm" id="colFormLabelSm"
                    placeholder="Your account url">
                </div>
              </div>

              <div class="form-group d-flex flex-wrap" style="align-items: center;">
                <label for="colFormLabelSm" class=" col-12 col-md-3 px-0  m-0">Daily Clicks</label>
                <div class="input-group col-12 col-md-9 px-0 m-0">
                  <input type="text" id="mpr2" name="dclicks" class="form-control" placeholder="Daily Clicks"
                    aria-label="Daily Clicks" aria-describedby="basic-addon2">
                  <div class="input-group-append border-0">
                    <a id="on2" class="btn border-0" type="button">on</a>
                    <a id="off2" class="btn border-0" type="btutton">off</a>
                  </div>
                </div>

              </div>
            </div>
            <div class="submit_container ">
              <input type="button" class="btn btn-primary form-submit text-center" id="mbeadbtn99003f3svb" value="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- end form -->
    <!-- start table -->
    <?php
    $stmt = $conn->prepare("SELECT * FROM ads WHERE userid = ?");
    $stmt->execute(array($_SESSION['clientid']));
    $ads = $stmt->fetchAll();
    ?>
    <div class="col-md-12">
      <div class="management-body dash-table">
        <div class="default-management-table table-responsive">
          <table class="table" id="users-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">social</th>
                <th scope="col">link</th>
                <th scope="col"> points</th>
                <th scope="col">hits</th>
                <th scope="col">stats</th>
                <th scope="col">action</th>


              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($ads as $ad) {
                ?>
                <tr style="background:#F5F5F5;margin:20px 0">
                  <td>
                    <?php echo $ad['id'] ?>
                  </td>
                  <?php

                  $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
                  $stmt->execute(array($ad['service']));
                  $sv = $stmt->fetch();
                  ?>
                  <td>
                    <p> <img src="<?php echo $images . $sv['image'] ?>" alt="icon" style="width:20px;height:20px">
                      <?php echo $sv['name'] ?>
                    </p>
                  </td>
                  <td>
                    <a href="<?php echo $ad['link'] ?>" style="font-size:14px;color:rgba(0,0,0,.6)">view</a>
                  </td>
                  <td>
                    <?php
                    if ($ad['tclicks'] == 'default') {
                      ?>
                      <p>
                        <?php echo $ad['points'] ?> / Unlimted
                      </p>
                      <?php
                    } else {
                      ?>

                      <?php
                    }
                    ?>

                  </td>
                  <?php
                  $stmt = $conn->prepare("SELECT * FROM hits WHERE ad  = ?");
                  $stmt->execute(array($ad['id']));
                  $tt = $stmt->rowCount();

                  if ($ad['dclicks'] == 'default') {
                    ?>
                    <td>
                      <p>
                        <?php echo $ad['dclicks'] ?>
                      </p>
                    </td>
                    <?php
                  } else {
                    if ($tt >= $ad['dclicks']) {
                      $stmt = $conn->prepare("UPDATE ads SET visibility = 0 WHERE id = ?");
                      $stmt->execute(array($ad['id']));
                      ?>
                      <td>
                        <p>
                          <?php echo $tt ?>/
                          <?php echo $ad['dclicks'] ?>
                        </p>
                      </td>
                      <?php
                    } else {
                      ?>
                      <td>
                        <p>
                          <?php echo $tt ?>/ Unlimted
                        </p>
                      </td>
                      <?php
                    }
                    ?>

                    <?php
                  }
                  ?>


                  <td class="ds99d">
                    <?php
                    if ($ad['status'] == 1) {
                      echo 'ON';
                    } else {
                      echo 'OFF';
                    }
                    ?>
                  </td>

                  <td>
                    <a style="font-size:13px;color:green;cursor:pointer" class="fas fa-edit ad-edit" ad=<?php echo $ad['id'] ?>></a>
                    <a style="font-size:13px;color:red;cursor:pointer;margin: 0px 15px !important"
                      class="ad-delete fas fa-trash" ad=<?php echo $ad['id'] ?>></a>
                    <a style="font-size:13px;color:orange;cursor:pointer" class="visible_update fas fa-eye" ad=<?php echo $ad['id'] ?> status="<?php echo $ad['status'] ?>"></a>
                  </td>

                </tr>
                <?php
              }
              ?>



              <?php

              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end table -->
  </div>
  <!-- end dashboard main contnent -->

  </div>

  </div>
  </div>
  <?php

  include $tpl . 'footer.php';
} else {

  $noNavbar = '';
  $pageTitle = 'Wild & Loud - home page';
  include 'init.php';

  $ref = isset($_GET['ref']) ? $_GET['ref'] : 'empty';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();

  ?>

  <!-- ======================== start forget Password section  ======================== -->

  <div class="register-page login-page" id="fpasswordpage" style="display:none;  ">
    <i class="fas  close " id="close"></i>
    <div class="container mt-5 mt-md-0 p-0" style="width:80%;position: absolute;
    z-index: 999999999999;">
      <div class="row justify-content-center">
        <form class="# py-5 px-lg-5 px-4 col-lg-6 col-md-6 col-12 px-0 order-md-1 order-2" action="" method="post"
          id="sforgotpasspage">


          <h2 style="color:black;margin:27px 0;font-size:30px;text-transform:capitalize;font-weight:bold">Forgot Password
          </h2>
          <p class="gray-p">Enter your Email to receive the Authenticator code </p>
          <div class="err-msg">

          </div>


          <div class="form-group">
            <input type="text" name="email" class="form-control col-md-12 pl-3" placeholder="Email adress"
              required="required">
          </div>


          <div class="form-group text-center mt-4">
            <input type="button" class="btn btn-primary" value="confirm"
              style="border:none;width:60%;text-align:center !important;text-transform:uppercase;margin:auto !important">

          </div>


        </form>

        <div class="col-lg-6 col-md-6 col-12 px-0 form_picture order-1 order-md-2"
          style="background-image:url(<?php echo $images ?>accountpage.png)">
          <div class="img">
            <div class="d">
              <h2>hello, back</h2>
              <p>To keep connected with us please login with your personel info </p>
              <a style="cursor:pointer" id="swtichtologin">sign in</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ======================== end forget Password section  ======================== -->

  <!-- ======================== start registeration section  ======================== -->
  <div class="register-page login-page" id="registerpage" style="display:none;  ">
    <i class="fas  close " id="close"></i>
    <div class="container mt-5 mt-md-0 p-0" style="width:80%;position: absolute;
    z-index: 999999999999;">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-12 px-0 form_picture position-relative"
          style="background-image:url(<?php echo $images ?>g.png);">
          <div class="img">
            <div class="d">
              <h2>hello, back</h2>
              <p>to keep connected with us please login with your personel info </p>
              <a style="cursor:pointer" id="signToRegister">sign in</a>
            </div>
          </div>
        </div>

        <form class="# py-5 px-4 col-lg-6 col-md-6 col-12 px-0 form_right" action="" method="post"
          style="text-align:center;width:90%" id="registerform">

          <h2 style="color:black;margin:27px 0;font-size:35px;text-transform:capitalize;font-weight:bold">create account
          </h2>
          <div class="err-msg"></div>
          <div class="form-group bt-mg">
            <input id="ffname" type="tewt" name="fname" class="form-control col-md-12 pl-3" placeholder="name "
              autocomplete="new-password" required="required">
          </div>
          <div class="form-group">
            <input id="femail" type="text" name="email" class="form-control col-md-12 pl-3" placeholder="Email adress"
              required="required">
          </div>
          <div class="form-group bt-mg" style="margin-bottom:20px">
            <input id="ffphone" type="text" name="phone" class="form-control col-md-12 pl-3" placeholder="phone "
              autocomplete="new-password" required="required">
          </div>

          <input type="hidden" name="comref" class="form-control col-md-12" value="<?php echo $ref ?>"
            autocomplete="new-password" required="required">


          <div class="form-group">

            <input onclick="validateform()" id="registerbtn" type="button" class="btn btn-primary" value="register"
              style="border:none;width:60%;text-align:center !important;text-transform:uppercase;margin:auto !important">
          </div>
        </form>


      </div>
    </div>
  </div>
  <!-- ======================== end registeration page  ======================== -->
  <!-- ======================== start signin page  ======================== -->
  <div class="login-page  " id="signinpage" style="display:none;">
    <i class="fas  close " id="close"></i>
    <div class="container p-0 mt-5 mt-md-0" style="width:80%;position: absolute;
    z-index: 999999999999;">
      <div class="row justify-content-center">
        <form class="# py-5 px-lg-5 px-4 col-lg-6 col-md-6 col-12 px-0 order-md-1 order-2" action="" method="post"
          style="text-align:center;" id="loginform">

          <h2 style="color:black;font-weight: bold;text-transform: capitalize;margin:40px 0 20px">sign in</h2>
          <div class="form-group">
            <div class="err-msg">

            </div>
          </div>

          <div class="form-group">
            <input type="text" name="email" class="form-control col-md-12 pl-3" placeholder="Email adress"
              required="required">
          </div>
          <div class="form-group bt-mg">
            <input type="password" name="password" class="form-control col-md-12 pl-3" placeholder="Authenticator code "
              autocomplete="new-password" required="required">
          </div>
          <div class="new-acc" style="margin-bottom:10px">
            <a id="forget-p" class="new-acc"
              style="cursor: pointer;color:rgba(0,0,0,.6);text-transform:capitalize;font-size:14px">forget your
              password</a>
          </div>
          <div class="form-group">
            <input type="button" class="btn btn-primary" id="login_botton" value="sign in"
              style="border:none;width:60%;text-align:center !important;text-transform:uppercase;margin:auto !important">

          </div>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $password = sha1($_POST['password']);

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1 ");
            $stmt->execute(array($email, $password));
            $clientExist = $stmt->rowCount();
            $client = $stmt->fetch();
            if ($clientExist > 0) {
              $_SESSION['client'] = $client['username'];
              $_SESSION['clientid'] = $client['id'];
              $_SESSION['email'] = $client['email'];


              header('location: index.php');
            } else {
              ?>
              <div class="alert alert-danger">
                Email or password are wrong
              </div>
              <?php
            }
          }
          ?>

        </form>


        <div class="col-lg-6 col-md-6 col-12 px-0 form_picture order-1 order-md-2 "
          style="background-image:url(<?php echo $images ?>accountpage.png)">
          <div class="img">
            <div class="d">
              <h2>hello friend</h2>
              <p>Enter your personel details and start journey with us</p>
              <a id="swtichtoregiter">register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ======================== end signin page  ======================== -->
  <!-- ============================ home page without login ======================== -->
  <section class="homepage home__page position-relative" id="homepage"
    style="background-image: url(<?php echo $images ?>bg.png);">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-12">
          <div class="tbbar navigation__bar">
            <nav class="navbar navbar-expand-md px-sm-5 d-flex align-items-center" style="z-index: 800;">
              <a class="navbar-brand" href="index.php">
                <img src="<?php echo $logo . $page['logo'] ?>" style="width:200px" alt="">
              </a>
              <a class="navbar-toggler" type="a" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fas fa-bars" style="color:var(--mainColor)"></span>
              </a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" style="cursor: pointer" id="signin-botton">login</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" style="cursor: pointer" id="Regsiter-botton">register</a>
                  </li>

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="container  ">
      <div class="row ">
        <div class="col-12 col-sm-12 col-md-7 col-lg-5  home__intro">
          <div class="content ">
            <h2>let get viral</h2>
            <p>get your first
              <?php echo $page['reg_points'] ?> point
            </p>
          </div>
          <a style="cursor:pointer;" id="mppf93f">try for free now</a>

        </div>
      </div>
    </div>
  </section>
  <section class="services">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="hd shadow mb-4 ">
            <h2>what de we provide</h2>
          </div>
        </div>
        <div class="col-md-12">

        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>facebook</h3>
                <p>Likes, share, Followers</p>
                <p>post likes, post share</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>fb.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>Youtube</h3>
                <p>views, video likes, subscribe</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>yt.webp" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>twitter</h3>
                <p>Followers, tweets ,retweets, Likes</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>twt.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>tiktok</h3>
                <p>Followers, video likes ,video views</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>tik.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>twitch</h3>
                <p>Followerss</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>tch.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>reddit</h3>
                <p>posys upvotes</p>
                <p>comments upvotes</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>red.jpg" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>website hits</h3>
                <p>Earn money from viewing sites</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>red.jpg" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="dsm">
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>pinterest</h3>
                <p>Followers, rePins</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>pt.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>soundCloud</h3>
                <p>Followers, Likes, Music plays</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>sd.png" alt="service" style="width:100%">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box">
              <div class="left">
                <h3>instagram</h3>
                <p>Followers, photo likes</p>
              </div>
              <div class="right">
                <img src="<?php echo $images ?>is.webp" alt="service" style="width:100%">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="journey py-5" style="background-image:url(<?php echo $images ?>bg2.png);background-size:cover">
      <div class="row py-5 justify-content-center">
        <div class="col-md-6 mx-auto">
          <div class="hd mx-auto px-5 shadow" style="width: fit-content;">
            <h2>our journey</h2>
          </div>
        </div>
        <div class="col-md-12">

        </div>
        <br><br>
        <div class="serv_boxes px-sm-4 mx-auto align-items-center d-md-flex  col-md-12">
          <div class="tel">
            <p>12.15454</p>
            <h3>user actitvity</h3>
          </div>
          <div class="tel">
            <p>12.15454</p>
            <h3>user actitvity</h3>
          </div>

          <div class="tel">
            <p>12.15454</p>
            <h3>user actitvity</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include $tpl . 'footer.php';
}
ob_end_flush();
?>