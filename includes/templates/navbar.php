<?php
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1 ");
$stmt->execute(array($_SESSION['clientid']));
$admin = $stmt->fetch();
$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
$stmt->execute();
$page = $stmt->fetch();

$stmt2 = $conn->prepare("SELECT * FROM ads WHERE userid = ? ");
$stmt2->execute(array($_SESSION['clientid']));
$pts = $stmt2->fetchAll();
$total = 0;
foreach ($pts as $pt) {
  $total += $pt['points'];
}
?>
<div class="topbar" id="topbar " style="margin-bottom:40px">
  <div class="container">
    <nav class="navbar px-0 navbar-expand">

      <a href="index.php" class="navbar-brand logo">
        <img src="<?php echo $logo . $page['logo'] ?>" style="width:180px;" alt="logo">
      </a>

      <div class="collapse navbar-collapse mt-0" id="navbarNavDropdown">

        <ul class="navbar-nav ml-auto">


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="profile-btn">
                <div class="avatar">
                  <?php
                  if (empty($admin['image'])) {
                  ?>
                    <img src="/system/downloads/avatars/default.png" alt="avart" style="width:40px">

                  <?php
                  }
                  if (!empty($admin['image'])) {
                  ?>
                    <img src="/system/downloads/avatars/<?php echo $admin['image']  ?>" alt="avart" style="width:40px">

                  <?php
                  }
                  ?>
                </div>
                <div class="user-info">
                  <p class="user-full-name"><?php echo $admin['fname'] ?></p>
                  <p class="status" style="color:rgba(0,0,0,.8)"><?php echo $admin["points"] ?> <small style="color:red">Points</small> </p>
                </div>
              </div>
            </a>

          </li>

        </ul>
      </div>
    </nav>
  </div>
</div>
<div class="header">
  <div class="container d-flex justify-content-between">
    <div class="sidebar mr-md-3">
      <a data-active="dashboard" class=" d-flex flex-column justify-content-center align-items-center" href="index.php">
        <img src="<?php echo $images ?>dashboard.png" alt="">
        <span>dashboard</span>
      </a>
      <a data-active="points" href="webpage.php?page=pointszone" class="d-flex flex-column justify-content-center align-items-center">
        <img src="<?php echo $images ?>earn.png" alt="">
        <span>points zone</span>
      </a>
      <a data-active="store" href="webpage.php?page=store" class="d-flex flex-column justify-content-center align-items-center">

        <img src="<?php echo $images ?>store.png" alt="">
        <span>store</span>
      </a>
      <a data-active="referral" href="webpage.php?page=referral" class="d-flex flex-column justify-content-center align-items-center">
        <img src="<?php echo $images ?>ref.png" alt="">
        <span>referral</span>
      </a>

      <a data-active="reward" href="webpage.php?page=rewards" class="d-flex flex-column justify-content-center align-items-center">
        <img src="<?php echo $images ?>reward.png" alt="">
        <span>reward</span>
      </a>


      <a data-active="setting" href="webpage.php?page=myprofile&id=<?php echo $_SESSION['clientid'] ?>" class=" d-flex flex-column justify-content-center align-items-center">
        <img src="<?php echo $images ?>settings.png" alt="">
        <span>settings</span>
      </a>

      <a href="logout.php" class="logout">Sign Out</a>
    </div>
    <!-- sidebar content end -->