<?php
    include 'connect.php';


    $id = $_POST['id'];


    if ($id == 'default')
    {
      ?>
      <option value="default">select service first</option>
      <?php
    }else {
      $stmt = $conn->prepare("SELECT * FROM servicestype WHERE service = ? ORDER BY id DESC");
      $stmt->execute(array($id));

      $svt = $stmt->fetchAll();
      $check =$stmt->rowCount();

      if ($check > 0)
      {
        foreach ($svt as $sv)
        {
          ?>
          <option value="<?php echo $sv['id'] ?>"><?php echo $sv['name'] ?></option>
          <?php
        }

      }

      else {
        ?>
        <option value="default">No options for this service</option>
        <?php
      }

    }

      ?>

        <?php


         ?>
      <?php

 ?>
