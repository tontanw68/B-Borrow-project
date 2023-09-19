<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>
  <style type="text/css">
        .fr{
            color: red;
        }
    </style>

	
</head>
<body>
    <div class="container font"> 
      <?php include('adminNavbar.php');?>    
          <div class="row">
          <?php include('adminMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">เพิ่มข้อมูลตารางงานเจ้าหน้าที่</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลตารางงานเจ้าหน้าที่</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Staffdata/addstaff'); ?>" method="post">
                  <!-- <div class="mb-3 row"> -->
                    <!-- <label for="staticEmail" class="col-sm-2 col-form-label">รหัส</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="" name="work_id"  value="<?php /*echo set_value('work_id');*/ ?>" required> -->
                    
                    <!-- </div>
                  </div> -->
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผู้ใช้</label>
                      <div class="col-sm-3">
                      <input type="text" class="form-control" id="user_id" name="user_id"  value="<?php echo set_value('user_id'); ?>" required>
                      <input type='hidden' id='staffdata' value='<?php echo json_encode($adstaff);?>' />
                      
                      <?php if(form_error('user_id') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('user_id'); ?><br><?php echo form_error('user_id');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">รายละเอียดงาน</label>
                      <div class="col-sm-6">
                      <!-- <textarea class="form-control" id="" name="workDetails_id" rows="4" cols="50" value="<?php /*echo set_value('workDetails_id');*/ ?>" required></textarea> -->
                      <!-- <input type="text" class="form-control" id="" name="workDetails_id"  value="" required> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="workDetails_id" value="<?php echo set_value('workDetails_id'); ?>" required>
                        <option selected value="">เลือกข้อมูล</option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach ($query as $row) { ?>
                            <option value="<?php echo $row->WorkDetails_id; ?>"><?php echo $row->WorkDetails; ?></option>
                          <?php } ?>
                        </optgroup>
                      </select>
                      <?php if(form_error('workDetails_id') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('workDetails_id'); ?><br><?php echo form_error('workDetails_id');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputName" class="col-sm-2 col-form-label">วันที่</label>
                      <div class="col-sm-4">
                      <input type="date" class="form-control" id="" name="workDate"  value="<?php echo set_value('workDate'); ?>" required>
                      <?php if(form_error('workDate') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('workDate'); ?><br><?php echo form_error('workDate');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เวลาเริ่ม</label>
                    <div class="col-sm-4">
                    <input type="time" class="form-control" id="" name="workStart_time"  value="<?php echo set_value('workStart_time'); ?>" required>
                    <?php if(form_error('workStart_time') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('workStart_time'); ?><br><?php echo form_error('workStart_time');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เวลาสิ้นสุด</label>
                    <div class="col-sm-4">
                    <input type="time" class="form-control" id="" name="workEnd_time"  value="<?php echo set_value('workEnd_time'); ?>" required>
                    <?php if(form_error('workEnd_time') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('workEnd_time'); ?><br><?php echo form_error('workEnd_time');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/staffShow');?>" role="button">ยกเลิก</a>
                    <input class="btn btn-primary" type="submit" value="บันทึก">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php include('footer_admin.php');?>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>

      $( function() {
      var adstaff = 
          $("#staffdata").val();
          adstaff = JSON.parse(adstaff);
          $("#user_id" ).autocomplete({
              source: adstaff
          }); 
      });
      </script>
</body>
</html>
