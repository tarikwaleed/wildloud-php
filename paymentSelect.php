<?php
session_start();
ob_start();
if (isset($_SESSION['clientid'])) {
  $page = isset($_GET['page']) ? $_GET['page'] : 'login';


  if ($page == 'ad') {
    $noNavbar = '';
    $pageTitle = "Wild & Loud - payment select";
    include 'init.php';
    $id = isset($_GET['id']) ? $_GET['id'] : 'index.php';

?>
    <section class="paymentmethod">
      <div class="container">
        <div class="row" style="background:white">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="#">
                    <img src="<?php echo $images ?>ms.png" alt="">

                    <img src="<?php echo $images ?>visa.png" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="paymentSelect.php?page=paypal&id=<?php echo $id ?>">
                    <img src="<?php echo $images ?>paypal.png" alt="">
                  </a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="paymentSelect.php?page=stripe&id=<?php echo $id ?>">
                    <img src="<?php echo $images ?>stripe.png" alt="">
                  </a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="#">
                    <img src="<?php echo $images ?>gpay.png" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="#">
                    <img src="<?php echo $images ?>pay.png" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="paytpye" style="display:inline-flex;background:white;padding:10px">
                  <a href="paymentSelect.php?page=subs" style="color:var(--mainColor);font-size:30px;padding:10px 20px;font-weight:bold">
                    Premium
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12">
                <div class="conrte" style="margin-top:85px">
                  <a href="#" style="background-color:var(--mainColor);color:white;font-size:30px;padding:10px 50px;font-weight:bold;border-radius:5px">
                    Pay $45
                  </a>
                </div>
              </div>

            </div>
          </div>

          <!--  -->
        </div>
      </div>
    </section>


    <section class="fdf">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <h3>Enter your email</h3>
            <p>you will receive a message within 3 days, please be patient and thank you</p>
            <form class="form-inline">

              <div class="form-group mx-sm-10 mb-10 col-10 ">
                <input type="text" class="form-control" id="" placeholder="Example@email.com">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
          <div class="col-md-12">
            <div class="ds" style="text-align:center;margin-top:20px 0">
              <p style="margin-top:20px;color:rgba(0,0,0,.6)">This process is not eligible for refund</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php

    include $tpl . 'footer.php';
  } elseif ($page == "paypal") {

    $id = isset($_GET['id']) ? $_GET['id'] : 'index.php';

    $pageTitle = 'checkout page';
    include 'init.php';

    include 'config.php';
    $stmt = $conn->prepare("SELECT * FROM store WHERE id = ?");
    $stmt->execute(array($id));
    $option = $stmt->fetch();
  ?>
    <div class="col-md-10 col-12">
      <div class="pyp">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="content">
                <?php

                if ($option['type'] == '0') {
                ?>

                  <a href="paymentSelect.php?page=ad&id=<?php echo $option['id'] ?>">

                    <div class="cashbox ds " style="padding:15px;background:white;margin:10px 0;border:1px solid rgba(0,0,0,.2)">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="<?php echo $images ?>gold1.png" style="width:130%" alt="">
                        </div>
                        <div class="col-md-8">
                          <div class="today-total" style="text-align:left;padding:0 !important">
                            <h3 style="color:rgba(0,0,0,.6)">$<?php echo $option['moneyd'] ?> cashout</h3>
                            <p style="color:var(--mainColor);font-size:14px"><?php echo $option['points'] ?> point</p>
                          </div>
                          <form action="<?php echo PAYPAL_URL; ?>" method="post">
                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                            <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick">

                            <!-- Specify details about the item that buyers will purchase. -->
                            <input type="hidden" name="ad" value="<?php echo $option['id']; ?>">
                            <input type="hidden" name="amount" value="<?php echo $option['moneyd']; ?>">
                            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                            <!-- Specify URLs -->
                            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                            <!-- Display the payment button. -->
                            <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                          </form>
                        </div>
                      </div>
                    </div>
                  </a>


                <?php
                }

                if ($option['type'] == '1') {
                ?>

                  <a href="paymentSelect.php?ad=<?php echo $option['id'] ?>">
                    <div class="cashbox ds " style="padding:15px;background:white;margin:10px 0">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="<?php echo $images ?>gold1.png" style="width:130%" alt="">
                        </div>
                        <div class="col-md-8">
                          <div class="today-total" style="text-align:left;padding:0 !important">
                            <h3 style="color:rgba(0,0,0,.6)">$<?php echo $option['points'] ?> point</h3>
                            <p style="color:var(--mainColor);font-size:14px"><?php echo $option['moneyd'] ?> cashout</p>
                            <form action="<?php echo PAYPAL_URL; ?>" method="post">
                              <!-- Identify your business so that you can collect the payments. -->
                              <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                              <!-- Specify a Buy Now button. -->
                              <input type="hidden" name="cmd" value="_xclick">

                              <!-- Specify details about the item that buyers will purchase. -->
                              <input type="hidden" name="ad" value="<?php echo $option['id']; ?>">
                              <input type="hidden" name="amount" value="<?php echo $option['moneyd']; ?>">
                              <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                              <!-- Specify URLs -->
                              <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                              <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                              <!-- Display the payment button. -->
                              <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?php
    echo "</div>";
    ?>




    <?php

    ?>

  <?php

    include $tpl . 'footer.php';
  } elseif ($page == "subs") {

    $id = isset($_GET['id']) ? $_GET['id'] : 'index.php';

    $pageTitle = 'subscribe page';
    include 'init.php';


  ?>
    <section class="subs mx-auto py-3 col-10" style="background:#F5F5F5; ">
      <p style="font-size: 17px;
font-weight: normal;
text-align: center;
color: #626571;font-weight: 500;
">Choose the right plan for you
      </p>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6">

            <div class="content" id="lfdf6df5" style="margin-left:0">
              <ul>
                <li>
                  <p>Ads Free <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>

                <li>
                  <p>%150 Points <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>%150 Daily Reward <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>%100 Referral Reward <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>10 Submits Slots <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>15 Luck Looter <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>2.5% discount on next purchase <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>100 Click to enter the Compitition <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGIAAABiCAYAAACrpQYOAAAQJElEQVR4Xu1dCZQU1RV9r6pnhl2BaIAIyDILKu4ED8GTuBAkOS6IYkIiURQHZiMaoyFG8ahR9Kikq2fAMS4RtwNGjevRiMsxQU2iEnFhumdGEFRAjICss3RX7q9ilu761VPdU9VdM0OdM8eW+vX/++/+/977/7//HlNXeDbdN4j27y0gnceRrg8lpgEgewDp1Bf/35eYVfxuItajRPw13m3D7y1E6nrKUWvpyHkbUSbm566y74jbsrwv7do5GQw+DcydRKSD+fSdztHJewHeGvz9h2L629RPfZWOKPtf5+p092t/AFETGkVKbBZG/FQAMBFdzHW3mwm1McXQ1vsA5jnMoJVUWF7jaXsOKs8eEPXVh1BT4wXEsdlgxqkAIHu0MK0lVh6gPHU5jSzZ7oBvrhfJfOfrq0dQc8NvIXIug8jp7XqPOlMh0z7MlMcpN3AHjS4Jd6aqVL/NHBD19+RjBvwOBF4MEHJSJVRSfg8U8B7Utbv1nc698PuwTtdviq4nKSfvahpTvNEFWjuswnsghMWzZ++tkMeXQ/yoHVLUvgATLCD+JxhbA9ERAePxX7WexsyDVcS6bV2izb17h5NC+WizEEw9GXVMwAz8Xsrt91aOoxHlX6b0XRqFvQNCyPzaykvAiNvxh1Hq4GFuAMNeAeNeBXCvU0E5ZHcShjuoMq6IaRRMMYwC0qc5E43KtVRUfkeqTaVa3hsgPl1aSE3N9wOAHzgjiN8ihR+GslyRMWX5VVU/2hE9GzReill3pq2xwHw1FVbc5awf6ZdyH4hIaBbFYveApP4dkNWI0f4QBZQ7aUxZJP0uuPBlXdVYam4uQ02X469va43MO0lVx9PY0k0utEIU1r6PWXgT6hqMvj9GBWXBloWme0BsWtmb9m4JYmTNTU40Flek/5lUvpPyKz53pYNuVVKrHQY1PR/MmgrRuJ1UfRGNXfCeK9XXhs6haOwJ1NW2RmJehNkmgEFzbjy12hFYsb6ADhybtDrG4olyrqLC+V+40WyXqUMGgkn8ZipaMMwdIMKhItJjL6OyEbaMYa7DTClHoy91Gea5Rag9CKKFjeDJyM4DEamcCH3wAkTNYCndwuLRdQ1i6FqIIVhEPexJDgLkkVKK7ZWlnQOiJnQ6UexZVNKm3OL4zNuhiOagob/1MPab3Q2HpmGAPo2BmCcfpLSEChdc1fIuPR1RFzyJmmHn21tG71Fe7gU0av6GgyBIOMDxIKQ3I2q1MVDMq6GYv2sjjl7DinY6RNG3B0FwBkLqQGyoHkoNDQBBH2UDwgoqGDKbeGbjQRCcg5AaEHp1DoUb3oDcw2GNrBG+D1sSxX4/CfNsgKSoExLpcK4jIsHbsdi5Rt4RfpYKx88gPq3Zs476ueJOguB8RpgNYcEmO7zhNyiv/zQadel+P/PKM9rClT+B9fiUU+vIjo6OZ8TG0DDaF/tAem7M/AkF8iZhz36nZx31c8UugeBsRtRo2JbQL7Twg1nMgFOwV/KBn3nlGW0ugtAxEJHKKRSL/l3aGUWZA+X8oGcd9XPFLoOQHIhaLY+i+ocolG+dDfQIVoU48uyBjwcgJAciErwOVtItEpG0jfr0KaLhl3/T42DwCAR7IGq1ARSlDdANAy3M7qkiyUMQ7IEIBxfCSrpVMhtWQy+c6uo5cleYVh6DIAfiy+o+tKthPeziw+N4JLa0VXhCuHVi1RUAEDRmAAQ5EBGtApt6QYmCfhEK+qddhX+u0JkhEORAhLV1mA1FViACp1JhKXyMesiTQRCsQBgnbtF3rKzm16moAgdBPeTJMAhWIMJaCLNBuJXEP6yeT4VlT/cIGLIAQjwQ+spcimz+QrKn9A3OnIf1iDPnLIEQD4QgQo/CESBxNtBSKOnSbj8bMgFCXdVwikaFE9tgeDY+R/nlwvvFeNp2X8PaXRBLrYfZrYxX1FPgkfavbg1EJkBYv+xIamz6d6sfsFgOKPCMz694NAGI4BqIpeMTlMMWeGEM69YLuEyAIJgaCd6ELaPr4/jLtA7S5qg2ID6vHEx7ol8BCCW+IC5tFFbM6razIVMgGEBoi7E+u9bCy9w+Q2j03K2maIqEZsBR7K8S/TAXiN3XLYHIJAiCgTWhX+Ik72Erj5XpwvfLBCIcuhVukwsthZScMVRQ8mm3AyLTIBiDfeloijXVSwb7Ygz2hQeA0J6EEjk/QX59jQLOLph0Fimx25spP6ia4LkgF6eONjdXme+GOP5NZ7sk/T6sbbXs4RGsp6KKc1qA+BgFDKXR+jCvBkGTPSGopdK6ZcdQtPFR04ucPyOVrgAg8hNBNwjJJgiGeNLgHan/KIHPdeBzPpO+UqXIlj1WLwR+AEhd5kb/pXUY7W6OAITR7d4Lx7SZ8JB+xvV2sw2CoQKCVehvSQIQUTjl9cE9N7hQRvU6a8c9vjtWHxpPTbG1Eoa7D4YfQDCACF0JXXy3pc85vUYy2W70KRiZ5eKGizdPuBphHRo+t/EHcg8Mv4BgAFH5M+xePG5hKBbNAEI7E/btK5aXqnJW+yW4J2jYnQSajXUeDD+BIHpUG/oRrm8JL/r4R1XOZaA0HSg9ZX2pTqL8src9AaB9pTUhOCjErpO3w4g4wzPTumORDRO1I2bVaidADbxvnRE8C0BosyEeHrLKLeVYGlMu3Gm8f9wGw48gGKLJuOa2zgqEModhUs2HSWVcH4p7Mr2YcwsMv4IgmCsu3FNMskDmEgARgokas25j5OYUZTowCGjpnJjyMwgCiEjVOIo1f2IzI4Iz8WKFRDRNgGh613u5lNBCumD4HQRDNIkL77r1SEHlC4Wylh8IBeh0uM5YNXwmkEkVjK4AggFE5RkwjFZZWKjyVKGsRdCqN60vlXNhvopbo9l5nILRVUAwlfV5UNbWs39VnQQdsRT7PE1W13qFiqlgwb3ZQeFAq3Z7+OZrrDMY/lf6AvyWh57zcgMvHcZEQvNw3LDMOujVY5i23d+fvtmz03IbiPkubEZdnU57rn6TdGYkaUlyhdZVutKpLKItweL513GfiiPTgeoAc/e1JigCQw2NL0DPYxv87HTac/2bVMHwIwiGaNJexIDHNbh2D/MmDPgRB4CQbM9iQY5d0ALXmZpuhU7B8CsIBhDB+oTdZkhXXgUgprTMCCG35iXwqJkGBQbS4aVtMfPSZaJb33UEhp9BMFXAdks4PeYqAFHWcjBUhgIhCb+m+S6ijB0YfgbBmA02ywTiEpz7LDswI2wtpztgOVk9D9wa4enWEw7eiE+vN7xOjIiUym3Ysv9DutVl5Ds7vzGVj8ap5CcmEOL+dETbbI2vwe8CrQkZITTVRsQGGtOJRMoaKii1bqSlWp/X5cMSvzGmrVRQgVjn3O4Ce1hbAUDEdkfbwxzFmBsKxLZ5TWe3rn991RBqbBZ+xbZ+Y20ul3aLDYUqIJ5k+qNb887VztkdkTK1+o21AWHG5fvMghr5WDy5yi0PK6vREKBRhxhNkDa9eURLcN/4EBDh4CoAcYaFpEAuQm7O/8hDUrtv1bXaUTiV+9jaQX4Z+vesln9PAMLmtM4v2x1dEa5w8G4M7iutpCsXw9J7RA6ESKKxYwcykej9Ej5EQPReR1JhschWcvBxygHh3L07tkHKz0GBIe0Xy9boNGHtQVhPl1jaYr4JK8BFTmk4WA4cqNFuBgiS9Y3Vec8KhDjO05s/kphaOxESaGSPDQmU6sgS/rym8XNovJLGAlRRj4WHTJzekMdrqgkKF/0ZEgVzCxRM/GWLVAnsKeXtPOxFNOjCiosS2SAHIlJ1PI703pdELENgdeRT8EFOHl/jKZKWNDd+aPFiNK5rKSdjNlh8m+wjmIW151GRNdIA0ys4p/ixrxmRbeLC2qvgnfVeOvMzmA3nycizB8J0/fgvPrIeQyo8C3skVh/ObDPAD+3Xar/AuqHVLG0lSSQpCQinPXmKhuQx/cLB26BsRF6g+IdpB3Y8T4QdvN4PffcNDZ9WjqRGiHSiQRaaFLoZW0U32NGaHAgzUg0sKEnAXZFcr2Do5B4bbDeRoyIubqThTfDqFAmzN9KhA4+iIbORnEr+dBzl0vSolgdaV/hPEFGSVaNvxmjmCAmHNLjKlEsbVNSzcVf9+WTEdAyE+Dqs3Quk5ZlSmMuhgCoz12MfthQJXoHVQbWUMnYWucEZEOsf7EWNu94CGCdY9QXOLJgvQmSzJ33IIu9JMnNEiL4HrI3xh9R3yEQaPnNfR4Q4A0LUYtrG7wIMkTk3QXkjBiwrUzH9rB6DHVHQld/Xaj/ETHgJPBGJCBOZshsDdILTNZdzIAwRFcKKUH9cGpqa+Vvkd5sOS+q1rsxbx7SbfqzCfdKaXUycoyuQEvkV1iACNg2kBoQBRrAUJq2dThAr79kYBVbvcsc97AIFxS0rij0mnwmgnxUktCpfkkpPUgdC1F6jIVOhjsSvkkeMBuIF3VaBi5iHur7EepJ5gBdMRiSBVEAQZdMDwvT6wHY5/cq2QebldMihJcls51SJzWp5kclxe/My9BkxNezkC/8FRsucdKL5pAeEoENcWA9vqcKP4iQMQiriHFwTLpHdp84qX1Nq3NzuEWEjjkkOwvi56ebQSB+IFopsDz9aChhp7m+ggjyNuLgpJQZku7BYLdfuX2CktUyWe9uFQ7POA9GiwImwskzw24lnZBiWRBlW4tYbM9lmuKx98wKPuOSZbBZE0WckOqyw3nlIsU/uAGGAIbKuxJZLE360Tg6REll/lALqzVlPFGvHqPrKAoSmuAGzeJbUTG/ryzYMLISCa4vLlyLv44q7B4So1vSNwjqDkke1MSwrehHRaG70TYhrI1JO0zVg/s9Bm2SV3I5vTFi45s5yM+equ0AYSvz1AEXW4tAciaGSiypxN0BkaUf+UqRTzu33TMbzFBkZh7/CpmZsNug4K+kMEH0zTfPFVDB+UbpK2W7WuA9ES0vhKqS2h7lHdJKjKStyRxM9gcXQSuqXs5qGFSPdsgeP2Nrf0zAZaRkuAmNngPmHOGpFbPsHlBKvrjx7B4QxO0RMpq0wb2N/tHgzJOu9OM3S6R0w6jVE6P8HqYF1NKoU/lZpPCKJ4f7GccQ6xKUOL0aeaBMRx6Zy5FxV+Pc4Z77Xyxx73gLR0rW6ZYcjnt1CTOwrwIw+abBTiDHMGB2BtjhiJP0mfTd+78C/7zLq0/X+YDZcV7i/ATrruHbGhdJNSmcEwKmOq2EHLs6EN3xmgGgVVyJG034Re1zY5vH+Ps6Yk4FSLK6qPUB56m1pz8I0qMwsEC0EfrZ0IO1vnmNukejj06Db/U+YsPrHtkxu//thNOxwv4HkNWYHiPY0GT5UzQhVxDAb9SEZZsBmiB/hjbI82/n0sg9EHCiIjUpNiKjGZ0LGT/FAfAm5/zbqXUUBfRWNqVjjpQJOZVD5C4j2lIv1SP3a4wBKARgnMrwU4g8KWB8OEdLP/ixAZIyEIidcJEdgHvyFodxrYBaHaezRa922/1NhdrKy/gWiox4KoDau60/7oqbS763uoBHjdvmV0R115/+1QVPWEMQoEQAAAABJRU5ErkJggg==" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                  </p>
                </li>
                <li>
                  <p>Online support <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="2659 3503 22 22">
                      <g clip-path="url(&quot;#a&quot;)" transform="translate(2659 3503)" data-name="Layer 1">
                        <image width="98" height="98" xlink:href="data:image/png;base64,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" transform="rotate(.077) scale(.22449)" />
                      </g>
                      <defs>
                        <clipPath id="a">
                          <path d="M0 0h22v22H0V0z" />
                        </clipPath>
                      </defs>
                    </svg>
                </li>
                </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 ">
            <div class="lsit">
              <ul class="list_price">
                <li>
                  <div class="form-check">
                    <input class="form-check-input prpmmf list_check" type="radio" level="0" name="flexRadioDefault" id="starter" checked>
                    <label class="form-check-label" for="starter">
                      Starter
                    </label>
                    <span>$7.75 <small>/mo</small> </span>
                  </div>

                </li>
                <li>
                  <div class="form-check">

                    <input class="form-check-input prpmmf list_check" type="radio" level="1" name="flexRadioDefault" id="standered" checked>
                    <label class="form-check-label" for="standered">
                      STANDERED
                    </label>
                    <span>$17.75 <small>/mo</small> </span>
                  </div>

                </li>

                <li>
                  <div class="form-check">
                    <input class="form-check-input prpmmf list_check" type="radio" level="2" name="flexRadioDefault" id="premium" checked>
                    <label class="form-check-label" for="premium">
                      PREMIUM
                    </label>
                    <span>$49.75 <small>/mo</small> </span>
                  </div>

                </li>
                <li class="active">
                  <div class="form-check">
                    <input class="form-check-input prpmmf list_check" type="radio" level="3" name="flexRadioDefault" id="unlimited" checked>
                    <label class="form-check-label" for="unlimited">
                      UNLIMITED
                    </label>
                    <span>$125.75 <small>/2 week</small> </span>
                  </div>

                </li>

              </ul>
            </div>
          </div>


          <div class="plan_btn mt-3 py-2 order-2 order-md-1 shadow mx-1 col-md-3 ds form-group row d-flex justify-content-center align-items-center" style="background:#f5f5f5;">
            <input type="submit" id="cancel" name="" value="cancel" class="btn" style="text-align:center !important;border:none !important">
          </div>
          <div class="plan_btn py-2 mt-3 order-1 order-md-2 shadow mx-1 col-md-3 ds form-group row d-flex justify-content-center align-items-center" style="background:var(--mainColor)">
            <input type="submit" id="submit" name="" value="submit" class="btn " style="text-align:center !important;color:white;border:none !important">
          </div>

        </div>
      </div>
    </section>
    </div>
    <?php

    ?>




    <?php

    ?>

  <?php

    include $tpl . 'footer.php';
  } elseif ($page == "stripe") {

    $id = isset($_GET['id']) ? $_GET['id'] : 'index.php';

    $pageTitle = 'checkout page';
    include 'init.php';

    include 'config.php';

    $stmt = $conn->prepare("SELECT * FROM store WHERE id = ?");
    $stmt->execute(array($id));
    $option = $stmt->fetch();

  ?>
    <div class="col-md-10 col-12">
      <div class="pyp">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="content">
                <?php

                if ($option['type'] == '0') {
                ?>

                  <a href="paymentSelect.php?page=ad&id=<?php echo $option['id'] ?>">

                    <div class="cashbox ds " style="padding:15px;background:white;margin:10px 0;border:1px solid rgba(0,0,0,.2)">
                      <div class="row">
                        <div class="col-md-8">
                          <img src="<?php echo $images ?>gold1.png" style="width:130%" alt="">
                        </div>
                        <div class="col-md-12">
                          <div class="today-total" style="text-align:center;margin:20px 0;padding:0 !important">
                            <h3 style="color:rgba(0,0,0,.6)">$<?php echo $option['moneyd'] ?> cashout</h3>
                            <p style="color:var(--mainColor);font-size:14px"><?php echo $option['points'] ?> point</p>
                          </div>

                        </div>
                      </div>
                    </div>
                  </a>



                <?php
                }

                if ($option['type'] == '1') {
                ?>

                  <a href="paymentSelect.php?ad=<?php echo $option['id'] ?>">
                    <div class="cashbox ds " style="padding:15px;background:white;margin:10px 0">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="<?php echo $images ?>gold1.png" style="width:130%" alt="">
                        </div>
                        <div class="col-md-8">
                          <div class="today-total" style="text-align:left;padding:0 !important">
                            <h3 style="color:rgba(0,0,0,.6)">$<?php echo $option['points'] ?> point</h3>
                            <p style="color:var(--mainColor);font-size:14px"><?php echo $option['moneyd'] ?> cashout</p>
                            <form action="<?php echo PAYPAL_URL; ?>" method="post">
                              <!-- Identify your business so that you can collect the payments. -->
                              <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                              <!-- Specify a Buy Now button. -->
                              <input type="hidden" name="cmd" value="_xclick">

                              <!-- Specify details about the item that buyers will purchase. -->
                              <input type="hidden" name="ad" value="<?php echo $option['id']; ?>">
                              <input type="hidden" name="amount" value="<?php echo $option['moneyd']; ?>">
                              <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                              <!-- Specify URLs -->
                              <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                              <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                              <!-- Display the payment button. -->
                              <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                <?php
                }
                ?>
              </div>
            </div>

            <div class="col-md-6">
              <form method="post" id="order_process_form" action="payment.php">
                <div class="row">
                  <div class="col-md-12" style="border-right:1px solid #ddd;">
                    <div class="form-group">
                      <label><b>Card Holder Name <span class="text-danger">*</span></b></label>
                      <input type="text" name="customer_name" id="customer_name" class="form-control" value="" />
                      <span id="error_customer_name" class="text-danger"></span>
                    </div>


                    <hr />
                    <h4 align="center">Payment Details</h4>
                    <div class="form-group">
                      <label>Card Number <span class="text-danger">*</span></label>
                      <input type="text" name="card_holder_number" id="card_holder_number" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="" />
                      <span id="error_card_number" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Expiry Month</label>
                          <input type="text" name="card_expiry_month" id="card_expiry_month" class="form-control" placeholder="MM" maxlength="2" onkeypress="return only_number(event);" />
                          <span id="error_card_expiry_month" class="text-danger"></span>
                        </div>
                        <div class="col-md-4">
                          <label>Expiry Year</label>
                          <input type="text" name="card_expiry_year" id="card_expiry_year" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return only_number(event);" />
                          <span id="error_card_expiry_year" class="text-danger"></span>
                        </div>
                        <div class="col-md-4">
                          <label>CVC</label>
                          <input type="text" name="card_cvc" id="card_cvc" class="form-control" placeholder="123" maxlength="4" onkeypress="return only_number(event);" />
                          <span id="error_card_cvc" class="text-danger"></span>
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="align-items-center">
                      <input type="hidden" name="total_amount" value="<?php echo $option['moneyd'] ?>" />
                      <input type="hidden" name="currency_code" value="USD" />
                      <input type="hidden" name="item_details" value="<?php echo $option['points'] ?>" />
                      <input type="button" name="button_action" id="button_action" class="btn btn-success btn-sm" onclick="validate_form()" value="Pay Now" />
                    </div>
                    <br />
                  </div>

                </div>
              </form>

              <script>
                function validate_form() {

                  var valid_card = 0;
                  var valid = false;
                  var card_cvc = $('#card_cvc').val();
                  var card_expiry_month = $('#card_expiry_month').val();
                  var card_expiry_year = $('#card_expiry_year').val();
                  var card_holder_number = $('#card_holder_number').val();
                  var email_address = $('#email_address').val();
                  var customer_name = $('#customer_name').val();

                  var name_expression = /^[a-z ,.'-]+$/i;
                  var email_expression = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
                  var month_expression = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
                  var year_expression = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
                  var cvv_expression = /^[0-9]{3,3}$/;

                  $('#card_holder_number').validateCreditCard(function(result) {
                    if (result.valid) {
                      $('#card_holder_number').removeClass('require');
                      $('#error_card_number').text('');
                      valid_card = 1;
                    } else {
                      $('#card_holder_number').addClass('require');
                      $('#error_card_number').text('Invalid Card Number');
                      valid_card = 0;
                    }
                  });

                  if (valid_card == 1) {
                    if (!month_expression.test(card_expiry_month)) {
                      $('#card_expiry_month').addClass('require');
                      $('#error_card_expiry_month').text('Invalid Data');
                      valid = false;
                    } else {
                      $('#card_expiry_month').removeClass('require');
                      $('#error_card_expiry_month').text('');
                      valid = true;
                    }

                    if (!year_expression.test(card_expiry_year)) {
                      $('#card_expiry_year').addClass('require');
                      $('#error_card_expiry_year').error('Invalid Data');
                      valid = false;
                    } else {
                      $('#card_expiry_year').removeClass('require');
                      $('#error_card_expiry_year').error('');
                      valid = true;
                    }

                    if (!cvv_expression.test(card_cvc)) {
                      $('#card_cvc').addClass('require');
                      $('#error_card_cvc').text('Invalid Data');
                      valid = false;
                    } else {
                      $('#card_cvc').removeClass('require');
                      $('#error_card_cvc').text('');
                      valid = true;
                    }
                    if (!name_expression.test(customer_name)) {
                      $('#customer_name').addClass('require');
                      $('#error_customer_name').text('Invalid Name');
                      valid = false;
                    } else {
                      $('#customer_name').removeClass('require');
                      $('#error_customer_name').text('');
                      valid = true;
                    }

                    if (!email_expression.test(email_address)) {
                      $('#email_address').addClass('require');
                      $('#error_email_address').text('Invalid Email Address');
                      valid = false;
                    } else {
                      $('#email_address').removeClass('require');
                      $('#error_email_address').text('');
                      valid = true;
                    }
                    // Error in code because of it i stoped the code

                    // if {
                    //   $('#customer_country').removeClass('require');
                    //   $('#error_customer_country').text('');
                    //   valid = true;
                    // }


                  }
                  return valid;
                }

                Stripe.setPublishableKey('pk_test_JKDlpKvWn3oe1nIwl75D9pC400hFQsqUwu');

                function stripeResponseHandler(status, response) {
                  if (response.error) {
                    $('#button_action').attr('disabled', false);
                    $('#message').html(response.error.message).show();
                  } else {
                    var token = response['id'];
                    $('#order_process_form').append("<input type='hidden' name='token' value='" + token + "' />");

                    $('#order_process_form').submit();
                  }
                }

                function stripePay(event) {
                  event.preventDefault();

                  if (validate_form() == true) {
                    $('#button_action').attr('disabled', 'disabled');
                    $('#button_action').val('Payment Processing....');
                    Stripe.createToken({
                      number: $('#card_holder_number').val(),
                      cvc: $('#card_cvc').val(),
                      exp_month: $('#card_expiry_month').val(),
                      exp_year: $('#card_expiry_year').val()
                    }, stripeResponseHandler);
                    return false;
                  }
                }


                function only_number(event) {
                  var charCode = (event.which) ? event.which : event.keyCode;
                  if (charCode != 32 && charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                  }
                  return true;
                }
              </script>
            </div>

          </div>
        </div>
      </div>
    </div>

<?php
    echo "</div>";
    include $tpl . 'footer.php';
  } else {
    header('location: account.php?page=login');
  }
} else {
  header('location: index.php');
}

ob_end_flush();

?>