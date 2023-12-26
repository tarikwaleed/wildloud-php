<?php
session_start();
    include 'connect.php';

        $userid = $_POST['userid'];
        $comp = $_POST['comp'];
        $myplace = $_POST['place'];

                $stmt = $conn->prepare("SELECT * FROM winners WHERE userid = ? AND comp = ?");
                $stmt->execute(array($userid, $comp));
                $check = $stmt->rowCount();


                if ($check == '0')
                {




                                $stmt = $conn->prepare("SELECT * FROM places WHERE comp =  ?");
                                $stmt->execute(array($comp));
                                $places = $stmt->fetchAll();
                                foreach($places as $place)
                                {
                                  if ($myplace >= $place['frm'] && $myplace <= $place['t'])
                                  {
                                    $points = $place['points'];
                                  }
                                }
                                  $stmt3 = $conn->prepare("SELECT * FROM users WHERE id = ?");
                                  $stmt3->execute(array($userid));

                                  $user = $stmt3->fetch();
                                   $pts = $user['points'] + $points;

                                   $stmt = $conn->prepare("UPDATE users SET points = ? WHERE id = ?");
                                   $stmt->execute(array($pts, $userid));

                                   $stmt = $conn->prepare("INSERT INTO winners(userid,comp,points)
                                    VALUES(:zf,:ze,:zp)");
                                   $stmt->execute(array(
                                     'zf' => $userid,
                                     'ze' => $comp,
                                     'zp' => $points

                                   ));
                                    echo 'Congratulations, You have won '.$points.' points';











                }






 ?>
