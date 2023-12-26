<?php
    include 'connect.php';


    $ad = $_POST['ad'];


    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ?");
    $stmt->execute(array($ad));

    $content = $stmt->fetch();
    ?>
    <div class="edit-ad " >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 ">
            <div class="content content dash-content">
              <h3 style="text-transform:capitalize;display:block;text-align:center;padding-bottom:20px">edit ad content <i class="close-ad-edit fas fa-times" style="float:right;cursor:pointer;font-size:16px;color:rgba(0,0,0,.6)"></i>  </h3>
              <form method="post" id="adform2">
                <i class="fas fa-times" style="position:absolute;left:0;top:0;margin:20px"></i>

                <div class="msg">

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">service</label>
              <div class="col-sm-9">
                <?php
                  $stmt = $conn->prepare("SELECT * FROM services  ORDER BY id DESC");
                  $stmt->execute();
                  $services = $stmt->fetchAll();
                 ?>
                <select class="form-control" name="service" id="service" disabled>

                   <option value="99">You cant edit service</option>

                </select>
              </div>
            </div>
            <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">service type</label>
      <div class="col-sm-9">

        <select class="form-control" name="servicetype" id="servicetype" disabled>
    <option value="default" >You cant edit service type </option>


        </select>
      </div>
    </div>
    <div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">total click</label>
<div class="col-sm-9">
<div class="input-group">
  <input type="text" id="mpr3" name="tclicks" class="form-control" placeholder="Total clicks" aria-label="Total clicks" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button id="on3" class="btn btn-outline-secondary" style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="button">on</button>
    <button id="off3" class="btn btn-outline-secondary" style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="button">off</button>
  </div>
</div>  </div>
</div>

                  </div>


                  <div class="col-md-6">
                    <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">points</label>
                    <div class="col-sm-9">
                    <input type="text" value="<?php echo $content['points'] ?>" name="points" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Points">
                    <input type="hidden" name="adid" value="<?php echo $content['id'] ?>">
                    </div>
                    </div>
            <div class="form-group row">
      <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">url / account</label>
      <div class="col-sm-9">
          <input type="text" name="uacc" value="<?php echo $content['link'] ?>" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Your account url">
      </div>
    </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Daily Clicks</label>
    <div class="col-sm-9">
    <div class="input-group">
    <input type="text" id="mpr4"  name="dclicks" class="form-control" placeholder="Daily Clicks" aria-label="Daily Clicks" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button id="on4" class="btn btn-outline-secondary" style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="button">on</button>
    <button id="off4" class="btn btn-outline-secondary" style="height:unset !important;border:1px solid rgba(0,0,0,.1);color:white" type="button">off</button>
    </div>
    </div>  </div>
    </div>
                  </div>
                  <div class="col-md-12">

            <div class="form-group row">
      <div class="col-sm-12">
          <input type="button" class="btn btn-primary" id="mbeadbtn99003f3svb2" value="save" style="height:40px !important;width:100%;text-align:center !important">
      </div>
    </div>

    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
 ?>
