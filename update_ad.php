<?php
session_start();
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $userid = $_SESSION['clientid'];

                          $points = $_POST['points'];
                          $uacc = $_POST['uacc'];
                          $id = $_POST['adid'];



                          $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                          $stmt->execute(array($_SESSION['clientid']));
                          $userpoints = $stmt->fetch();


                          $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ?");
                          $stmt->execute(array($id));
                          $ptss = $stmt->fetch();


                          $newpoints = $userpoints['points'];
                          $formErrors = array();


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
                          if (empty($points))
                        {
                          $formErrors[] = 'Points is required';
                        }
                        if ($points > $userpoints['points'])
                        {
                          $formErrors[] = 'Your points are not enough';
                        }
                        if ($ptss['points'] > $points)
                        {
                          $newpointstest = $ptss['points'] - $points;
                          $newpoints = $userpoints['points'] + $newpointstest;


                        }
                        if ($ptss['points'] < $points)
                        {
                          $newpointstest =$points -  $ptss['points'] ;
                          $newpoints = $userpoints['points'] - $newpointstest;
                        }

                          if (empty($uacc))
                          {
                            $formErrors[] = 'Account url is required';
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
                            $stmt = $conn->prepare("UPDATE ads SET link = ?, points = ?,tclicks = ?,dclicks  = ?    WHERE  id = ?");
                            $stmt->execute(array(
    $uacc,
 $points,
                     $tclicks,
                       $dclicks,$id
                            ));
                            ?>
                            <div class="alert alert-success" style="margin-top: 15px">
                              You Have Update  your ad, please reload the page
                            </div>
                            <?php
                          }



                        }





 ?>
