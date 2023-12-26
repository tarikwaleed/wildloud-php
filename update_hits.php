<?php
    include 'connect.php';

        $id = $_POST['id'];
        $points = $_POST['points'];
        $ad = $_POST['ad'];
        $stmt2 = $conn->prepare("SELECT * FROM users WHERE id = ? ");
        $stmt2->execute(array($id));
        $first = $stmt2->fetch();

        $lasthits = $first['hits'] + '1';


        if ($first['subs'] == 0)
        {
          $latespoints = $points + $first['points'];

       }
       elseif ($first['subs'] == 1) {
         $latespoints = $points / 2 + $first['points'];

       }
       elseif ($first['subs'] == 2) {
         $latespoints = $points * 2 + $first['points'];

       }
       elseif ($first['subs'] == 3) {
         $latespoints = $points * 3 + $first['points'];

       }
       elseif ($first['subs'] == 4) {
         $latespoints = $points * 2 + $first['points'];

       }else {
         $latespoints = $points + $first['points'];

       }





        $stmt = $conn->prepare("UPDATE users SET hits  = ? WHERE id  =?");
        $stmt->execute(array($lasthits,$id));


        $stmt = $conn->prepare("INSERT INTO hits(ad,userid,created)
         VALUES(:zf,:ze,now())");
        $stmt->execute(array(
          'zf' => $ad,
          'ze' => $id

        ));







 ?>
