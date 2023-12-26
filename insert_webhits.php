<?php
session_start();
    include 'connect.php';

        $id = $_SESSION['clientid'];
        $points = $_POST['points'];
        $ad = $_POST['ad'];

                $stmt = $conn->prepare("SELECT * FROM hits WHERE userid = ? AND ad = ?");
                $stmt->execute(array($_SESSION['clientid'], $ad));
                $check = $stmt->rowCount();


                if ($check == '0')
                {


                                  $stmt3 = $conn->prepare("SELECT * FROM users WHERE id = ?");
                                  $stmt3->execute(array($_SESSION['clientid']));

                                  $user = $stmt3->fetch();

                                        if ($user['subs'] == 0)
                                        {
                                          $pts = $user['points'] + $points;
                                       }
                                       elseif ($user['subs'] == 1) {
                                          $pts = $user['points'] + $points + $points / 2 ;
                                       }
                                       elseif ($user['subs'] == 2) {
                                          $pts = $user['points'] + $points * 2;
                                       }
                                       elseif ($user['subs'] == 3) {
                                            $pts = $user['points'] + $points * 3;
                                       }
                                       elseif ($user['subs'] == 4) {
                                            $pts = $user['points'] + $points * 2 ;
                                       }else {
                                         $pts = $user['points'] + $points;
                                       }




                                   $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
                                   $stmt->execute(array($pts, $_SESSION['clientid']));







                                   $lasthits = $user['hits'] + '1';



                                   $stmt = $conn->prepare("INSERT INTO hits(ad,userid,created)
                                    VALUES(:zf,:ze,now())");
                                   $stmt->execute(array(
                                     'zf' => $ad,
                                     'ze' => $id

                                   ));


                                   ?>
                                   <div class="content-g" style="text-align:center">
                                     <p style="font-weight:bold;text-transform:capitalize"><?php echo $points ?> points were credited in your account</p>
                                     <a href="#" style="padding:8px 12px;color:white;background:#9d24ae;text-transform:capitalize" onclick="window.close()">close</a>
                                     <a href="#" style="padding:8px 12px;color:white;background:#c49948;text-transform:capitalize">next</a>
                                   </div>
                                   <?php
                }
                else {
                  ?>
                  <div class="content-g" style="text-align:center">
                    <p style="font-weight:bold;text-transform:capitalize">This ad has already been used</p>
                    <a href="#" style="padding:8px 12px;color:white;background:#9d24ae;text-transform:capitalize" onclick="window.close()">close</a>

                  </div>
                  <?php

                }





 ?>
