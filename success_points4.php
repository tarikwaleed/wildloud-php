<?php
session_start();
    include 'connect.php';


    $cp = $_POST['cp'];


    $stmt = $conn->prepare("SELECT * FROM cp WHERE id = ?");
    $stmt->execute(array($cp));

    $ad = $stmt->fetch();






    $luck = rand(1,100);
    if ($luck >= 65)
    {
      $stmt3 = $conn->prepare("SELECT * FROM users WHERE id = ?");
      $stmt3->execute(array($_SESSION['clientid']));

      $user = $stmt3->fetch();


      if ($user['subs'] == 0)
      {

        $pt =  $ad['points']  ;
       $pts = $user['points'] + $ad['points'];
     }
     elseif ($user['subs'] == 1) {
       $pt =  $ad['points'] + $ad['points'] / 2 ;
        $pts = $user['points'] + $ad['points'] + $ad['points'] / 2 ;
     }
     elseif ($user['subs'] == 2) {
       $pt =  $ad['points'] + $ad['points'] * 2 ;
        $pts = $user['points'] + $ad['points'] * 2;
     }
     elseif ($user['subs'] == 3) {

       $pt =  $ad['points'] + $ad['points'] * 3 ;
          $pts = $user['points'] + $ad['points'] * 3;
     }
     elseif ($user['subs'] == 4) {
       $pt =  $ad['points'] + $ad['points']  * 2 ;
          $pts = $user['points'] + $ad['points'] * 2 ;
     }else {
       $pt =  $ad['points'] ;
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
                <h3 style="color:green"> <span style="color:green">Free</span>  Points</h3>
                <p style="color:green">Congratulations, free <?php echo $pt?> points have been successfully added to your account ! </p>
                <a class="mdpfe luckyloot" style="border:1px solid rgba(0,0,0,.6);padding:8px 20px;cursor:pointer;text-transform: capitalize;text-align:center;font-size:13px;color:rgba(0,0,0,.6)">Done</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }else {
    ?>
    <div class="alrwindow" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="content">
              <h3 style="color:red"> <span style="color:red">opss</span> , sorry</h3>
              <p style="text-transform:capitalize" >Watch more ads to increase your chances of winning points </p>
              <a class="mdpfe" style="border:1px solid rgba(0,0,0,.6);padding:8px 20px;cursor:pointer;text-transform: capitalize;text-align:center;font-size:13px;color:rgba(0,0,0,.6)" >Done</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }


    $stmt = $conn->prepare("INSERT INTO lc(adid,userid,created)
     VALUES(:zf,:ze,now())");
    $stmt->execute(array(
      'zf' => $ad['id'],
      'ze' => $_SESSION['clientid']

    ));

    ?>


    <?php


      ?>

        <?php

        ?>

        <?php
         ?>
      <?php

 ?>
