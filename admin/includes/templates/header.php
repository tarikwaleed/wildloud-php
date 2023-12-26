
<?php
  include './connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo $css ?>chartist.css">
    <title><?php echo getTitle(); ?></title>
      <link rel="icon" type="image/x-icon" href="<?php echo $logo . $page['favicon'] ?>">
    <link rel="icon" href="<?php echo $logo . $page['logo'] ?>" type="image/gif" sizes="16x16">

    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/decoupled-document/ckeditor.js"></script> -->
  <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css"/> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/> <!-- 'nano' theme -->
    <link rel="stylesheet" href="<?php echo $css ?>style.css">
    <link rel="stylesheet" href="<?php echo $css ?>jquery-ui.css">
    <style media="screen">
    :root
    {
          --mainColor: <?php echo $page['webcolor'] ?>;
    }
    </style>
  </head>
  <body>
