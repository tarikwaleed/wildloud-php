<?php
session_start();
    include 'connect.php';


    $ad = $_POST['ad'];


    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ?");
    $stmt->execute(array($ad));

    $ad = $stmt->fetch();


        $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute(array($ad['service']));

        $sv = $stmt->fetch();


    ?>
    <div class="alrwindow">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="content">

              <h3><?php echo $sv['name'] ?></h3>
              <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/ahatttod.json"
    trigger="loop"
    style="width:50px;height:50px">
</lord-icon>
              <p style="text-transform:capitalize">checking if task has been completed......</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php


      ?>

        <?php

        ?>

        <?php
         ?>
      <?php

 ?>
