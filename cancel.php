<?php
session_start();
    include "init.php";


    ?>

    <div class="container" style="margin:80px 0">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="status" style="text-align:center;color:red">
              <h1 class="error">Your PayPal Transaction has been Canceled</h1>
              <a href="index.php" class="btn-link" style="text-decoration:underline;color:rgba(0,0,0,.6)">Back to Your dashboard</a>
          </div>
      </div>
        </div>
      </div>
  </div>
</div>

    <?php
    include $tpl  . 'footer.php';
 ?>
