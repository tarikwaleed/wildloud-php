<?php

  include 'connect.php';


  $ad = $_POST['ad'];

  $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ? LIMIT 1");
  $stmt->execute(array($ad));
  $pfl = $stmt->fetch();
  $check = $stmt->rowCount();


    $stmt = $conn->prepare("DELETE FROM ads WHERE id = :zid");
    $stmt->bindParam(":zid", $ad);
    $stmt->execute();
    ?>

    <?php

 ?>
