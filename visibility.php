<?php
session_start();
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $ad = $_POST['ad'];
                          $status = $_POST['status'];







                          if (empty($formErrors))
                          {
                            if ($status == 0)
                            {
                              $stmt = $conn->prepare("UPDATE ads SET status = 1   WHERE  id = ?");
                              $stmt->execute(array(
                          $ad
                        ));

                    
                            }
                            if ($status == 1)
                            {
                              $stmt = $conn->prepare("UPDATE ads SET status = 0  WHERE  id = ?");
                              $stmt->execute(array(
    $ad
                              ));

                            }

                            ?>

                            <?php
                          }



                        }





 ?>
