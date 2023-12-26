<?php

    include 'connect.php';

    $tpl = 'includes/templates/';
    $css = 'layout/css/';
    $js = 'layout/js/';
    $func = 'includes/functions/';
    $avatar = '../downloads/avatars/';
    $images = '../downloads/images/';
    $logo = '../downloads/logo/';

    include $func . 'functions.php';

    include $tpl . 'header.php';
    if (!isset($noNavbar))
    {
      include $tpl . 'navbar.php';
    }

 ?>
