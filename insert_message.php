<?php
    include 'connect.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $fname = $_POST['fname'];
      $email = $_POST['email'];
      $title = $_POST['title'];
      $message = $_POST['message'];


      $formErrors = array();
      if (empty($fname) )
      {
        $formErrors[] = 'خانة اسم الكامل اجبارية';
      }
      if (empty($email))
      {
        $formErrors[] = 'خانة الايميل اجبارية';
      }
      if (empty($title))
      {
        $formErrors[] = 'خانة العنوان اجبارية';
      }
      if (empty($message))
      {
        $formErrors[] = 'خانة الرسالة اجبارية';
      }







      foreach ($formErrors as $error ) {
        ?>
        <div class="container-fluid">

          <?php
          echo '<div class="alert alert-danger"  style="text-align:right">' . $error . '</div>';
          ?>

        </div>
        <?php
      }




      if (empty($formErrors))
      {
        $stmt = $conn->prepare("INSERT INTO messages(fname,email,title,message,created)
         VALUES(:zf,:ze,:zt,:zm,now())");
        $stmt->execute(array(
          'zf' => $fname,
          'ze' => $email,
          'zt' => $title,
          'zm' => $message



        ));

        ?>
        <div class="alert alert-success" style="margin-top: 15px">
          تم ارسال رسالتك بنجاح
        </div>
        <?php
      }


    }else {
      header('location: index.php');
    }
 ?>
