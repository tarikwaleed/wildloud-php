<?php
    include 'connect.php';
    require_once 'phpqrcode/qrlib.php';


                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $qrcode = rand(111111,999999);

                          $email = $_POST['email'];
                          $fname = $_POST['fname'];
                          $phone = $_POST['phone'];
                          $comref = $_POST['comref'];
                          $myref = rand(1111111,9999999999);
                          $type = '0';
                          $formErrors = array();


                          if (empty($email))
                        {
                          $formErrors[] = 'Email Cant be Empty';
                        }

                          if (empty($fname))
                          {
                            $formErrors[] = 'Full name cant be empty';
                          }
                          if (empty($phone))
                          {
                            $formErrors[] = 'phone cant be empty';
                          }
                          if ($comref == 'empty')
                          {
                            $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
                            $stmt->execute();
                            $page = $stmt->fetch();
                            $comr = $page['reg_points'];
                          }
                          if ($comref != "empty")
                          {
                            $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
                            $stmt->execute();
                            $page = $stmt->fetch();

                            $comr = $page['ref_points'];
                            $stmt = $conn->prepare("SELECT * FROM users WHERE myref = ?");
                            $stmt->execute(array($comref));
                            $user = $stmt-fetch();

                            if ($user['subs'] == 0)
                            {
                             $pts = $user['points'] + $page['ref_points'];
                           }
                           elseif ($user['subs'] == 1) {
                              $pts = $user['points'] + $ad['points'] + $ad['points'] / 2 ;
                           }
                           elseif ($user['subs'] == 2) {
                              $pts = $user['points'] + $page['ref_points'] * 2;
                           }
                           elseif ($user['subs'] == 3) {
                                $pts = $user['points'] + $page['ref_points'] * 3;
                           }
                           elseif ($user['subs'] == 4) {
                                $pts = $user['points'] + $page['ref_points'] * 2 ;
                           }else {
                             $pts = $user['points'] + $page['ref_points'];
                           }
                           $stmt = $conn->prepare("UPDATE users SET points = ? WHERE myref = ?");
                           $stmt->execute(array($pts,$comref));


                          }






                          foreach ($formErrors as $error ) {
                            ?>
                            <div class="container">
                              <?php
                              echo '<div class="alert alert-danger" >' . $error . '</div>';
                              ?>

                            </div>
                            <?php
                          }




                          if (empty($formErrors))
                          {
                            $stmt = $conn->prepare("INSERT INTO users(myref,comref,password, fname,phone,email,type, joined,points)
                            VALUES(:zmr,:zcr, :zpass, :zfname, :zph,:zemail, :ztype, now(),:zpoints)");
                            $stmt->execute(array(
                              'zmr' => $myref,
                              'zcr' => $comref,
                              'zpass' => $qrcode,
                              'zfname' => $fname,
                              'zph' => $phone,

                              'zemail' => $email,
                              'ztype' => $type,
                              'zpoints' => $comr

                            ));
                            ?>
                            <div class="qrcodespace" style="text-align:left">
                              <div class="qrcodeerr">

                              </div>
                              <p style="font-size:14px"> <span style="color:#18EFAD;font-weight:bold">Step 2..</span> Scan the QR code below with the authenticator app  </p>
                              <?php
                              $path = 'downloads/qr/';
                              $file = $path.uniqid().".png";
                              $text = $qrcode;
                              QRcode::png($text,$file, 'L', 10);
                              echo "<img style='width:150px;margin:22.5px 0' src='".$file."'>";
                               ?>
                               <p style="font-size:14px"> <span style="color:#18EFAD;font-weight:bold"> Step 3.</span> Enter the 6-digit code displayed on your authenticator app  </p>


                               <div class="row">
                                 <div class="form-group col-md-7">
                                   <input type="text" class="form-control" name="qrcode" style="font-size:35px;font-weight:bold" placeholder="000000" value="">
                                 </div>
                                 <div class="form-group col-md-5">
                                   <input type="button" class="btn qrcodecheck"  value="Enable" style="width:100%;background:#18EFAD !important;color:white !important;text-align:center !important;font-weight:bold" >
                                 </div>

                               </div>
                            </div>

                            <?php
                            header('refresh:3;url= users.php');
                          }




                        }





 ?>
