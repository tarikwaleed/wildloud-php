<?php
include 'connect.php';


$id = $_POST['id'];




?>

<?php
$stmt = $conn->prepare("SELECT * FROM servicestype WHERE service = ?  ORDER BY id DESC");
$stmt->execute(array($id));

$svt = $stmt->fetchAll();
foreach ($svt as $sv) {
?>
  <div class="col-md-3">
    <div class="content-header">
      <a class="dashboard-overview ads mpr " id="dms" service="<?php echo $id ?>" servicetype=<?php echo $sv['id'] ?>><?php echo $sv['name'] ?></a>
    </div>
  </div>
<?php
}
?>
<?php

?>