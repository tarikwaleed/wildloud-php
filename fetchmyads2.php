<?php
    include 'connect.php';

      session_start();

      $myid = $_SESSION['clientid'];
      $service = $_POST['service'];
      $servicetype = $_POST['servicetype'];



      ?>

        <?php
        $stmt = $conn->prepare("SELECT * FROM freepoints  WHERE service = ? AND  servicetype = ? AND userid != $myid AND visibility = 1 ORDER BY id DESC LIMIT 1 ");
        $stmt->execute(array($service,$servicetype));
        $nb = $stmt->fetchAll();
        $total = $stmt->rowCount();
        foreach($nb as $n)
        {
          $total = $n['id'];
        }
        $adID = rand(1,$total);

        $stmt2 = $conn->prepare("SELECT * FROM ads WHERE id = ? AND service = ? AND servicetype = ? AND status = 1 AND visibility = 1");
        $stmt2->execute(array($adID,$service,$servicetype));
        $ad = $stmt2->fetch();
        $checkad = $stmt2->rowCount();
        $stmt3 = $conn->prepare("SELECT * FROM services WHERE id = ? ");
        $stmt3->execute(array($service));
        $img = $stmt3->fetch();


        $stmt3 = $conn->prepare("SELECT * FROM servicestype WHERE id = ? ");
        $stmt3->execute(array($servicetype));
        $svt = $stmt3->fetch();



          if ($checkad > 0)
          {
            ?>
            <div class="col-md-6">
                <div class="main-ad">
                    <p><?php echo $svt['name'] ?></p>

                      <a  href="<?php echo $ad['link'] ?>" target="_blank" target="_blank" class=" srtcount adh999bb07es" adshow adspce prmdk=<?php echo $myid ?> pts=<?php echo $ad['points'] ?> ad="<?php echo $ad["id"] ?>">
          <img src="downloads/images/<?php echo $img['image'] ?>" style="width:50% !important;height:auto !important" alt="">
                      </a>
                        <br>
                    <span class="skip0997" style="color:rgba(0,0,0,.4);font-size:14px;cursor:pointer" service="<?php echo $service ?>" servicetype="<?php echo $servicetype ?>">skip</span> <br>
                    <small style="color:rgba(0,0,0,.4)">must play for 0/30 second</small> <br>  <br>
                    <span class="pointsforad"><?php echo $ad['points'] ?> points</span>
                </div>
            </div>
            <?php
          }else {
            ?>
            <div class="col-md-6">
                <div class="main-ad">
                    <p style="text-transform:capitalize;font-weight:bold">No task has been addes for this service :( !</p>
                </div>
            </div>
            <?php
          }
          ?>

          <?php

         ?>
      <?php

 ?>
