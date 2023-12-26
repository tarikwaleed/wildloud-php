<?php
session_start();
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $userid = $_SESSION['clientid'];
                          $points = $_POST['points'];
                          $uacc = $_POST['uacc'];
                          $service = $_POST['service'];
                          $servicetype = $_POST['servicetype'];

                          if (!empty($_POST['tclicks']))
                          {
                            $tclicks = $_POST['tclicks'];

                          }else {
                            $tclicks = 'default';
                          }
                          if (!empty($_POST['dclicks']))
                          {
                            $dclicks = $_POST['dclicks'];

                          }else {
                            $dclicks = 'default' ;
                          }
                          $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                          $stmt->execute(array($_SESSION['clientid']));
                          $userpoints = $stmt->fetch();
                          $formErrors = array();



                      
                        if (!empty($points))
                        {
                          if ($points > $userpoints['points'])
                          {
                            $formErrors[] = 'Your points are not enough';
                          }
                          else {
                            $newpoints = $userpoints['points'] - $points;
                          }
                        }else {
                          $formErrors[] = 'Points is required';
                        }
                          if (empty($uacc))
                          {
                            $formErrors[] = 'Account url is required';
                          }

                          if ($servicetype == '0')
                          {
                            $formErrors[] = 'Service type is required';
                          }






                          foreach ($formErrors as $error ) {
                            ?>
                            <div class="container">
                              <?php
                              echo '<div class="alert alert-danger" >' . $error . '</div>';
                              ?>

                            </div>
                            <?php
                          }




                          if (empty($formErrors))
                          {
                            $stmt2 =$conn->prepare("UPDATE users SET points = ? WHERE id = ?");
                            $stmt2->execute(array($newpoints,$_SESSION['clientid']));
                            $stmt = $conn->prepare("INSERT INTO ads(userid,link,service, servicetype, points,tclicks,dclicks,created)
                            VALUES(:zu,:zl,:zs, :zst, :zpo,:ztc,:zdc, now())");
                            $stmt->execute(array(
                              'zu' => $userid,
                              'zl' => $uacc,
                              'zs' => $service,
                              'zst' => $servicetype,
                              'zpo' => $points,
                              'ztc' => $tclicks,
                              'zdc' => $dclicks
                            ));
                            ?>
                            <div class="alert alert-success" style="margin-top: 15px">
                              You Have Successfully share your ad
                            </div>
                            <?php
                            header('refresh:3;url= users.php');
                          }



                        }





 ?>
