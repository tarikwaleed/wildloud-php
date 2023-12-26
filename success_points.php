<?php
session_start();
    include 'connect.php';


    $ad = $_POST['ad'];


    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ?");
    $stmt->execute(array($ad));

    $ad = $stmt->fetch();


        $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute(array($ad['service']));

        $sv = $stmt->fetch();


        $stmt3 = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt3->execute(array($_SESSION['clientid']));

        $user = $stmt3->fetch();
        if ($user['subs'] == 0)
        {
                    $pt =  $ad['points'] ;
         $pts = $user['points'] + $ad['points'];
       }
       elseif ($user['subs'] == 1) {
         $pt =  $ad['points'] + $ad['points'] / 2 ;
            $pts = $user['points'] + $ad['points'] + $ad['points'] / 2 ;
       }
       elseif ($user['subs'] == 2) {
          $pt =  $ad['points']  * 2 ;
            $pts = $user['points'] + $ad['points'] * 2 ;
       }
       elseif ($user['subs'] == 3) {
          $pt = $ad['points'] * 3 ;
            $pts = $user['points'] + $ad['points'] * 3 ;
       }
       elseif ($user['subs'] == 4) {
          $pt =  $ad['points'] * 2 ;
            $pts = $user['points'] + $ad['points'] * 2 ;
       }else {
          $pt =  $ad['points'] ;
         $pts = $user['points'] + $ad['points'];
       }

         $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
         $stmt->execute(array($pts, $_SESSION['clientid']));


    ?>

    <div class="alrwindow" servicetype="<?php echo $ad['servicetype'] ?>" service="<?php echo $ad['service'] ?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="content">
              <img src="downloads/images/<?php echo $sv['image'] ?>" alt="icon" style="width:40px;height:40px;margin:10px 0">
              <h3><?php echo $sv['name'] ?></h3>
              <p style="color:green">Congratulations, <?php echo $pt?> points have been successfully added to your account ! </p>
              <a class="mdpfe" style="border:1px solid rgba(0,0,0,.6);padding:8px 20px;cursor:pointer;text-transform: capitalize;text-align:center;font-size:13px;color:rgba(0,0,0,.6)" servicetype="<?php echo $ad['servicetype'] ?>" service="<?php echo $ad['service'] ?>">Done</a>
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

 ?>
