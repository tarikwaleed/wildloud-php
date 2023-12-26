<?php
session_start();
  include 'connect.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
          $code = filter_var($_POST['qrcode'], FILTER_SANITIZE_STRING);

          $stmt = $conn->prepare("SELECT * FROM users WHERE  password = ? LIMIT 1 ");
          $stmt->execute(array($code));
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
            <div class="alert alert-danger" style="font-size:13px">
              Wrong QRcode !
            </div>
            <?php
          }

  }

 ?>
