<?php
session_start();
    include 'connect.php';


    $cp = $_POST['cp'];


    $stmt = $conn->prepare("SELECT * FROM cp WHERE id = ?");
    $stmt->execute(array($cp));

    $ad = $stmt->fetch();




    ?>
    <div class="alrwindow">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="content">

              <h3>Free points</h3>
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
