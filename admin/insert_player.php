<?php
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $username = $_POST['username'];
                          $fname = $_POST['fname'];
                          $npass = $_POST['npassword'];
                          $cpass = $_POST['cpassword'];
                          $formErrors = array();
                          if (empty($username))
                          {
                            $formErrors[] = 'اسم المستخدم اجباري';
                          }



                          if (empty($fname))
                          {
                            $formErrors[] = 'اسم الكامل اجباري';
                          }


                          if (empty($cpass))
                          {
                            $formErrors[] =  'تاكيد كلمة المرور اجباري';
                          }
                          if(!empty($npass))
                          {
                              if ($npass!=$cpass)
                              {
                                $formErrors[] = 'كلمة المرور غير متطابقة';
                              }
                              else {
                                $password = sha1($_POST['npassword']);
                              }
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
                            $stmt = $conn->prepare("INSERT INTO players(username,fname, password, created) VALUES(:zusername,:zfname,:zpass, now())");
                            $stmt->execute(array(
                              'zusername' => $username,
                              'zfname' => $fname,
                              'zpass' => $password

                            ));
                            ?>
                            <div class="alert alert-success" style="margin-top: 15px;text-align:center">
                              تم اضافة متدرب جديد بنجاح
                            </div>
                            <?php
                            header('refresh:3;url= users.php');
                          }



                        }





 ?>
