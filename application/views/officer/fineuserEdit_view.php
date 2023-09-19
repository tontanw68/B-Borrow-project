<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>ระบบจัดการยืม-คืนหนังสือ</title>
  <style type="text/css">
    .fr {
      color: red;
    }
  </style>


</head>

<body>
  <div class="container font">
  <?php include('officerNavbar.php'); ?>
    <div class="row">
    <?php include('officerMenu.php'); ?>
      <div class="col-md-9">
        <div class="card py-3 px-5 mt-10 h-100">
          <!-- <h1>menu</h1> -->
          <!-- <p class="fs-2">แก้ไขข้อมูลตารางงานเจ้าหน้าที่</p> -->
          <div class="row">
            <div class="col">
              <h2>แก้ไขข้อมูลตารางงานเจ้าหน้าที่</h2>
            </div>
          </div>
          <hr>
          <form action="<?php echo site_url('FineTypedata/editfineUserdata'); ?>" method="post">
          <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">รหัสค่าปรับ</label>
              <div class="col-sm-2">
                <input class="form-control" id="fine_id" name="fine_id" value="<?php echo $query->fine_id; ?>" readonly></input>

                <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">รหัสผู้ใช้</label>
              <div class="col-sm-2">
                <input class="form-control" id="user_id" name="user_id" value="<?php echo $query->user_id; ?>" readonly></input>

                <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">รายละเอียดค่าปรับ</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" id="fineType" name="fineType" rows="4" cols="50" value="<?php echo $query->fineType; ?>" required><?php echo $query->fineType; ?></textarea>
                

                <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->
                <?php if (form_error('fineType') == '') {
                } else { ?>
                  <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('fineType'); ?><br><?php echo form_error('fineType'); ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">จำนวนค่าปรับ</label>
              <div class="col-sm-2">
                <input class="form-control" id="Rate" name="Rate" value="<?php echo $query->fineRate." บาท"; ?>" required></input>
                <input type="hidden" class="form-control" id="fineRate" name="fineRate" value="<?php echo $query->fineRate; ?>" required></input>
                <input id='fineRatedata' value='<?php echo json_encode($s_wd); ?>' hidden />

                <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->
                <?php if (form_error('fineRate') == '') {
                } else { ?>
                  <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('fineRate'); ?><br><?php echo form_error('fineRate'); ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">วันที่ปรับ</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" id="fineDate" name="fineDate" value="<?php echo $query->fineDate; ?>" required></input>
                <input id='fineRatedata' value='<?php echo json_encode($s_wd); ?>' hidden />

                <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->
                <?php if (form_error('fineRate') == '') {
                } else { ?>
                  <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('fineRate'); ?><br><?php echo form_error('fineRate'); ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputprename" class="col-sm-2 col-form-label">ชำระ</label>
              <div class="col-sm-4">
                <select class="form-select" id="inputGroupSelect01" type="text" name="pay" value="">
                  <option selected value="<?php echo $query->fineStatus_id;?>"><?php if($query->fineStatus_id == 1){ echo "ชำระ";}else{ echo "ยังไม่ชำระ";}?></option>
                  <optgroup label="เลือกข้อมูล">
                    <option value="1">ชำระ</option>
                    <option value="2">ยังไม่ชำระ</option>
                  </optgroup>
                </select>
                <?php if (form_error('pay') == '') {
                } else { ?>
                  <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('pay'); ?><br><?php echo form_error('pay'); ?></span>
                <?php } ?>
              </div>
            </div><br />
            <div class="mb-3 row">
              <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
              <div class="col-sm-10">
                <a class="btn btn-warning" href="<?php echo site_url('Showdata/fineUserShow'); ?>" role="button">ยกเลิก</a>
                <input class="btn btn-primary" type="submit" value="บันทึก">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer_officer.php'); ?>
   <!-- Script -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  <script>
    $(function() {
      var oData3 = $("#workDetails_iddata").val();
      oData3 = JSON.parse(oData3);
      $("#workDetails_id").autocomplete({
        source: oData3
      });
    });
  </script>
</body>

</html>
