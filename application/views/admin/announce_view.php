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
                <!-- <p class="fs-2">เพิ่มข้อมูลการประกาศ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลประกาศ</h2>
                  </div>
                </div>
                <hr>
                <!-- เมื่อมีการอัพโหลดไฟล์จะต้องมีแอดทริบิว enctype="multipart/form-data" -->
                <form action="<?php echo site_url ('announcedata/addimgdata'); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผู้ใช้</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>" readonly>
                    <input type='hidden' id='user_IDdata' value='<?php echo json_encode($aduser_id);?>' />
                    <?php if(form_error('user_id') == ''){


                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('user_id'); ?><br><?php echo form_error('user_id');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">หัวข้อประกาศ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="announceSection" name="announceSection" value="<?php echo set_value('announceSection'); ?>" required>
                    <input type='hidden' id='announceSectiondata' value='<?php echo json_encode($adanSection);?>' />
                    <?php if(form_error('announceSection') == ''){


                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('announceSection'); ?><br><?php echo form_error('announceSection');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รายละเอียด</label>
                    <div class="col-sm-8">
                    <textarea class="form-control" id="announceDetails" name="announceDetails" rows="4" cols="50" value="<?php echo set_value('announceDetails'); ?>" required></textarea>
                    <input type='hidden' id='announceDetailsdata' value='<?php echo json_encode($adanDetails);?>' />
                    <!-- <input type="text" class="form-control" id="" name="announceDetails" value="" required> -->
                    <?php if(form_error('announceDetails') == ''){


                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('announceDetails'); ?><br><?php echo form_error('announceDetails');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่ประกาศ</label>
                      <div class="col-sm-3">
                      <input type="date" class="form-control" id="" name="announceDate" value="<?php echo date("Y-m-d",strtotime("now"))?>" required>
                      <?php if(form_error('announceDate') == ''){


                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('announceDate'); ?><br><?php echo form_error('announceDate');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <div class="col-sm-3">
                      <input type="hidden" class="form-control" id="" name="active" value="1" required>
                      </div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">รูปภาพ</label>
                      <div class="col-sm-6">
                      <input type="file" class="form-control" id="" name="announceImage" accept="image/*" ><p><small>ไฟล์รูปภาพ gif/jpeg/png/ ขนาดไม่เกิน 3000x3000</small></p>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/announceShow');?>" role="button">ยกเลิก</a>
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
        var aduser_id = $("#user_IDdata").val();
        aduser_id = JSON.parse(aduser_id);
        $("#user_id" ).autocomplete({
            source: aduser_id
        });
        var adanSection = $("#announceSectiondata").val();
        adanSection = JSON.parse(adanSection);
        $("#announceSection" ).autocomplete({
            source: adanSection
        });
        var adanDetails = $("#announceDetailsdata").val();
        adanDetails = JSON.parse(adanDetails);
        $("#announceDetails" ).autocomplete({
            source: adanDetails
        });  
        });
        </script>
</body>
</html>
