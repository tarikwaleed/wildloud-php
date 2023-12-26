<?php
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $title = $_POST['title'];
                          $section = $_POST['section'];
                          $user = $_POST['user'];
                          $type = 0;
                          $formErrors = array();
                          if (empty($title))
                          {
                            $formErrors[] = 'عنوان المهمة اجباري';
                          }



                          if (empty($section))
                          {
                            $formErrors[] = 'اسم القسم اجباري';
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
                            $stmt = $conn->prepare("INSERT INTO jobs(title,section, status,user, created)
                             VALUES(:zt,:zs,:zst, :zu, now())");
                            $stmt->execute(array(
                              'zt' => $title,
                              'zs' => $section,
                              'zst' => $type,
                              'zu' => $user

                            ));
                            ?>
                            <div class="alert alert-success" style="margin-top: 15px;text-align:center">
                              تم اضافة المهمة للموظف بنجاح ... يرجى اعادة تحميل الصفحة
                            </div>
                            <?php
                          }



                        }





 ?>
