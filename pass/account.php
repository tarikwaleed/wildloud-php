<?php
session_start();
ob_start();
  if (!isset($_SESSION['clientid']))
  {
    $page = isset($_GET['page']) ? $_GET['page'] : 'login';


      if ($page == 'login')
      {
        $pageTitle = 'صفحات - تسجيل الدخول';
        include 'init.php';

        ?>
        <div class="account-page" id="account-page" style="margin:40px 0">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="login-page">

                  <form class="#" action="account.php?account=login" method="post">

                    <h1>دخول الى الحساب</h1>


                    <div class="form-group">
                      <input type="text" name="email" class="form-control col-md-12" placeholder="ادخل بريدك الالكترني" required="required">
                    </div>
                    <div class="form-group bt-mg">
                      <input type="password" name="password" class="form-control col-md-12" placeholder="كلمة المرور " autocomplete="new-password" required="required">
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary"  value="دخول">

                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                            $password = sha1($_POST['password']);

                            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1 ");
                            $stmt->execute(array($email,$password));
                            $clientExist = $stmt->rowCount();
                            $client = $stmt->fetch();
                            if ($clientExist > 0)
                            {
                              $_SESSION['client'] = $client['username'];
                              $_SESSION['clientid'] = $client['id'];
                              $_SESSION['email'] = $client['email'];

                              header('location: index.php');
                            }else {
                              ?>
                              <div class="alert alert-danger">
                                البريد الاكتروني او كلمة المرور خاطئة
                              </div>
                              <?php
                            }

                    }
                     ?>
                    <div class="new-acc">
                      <a href="account.php?page=register" class="new-acc">ليس لدي حساب بعد</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

        include $tpl . 'footer.php';

      }elseif($page == "register") {
        $pageTitle = 'صفحات تسجيل حساب جديد';
        include 'init.php';
        ?>
        <div class="account-page" id="account-page">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="login-page">
                  <!-- <div class="switch-pages">
                    <span>تسجيل</span>
                    <span> دخول</span>
                  </div> -->
                  <form class="register-form" action="#" method="post" id="form-info">
                    <div class="icon">



                    </div>
                    <h1>تسجيل حساب جديد</h1>

                    <div class="form-group">
                      <input type="text" name="email" class="form-control col-md-12" placeholder="ادخل بريد الالكتروني " autocomplete="off" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control col-md-12" placeholder="كلمة المرور " autocomplete="new-password" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" name="cpassword" class="form-control col-md-12" placeholder="تاكيد كلمة المرور" autocomplete="new-password" required="required">
                    </div>
                                        <div class="form-group">
                                          <input id="a-btn-option" type="button" class="btn btn-primary"  value="تسجيل">

                                        </div>

                    <div class="err-msg" id="err-msg">

                    </div>
                    <div class="new-acc">
                      <a href="account.php?page=login" class="ald-acc new-acc">لدي حساب مسبقا</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

        include $tpl . 'footer.php';
      }else {
        header('location: account.php?page=login');
      }

  }else {
    header('location: index.php');

  }

  ob_end_flush();

  ?>
