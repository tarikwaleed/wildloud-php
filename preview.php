<?php
ob_start();
session_start();


if (isset($_SESSION['clientid'])) {




  // هنا هنا ناخذ المتغير الذي ياتي به الاسم بايج و ذالك المتغير هو اسم الصفحة عن طريق غات ميثود
  $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

  if ($page == 'viewsite') {
    $pageTitle = 'ad preview website ';
    $noNavbar = '';
    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ? LIMIT 1");
    $stmt->execute(array($id));
    $checkIfuserExist = $stmt->rowCount();
    $ad = $stmt->fetch();


?>

    <nav class="webabanner navbar navbar-expand-lg" style="background:var(--mainColor);">
      <div class="container py-2">
        <a class="navbar-brand col-md-2 col-3" href="#">
          <img src="<?php echo $logo ?>previewlogo.png" class="img-fluid" alt="logo">
        </a>
           <div class="barcontent col-md-7 col-lg-4 col-sm-7  col-6" points="20" ad=<?php echo $ad['id'] ?>>
                <p id="p">Waiting for the advertisement to load......</p>
                <div class="myProgressContainer">
                  <div class="coin">
                    <img id="dollarImg" src="./downloads/images/dollar.png" alt="dollar" >
                  </div>
                  <div id="myProgress" class="mt-2">
                    <div id="myBar" data-watch="80"></div>
                  </div>
                </div>
                  <div class="col-lg- mb-md-3 col-12">
              <!-- you need to add (d-flex) to show these buttons -->
              <div class="buttons align-items-center justify-content-center">
                <button class="text-capitalize closeBtn ">close</button>
                <button class="text-capitalize nextBtn">next</button>
              </div>
            </div>
              </div>
   
        <button class="navbar-toggler  " style="padding: 0.25rem 0.4rem;border: none !important;outline: none !important;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fas fa-bars d-flex justify-content-center align-items-center" style="color:var(--white);"></span>
        </button>
        <div class="collapse navbar-collapse col-lg-5" id="navbarNavDropdown">

          <div class="navbar-nav ml-auto align-items-center col-lg-12 p-0">
          
            <div class="col-lg-12 col-12 col-sm-12 p-0">
              <img src="<?php echo $images ?>youtube.png" alt="logo" style="width:100%;height:46.5px">
            </div>

          </div>

        </div>

      </div>
    </nav>
    <div class="previewweb">
      <iframe src="<?php echo $ad['link'] ?>" width="100%"></iframe>
    </div>
    <!-- progress bar script -->
    <script type="text/javascript" src="<?php echo $js ?>progress.js"></script>
  <?php
    include $tpl . 'footer.php';
    // صفحة تو دو ليست
  } elseif ($page == "rewards") {
    $pageTitle = 'rewards page';
    include 'init.php';

    $stmt = $conn->prepare("SELECT * FROM rewards ORDER BY id DESC");
    $stmt->execute();
    $total = $stmt->rowCount();

    $codeone = mt_rand(1, $total);
    $codetwo = mt_rand(1, $total);
  ?>
    <div class="content dash-content ptszone rewards">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="cnt-header" style="margin-bottom: 20px ;background:var(--mainColor);padding:20px;color:white">


                <h1 style="text-transform:capitalize;font-weight:bold;color:white">today rewards</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
              </div>
            </div>
            <?php
            // check if consume the reward
            $date = date("Y-m-d");
            $stmtr = $conn->prepare("SELECT * FROM ar WHERE user = ? AND created = ? AND one = 1 LIMIT 1");
            $stmtr->execute(array($_SESSION['clientid'], $date));
            $check = $stmtr->rowCount();
            $get = $stmtr->fetch();



            $stmt3 = $conn->prepare("SELECT * FROM ar WHERE user = ? AND created = ? AND two = 1 LIMIT 1   ");
            $stmt3->execute(array($_SESSION['clientid'], $date));
            $check3 = $stmt3->rowCount();
            $get2 = $stmt3->fetch();


            // end checking

            // fetching rewards statment
            $stmt = $conn->prepare("SELECT * FROM rewards WHERE id = ?");
            $stmt->execute(array($codeone));
            $box1 = $stmt->fetch();
            $t = $stmt->rowCount();
            ?>
            <div class="col-md-6">
              <?php

              if ($check  == 0) {
                if ($t > 0) {
              ?>
                  <div style="text-align:center !important" basicclicks="<?php echo $box1['clicks'] ?>" onclick="incrementClick()" totalclicks="0" class="box boxone" user="<?php echo $_SESSION['clientid'] ?>" box="1" points="<?php echo $box1['points'] ?>">
                    <img src="<?php echo $images ?>bx.jpg" style="width:180px" alt="">
                    <br>
                    <span style="background:var(--mainColor);color:white;font-size:14px;padding:8px 8px" id="counter-label" class="ttclickval">0</span>
                    <p><?php echo $box1['title'] ?></p>

                  </div>
                <?php
                } else {
                ?>
                  <div class="box " user="<?php echo $_SESSION['clientid'] ?>" box="2" points="<?php echo $box2['points'] ?>">
                    <p>reload the page</p>
                  </div>
                <?php
                }
                ?>

              <?php
              } else {
              ?>
                <div class="box-cs box" style="text-align:center;border-radius:5px;padding:20px;">
                  <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M55.227 19.864H53.616C51.576 9.687 42.659 2 32 2C21.34 2 12.422 9.687 10.383 19.864H8.773C6.142 19.864 4 22.027 4 24.687V57.176C4 59.836 6.142 62 8.773 62H55.226C57.858 62 60 59.836 60 57.176V24.687C60 22.027 57.858 19.864 55.227 19.864V19.864ZM32 3.818C43.122 3.818 52.178 12.933 52.248 24.165C52.024 24.339 51.206 24.68 49.734 24.68C48.281 24.68 47.19 24.344 46.861 24.115C46.763 16.912 40.815 9.274 32 9.274C23.186 9.274 17.239 16.912 17.141 24.113C16.812 24.342 15.72 24.679 14.268 24.679C12.793 24.679 11.974 24.338 11.75 24.164C11.82 12.934 20.877 3.818 32 3.818V3.818ZM44.2 19.864H19.802C21.487 15.384 25.628 11.093 32 11.093C38.373 11.093 42.516 15.384 44.2 19.864V19.864ZM58.193 57.176C58.193 58.833 56.863 60.182 55.226 60.182H8.773C7.137 60.182 5.806 58.833 5.806 57.176V29.511H58.193V57.176V57.176ZM5.807 27.692V24.686C5.807 23.029 7.138 21.681 8.774 21.681H10.1C10.052 22.098 10.013 22.517 9.989 22.941C9.322 23.319 8.921 23.788 8.921 24.297C8.921 25.554 11.315 26.573 14.267 26.573C17.22 26.573 19.616 25.553 19.616 24.297C19.616 23.915 19.392 23.556 19 23.241C19.05 22.731 19.146 22.208 19.268 21.68H44.739C44.859 22.207 44.957 22.73 45.007 23.239C44.612 23.555 44.39 23.915 44.39 24.297C44.39 25.554 46.784 26.573 49.736 26.573C52.689 26.573 55.084 25.553 55.084 24.297C55.084 23.787 54.682 23.318 54.015 22.939C53.9889 22.5187 53.9515 22.0993 53.903 21.681H55.231C56.868 21.681 58.198 23.029 58.198 24.686V27.692H5.807" fill="black" />
                    <path d="M36.163 54.182L34.434 43.036C34.958 42.6472 35.3836 42.141 35.6766 41.558C35.9695 40.975 36.1218 40.3315 36.121 39.679C36.121 37.377 34.274 35.511 31.998 35.511C29.723 35.511 27.879 37.377 27.879 39.679C27.879 41.058 28.544 42.279 29.564 43.036L27.837 54.182H36.163Z" fill="black" />
                  </svg>

                  <p style="color:black">u have experied that rewards for today</p>
                </div>
              <?php
              }
              ?>
            </div>
            <?php
            $stmt66 = $conn->prepare("SELECT * FROM rewards WHERE id = ?");
            $stmt66->execute(array($codetwo));
            $box2 = $stmt66->fetch();
            $t2 = $stmt66->rowCount();
            ?>
            <div class="col-md-6">


              <?php
              if ($check3 == 0) {
                if ($t2 > 0) {
              ?>
                  <div basicclicks="<?php echo $box2['clicks'] ?>" onclick="incrementClick2()" totalclicks="0" style="text-align:center !important" class="box boxtwo" user="<?php echo $_SESSION['clientid'] ?>" box="2" points="<?php echo $box2['points'] ?>">
                    <img src="<?php echo $images ?>bx.jpg" style="width:180px" alt="">
                    <br> <span style="background:var(--mainColor);color:white;font-size:14px;padding:8px 8px" id="counter-label2">0</span>
                    <p><?php echo $box2['title'] ?> times</p>
                  </div>
                <?php
                } else {
                ?>
                  <div class="box " user="<?php echo $_SESSION['clientid'] ?>" box="2" points="<?php echo $box2['points'] ?>">
                    <p>reload the page</p>
                  </div>
                <?php
                }
                ?>

                <?php
                ?>
                <script type="text/javascript">


                </script>
              <?php
              } else {
              ?>
                <div class="box-cs box" style="text-align:center;border-radius:5px;padding:20px;">
                  <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M55.227 19.864H53.616C51.576 9.687 42.659 2 32 2C21.34 2 12.422 9.687 10.383 19.864H8.773C6.142 19.864 4 22.027 4 24.687V57.176C4 59.836 6.142 62 8.773 62H55.226C57.858 62 60 59.836 60 57.176V24.687C60 22.027 57.858 19.864 55.227 19.864V19.864ZM32 3.818C43.122 3.818 52.178 12.933 52.248 24.165C52.024 24.339 51.206 24.68 49.734 24.68C48.281 24.68 47.19 24.344 46.861 24.115C46.763 16.912 40.815 9.274 32 9.274C23.186 9.274 17.239 16.912 17.141 24.113C16.812 24.342 15.72 24.679 14.268 24.679C12.793 24.679 11.974 24.338 11.75 24.164C11.82 12.934 20.877 3.818 32 3.818V3.818ZM44.2 19.864H19.802C21.487 15.384 25.628 11.093 32 11.093C38.373 11.093 42.516 15.384 44.2 19.864V19.864ZM58.193 57.176C58.193 58.833 56.863 60.182 55.226 60.182H8.773C7.137 60.182 5.806 58.833 5.806 57.176V29.511H58.193V57.176V57.176ZM5.807 27.692V24.686C5.807 23.029 7.138 21.681 8.774 21.681H10.1C10.052 22.098 10.013 22.517 9.989 22.941C9.322 23.319 8.921 23.788 8.921 24.297C8.921 25.554 11.315 26.573 14.267 26.573C17.22 26.573 19.616 25.553 19.616 24.297C19.616 23.915 19.392 23.556 19 23.241C19.05 22.731 19.146 22.208 19.268 21.68H44.739C44.859 22.207 44.957 22.73 45.007 23.239C44.612 23.555 44.39 23.915 44.39 24.297C44.39 25.554 46.784 26.573 49.736 26.573C52.689 26.573 55.084 25.553 55.084 24.297C55.084 23.787 54.682 23.318 54.015 22.939C53.9889 22.5187 53.9515 22.0993 53.903 21.681H55.231C56.868 21.681 58.198 23.029 58.198 24.686V27.692H5.807" fill="black" />
                    <path d="M36.163 54.182L34.434 43.036C34.958 42.6472 35.3836 42.141 35.6766 41.558C35.9695 40.975 36.1218 40.3315 36.121 39.679C36.121 37.377 34.274 35.511 31.998 35.511C29.723 35.511 27.879 37.377 27.879 39.679C27.879 41.058 28.544 42.279 29.564 43.036L27.837 54.182H36.163Z" fill="black" />
                  </svg>

                  <p style="color:black">u have experied that rewards for today</p>
                </div>
              <?php
              }
              ?>
            </div>


          </div>
        </div>
      </div>
    </div>

  <?php


    include $tpl . 'footer.php';
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
    $stmt = $conn->prepare("SELECT * FROM hits WHERE userid = ? ORDER BY id ASC");
    $stmt->execute(array($_SESSION['clientid']));
    $hits = $stmt->fetchAll();
    foreach ($hits as $hit) {
      $todayhits = $hit['id'];
    }


    $stmt = $conn->prepare("SELECT * FROM hits WHERE id = ?");
    $stmt->execute(array($todayhits));
    $hitcheck = $stmt->fetch();

    ?>
    <div class="content dash-content ptszone rewards">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="cnt-header" style="margin: 0px 0;background:var(--mainColor);padding:20px;color:white">
                <svg width="60" height="60" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.942 3.131C6.97275 3.18904 6.99175 3.25257 6.99794 3.31796C7.00413 3.38335 6.99737 3.44932 6.97805 3.51209C6.95874 3.57487 6.92724 3.63323 6.88537 3.68383C6.84349 3.73443 6.79206 3.77628 6.734 3.807C5.48684 4.467 4.467 5.48684 3.807 6.734C3.77627 6.79204 3.73441 6.84347 3.68381 6.88533C3.6332 6.9272 3.57485 6.95869 3.51208 6.978C3.44931 6.99732 3.38334 7.00408 3.31796 6.9979C3.25257 6.99173 3.18904 6.97273 3.131 6.942C3.07296 6.91127 3.02153 6.86941 2.97967 6.81881C2.9378 6.7682 2.90631 6.70985 2.887 6.64708C2.86768 6.58431 2.86092 6.51834 2.8671 6.45296C2.87328 6.38757 2.89227 6.32404 2.923 6.266C3.67708 4.84145 4.84222 3.67666 6.267 2.923C6.38412 2.86122 6.52097 2.84843 6.64751 2.88742C6.77405 2.92642 6.87996 3.01402 6.942 3.131V3.131ZM13.058 3.131C13.0887 3.07294 13.1306 3.02151 13.1812 2.97963C13.2318 2.93776 13.2901 2.90626 13.3529 2.88695C13.4157 2.86763 13.4817 2.86087 13.547 2.86706C13.6124 2.87325 13.676 2.89225 13.734 2.923C15.1584 3.67682 16.3232 4.84159 17.077 6.266C17.1391 6.38323 17.152 6.5203 17.113 6.64708C17.074 6.77385 16.9862 6.87994 16.869 6.942C16.7518 7.00406 16.6147 7.01701 16.4879 6.978C16.3611 6.939 16.2551 6.85123 16.193 6.734C15.5333 5.48695 14.5138 4.46711 13.267 3.807C13.2089 3.77637 13.1573 3.73458 13.1154 3.68401C13.0734 3.63345 13.0418 3.57511 13.0224 3.51233C13.003 3.44954 12.9961 3.38355 13.0022 3.31812C13.0083 3.25268 13.0273 3.1891 13.058 3.131V3.131ZM3.132 13.058C3.24912 12.9962 3.38597 12.9834 3.51251 13.0224C3.63905 13.0614 3.74496 13.149 3.807 13.266C4.467 14.5132 5.48684 15.533 6.734 16.193C6.84829 16.2565 6.93314 16.3623 6.97037 16.4877C7.00761 16.613 6.99425 16.748 6.93317 16.8636C6.87209 16.9792 6.76815 17.0663 6.64362 17.1062C6.5191 17.1461 6.3839 17.1356 6.267 17.077C4.84222 16.3233 3.67708 15.1586 2.923 13.734C2.89229 13.6759 2.87334 13.6123 2.86723 13.5469C2.86111 13.4815 2.86795 13.4155 2.88737 13.3527C2.90678 13.2899 2.93837 13.2315 2.98035 13.181C3.02233 13.1304 3.07386 13.0886 3.132 13.058V13.058ZM16.869 13.058C16.9271 13.0887 16.9785 13.1306 17.0204 13.1812C17.0622 13.2318 17.0937 13.2901 17.1131 13.3529C17.1324 13.4157 17.1391 13.4817 17.1329 13.547C17.1268 13.6124 17.1077 13.676 17.077 13.734C16.3232 15.1584 15.1584 16.3232 13.734 17.077C13.6758 17.1093 13.6118 17.1297 13.5456 17.137C13.4795 17.1443 13.4125 17.1382 13.3487 17.1193C13.2849 17.1003 13.2255 17.0688 13.1741 17.0266C13.1226 16.9844 13.0801 16.9324 13.049 16.8735C13.0179 16.8147 12.9989 16.7502 12.993 16.6839C12.9872 16.6176 12.9946 16.5508 13.0149 16.4874C13.0352 16.424 13.068 16.3654 13.1113 16.3148C13.1546 16.2642 13.2075 16.2228 13.267 16.193C14.5138 15.5329 15.5333 14.5131 16.193 13.266C16.2237 13.2079 16.2656 13.1565 16.3162 13.1146C16.3668 13.0728 16.4251 13.0413 16.4879 13.0219C16.5507 13.0026 16.6167 12.9959 16.682 13.0021C16.7474 13.0082 16.811 13.0273 16.869 13.058V13.058ZM10 5.5C9.84973 5.49991 9.69955 5.50726 9.55 5.522C9.48467 5.52857 9.41868 5.5222 9.35581 5.50326C9.29294 5.48433 9.23441 5.4532 9.18357 5.41164C9.13273 5.37009 9.09057 5.31893 9.0595 5.26108C9.02844 5.20323 9.00907 5.13983 9.0025 5.0745C8.99593 5.00917 9.0023 4.94318 9.02124 4.88031C9.04017 4.81744 9.0713 4.75891 9.11286 4.70807C9.15441 4.65723 9.20557 4.61507 9.26342 4.584C9.32127 4.55294 9.38467 4.53357 9.45 4.527C10.7086 4.40062 11.9724 4.71179 13.0284 5.40811C14.0845 6.10443 14.8683 7.14338 15.248 8.35C15.2878 8.47651 15.2757 8.61364 15.2144 8.73122C15.153 8.84881 15.0475 8.93722 14.921 8.977C14.7945 9.01678 14.6574 9.00468 14.5398 8.94336C14.4222 8.88203 14.3338 8.77651 14.294 8.65C14.0064 7.73648 13.4349 6.93849 12.6627 6.37199C11.8905 5.8055 10.9577 5.50004 10 5.5ZM7.4 5.7C7.4394 5.75253 7.46806 5.8123 7.48436 5.87591C7.50065 5.93952 7.50426 6.00571 7.49497 6.07071C7.48569 6.13571 7.46369 6.19825 7.43024 6.25475C7.39678 6.31125 7.35253 6.3606 7.3 6.4C6.74066 6.81873 6.28671 7.36217 5.97423 7.98712C5.66176 8.61206 5.49938 9.30129 5.5 10C5.5 10.82 5.72 11.588 6.102 12.25C6.16726 12.3648 6.18447 12.5007 6.14987 12.6281C6.11528 12.7556 6.03169 12.8641 5.91735 12.9301C5.803 12.9962 5.66719 13.0143 5.53954 12.9805C5.41189 12.9468 5.30278 12.8639 5.236 12.75C4.75256 11.9142 4.49865 10.9655 4.5 10C4.5 8.2 5.365 6.602 6.7 5.6C6.75253 5.5606 6.8123 5.53194 6.87591 5.51564C6.93952 5.49935 7.00571 5.49574 7.07071 5.50503C7.13571 5.51431 7.19825 5.53631 7.25475 5.56976C7.31125 5.60322 7.3606 5.64747 7.4 5.7V5.7ZM14.921 11.023C14.9836 11.0427 15.0418 11.0745 15.0921 11.1167C15.1425 11.1589 15.184 11.2105 15.2144 11.2688C15.2447 11.327 15.2633 11.3906 15.2691 11.456C15.2749 11.5215 15.2677 11.5874 15.248 11.65C15.0007 12.4358 14.5801 13.1561 14.0173 13.7576C13.4544 14.3591 12.7636 14.8266 11.996 15.1255C11.2283 15.4244 10.4033 15.5471 9.58187 15.4845C8.76044 15.4219 7.96355 15.1757 7.25 14.764C7.1361 14.6972 7.05323 14.5881 7.01948 14.4605C6.98573 14.3328 7.00384 14.197 7.06986 14.0827C7.13588 13.9683 7.24445 13.8847 7.37187 13.8501C7.49929 13.8155 7.63522 13.8327 7.75 13.898C8.33384 14.2348 8.98587 14.4362 9.65796 14.4874C10.33 14.5386 11.005 14.4382 11.6331 14.1936C12.2613 13.949 12.8264 13.5666 13.287 13.0744C13.7475 12.5822 14.0916 11.9929 14.294 11.35C14.3137 11.2874 14.3455 11.2292 14.3877 11.1789C14.4299 11.1285 14.4815 11.087 14.5398 11.0566C14.598 11.0263 14.6616 11.0077 14.727 11.0019C14.7925 10.9961 14.8584 11.0033 14.921 11.023ZM8.001 10C8.001 9.46957 8.21171 8.96086 8.58679 8.58579C8.96186 8.21071 9.47057 8 10.001 8C10.5314 8 11.0401 8.21071 11.4152 8.58579C11.7903 8.96086 12.001 9.46957 12.001 10C12.001 10.5304 11.7903 11.0391 11.4152 11.4142C11.0401 11.7893 10.5314 12 10.001 12C9.47057 12 8.96186 11.7893 8.58679 11.4142C8.21171 11.0391 8.001 10.5304 8.001 10ZM10.001 7C9.20535 7 8.44229 7.31607 7.87968 7.87868C7.31707 8.44129 7.001 9.20435 7.001 10C7.001 10.7956 7.31707 11.5587 7.87968 12.1213C8.44229 12.6839 9.20535 13 10.001 13C10.7966 13 11.5597 12.6839 12.1223 12.1213C12.6849 11.5587 13.001 10.7956 13.001 10C13.001 9.20435 12.6849 8.44129 12.1223 7.87868C11.5597 7.31607 10.7966 7 10.001 7Z" fill="white" />
                </svg>

                <h1 style="text-transform:capitalize;font-weight:bold;color:white">your data for this day</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="referral-status" style="margin:40px 0">
                <?php
                $today = date("Y-m-d");

                if ($hitcheck['created'] == $today) {
                ?>
                  <p class="sts-v"> <span class="active-cir"></span> your active for this day</p>

                <?php
                } else {
                ?>
                  <p style="color:#ee7373" class="sts-v"> <span class="unactive-cir"></span>No activities for this day</p>

                <?php
                }
                ?>

                <h4 style="text-transform:capitalize;font-weight:bold">latests actions</h4>

              </div>
            </div>

            <div class="col-md-4">
              <div class="box">
                <div class="icon money-icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.171 11.828L4.051 13.95M9 9L14 21L15.774 15.774L21 14L9 9ZM16.071 16.071L20.314 20.314L16.071 16.071ZM7.188 2.239L7.965 5.136L7.188 2.239ZM5.136 7.965L2.238 7.188L5.136 7.965ZM13.95 4.05L11.828 6.172L13.95 4.05Z" stroke="var(--mainColor)" stroke-linejoin="round" />
                  </svg>

                </div>
                <p> total hits</p>

                <span class="nbr"><?php echo $user['hits']; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box">
                <?php
                $stmts = $conn->prepare("SELECT * FROM hits WHERE userid = ? ORDER BY created DESC");
                $stmts->execute(array($_SESSION['clientid']));
                $hitds = $stmts->fetchAll();
                $counter = 0;
                foreach ($hitds as $h) {
                  $counter += 1;
                  $todayhits = $h['id'];
                }


                $stmtr = $conn->prepare("SELECT * FROM hits WHERE id = ?");
                $stmtr->execute(array($todayhits));
                $hitday = $stmtr->fetch();
                $today = date("d");

                $day = substr($hitday['created'], 8);
                $moy = ((int)$today - $day);
                $tot = $counter / $moy;

                ?>
                <div class="icon money-icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.171 11.828L4.051 13.95M9 9L14 21L15.774 15.774L21 14L9 9ZM16.071 16.071L20.314 20.314L16.071 16.071ZM7.188 2.239L7.965 5.136L7.188 2.239ZM5.136 7.965L2.238 7.188L5.136 7.965ZM13.95 4.05L11.828 6.172L13.95 4.05Z" stroke="var(--mainColor)" stroke-linejoin="round" />
                  </svg>

                </div>
                <p> hit rate</p>

                <span class="nbr" style="font-size:12px"><?php echo $tot  ?> hit per day</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box">
                <div class="icon money-icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.171 11.828L4.051 13.95M9 9L14 21L15.774 15.774L21 14L9 9ZM16.071 16.071L20.314 20.314L16.071 16.071ZM7.188 2.239L7.965 5.136L7.188 2.239ZM5.136 7.965L2.238 7.188L5.136 7.965ZM13.95 4.05L11.828 6.172L13.95 4.05Z" stroke="var(--mainColor)" stroke-linejoin="round" />
                  </svg>

                </div>
                <?php

                $stmt = $conn->prepare("SELECT * FROM ads WHERE id =?");
                $stmt->execute(array($hitcheck['ad']));
                $lastad = $stmt->fetch();



                ?>
                <p> last hit</p>

                <span class="nbr" style="font-size:12px"><a style="color:white" href="<?php echo $lastad['link'] ?>" target="_blank">view</a> </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="sharespace" style="margin:60px 0;border-bottom:1px solid rgba(0,0,0,.1);padding-bottom:20px">
                <h4 style="text-transform:capitalize;font-weight:bold"><svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" />
                    <path d="M10.5 8L14.5 12L10.5 16" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>

                  your coming from</h4>
                <p style="color:rgba(0,0,0,.6)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                <input type="text" name="ref" class="form-control" value="<?php echo  $user['comref'] ?>">
              </div>
            </div>

            <div class="col-md-6">
              <div class="sharespace" style="margin:60px 0;border-bottom:1px solid rgba(0,0,0,.1);padding-bottom:20px">
                <h4 style="text-transform:capitalize;font-weight:bold"><svg width="50" height="50" viewBox="0 0 576 512" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_108_8)">
                      <path d="M561.938 158.06L417.94 14.092C387.926 -15.922 336 5.09701 336 48.032V105.23C293.55 107.11 251.97 111.78 215.24 123.22C180.07 134.17 152.17 150.8 132.33 172.64C108.22 199.2 96 232.6 96 271.94C96 333.637 129.178 384.395 180.87 416.7C218.416 440.208 266.118 404.049 251.89 360.96C236.375 313.841 234.734 290.037 336 282.2V336C336 378.993 387.968 399.913 417.94 369.94L561.938 225.94C580.688 207.2 580.688 176.8 561.938 158.06ZM384 336V232.16C255.309 234.082 166.492 255.35 206.31 376C176.79 357.55 144 324.08 144 271.94C144 162.606 273.14 152.993 384 152.09V48L528 192L384 336ZM408.74 420.493C416.13 418.382 423.189 415.251 429.714 411.19C437.69 406.238 448 412.016 448 421.404V464C448 490.51 426.51 512 400 512H48C21.49 512 0 490.51 0 464V112C0 85.49 21.49 64 48 64H180C186.627 64 192 69.373 192 76V80.486C192 85.403 189.013 89.855 184.431 91.638C170.729 96.969 158.035 103.175 146.381 110.223C144.489 111.378 142.317 111.992 140.101 112H54C52.4087 112 50.8826 112.632 49.7574 113.757C48.6321 114.883 48 116.409 48 118V458C48 459.591 48.6321 461.117 49.7574 462.243C50.8826 463.368 52.4087 464 54 464H394C395.591 464 397.117 463.368 398.243 462.243C399.368 461.117 400 459.591 400 458V432.034C400 426.664 403.579 421.975 408.74 420.493Z" fill="black" />
                    </g>
                    <defs>
                      <clipPath id="clip0_108_8">
                        <rect width="576" height="512" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                  share referral link</h4>
                <p style="color:rgba(0,0,0,.6)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                <input type="text" name="ref" class="form-control" value="account.php?page=register&ref=<?php echo $user['myref'] ?>">
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>


  <?php


    include $tpl . 'footer.php';
  } elseif ($page == 'store') {
    // page title تعني عنوان الصفحة الذي يظهر في الصفحة
    $pageTitle = 'Store system';
    include 'init.php';


    $stmt = $conn->prepare("SELECT * FROM store ORDER BY id DESC");
    $stmt->execute();
    $options = $stmt->fetchAll();
  ?>
    <div class="content dash-content ptszone">
      <div class="dashboard lf-pd" id="dashboard">
        <div class="container">
          <div class="row ">


            <div class="col-md-12">
              <div class="cnt-header" style="margin: 0px 0;background:var(--mainColor);padding:20px;color:white">
                <svg width="60" height="60" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.942 3.131C6.97275 3.18904 6.99175 3.25257 6.99794 3.31796C7.00413 3.38335 6.99737 3.44932 6.97805 3.51209C6.95874 3.57487 6.92724 3.63323 6.88537 3.68383C6.84349 3.73443 6.79206 3.77628 6.734 3.807C5.48684 4.467 4.467 5.48684 3.807 6.734C3.77627 6.79204 3.73441 6.84347 3.68381 6.88533C3.6332 6.9272 3.57485 6.95869 3.51208 6.978C3.44931 6.99732 3.38334 7.00408 3.31796 6.9979C3.25257 6.99173 3.18904 6.97273 3.131 6.942C3.07296 6.91127 3.02153 6.86941 2.97967 6.81881C2.9378 6.7682 2.90631 6.70985 2.887 6.64708C2.86768 6.58431 2.86092 6.51834 2.8671 6.45296C2.87328 6.38757 2.89227 6.32404 2.923 6.266C3.67708 4.84145 4.84222 3.67666 6.267 2.923C6.38412 2.86122 6.52097 2.84843 6.64751 2.88742C6.77405 2.92642 6.87996 3.01402 6.942 3.131V3.131ZM13.058 3.131C13.0887 3.07294 13.1306 3.02151 13.1812 2.97963C13.2318 2.93776 13.2901 2.90626 13.3529 2.88695C13.4157 2.86763 13.4817 2.86087 13.547 2.86706C13.6124 2.87325 13.676 2.89225 13.734 2.923C15.1584 3.67682 16.3232 4.84159 17.077 6.266C17.1391 6.38323 17.152 6.5203 17.113 6.64708C17.074 6.77385 16.9862 6.87994 16.869 6.942C16.7518 7.00406 16.6147 7.01701 16.4879 6.978C16.3611 6.939 16.2551 6.85123 16.193 6.734C15.5333 5.48695 14.5138 4.46711 13.267 3.807C13.2089 3.77637 13.1573 3.73458 13.1154 3.68401C13.0734 3.63345 13.0418 3.57511 13.0224 3.51233C13.003 3.44954 12.9961 3.38355 13.0022 3.31812C13.0083 3.25268 13.0273 3.1891 13.058 3.131V3.131ZM3.132 13.058C3.24912 12.9962 3.38597 12.9834 3.51251 13.0224C3.63905 13.0614 3.74496 13.149 3.807 13.266C4.467 14.5132 5.48684 15.533 6.734 16.193C6.84829 16.2565 6.93314 16.3623 6.97037 16.4877C7.00761 16.613 6.99425 16.748 6.93317 16.8636C6.87209 16.9792 6.76815 17.0663 6.64362 17.1062C6.5191 17.1461 6.3839 17.1356 6.267 17.077C4.84222 16.3233 3.67708 15.1586 2.923 13.734C2.89229 13.6759 2.87334 13.6123 2.86723 13.5469C2.86111 13.4815 2.86795 13.4155 2.88737 13.3527C2.90678 13.2899 2.93837 13.2315 2.98035 13.181C3.02233 13.1304 3.07386 13.0886 3.132 13.058V13.058ZM16.869 13.058C16.9271 13.0887 16.9785 13.1306 17.0204 13.1812C17.0622 13.2318 17.0937 13.2901 17.1131 13.3529C17.1324 13.4157 17.1391 13.4817 17.1329 13.547C17.1268 13.6124 17.1077 13.676 17.077 13.734C16.3232 15.1584 15.1584 16.3232 13.734 17.077C13.6758 17.1093 13.6118 17.1297 13.5456 17.137C13.4795 17.1443 13.4125 17.1382 13.3487 17.1193C13.2849 17.1003 13.2255 17.0688 13.1741 17.0266C13.1226 16.9844 13.0801 16.9324 13.049 16.8735C13.0179 16.8147 12.9989 16.7502 12.993 16.6839C12.9872 16.6176 12.9946 16.5508 13.0149 16.4874C13.0352 16.424 13.068 16.3654 13.1113 16.3148C13.1546 16.2642 13.2075 16.2228 13.267 16.193C14.5138 15.5329 15.5333 14.5131 16.193 13.266C16.2237 13.2079 16.2656 13.1565 16.3162 13.1146C16.3668 13.0728 16.4251 13.0413 16.4879 13.0219C16.5507 13.0026 16.6167 12.9959 16.682 13.0021C16.7474 13.0082 16.811 13.0273 16.869 13.058V13.058ZM10 5.5C9.84973 5.49991 9.69955 5.50726 9.55 5.522C9.48467 5.52857 9.41868 5.5222 9.35581 5.50326C9.29294 5.48433 9.23441 5.4532 9.18357 5.41164C9.13273 5.37009 9.09057 5.31893 9.0595 5.26108C9.02844 5.20323 9.00907 5.13983 9.0025 5.0745C8.99593 5.00917 9.0023 4.94318 9.02124 4.88031C9.04017 4.81744 9.0713 4.75891 9.11286 4.70807C9.15441 4.65723 9.20557 4.61507 9.26342 4.584C9.32127 4.55294 9.38467 4.53357 9.45 4.527C10.7086 4.40062 11.9724 4.71179 13.0284 5.40811C14.0845 6.10443 14.8683 7.14338 15.248 8.35C15.2878 8.47651 15.2757 8.61364 15.2144 8.73122C15.153 8.84881 15.0475 8.93722 14.921 8.977C14.7945 9.01678 14.6574 9.00468 14.5398 8.94336C14.4222 8.88203 14.3338 8.77651 14.294 8.65C14.0064 7.73648 13.4349 6.93849 12.6627 6.37199C11.8905 5.8055 10.9577 5.50004 10 5.5ZM7.4 5.7C7.4394 5.75253 7.46806 5.8123 7.48436 5.87591C7.50065 5.93952 7.50426 6.00571 7.49497 6.07071C7.48569 6.13571 7.46369 6.19825 7.43024 6.25475C7.39678 6.31125 7.35253 6.3606 7.3 6.4C6.74066 6.81873 6.28671 7.36217 5.97423 7.98712C5.66176 8.61206 5.49938 9.30129 5.5 10C5.5 10.82 5.72 11.588 6.102 12.25C6.16726 12.3648 6.18447 12.5007 6.14987 12.6281C6.11528 12.7556 6.03169 12.8641 5.91735 12.9301C5.803 12.9962 5.66719 13.0143 5.53954 12.9805C5.41189 12.9468 5.30278 12.8639 5.236 12.75C4.75256 11.9142 4.49865 10.9655 4.5 10C4.5 8.2 5.365 6.602 6.7 5.6C6.75253 5.5606 6.8123 5.53194 6.87591 5.51564C6.93952 5.49935 7.00571 5.49574 7.07071 5.50503C7.13571 5.51431 7.19825 5.53631 7.25475 5.56976C7.31125 5.60322 7.3606 5.64747 7.4 5.7V5.7ZM14.921 11.023C14.9836 11.0427 15.0418 11.0745 15.0921 11.1167C15.1425 11.1589 15.184 11.2105 15.2144 11.2688C15.2447 11.327 15.2633 11.3906 15.2691 11.456C15.2749 11.5215 15.2677 11.5874 15.248 11.65C15.0007 12.4358 14.5801 13.1561 14.0173 13.7576C13.4544 14.3591 12.7636 14.8266 11.996 15.1255C11.2283 15.4244 10.4033 15.5471 9.58187 15.4845C8.76044 15.4219 7.96355 15.1757 7.25 14.764C7.1361 14.6972 7.05323 14.5881 7.01948 14.4605C6.98573 14.3328 7.00384 14.197 7.06986 14.0827C7.13588 13.9683 7.24445 13.8847 7.37187 13.8501C7.49929 13.8155 7.63522 13.8327 7.75 13.898C8.33384 14.2348 8.98587 14.4362 9.65796 14.4874C10.33 14.5386 11.005 14.4382 11.6331 14.1936C12.2613 13.949 12.8264 13.5666 13.287 13.0744C13.7475 12.5822 14.0916 11.9929 14.294 11.35C14.3137 11.2874 14.3455 11.2292 14.3877 11.1789C14.4299 11.1285 14.4815 11.087 14.5398 11.0566C14.598 11.0263 14.6616 11.0077 14.727 11.0019C14.7925 10.9961 14.8584 11.0033 14.921 11.023ZM8.001 10C8.001 9.46957 8.21171 8.96086 8.58679 8.58579C8.96186 8.21071 9.47057 8 10.001 8C10.5314 8 11.0401 8.21071 11.4152 8.58579C11.7903 8.96086 12.001 9.46957 12.001 10C12.001 10.5304 11.7903 11.0391 11.4152 11.4142C11.0401 11.7893 10.5314 12 10.001 12C9.47057 12 8.96186 11.7893 8.58679 11.4142C8.21171 11.0391 8.001 10.5304 8.001 10ZM10.001 7C9.20535 7 8.44229 7.31607 7.87968 7.87868C7.31707 8.44129 7.001 9.20435 7.001 10C7.001 10.7956 7.31707 11.5587 7.87968 12.1213C8.44229 12.6839 9.20535 13 10.001 13C10.7966 13 11.5597 12.6839 12.1223 12.1213C12.6849 11.5587 13.001 10.7956 13.001 10C13.001 9.20435 12.6849 8.44129 12.1223 7.87868C11.5597 7.31607 10.7966 7 10.001 7Z" fill="white" />
                </svg>

                <h1 style="text-transform:capitalize;font-weight:bold;color:white">convert your points to real money</h1>
                <p>Lorem ipsum dolgna aliqua. Ut enim ad minim veniam, quis nostrud exercitdolor in reprehenderit in voluptate velit esse cillum.</p>
              </div>
            </div>
            <div class="col-md-12">
              <h3 style="margin:50px 0;color:rgba(0,0,0,.6);text-transform:capitalize;font-weight:bold">convert your points to cash</h3>
            </div>



            <?php
            foreach ($options as $option) {
              if ($option['type'] == '0') {
            ?>
                <div class="col-md-4">
                  <div class="today-total">
                    <span style="text-transform:uppercase;font-size:13px;font-weight:bold;color:rgba(0,0,0,.4)">convert</span>
                    <p><?php echo $option['points'] ?> point</p>
                    <span style="text-transform:uppercase;font-size:13px;font-weight:bold;color:rgba(0,0,0,.4)">to</span>
                    <h3>$<?php echo $option['moneyd'] ?></h3>
                    <a href="">convert now</a>
                  </div>
                </div>
            <?php
              }
            }

            ?>
            <div class="col-md-12">
              <h3 style="margin:50px 0;color:rgba(0,0,0,.6);text-transform:capitalize;font-weight:bold">Get points </h3>
            </div>

            <?php
            foreach ($options as $option) {

              if ($option['type'] == '1') {
            ?>
                <div class="col-md-4">
                  <div class="today-total">
                    <span style="text-transform:uppercase;font-size:13px;font-weight:bold;color:rgba(0,0,0,.4)">get</span>
                    <p><?php echo $option['points'] ?> point</p>
                    <span style="text-transform:uppercase;font-size:13px;font-weight:bold;color:rgba(0,0,0,.4)">with</span>
                    <h3>$<?php echo $option['moneyd'] ?></h3>
                    <a href="">convert now</a>
                  </div>
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
      </div>
    </div>


  <?php
    include $tpl . 'footer.php';
    // صفحة تو دو ليست
  } elseif ($page == "myprofile") {

    $pageTitle = 'user account details';
    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute(array($_SESSION['clientid']));
    $userInfo = $stmt->fetch();
  ?>
    <div class="edit-page user-edit-pages deep-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="cnt-header" style="margin-bottom: 20px ;background:var(--mainColor);padding:20px;color:white">


              <h1 style="text-transform:capitalize;font-weight:bold;color:white">today rewards</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="pg-tt">
              <h1 style="display:block;text-align:center;text-transform:capitalize">Account Details</h1>
            </div>
          </div>


          <div class="col-md-4">

          </div>
          <div class="col-md-8">
            <div class="use-fl-info">
              <form method="post" action="webpage.php?page=update">

                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="">full name</label>
                    <input type="text" name="fname" class="form-control" required value="<?php echo $userInfo['fname'] ?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="">email</label>
                    <input type="email" name="email" class="form-control" required value="<?php echo $userInfo['email'] ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">username</label>
                    <input type="text" name="username" class="form-control" required value="<?php echo $userInfo['username'] ?>">
                  </div>
                  <input type="hidden" value="<?php echo $userInfo['id'] ?>" name="id" value="">
                  <div class="form-group col-md-6">
                    <label for="">password </label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">confirm new password</label>
                    <input type="password" name="cpassword" class="form-control">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="">phone</label>
                    <input type="text" name="phone" class="form-control" required value="<?php echo $userInfo['phone'] ?>">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="">gender</label>

                    <select class="form-control" name="gender">

                      <option value="1" <?php if ($userInfo['gender'] == 1) {
                                          echo 'selected';
                                        } ?>>male</option>
                      <option value="0" <?php if ($userInfo['gender'] == 0) {
                                          echo 'selected';
                                        } ?>>female</option>

                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">city</label>
                    <input type="text" name="city" class="form-control" required value="<?php echo $userInfo['city'] ?>">
                  </div>


                </div>

                <button type="submit" class="btn btn-primary">save</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php
    include $tpl . 'footer.php';
  } elseif ($page == 'avatupdate') {

    include 'init.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');;


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


    include $tpl . 'footer.php';
  } elseif ($page == 'update') {


    $pageTitle = 'update page';
    include 'init.php';
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute(array($id));
    $checkIfuser = $stmt->rowCount();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $type = $_POST['type'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $pass = $_POST['password'];
      $cpass = $_POST['cpassword'];
      $phone = $_POST['phone'];
      $fname = $_POST['fname'];
      $city = $_POST['city'];

      $gender = $_POST['gender'];

      $formErrors = array();
      if (empty($username)) {
        $formErrors[] = 'username is required';
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
        <a href="users.php?page=edit&id=<?php echo $id ?>"> back</a>
      </div>
<?php

      if (empty($formErrors)) {
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?,  fname = ?, phone = ?,city = ?, email =?, gender =?, type = ?
                                                             WHERE id= ? LIMIT 1  ");
        $stmt->execute(array($username, $password, $fname, $phone, $city, $email, $gender, $type, $id));
        header('location: ' . $_SERVER['HTTP_REFERER']);
      }
    }


    include $tpl . 'footer.php';
  } else {
    header('location:index.php');
  }
} else {
  header('location: logout.php');
}
?>

<?php

ob_end_flush();
?>