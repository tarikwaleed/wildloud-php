<?php
  include 'connect.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
          $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
          $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
          $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
          $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
          $formErrors = array();
          if (empty($username) )
          {
            $formErrors[] = 'username is required';
          }
          if (empty($email) )
          {
            $formErrors[] = 'email is required';
          }          if (empty($username) )
                    {
                      $formErrors[] = 'username is required';
                    }          if (empty($title) )
                              {
                                $formErrors[] = 'title is required';
                              }          if (empty($message) )
                                        {
                                          $formErrors[] = 'message is required';
                                        }







          foreach ($formErrors as $error ) {
            ?>
            <div class="container-fluid">

              <?php
              echo '<div class="alert alert-danger"  style="text-align:left;text-transform:capitalize">' . $error . '</div>';
              ?>

            </div>
            <?php
          }

          if (empty($formErrors))
          {
            $stmt = $conn->prepare("INSERT INTO contact(username,email,title,message,created)
              VALUES(:zu,:ze,:zt,:zm,now())
            ");
            $stmt->execute(array(
              "zu" => $username,
              "ze" => $email,
              "zt" => $title,
              "zm" => $message


            ));
            ?>
            <div class="alert alert-success" style="text-align:center">
              <p style="display:block;text-align:left;text-transform:capitalize">Your message was sent successfully</p>
            </div>
            <?php
          }


  }

 ?>
