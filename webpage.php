<?php
ob_start();
session_start();


if (isset($_SESSION['clientid'])) {




  // هنا هنا ناخذ المتغير الذي ياتي به الاسم بايج و ذالك المتغير هو اسم الصفحة عن طريق غات ميثود
  $page = isset($_GET['page']) ? $_GET['page'] : 'index.php';

  if ($page == 'pointszone') {
    // page title تعني عنوان الصفحة الذي يظهر في الصفحة
    $pageTitle = 'Wild & Loud - points zone';
    include 'init.php';
?>
    <div class="msgwindow">
    </div>
    <div class="content dash-content ptszone dashboard_container ">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container-fluid">
          <div class="row pointsZoneHeader">
            <div class="col-md-4 active">
              <div class="content-header">
                <a class="dashboard-overview socialhits" social="1">social</a>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="content-header">
                <a class="dashboard-overview webhists" social="2">ads</a>

              </div>

            </div>
            <div class="col-md-4 ">
              <div class="content-header">
                <a class="dashboard-overview freepoints luckyloot" social="3">free points</a>

              </div>

            </div>
          </div>
          <div class="row">

            <div class="col-md-12 pointsTyle pore mmxpsqkjze 9re8dbb00er">
              <div class="sol-list">
                <ul class="social-points mt-3 d-flex justify-content-center align-items-center">
                  <?php
                  $name = 'Website hits';
                  $stmt = $conn->prepare("SELECT * FROM services WHERE name != ? ORDER BY id DESC");
                  $stmt->execute(array($name));

                  $services = $stmt->fetchAll();
                  foreach ($services as $service) {
                  ?>
                    <li>
                      <a class="service-btfd" service="<?php echo $service['id'] ?>">
                        <img src="/system/downloads/images/<?php echo $service['image'] ?>" alt="<?php echo $service['name'] ?>" style="width:60px;height:60px;border-radius:5px">
                      </a>
                    </li>

                  <?php
                  }
                  ?>

                </ul>
                <!-- social__controls -->
                <div class="social__controls list  my-3">
                  <ul>
                    <li class="ds active text-center" data-active="followers">followers</li>
                    <li class="text-center" data-active="tweets">tweets</li>
                    <li data-active="retweets" class="text-center">retweets</li>
                    <li data-active="likes" class="text-center">likes</li>
                  </ul>
                </div>
                <!-- social__body -->
                <div class="social__body d-flex">
                  <div class="col-md-3 d-grid">
                    <img src="<?php echo $images ?>red.jpg" alt="service">
                    <img src="<?php echo $images ?>red.jpg" alt="service">

                  </div>
                  <div class="col-md-6 px-lg-1 px-0  video__section">
                    <h3 class="title">view this video for 30 seconds</h3>
                    <img style="margin: auto;border-radius:5px;width:200px" src="<?php echo $images ?>youtube.png" alt="service">

                    <span class="notes">must play for 0/30 seconds</span>
                    <span class="notes">@account name</span>
                    <input type="button" class="mt-3" value="30 points">
                  </div>
                  <div class="col-md-3 d-grid">
                    <img src="<?php echo $images ?>red.jpg" alt="service">
                    <img src="<?php echo $images ?>red.jpg" alt="service">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="row ">

              </div>
            </div>

            <div class="col-md-12 mpds098fb">
              <div class="row justify-content-center mpz665r32ds">

              </div>
            </div>
            <div class="col-md-12">
              <div class="webhits" style="display:none">
                <?php
                $stmt = $conn->prepare("SELECT * FROM services WHERE name = ?");
                $stmt->execute(array($name));
                $idw = $stmt->fetch();

                $stmt = $conn->prepare("SELECT * FROM ads WHERE service = ? AND  status = 1");
                $stmt->execute(array($idw['id']));
                $ads = $stmt->fetchAll();
                //  
                $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute(array($_SESSION['clientid']));
                $s = $stmt->fetch();
                if ($s['subs'] == 0) {
                  $lt = 1;
                } elseif ($s['subs'] == 1) {
                  $lt = 15;
                } elseif ($s['subs'] == 2) {
                  $lt = 30;
                } elseif ($s['subs'] == 1) {
                  $lt = 75;
                } elseif ($s['subs'] == 4) {
                  $lt = 30;
                } else {
                  $lt = 1;
                }
                $stmt4 = $conn->prepare("SELECT * FROM freepoints  ORDER BY id DESC LIMIT $lt");
                $stmt4->execute();
                $sd = $stmt4->fetchAll();
                ?>
                <div class="owl-carousel owl-theme">
                  <?php
                  foreach ($ads as $ad) {
                  ?>
                    <div class="shadow my-3">
                      <div class="col-md-12 ">

                        <div class="today-total fd" style="text-align:left;padding: 20px 0;">

                          <h2 class="py-4" style="color: #626571;">Article Headline Go On...…………..
                          </h2>
                          <p class="ads_p" style="color:rgba(0,0,0,.6);font-weight:bold;padding-bottom:20px; font-size:13px;color:#707070;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla.

                          </p>
                          <!-- <span style="font-weight:bold;color:rgba(0,0,0,.6);margin-top:10px;display:block;text-align:center"><?php echo $ad['points'] ?> point</span> -->

                        </div>
                      </div>

                      <div class="row webhit_bottom_section">
                        <div class="col-12 col-md-6 col-lg-7 text-center text-md-left my-4  my-md-0" style="color: #626571;">
                          <a href="preview.php?page=viewsite&id=<?php echo $ad['id'] ?>">
                            <h2 style="color:#626571">Site_Name</h2>
                          </a>
                        </div>
                        <?php
                        $d = date('Y-m-d');
                        $stmt11 = $conn->prepare("SELECT * FROM lc  WHERE adid = ? AND userid = ? AND created = ?");
                        $stmt11->execute(array($ad['id'], $_SESSION['clientid'], $d));
                        $cc = $stmt11->rowCount();

                        if ($cc ==  '0') {
                        ?>
                          <div class="col-12 col-md-6 col-lg-5 p-0 fd99fd">
                            <div class="box-bfd main-ad" ad="<?php echo $ad['id'] ?>" style="cursor:pointer;">
                              <h2 class="mpprlotk" ad="<?php echo $ad['id'] ?>">Lucky Loot</h2>
                              <!-- <a ad="<?php echo $ad['id'] ?>" href="<?php echo $ad['url'] ?>" target="_blank" class="mpprlotk mpprlotk srtcount adh999bb07es" adshow adspce></a> -->

                              <span class="pointsforad mpprlotk" ad="<?php echo $ad['id'] ?>"><?php echo $ad['points'] ?> </span>
                              <p style="color:white">The more ads you view the more chances you get</p>
                            </div>
                          </div>
                        <?php
                        } else {
                        ?>
                          <div class="col-12 col-md-6 col-lg-5 p-0">
                            <div class="box-bfd main-ad" ad="<?php echo $ad['id'] ?>" style=";background:grey;min-height:195px">
                              <h3 class="mpprlotk" ad="<?php echo $ad['id'] ?>">Closed Lucky Loot</h3>
                              <!-- <a ad="<?php echo $ad['id'] ?>" target="_blank"  class="" adshow adspce>

                          </a> -->

                              <p style="color:white">The more ads you view the more chances you get</p>
                            </div>
                          </div>

                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>

              </div>
            </div>


            <div class="free_point ">
              <div class="col-md-12">
                <div class="management-body dash-table">
                  <div class="freepoints-tt">
                  </div>

                </div>

              </div>
              <!-- start ifram section -->
              <div class="col-md-12 mt-lg-2 mt-4 mx-md-3 iframe_section  ">
                <div class="iframe_container p-1">

                  <div class="iframe_body mt-1">
                    <div class="col-12 mt-1 px-1">
                      <iframe src="https://en.wikipedia.org/wiki/OpenAI" frameborder="0" width="100%" height="200"></iframe>
                    </div>

                  </div>
                </div>
              </div>
              <!-- end ifram section -->
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
    <?php



    ?>


    <?php


    ?>


    <?php



    ?>

  <?php
    // صفحة تو دو ليست
  } elseif ($page == "comp") {
    $pageTitle = 'Wild & Loud - Competition ';
    include 'init.php';

    //get compition informationn
    $stmt = $conn->prepare("SELECT * FROM competition ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $co = $stmt->fetch();
    $checkcomp = $stmt->rowCount();

    $today = date("Y-m-d");



  ?>
    <div class="comp dashboard_container content dash-content  ptszone rewards" style="margin-bottom:220px">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row">

            <?php

            if ($co['ed'] > $today || TRUE) {

              // get user hits
              $stmt = $conn->prepare("SELECT  DISTINCT userid FROM hits WHERE created >= ?  AND created <= ?");
              $stmt->execute(array($co['str'], $co['ed']));
              $hits = $stmt->fetchAll();



            ?>
              <div class="col-md-12">
                <div class="content-header " style="padding:20px;border-radius:10px">
                  <h3><?php echo $co['title'] ?> <span style="color:red">: <?php echo $co['ed'] ?></span> </h3>
                </div>
              </div>
              <?php
              $i = 0;
              foreach ($hits as $hit) {


                // get user information
                $checkid = $hit['userid'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1  ");
                $stmt->execute(array($hit['userid']));
                $user = $stmt->fetch();

                $stmt = $conn->prepare("SELECT * FROM ord WHERE userid = ? AND comp = ?   ");
                $stmt->execute(array($hit['userid'], $co['id']));
                $check = $stmt->rowCount();
                if ($check > 0) {
                  $stmt2 = $conn->prepare("SELECT * FROM hits WHERE userid = ? AND created >= ? AND created <= ?");
                  $stmt2->execute(array($hit['userid'], $co['str'], $co['ed']));
                  $total = $stmt2->rowCount();


                  $stmt = $conn->prepare("UPDATE ord SET totalclicks = ? WHERE userid= ? AND comp = ?");
                  $stmt->execute(array($total, $hit['userid'], $co['id']));
                } else {

                  // insert total hit for one user on table
                  $stmt = $conn->prepare("INSERT INTO ord(totalclicks,userid,comp)
                       VALUES(:zmr,:zcr, :zpass)");
                  $stmt->execute(array(
                    'zmr' => $total,
                    'zcr' => $hit['userid'],
                    'zpass' => $co['id']

                  ));
                }
              }
              ?>
              <div class="row justify-content-center">
                <?php
                $stmt5 = $conn->prepare("SELECT DISTINCT userid FROM ord WHERE comp = ?  ORDER BY totalclicks  DESC   ");
                $stmt5->execute(array($co['id']));
                $bs = $stmt5->fetchAll();
                foreach ($bs as $s) {
                  $i += 1;
                  $stmt2 = $conn->prepare("SELECT * FROM hits WHERE userid = ? AND created >= ? AND created <= ?");
                  $stmt2->execute(array($s['userid'], $co['str'], $co['ed']));
                  $total = $stmt2->rowCount();

                  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?  ");
                  $stmt->execute(array($s['userid']));
                  $user = $stmt->fetch();
                ?>
                  <div class="col-lg-4  col-sm-6 col-10 ">
                    <div class="user <?php echo $co['id'] ?>">
                      <div class="top mb-2 d-flex align-items-start">
                        <div class="image">

                          <?php
                          if (empty($user['image'])) {
                          ?>
                            <img src="<?php echo $avatar  ?>default.png" alt="avart" style="width:40px">

                          <?php
                          }
                          if (!empty($user['image'])) {
                          ?>
                            <img src="<?php echo $avatar . $user['image']  ?>" alt="avart" style="width:40px">

                          <?php
                          }
                          ?><br>
                          <span class="name" style="font-size:13px"><?php echo $user['fname'] ?></span>
                        </div>
                        <div class="palce">
                          <img src="<?php echo $images ?>gold2.png" alt=""> <br>
                          <span style="font-size:15px;"><?php echo $i ?></span>
                        </div>
                      </div>
                      <div class="bottom">
                        <ul>
                          <li class="d-flex flex-column justify-content-center">
                            <span><?php echo $total; ?></span>
                            <p class="mb-0 pb-0">click</p>
                          </li>
                          <li class="d-flex flex-column justify-content-center">
                            <span>0$</span>
                            <p class="mb-0 pb-0">withdrawls</p>
                          </li>
                          <li class="d-flex flex-column justify-content-center">
                            <span><?php echo $user['hits'] ?></span>
                            <p class="mb-0 pb-0">Total Clicks</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <div class="col-md-12">
                  <div class="content-header " style="padding:20px;border-radius:10px">
                    <h3 style="color:green;text-transform:capitalize">Competition is over and winners :</h3>
                  </div>
                </div>

                <?php
                $i = 0;
                $stmt5 = $conn->prepare("SELECT DISTINCT userid FROM ord WHERE comp = ?  ORDER BY totalclicks  DESC   ");
                $stmt5->execute(array($co['id']));
                $bs = $stmt5->fetchAll();
                foreach ($bs as $s) {



                  $stmt2 = $conn->prepare("SELECT * FROM hits WHERE userid = ? AND created >= ? AND created <= ?");
                  $stmt2->execute(array($s['userid'], $co['str'], $co['ed']));
                  $total = $stmt2->rowCount();

                  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?  ");
                  $stmt->execute(array($s['userid']));
                  $user = $stmt->fetch();

                  if ($total != 0) {

                    $stmt = $conn->prepare("SELECT * FROM winners WHERE userid = ? AND comp = ? LIMIT 1");
                    $stmt->execute(array($user['id'], $co['id']));
                    $data = $stmt->fetch();
                    $checmy = $stmt->rowCount();

                    $i += 1;
                ?>
                    <div class="col-lg-4 col-sm-6 col-10">
                      <div class="user">
                        <div class="top mb-2 d-flex align-items-center">
                          <div class="image">

                            <?php
                            if (empty($user['image'])) {
                            ?>
                              <img src="<?php echo $avatar  ?>default.png" alt="avart" style="width:40px">

                            <?php
                            }
                            if (!empty($user['image'])) {
                            ?>
                              <img src="<?php echo $avatar . $user['image']  ?>" alt="avart" style="width:40px">

                            <?php
                            }
                            ?><br>
                            <span class="name" style="font-size:13px"><?php echo $user['fname'] ?></span>
                          </div>
                          <div class="palce">
                            <img src="<?php echo $images ?>gold2.png" style="width:50px" alt=""> <br>
                            <span style="font-size:25px;"><?php echo $i ?></span> <br>

                          </div>
                        </div>
                        <?php
                        if ($_SESSION['clientid'] == $user['id']) {
                          if ($checmy > 0) {
                        ?>
                            <a userid="<?php echo $user['id'] ?>" comp="<?php echo $co['id'] ?>" style="cursor: pointer;font-size:12px;background: gold;color:black;display:block;text-align:center;padding:10px">Congratulations, You won <?php echo $data['points'] ?> </a>

                          <?php
                          } else {
                          ?>
                            <a place="<?php echo $i ?>" class="winner" userid="<?php echo $user['id'] ?>" comp="<?php echo $co['id'] ?>" style="cursor: pointer;font-size:12px;background: gold;color:black;display:block;text-align:center;padding:10px">Click here to get yor point</a>

                          <?php
                          }
                          ?>

                        <?php
                        }
                        ?>
                        <div class="bottom">
                          <ul>
                            <li class="d-flex flex-column justify-content-center">
                              <span><?php echo $total; ?></span>
                              <p class="mb-0 pb-0">click</p>
                            </li>
                            <li class="d-flex flex-column justify-content-center">
                              <span>0$</span>
                              <p class="mb-0 pb-0">withdrawls</p>
                            </li>
                            <li class="d-flex flex-column justify-content-center">
                              <span><?php echo $user['hits'] ?></span>
                              <p class="mb-0 pb-0">Total Clicks</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>


              <?php

                }
              }




              ?>

              </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  <?php




  } elseif ($page == "rewards") {
    $pageTitle = 'Wild & Loud - rewards';
    include 'init.php';


    $date = date("Y-m-d");

    $stmt = $conn->prepare("SELECT * FROM rewards ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $total = $stmt->rowCount();
    $rds = $stmt->fetchAll();

    $codeone = mt_rand(0, $total);
    $codetwo = mt_rand(0, $total);


    $stmt2 = $conn->prepare("SELECT * FROM ar WHERE user =  ? AND created  =?");
    $stmt2->execute(array($_SESSION['clientid'], $date));
    $check1 = $stmt2->rowCount();


    $stmt = $conn->prepare("SELECT * FROM hits WHERE userid = ? AND created = ?");
    $stmt->execute(array($_SESSION['clientid'], $date));
    $alls = $stmt->fetchAll();
    $count = 0;
    foreach ($alls as $all) {
      $count += 1;
    }

  ?>
    <div class="content dash-content ptszone rewards dashboard_container">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row">
            <?php
            foreach ($rds as $rd) {
              if ($rd['clicks'] >= $count && $check1 == 0) {
                $stmt = $conn->prepare("INSERT INTO ar(user,ad,created)
               VALUES(:zf,:ze,now())");
                $stmt->execute(array(
                  'zf' => $_SESSION['clientid'],
                  'ze' => $rd['id']

                ));

                $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute(array($_SESSION['clientid']));
                $userpoints = $stmt->fetch();


                if ($userpoints['subs'] == 0) {
                  $totalpoints = $userpoints['points'] + $rd['points'];
                } elseif ($userpoints['subs'] == 1) {
                  $totalpoints = $userpoints['points'] + $rd['points'] + ($rd['points'] / 2);
                } elseif ($userpoints['subs'] == 2) {
                  $totalpoints = $userpoints['points'] + $rd['points'] * 2;
                } elseif ($userpoints['subs'] == 3) {
                  $totalpoints = $userpoints['points'] + $rd['points'] * 3;
                } elseif ($userpoints['subs'] == 4) {
                  $totalpoints = $userpoints['points'] + $rd['points'] * 2;
                } else {
                  $totalpoints = $userpoints['points'] + $rd['points'];
                }


                $totalpoints = $userpoints['points'] + $rd['points'];

                $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
                $stmt->execute(array($totalpoints, $_SESSION['clientid']));
              }
            ?>
              <div class="col-md-12">
                <div class="cnt-header shadow">
                  <div class="content-s">
                    <span style="color:white"><?php echo $rd['points'] ?> point</span> <br>
                    <?php
                    if ($count >= $rd['clicks']) {
                    ?>
                      <small style="font-size:17px;color:red !important;font-weight:bold"><?php echo $rd['clicks'] ?> / <?php echo $rd['clicks'] ?></small>

                    <?php
                    }
                    if ($count < $rd['clicks']) {
                    ?>
                      <small style="font-size:17px"><?php echo $count ?> / <?php echo $rd['clicks'] ?></small>

                    <?php
                    }
                    ?>
                  </div>

                  <div class="row">
                    <div class="col-8">
                      <?php
                      if ($count >= $rd['clicks']) {
                        $stmt = $conn->prepare("SELECT * FROM ar WHERE user = ? AND ad = ? AND created  =?");
                        $stmt->execute(array($_SESSION["clientid"], $rd['id'], $date));
                        $checkg = $stmt->rowCount();

                        if ($checkg == 0) {
                      ?>
                          <a ad="<?php echo $rd['id'] ?>" points="<?php echo $rd['points'] ?>" class="getrewardpoints" style="cursor: pointer;text-transform:capitalize;color:black;text-decoration:underline">click to get points</a>

                        <?php
                        } else {
                        ?>
                          <p style="color:green;text-transform:capitalize;font-weight:bold">Congratulations, you won <?php echo $rd['points'] ?> point for this reward</p>
                        <?php
                        }
                        ?>
                      <?php
                      }
                      ?>
                      <h3 style="text-transform:capitalize;font-weight:600;color:#25262E"><?php echo $rd['title'] ?>Get daily 50 Points points!
                      </h3>
                      <p style="color:#626571"><?php echo $rd['description'] ?> You have not done enough clicks today to get points. you have to do at least 40 click (this refers to all social types) to get points.
                      </p>
                    </div>
                    <div class="col-4">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-12">
                <a href="#">
                  <img src="<?php echo $images ?>bannerad.png" style="width: 60%;margin: auto;display: flex; max-height:10vh;" alt="ad">
                </a>
              </div>
              <div class="col-md-12">
                <div class="cnt-header shadow">
                  <div class="content-s">
                    <span style="color:white"><?php echo $rd['points'] ?> point</span> <br>
                    <?php
                    if ($count >= $rd['clicks']) {
                    ?>
                      <small style="font-size:17px;color:red !important;font-weight:bold"><?php echo $rd['clicks'] ?> / <?php echo $rd['clicks'] ?></small>

                    <?php
                    }
                    if ($count < $rd['clicks']) {
                    ?>
                      <small style="font-size:17px;color:red;"><?php echo $count ?> / <?php echo $rd['clicks'] ?></small>

                    <?php
                    }
                    ?>
                  </div>

                  <div class="row">
                    <div class="col-8">
                      <?php
                      if ($count >= $rd['clicks']) {
                        $stmt = $conn->prepare("SELECT * FROM ar WHERE user = ? AND ad = ? AND created  =?");
                        $stmt->execute(array($_SESSION["clientid"], $rd['id'], $date));
                        $checkg = $stmt->rowCount();

                        if ($checkg == 0) {
                      ?>
                          <a ad="<?php echo $rd['id'] ?>" points="<?php echo $rd['points'] ?>" class="getrewardpoints" style="cursor: pointer;text-transform:capitalize;color:black;text-decoration:underline">click to get points</a>

                        <?php
                        } else {
                        ?>
                          <p style="color:green;text-transform:capitalize;font-weight:bold">Congratulations, you won <?php echo $rd['points'] ?> point for this reward</p>
                        <?php
                        }
                        ?>
                      <?php
                      }
                      ?>
                      <h3 style="text-transform:capitalize;font-weight:600;color:#25262E"><?php echo $rd['title'] ?>Referral Clicks

                      </h3>
                      <p style="color:#626571"><?php echo $rd['description'] ?> You have not done enough clicks today to get points. you have to do at least 40 click (this refers to all social types) to get points.
                      </p>
                    </div>
                    <div class="col-4">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-12">
                <a href="#">
                  <img src="<?php echo $images ?>bannerad.png" style="width: 60%;margin: auto;display: flex;max-height:10vh;" alt="ad">
                </a>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  <?php



  } elseif ($page == "referral") {
    $pageTitle = 'rewards page';
    include 'init.php';
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute(array($_SESSION['clientid']));
    $user = $stmt->fetch();
    $stmt = $conn->prepare("SELECT * FROM rewards ORDER BY id DESC");
    $stmt->execute();
    $total = $stmt->rowCount();

    $codeone = mt_rand(1, $total);
    $codetwo = mt_rand(1, $total);
  ?>
    <?php
    $stmt = $conn->prepare("SELECT * FROM hits WHERE userid = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute(array($_SESSION['clientid']));
    $hits = $stmt->fetch();
    $checkhi = $stmt->rowCount();

    if ($checkhi > 0) {

      $todayhits = $hits['id'];
    }
    ?>
    <div class="content dashboard_container  dash-content ptszone rewards">
      <div class="dashboard lf-pd" id="dashboard">
        <div>
          <div class="row w-100 m-auto">
            <?php
            if ($checkhi > 0) {
            ?>
              <div class="col-md-12">
                <div class="referral-status" style="margin:40px 0">
                  <?php
                  $today = date("Y-m-d");


                  if ($hits['created'] == $today) {
                  ?>
                    <p class="sts-v"> <span class="active-cir"></span> your active for this day</p>

                  <?php
                  } else {
                  ?>
                    <p style="color:#ee7373" class="sts-v"> <span class="unactive-cir"></span>No activities for this day</p>

                  <?php
                  }

                  ?>


                </div>
              </div>
            <?php
            } else {
            ?>
              <p style="color:#ee7373" class="sts-v"> <span class="unactive-cir"></span>No data to show</p>

            <?php
            }
            ?>
            <div class="col-md-12 position-relative">
              <div class="cnt-header m-0 shadow referral_header p-4">

                <div class="row justify-content-between">
                  <div class="col-lg-8 col-12">
                    <h2 class="text-capitalize mb-3">Refer friends and earn points</h2>
                    <p>Introduce a friend to wild & loud to earn 200 point.<br>Earn on every click your refer does. even when they buy from our store.</p>
                  </div>
                  <div class="col-lg-3  col-12 points mt-lg-0 mt-3  d-flex flex-column justify-content-center align-items-center text-center">
                    <span>200 points</span>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-md-12">
              <div class="cnt-header shadow my-4 p-4">

                <div class="row">
                  <div class="col-md-12">

                    <h3 class="text-capitalize mb-3">share my referral link with my friends</h3>

                    <div class="input-group mb-3">
                      <input type="text" value="http://localhost/system/index.php?ref=<?php echo  $user['myref'] ?>" class="form-control" placeholder="referral link" id="myInput" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button onclick="myFunction()" class="btn " type="button">copy link</button>
                      </div>
                    </div>
                  </div>

                </div>

                <script>
                  function myFunction() {
                    /* Get the text field */
                    var copyText = document.getElementById("myInput");

                    /* Select the text field */
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); /* For mobile devices */

                    /* Copy the text inside the text field */
                    navigator.clipboard.writeText(copyText.value);

                    /* Alert the copied text */
                    alert("Copied the referral: " + copyText.value);
                  }
                </script>
                <div class="social">
                  <div class="vconte">
                    <ul class="d-flex justify-content-center mt-3" style="gap: 20px;">
                      <li>
                        <a href="https://www.twitter.com" target="_blank">
                          <img src="<?php echo $images ?>twt.png" alt="twitter" style="width:50px" class="img-fluid">
                        </a>
                      </li>

                      <li class="text-center">
                        <a href="https://www.pinterest.com/" target="_blank">
                          <img src="<?php echo $images ?>pt.png" alt="pinterest" style="width:50px" class="img-fluid">
                        </a>
                      </li>
                      <li>
                        <a href="https://www.facebook.com" target="_blank">
                          <img src="<?php echo $images ?>fb.png" alt="facebook" style="width:50px" class="img-fluid">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute(array($_SESSION['clientid']));
            $my = $stmt->fetch();


            $stmt2 = $conn->prepare("SELECT * FROM users WHERE comref = ?");
            $stmt2->execute(array($my['myref']));
            $users = $stmt2->fetchAll();
            $ehc = $stmt2->rowCount();


            ?>
            <div class="col-12 my-3 shadow banner px-md-5 px-3">
              <div class="row d-flex align-items-center justify-conetent-center">
                <div class="col-md-4 col-lg-3 col-12 banner_side">

                  <img src="<?php echo $images ?>banner_ref.png" class="img-fluid" alt="banner">
                </div>
                <div class="col-md-4 col-lg-6 col-12  d-flex justify-content-center px-0">
                  <div class="col-md-6  col-6 banner_referral-center justify-content-end d-flex">
                    <img src="<?php echo $images ?>banner_ref-cen.png" class="img-fluid" alt="banner">
                  </div>
                  <div class="col-md-6 col-6  banner_referral-center">
                    <img src="<?php echo $images ?>banner_ref-cen.png" class="img-fluid" alt="banner">
                  </div>
                </div>
                <div class="col-md-4 col-lg-3 col-12 banner_side">

                  <img src="<?php echo $images ?>banner_ref-right.png" class="img-fluid" alt="banner">
                </div>
              </div>
              <div class="fd banner_text text-center d-flex flex-column justify-content-center align-items-center">
                <h5 style="color:#626571" class="my-3">BANNER IMAGE CODE</h5>
                <input type="text" name="" class="form-control" placeholder="<a href='https://wildnloud.com/lips.datafilhref='https://wildnloud.com/lips.datafil">
                <a href="#" class="d-flex flex-column justify-content-center mt-3 mb-2">Copy</a>
              </div>
            </div>
            <div class="col-md-12 referral_table my-3">
              <h3>Your Referral</h3>
              <div class="management-body dash-table ">
                <div class="default-management-table table-responsive">
                  <table class="table  " id="referral-table">
                    <thead>
                      <tr style="background:#FCFCFC">
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">clicks</th>
                        <th scope="col">last click</th>
                        <th scope="col">avg</th>
                        <th scope="col">stats</th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($ehc > 0) {
                      ?>
                        <?php
                        foreach ($users as $ad) {
                        ?>
                          <tr style="  background:#F5F5F5;margin:20px 0;filter: drop-shadow(-3px 3px 3px rgba(0,0,0,0.16 ));">
                            <td>
                              <?php echo $ad['id'] ?>
                            </td>

                            <td>
                              @<?php echo $ad['username'] ?>
                            </td>

                            <td>
                              <?php
                              $c = 0;
                              $stmt = $conn->prepare("SELECT * FROM hits WHERE userid = ?");
                              $stmt->execute(array($ad['id']));
                              $tt = $stmt->fetchAll();

                              foreach ($tt as $t) {
                                $c += 1;
                              }

                              ?>
                              <?php echo $c ?> click
                            </td>

                            <?php
                            $stmt = $conn->prepare("SELECT * FROM hits WHERE userid =? ORDER BY id DESC");
                            $stmt->execute(array($ad['id']));
                            $lastad = $stmt->fetch();
                            $check = $stmt->rowCount();

                            if ($check > 0) {
                              $stmt = $conn->prepare("SELECT * FROM ads WHERE id =? ORDER BY created DESC");
                              $stmt->execute(array($lastad['ad']));
                              $dd = $stmt->fetch();
                            ?>
                              <td>
                                <?php echo $lastad['created'] ?>

                              </td>
                            <?php
                            } else {
                            ?>
                              <td>
                                No click !

                              </td>


                            <?php
                            }
                            ?>
                            <td>

                              <?php
                              $stmts = $conn->prepare("SELECT * FROM hits WHERE userid = ? ORDER BY created DESC");
                              $stmts->execute(array($ad['id']));
                              $hitds = $stmts->fetchAll();
                              $counter = 0;
                              $todayhits = 0;
                              foreach ($hitds as $h) {
                                $counter += 1;
                                $todayhits = $h['id'];
                              }
                              $stmtr = $conn->prepare("SELECT * FROM hits WHERE id = ?");
                              $stmtr->execute(array($todayhits));
                              $hitday = $stmtr->fetch();
                              $today = date("d");

                              $day = substr($hitday['created'], 8);

                              $moy = ((int)$today - (int)$day);
                              if ($moy != 0) {
                                $tot = $counter / $moy;
                                echo $tot;
                              } else {
                                echo 'no avg yet';
                              }
                              ?>

                            </td>

                            <td>
                              <?php
                              if ($moy == 0) {
                              ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="24" height="24" fill="#FB4040" />
                                  <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2V2ZM12 20C10.4178 20 8.87104 19.5308 7.55544 18.6518C6.23985 17.7727 5.21447 16.5233 4.60897 15.0615C4.00347 13.5997 3.84504 11.9911 4.15372 10.4393C4.4624 8.88743 5.22433 7.46197 6.34315 6.34315C7.46197 5.22433 8.88743 4.4624 10.4393 4.15372C11.9911 3.84504 13.5997 4.00346 15.0615 4.60896C16.5233 5.21447 17.7727 6.23984 18.6518 7.55544C19.5308 8.87103 20 10.4177 20 12C20 14.1217 19.1572 16.1566 17.6569 17.6569C16.1566 19.1571 14.1217 20 12 20V20Z" fill="white" />
                                  <path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="white" />
                                  <path d="M12 7C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8V13C11 13.2652 11.1054 13.5196 11.2929 13.7071C11.4804 13.8946 11.7348 14 12 14C12.2652 14 12.5196 13.8946 12.7071 13.7071C12.8946 13.5196 13 13.2652 13 13V8C13 7.73478 12.8946 7.48043 12.7071 7.29289C12.5196 7.10536 12.2652 7 12 7Z" fill="white" />
                                </svg>

                              <?php
                              } else {
                              ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="24" height="24" fill="#21C56C" />
                                  <path d="M8 12.5L11 15.5L16 9.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="2" />
                                </svg>

                              <?php
                              }
                              ?>

                            </td>
                          </tr>
                        <?php
                        }
                        ?>
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





          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  <?php



  } elseif ($page == 'store') {
    // page title تعني عنوان الصفحة الذي يظهر في الصفحة
    $pageTitle = 'Store system';
    include 'init.php';
    // Include configuration file

    $stmt = $conn->prepare("SELECT * FROM store ORDER BY id DESC");
    $stmt->execute();
    $options = $stmt->fetchAll();
  ?>
    <div class="dashboard_container ">

      <div class="content dash-content ptszone">
        <div class="dashboard lf-pd" id="dashboard">
          <div class="container-fluid">
            <div class="row  store_board">





              <?php
              foreach ($options as $option) {
                if ($option['type'] == '0') {
              ?>

                  <div class="BOX">
                    <a href="paymentSelect.php?page=ad&id=<?php echo $option['id'] ?>">

                      <div class="cashbox ds " style="padding:15px;  background: #F5F5F5;margin:10px 0;border:1px solid rgba(0,0,0,.2)">
                        <div class="box_content d-flex align-items-center ">
                          <div class="">
                            <img src="<?php echo $images ?>gold1.png" style="" alt="">
                          </div>
                          <div class="">
                            <div class="today-total" style="text-align:left;padding:0 !important">
                              <h3 style="color:rgba(0,0,0,.6);font-size:23px;">$<?php echo $option['moneyd'] ?> cashout</h3>
                              <p style="color:var(--mainColor);font-size:14px"><?php echo $option['points'] ?> point</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
              <?php
                }
              }

              ?>


              <?php
              foreach ($options as $option) {

                if ($option['type'] == '1') {
              ?>
                  <div class="BOX">
                    <a href="paymentSelect.php?page=ad&id=<?php echo $option['id'] ?>">
                      <div class="cashbox ds " style="padding:15px;  background: #F5F5F5;margin:10px 0">
                        <div class="box_content d-flex align-items-center">
                          <div class="">
                            <img src="<?php echo $images ?>out.png" style="" alt="">
                          </div>
                          <div class="">
                            <div class="today-total" style="text-align:left;padding:0 !important">
                              <h3 style="color:rgba(0,0,0,.6);font-size:23px;">$<?php echo $option['points'] ?> point</h3>
                              <p style="color:#FE4C4C;font-size:14px"><?php echo $option['moneyd'] ?> cash out</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
              <?php
                }
              }

              ?>


            </div>


            <div class="col-md-12">

              <div class="management-body dash-table">
                <div class="default-management-table">

                </div>
              </div>
            </div>
          </div>
          <section class="mpprre87 paymentmethod">
            <div class="container">
              <div class="row align-items-center" style="background:#F5F5F5;">
                <div class="col-md-9">
                  <div class="row ">
                    <div class="col-md-4">
                      <div class="paytpye" style="display:inline-flex;  background: #F5F5F5;padding:10px">
                        <a href="#">
                          <img src="<?php echo $images ?>paypal.png" alt="">

                        </a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="paytpye" style="display:inline-flex;  background: #F5F5F5;padding:10px">
                        <a href="">
                          <img src="<?php echo $images ?>stripe.png" alt="">
                        </a>
                      </div>
                    </div>


                    <div class="col-md-4">

                      <div class="paytpye" style=" background: #F5F5F5;padding:14px;text-align:center;font-size:18px">
                        <a class="dssad" href="paymentSelect.php?page=subs" style="color:var(--mainColor);font-size:30px;padding:10px 20px;font-weight:bold">
                          Premium
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="paytpye" style="display:inline-flex;  background: #F5F5F5;padding:10px">
                        <a href="#">
                          <img src="<?php echo $images ?>net.png" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="paytpye" style="display:inline-flex;  background: #F5F5F5;padding:10px">
                        <a href="#">
                          <img src="<?php echo $images ?>skrill.png" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="paytpye" style="display:inline-flex;  background: #F5F5F5;padding:10px">
                        <a href="">
                          <img src="<?php echo $images ?>bit.png" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="prelist">

                      </div>
                      <div class="conrte">
                        <a href="#" class="text-center" style="display: block;background-color:var(--mainColor);color:white;font-size:30px;font-weight:bold;border-radius:5px">
                          Pay 45$
                        </a>
                      </div>
                    </div>

                  </div>
                </div>

                <!--  -->
              </div>
            </div>
          </section>

        </div>

      </div>
    </div>
    </div>

    </div>
    </div>
    <?php



    ?>


    <?php


    ?>


    <?php



    ?>

  <?php
    // صفحة تو دو ليست
  } elseif ($page == "myprofile") {

    $pageTitle = 'Wild & Loud - user account details';
    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute(array($_SESSION['clientid']));
    $userInfo = $stmt->fetch();
  ?>
    <div class="edit-page col-md-10 col-12 user-edit-pages deep-page">
      <div class="container">
        <div class="row">
          <div class="col-12 jusitify-content-center">
            <form class="pic" action="webpage.php?page=avatupdate&id=<?php echo $userInfo['id'] ?>" style="text-align:center;padding: 0" method="post" enctype="multipart/form-data">
              <?php
              if (empty($userInfo['image'])) {
              ?>
                <img src="<?php echo $avatar  ?>default.png" style="width: 180px;height: 180px;border-radius:50%;margin:auto" alt="avart">

              <?php
              } else {
              ?>
                <img src="<?php echo $avatar . $userInfo['image'] ?>" style="width: 180px;height: 180px;border-radius:50%;margin:auto" alt="avart">

              <?php
              }
              ?>
              <p class="username"><?php echo $userInfo['username'] ?></p>
              <label for="avatar" class="avar-up">upload <i class="fas fa-plus"></i> </label>
              <input type="file" id="avatar" name="avatar" class="up-ava" style="display:none;">
              <input type="submit" name="upload" value="save" class="form-control btn btn-primary shw-btn" id="sb-bt" style="visibility:hidden; margin:0 auto !important">
            </form>
            <div class="use-fl-info">
              <form method="post" class="d-flex flex-column" action="webpage.php?page=update" style="padding: 0">

                <div class="form-row justify-content-center">

                  <div class="col-12 settig_heading mb-5 d-flex flex-column align-items-center">
                    <h1 class="shadow py-2 px-2">Personal Data</h1>

                  </div>

                  <div class="form-group col-md-6 mb-md-4">
                    <label for="userNameUpdate" class="text-left text-md-center w-100">username</label>
                    <input type="text" id="userNameUpdate" name="username" class="form-control" required value="<?php echo $userInfo['username'] ?>">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="fullNameUpdate" class="text-left text-md-center w-100">full name</label>
                    <input type="text" id="fullNameUpdate" name="fname" class="form-control" required value="<?php echo $userInfo['fname'] ?>">
                  </div>

                  <div class="form-group col-md-6 mb-md-4">
                    <label for="counteryUpdate" class="text-left text-md-center w-100">country</label>
                    <input type="text" id="counteryUpdate" name="country" class="form-control" required value="<?php echo $userInfo['country'] ?>">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="statsUpdate" class="text-left text-md-center w-100">stats</label>
                    <input type="text" id="statsUpdate" name="stats" class="form-control" required value="<?php echo $userInfo['stats'] ?>">
                  </div>



                  <div class="form-group col-md-6 mb-md-4">
                    <label for="cityUpdate" class="text-left text-md-center w-100">city</label>
                    <input type="text" id="cityUpdate" name="city" class="form-control" required value="<?php echo $userInfo['city'] ?>">
                  </div>


                  <div class="form-group col-md-6 mb-md-4">
                    <label for="adressUpdate" class="text-left text-md-center w-100">adress</label>
                    <input type="text" id="adressUpdate" name="adress" class="form-control" required value="<?php echo $userInfo['adress'] ?>">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="zipUpdate" class="text-left text-md-center w-100">zip</label>
                    <input type="text" id="zipUpdate" name="zip" class="form-control" required value="<?php echo $userInfo['zip'] ?>">
                  </div>



                  <input type="hidden" value="<?php echo $userInfo['id'] ?>" name="id" value="">
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="newPasswordUpdate" class="text-left text-md-center w-100">new password </label>
                    <input type="password" id="newPasswordUpdate" name="password" class="form-control">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="confirmNewPassUpdate" class="text-left text-md-center w-100">confirm new password</label>
                    <input type="password" id="confirmNewPassUpdate" name="cpassword" class="form-control">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="BODUpdate" class="text-left text-md-center w-100">birthday date</label>
                    <input type="datetime-local" id="BODUpdate" name="br" class="form-control" value="<?php echo $userInfo['zip'] ?>">
                  </div>


                  <div class="form-group col-md-6 mb-md-4">
                    <label for="phoneUpdate" class="text-left text-md-center w-100">phone</label>
                    <input type="text" id="phoneUpdate" name="phone" class="form-control" required value="<?php echo $userInfo['phone'] ?>">
                  </div>


                  <div class="col-12 settig_heading mb-5 mt-4 d-flex flex-column align-items-center">
                    <h1 class="shadow py-2 px-2">Security Data</h1>

                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="emailUpdate" class="text-left text-md-center w-100">Current Email</label>
                    <input type="email" id="emailUpdate" name="cemail" class="form-control" required value="<?php echo $userInfo['email'] ?>">
                  </div>
                  <div class="form-group col-md-6 mb-md-4">
                    <label for="newEmailUpdate" class="text-left text-md-center w-100">new Email</label>
                    <input type="email" id="newEmailUpdate" name="nemail" class="form-control" value="">
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">save</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>






    <?php

  } elseif ($page == 'avatupdate') {

    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: users.php');


    $imageName = $_FILES['avatar']['name'];
    $imageSize = $_FILES['avatar']['size'];
    $imageTmp = $_FILES['avatar']['tmp_name'];
    $imageType = $_FILES['avatar']['type'];

    $imageAllowedExtension = array("jpeg", "jpg", "png");
    $Infunc = explode('.', $imageName);
    $imageExtension = strtolower(end($Infunc));
    $formErrors = array();
    if (empty($imageName)) {
      $formErrors[] = 'user avatar  cant be empty';
    }
    if (!empty($imageName) && !in_array($imageExtension, $imageAllowedExtension)) {
      $formErrors[] = 'avatar Extension is not allowed';
    }
    if ($imageSize > 4194304) {
      $formErrors[] = 'avatar size cant be empty';
    }


    foreach ($formErrors as $error) {
    ?>
      <div class="container">
        <?php
        echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
        ?>

      </div>
    <?php
    }



    if (empty($formErrors)) {
      $image = rand(0, 100000) . '_' . $imageName;
      move_uploaded_file($imageTmp, $avatar . '/' . $image);
      $stmt = $conn->prepare("UPDATE users SET image = ? WHERE id = ? LIMIT 1 ");
      $stmt->execute(array($image, $id));
    ?>

    <?php
      header('location: ' . $_SERVER['HTTP_REFERER']);
    }
  } elseif ($page == 'avatupdate') {

    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');


    $imageName = $_FILES['avatar']['name'];
    $imageSize = $_FILES['avatar']['size'];
    $imageTmp = $_FILES['avatar']['tmp_name'];
    $imageType = $_FILES['avatar']['type'];

    $imageAllowedExtension = array("jpeg", "jpg", "png");
    $Infunc = explode('.', $imageName);
    $imageExtension = strtolower(end($Infunc));
    $formErrors = array();
    if (empty($imageName)) {
      $formErrors[] = 'user avatar  cant be empty';
    }
    if (!empty($imageName) && !in_array($imageExtension, $imageAllowedExtension)) {
      $formErrors[] = 'avatar Extension is not allowed';
    }
    if ($imageSize > 4194304) {
      $formErrors[] = 'avatar size cant be empty';
    }


    foreach ($formErrors as $error) {
    ?>
      <div class="container">
        <?php
        echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
        ?>

      </div>
    <?php
    }



    if (empty($formErrors)) {
      $image = rand(0, 100000) . '_' . $imageName;
      move_uploaded_file($imageTmp, $avatars . '/' . $image);
      $stmt = $conn->prepare("UPDATE players SET image = ? WHERE id = ? LIMIT 1 ");
      $stmt->execute(array($image, $id));
    ?>

      <?php
      header('location: ' . $_SERVER['HTTP_REFERER']);
    }
  } elseif ($page == 'update') {


    $pageTitle = 'update page';
    include 'init.php';
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute(array($id));
    $checkIfuser = $stmt->rowCount();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nemail = $_POST['nemail'];
      $cemail = $_POST['cemail'];

      $username = $_POST['username'];
      $pass = $_POST['password'];
      $cpass = $_POST['cpassword'];
      $phone = $_POST['phone'];
      $fname = $_POST['fname'];
      $city = $_POST['city'];
      $country = $_POST['country'];
      $zip = $_POST['zip'];
      $adress = $_POST['adress'];
      $stats = $_POST['stats'];

      $br = $_POST['br'];

      $formErrors = array();
      if (empty($username)) {
        $formErrors[] = 'username is required';
      }
      if (empty($nemail)) {
        $email = $cemail;
      }
      if (!empty($nemail)) {
        $email = $nemail;
      }
      if (empty($pass)) {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $passs = $stmt->fetch();

        $password = $passs['password'];
      }
      if (!empty($pass)) {
        if ($pass != $cpass) {
          $formErrors[] = 'passwords not match';
        } else {
          $password = sha1($_POST['cpassword']);
        }
      }

      if (empty($email)) {
        $formErrors[] = 'email is required';
      }
      if (empty($adress)) {
        $formErrors[] = 'adress is required';
      }
      if (empty($city)) {
        $formErrors[] = 'city is required';
      }



      foreach ($formErrors as $error) {
      ?>
        <div class="container">
          <?php
          echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
          ?>

        </div>
      <?php
        // header('refresh:4;url=' . $_SERVER['HTTP_REFERER']);
      }
      ?>
      <div class="container" style="text-align:center">
        <a href="webpage.php?page=myprofile&id=<?php echo $id ?>"> back</a>
      </div>
<?php

      if (empty($formErrors)) {
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?,  fname = ?, phone = ?,city = ?, email =?, country = ?, stats= ?, adress= ?, zip =?, br =?
                                                             WHERE id= ? LIMIT 1  ");
        $stmt->execute(array($username, $password, $fname, $phone, $city, $email, $country, $stats, $adress, $zip, $br, $id));
        header('location: ' . $_SERVER['HTTP_REFERER']);
      }
    }
  } else {
    header('location:index.php');
  }

  echo "</div>";
  include $tpl . 'footer.php';
} else {
  header('location: logout.php');
  exit();
}
?>

<?php
ob_end_flush();
?>