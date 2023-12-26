<?php
session_start();
ob_start();
  if (!isset($_SESSION['clientid']))
  {
    $page = isset($_GET['page']) ? $_GET['page'] : 'login';


      if ($page == 'login')
      {
        $pageTitle = 'Login to account';
        $noNavbar = '';
        include 'init.php';

        ?>
        <div class="account-page" id="account-page"  style="padding:80px 0">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="login-page">

                  <form class="#" action="account.php?account=login" method="post" style="text-align:center">

                    <h1 style="color:var(--mainColor);margin:40px 0">Login to account</h1>


                    <div class="form-group">
                      <input type="text" name="email" class="form-control col-md-12" placeholder="Email adress" required="required">
                    </div>
                    <div class="form-group bt-mg">
                      <input type="password" name="password" class="form-control col-md-12" placeholder="password " autocomplete="new-password" required="required">
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary"  value="login" style="border:none;width:100%;text-align:center !important;text-transform:capitalize">

                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                            $password = sha1($_POST['password']);

                            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1 ");
                            $stmt->execute(array($email,$password));
                            $clientExist = $stmt->rowCount();
                            $client = $stmt->fetch();
                            if ($clientExist > 0)
                            {
                              $_SESSION['client'] = $client['username'];
                              $_SESSION['clientid'] = $client['id'];
                              $_SESSION['email'] = $client['email'];

                      
                              header('location: index.php');
                            }else {
                              ?>
                              <div class="alert alert-danger">
                                Email or password are wrong
                              </div>
                              <?php
                            }

                    }
                     ?>
                    <div class="new-acc">
                      <a href="account.php?page=register" class="new-acc" style="color:rgba(0,0,0,.6)">Create New account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

        include $tpl . 'footer.php';

      }elseif($page == "register") {

        $ref = isset($_GET['ref']) ? $_GET['ref'] : 'empyt';

        $noNavbar = '';
        $pageTitle = 'created new account';
        include 'init.php';
        ?>
        <section class="homepage" id="homepage" style="background-image: url(<?php echo $images ?>bg.png);background-size:cover;object-fit:cover;padding-bottom:40px">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="tbbar" style="margin-top:40px">
                  <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fas fa-bars" style="color:var(--mainColor)"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="account.php?page=login">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.php?page=register">register</a>
          </li>

        </ul>
      </div>
    </nav>
                </div>
              </div>
            </div>
          </div>

        </section>
        <div class="account-page" id="account-page">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="login-page">
                  <!-- <div class="switch-pages">
                    <span>تسجيل</span>
                    <span> دخول</span>
                  </div> -->
                  <form class="register-form" action="#" method="post" id="form-info">
                    <div class="icon">



                    </div>
                    <h1  style="color:var(--mainColor);margin:40px 0">Create new accout</h1>
                    <input type="hidden" name="comref" value="<?php echo $ref ?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control col-md-12" placeholder="username" autocomplete="off" required="required">
                    </div>
                    <div class="form-group">
                      <input type="text" name="fname" class="form-control col-md-12" placeholder="full name" autocomplete="off" required="required">
                    </div>
                    <div class="form-group">
                      <input type="text" name="email" class="form-control col-md-12" placeholder="Email Adress" autocomplete="off" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control col-md-12" placeholder="passaword " autocomplete="new-password" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" name="cpassword" class="form-control col-md-12" placeholder="Confirm password" autocomplete="new-password" required="required">
                    </div>
                                        <div class="form-group">
                                          <input id="a-btn-option" type="button" class="btn btn-primary" style="border:none;width:100%;text-align:center !important;text-transform:capitalize" value="Regsiter">

                                        </div>

                    <div class="err-msg" id="err-msg">

                    </div>
                    <div class="new-acc">
                      <a href="account.php?page=login" class="ald-acc new-acc" style="display:block;text-transform:capitalize;color:rgba(0,0,0,.6);text-align:center;padding:10px 0">Already have account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

        include $tpl . 'footer.php';
      }else {
        header('location: account.php?page=login');
      }

  }else {
    header('location: index.php');

  }

  ob_end_flush();

  ?>
