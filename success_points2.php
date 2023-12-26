<?php
session_start();
    include 'connect.php';


    $ad = $_POST['ad'];


    $stmt = $conn->prepare("SELECT * FROM freepoints WHERE id = ?");
    $stmt->execute(array($ad));

    $ad = $stmt->fetch();


        $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute(array($ad['service']));

        $sv = $stmt->fetch();


        $stmt3 = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt3->execute(array($_SESSION['clientid']));

        $user = $stmt3->fetch();

        if ($user['type'] == 0)
        {
           $pt =   $ad['points']  ;
          $pts = $user['points'] + $ad['points'];


       }
       elseif ($user['type'] == 1) {
          $pt =  $ad['points'] + $ad['points'] / 2 ;
         $pts = $user['points'] + $ad['points'] / 2;


       }
       elseif ($user['type'] == 2) {
          $pt = $ad['points'] * 2 ;
         $pts = $user['points'] + $ad['points'] * 2;


       }
       elseif ($user['type'] == 3) {
           $pt = $ad['points'] * 3 ;
         $pts = $user['points'] + $ad['points'] * 3;


       }
       elseif ($user['type'] == 4) {
           $pt = $ad['points'] * 2 ;
         $pts = $user['points'] + $ad['points'] * 2;



       }else {
           $pt = $ad['points']  ;
         $pts = $user['points'] + $ad['points'];


       }


         $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
         $stmt->execute(array($pts, $_SESSION['clientid']));


    ?>

    <div class="alrwindow" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="content">
              <h3><?php echo $ad['title'] ?></h3>
              <p style="color:green">Congratulations, <?php echo $pt ?> points have been successfully added to your account ! </p>
              <a class="mdpfe" style="border:1px solid rgba(0,0,0,.6);padding:8px 20px;cursor:pointer;text-transform: capitalize;text-align:center;font-size:13px;color:rgba(0,0,0,.6)" >Done</a>
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
