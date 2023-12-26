<?php
session_start();
  include 'connect.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
          $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
          $password = $_POST['password'];

          $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1 ");
          $stmt->execute(array($email,$password));
          $clientExist = $stmt->rowCount();
          $client = $stmt->fetch();
          if ($clientExist > 0)
          {
            $_SESSION['client'] = $client['username'];
            $_SESSION['clientid'] = $client['id'];
            $_SESSION['email'] = $client['email'];

            echo $clientExist;
          }else {
            ?>
            <div class="alert alert-danger">
              Email or Authenticator code are wrong
            </div>
            <?php
          }

  }

 ?>
