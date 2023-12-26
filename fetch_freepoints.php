<?php
    include 'connect.php';

      session_start();

      $myid = $_SESSION['clientid'];




      ?>

        <?php



        $stmt4 = $conn->prepare("SELECT * FROM cp  ORDER BY id DESC ");
        $stmt4->execute();
        $asd = $stmt4->fetchAll();
        $checkad = $stmt4->rowCount();



              ?>

              <div class="col-md-12">
                <div class="cp fd" style="background:#fff">
<?php
    foreach ($asd as $ad)
    {
      ?>
      <a class="cppoints" cp="<?php echo $ad['id'] ?>" userid ="<?php echo $myid ?>" style="background:#f1f1f1;color:white;padding:8px 2px;color:white;border-radius:10px" href="<?php echo $ad['image'] ?>" target="_blank"><?php echo $ad['name'] ?></a>

      <?php
    }
 ?>
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
