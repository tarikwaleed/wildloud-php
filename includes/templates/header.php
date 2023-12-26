<?php
include './connect.php';
$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
$stmt->execute();
$page = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang=ar dir="ltr">

<head>
  <meta accept-charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link rel="stylesheet" href="<?php echo $css ?>chartist.css">
  <title><?php echo getTitle(); ?></title>
  <link rel="icon" type="image/x-icon" href="<?php echo $logo . $page['favicon'] ?>">
  <link rel="icon" href="<?php echo $logo . $page['logo'] ?>" type="image/gif" sizes="16x16">
  <script type="text/javascript">
    (function() {
      var css = document.createElement('link');
      css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
      css.rel = 'stylesheet';
      css.type = 'text/css';
      document.getElementsByTagName('head')[0].appendChild(css);
    })();
  </script>

  <!-- font awesom -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- owl carousel theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo $css ?>style.css">
  <link rel="stylesheet" href="<?php echo $css ?>responsive.css">

  <style media="screen">
    :root {
      --mainColor: <?php echo $page['webcolor'] ?>;
    }
  </style>
  <script src="https://js.stripe.com/v3/"></script>
  <style type='text/css'>
    /* Animation */
    @keyframes fadeInDown {
      0% {
        opacity: 0;
        transform: translateY(-20px)
      }

      100% {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes rubberBand {
      from {
        transform: scale3d(1, 1, 1)
      }

      30% {
        transform: scale3d(1.25, 0.75, 1)
      }

      40% {
        transform: scale3d(0.75, 1.25, 1)
      }

      50% {
        transform: scale3d(1.15, 0.85, 1)
      }

      65% {
        transform: scale3d(.95, 1.05, 1)
      }

      75% {
        transform: scale3d(1.05, .95, 1)
      }

      to {
        transform: scale3d(1, 1, 1)
      }
    }

    /* Say Hi to Adblock */
    #arlinablock {
      background: rgba(0, 0, 0, 0.65);
      position: fixed;
      margin: auto;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      overflow: auto;
      z-index: 999999;
      animation: fadeInDown 1s
    }

    #arlinablock .header {
      margin: 0 0 15px 0
    }

    #arlinablock .inner {
      background: #18EFAD;
      color: #fff;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 600px;
      padding: 40px;
      border-radius: 5px;
      margin: 7% auto 2% auto;
      animation: rubberBand 1s
    }

    #arlinablock button {
      padding: 10px 20px;
      border: 0;
      background: rgba(0, 0, 0, 0.15);
      color: #fff;
      margin: 20px 5px;
      cursor: pointer;
      transition: all .3s
    }

    #arlinablock button:hover {
      background: rgba(0, 0, 0, 0.35);
      color: #fff;
      outline: none
    }

    #arlinablock button.active,
    #arlinablock button:hover.active {
      background: #fff;
      color: #222;
      outline: none
    }

    #arlinablock .fixblock {
      background: #fff;
      text-align: left;
      color: #000;
      padding: 20px;
      height: 250px;
      overflow: auto;
      line-height: 30px
    }

    #arlinablock .fixblock div {
      display: none
    }

    #arlinablock .fixblock div.active {
      display: block
    }

    #arlinablock ol {
      margin-left: 20px
    }

    @media(max-width:768px) {
      #arlinablock .inner {
        width: calc(100% - 20px);
        margin: 10px auto;
        padding: 15px
      }
    }
  </style>

</head>

<body>


  <script type='text/javascript'>
    //<![CDATA[
    // Say Hi to Adblock
    function downloadJSAtOnload() {
      var e = document.createElement("script");
      e.src = "https://cdn.jsdelivr.net/gh/Arlina-Design/quasar@master/arlinablock.js", document.body.appendChild(e)
    }
    window.addEventListener ? window.addEventListener("load", downloadJSAtOnload, !1) : window.attachEvent ? window.attachEvent("onload", downloadJSAtOnload) : window.onload = downloadJSAtOnload;
    //]]>
  </script>

  <script type="text/javascript">
    var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
  </script>