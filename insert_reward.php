<?php
session_start();
    include 'connect.php';


    $user = $_SESSION['clientid'];
    $ad = $_POST['ad'];
    $points = $_POST['points'];
    $stmt = $conn->prepare("SELECT * FROM ar WHERE user = ? AND ad = ?");
    $stmt->execute(array($_SESSION['clientid'],$ad));
    $check = $stmt->rowCount();


    if ($check == 0)
    {
      $stmt = $conn->prepare("INSERT INTO ar(user,ad,created)
       VALUES(:zf,:ze,now())");
      $stmt->execute(array(
        'zf' => $_SESSION['clientid'],
        'ze' => $ad

      ));
      $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
      $stmt->execute(array($_SESSION['clientid']));
      $userpoints = $stmt->fetch();

      if ($userpoints['subs'] == 0)
      {
        $totalpoints = $userpoints['points'] + $points;
     }
     elseif ($userpoints['subs'] == 1) {
       $totalpoints = $userpoints['points'] + $points + $points / 2;
     }
     elseif ($userpoints['subs'] == 2) {
       $totalpoints = $userpoints['points'] + $points * 2;
     }
     elseif ($userpoints['subs'] == 3) {
       $totalpoints = $userpoints['points'] + $points * 3;
     }
     elseif ($userpoints['subs'] == 4) {
       $totalpoints = $userpoints['points'] + $points * 2;
     }else {
       $totalpoints = $userpoints['points'] + $points;
     }

      $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
      $stmt->execute(array($totalpoints, $_SESSION['clientid']));


        ?>

        <div class="sucd" style="text-align:center;background:white">
          <img src="downloads/images/cn.jpg" alt="winner" style="width:80%">
          <p style="color:green;text-transform:capitalize">Congratulations, you won <?php echo $points ?>  points for today</p>
        </div>
          <?php
    }else {
        echo "You have used up all the gifts";
    }






        ?>

        <?php
         ?>
      <?php

 ?>
