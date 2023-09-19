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
                <!-- <p class="fs-2">แก้ไขข้อมูลประกาศ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>แก้ไขข้อมูลประกาศ</h2>
                  </div>
                </div>
                <hr>
                <!-- เมื่อมีการอัพโหลดไฟล์จะต้องมีแอดทริบิว enctype="multipart/form-data" -->
                <form action="<?php echo site_url ('announcedata/editAnnouncedata'); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประกาศ</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="" name="announce_id" value="<?php echo $query->announce_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผู้ใช้</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $query->user_id;?>" readonly>
                      <input type='hidden' id='user_iddata' value='<?php echo json_encode($adedituser_id);?>' />
                      
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
                    <input type="text" class="form-control" id="announceSection" name="announceSection" value="<?php echo $query->announceSection;?>" required>
                    <input type='hidden' id='announceSectiondata' value='<?php echo json_encode($adeditSection);?>' />
                    
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
                    <textarea class="form-control" id="announceDetails" name="announceDetails" rows="4" cols="50" value="<?php echo $query->announceDetails;?>" required><?php echo $query->announceDetails;?></textarea>
                    <!-- <input type="text" class="form-control" id="" name="announceDetails" value="" required> -->
                    <input type='hidden' id='announceDetailsdata' value='<?php echo json_encode($adeditAndetails);?>' />
                    
                    <?php if(form_error('announceDetails') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('announceDetails'); ?><br><?php echo form_error('announceDetails');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่</label>
                      <div class="col-sm-3">
                      <input type="date" class="form-control" id="" name="announceDate" value="<?php echo $query->announceDate;?>" required>
                      <?php if(form_error('announceDate') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('announceDate'); ?><br><?php echo form_error('announceDate');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">ประกาศ</label>
                      <div class="col-sm-3">
                      <!-- <input type="text" class="form-control" id="" name="active" value="<?php /*echo $query->active;*/?>" required>1 = แสดง,อื่นๆ = ไม่แสดง -->
                      
                      <select class="form-select" id="inputGroupSelect01" type="text" name="active" value="" required>
                        <option selected value="<?php echo $query->active;?>"><?php if($query->active == 1){ echo "ประกาศ";}else{echo "ไม่ประกาศ";}?></option>
                        <optgroup label="เลือกข้อมูล">
                            <option value="1">ประกาศ</option>
                            <option value="2">ไม่ประกาศ</option>
                        </optgroup>                       
                      </select>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">รูปภาพ</label>
                      <div class="col-sm-6">
                      <!-- <input type="file" class="form-control" id="" name="announceImage" accept="image/*" value=""> -->
                      <!-- image/* ให้เลือกแค่ไฟล์ภาพเท่านั้น -->
                      <br>
                      ภาพเก่า<br>
                      <br>
                      <?php if($query->announceImage != ''){?>
                        <img src="<?php echo base_url('img/announce/'.$query->announceImage);?>" width="300px" alt="">
                      <?php }else{ ?>
                        <img src="<?php echo base_url('img/announce/announce_default.png'); ?>" width="300px">
                      <?php } ?>
                      
                      <input type="file" class="form-control" id="" name="announceImage" accept="image/*" ><p><small>ไฟล์รูปภาพ gif/jpeg/png/ ขนาดไม่เกิน 3000x3000</small></p>
                      </div>
                  </div>
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/announceShow');?>" role="button">ยกเลิก</a>
                    <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer_admin.php');?>
        <!-- autocomplete -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>

      $( function() {
        var adedituser_id = 
            $("#user_iddata").val();
            adedituser_id = JSON.parse(adedituser_id);
        $("#user_id" ).autocomplete({
            source: adedituser_id
        }); 
        var adeditSection = $("#announceSectiondata").val();
        adeditSection = JSON.parse(adeditSection);
        $("#announceSection" ).autocomplete({
            source: adeditSection
        });
        var adeditAndetails = $("#announceDetailsdata").val();
        adeditAndetails = JSON.parse(adeditAndetails);
        $("#announceDetails" ).autocomplete({
            source: adeditAndetails
        });  
      });
      </script>
</body>
</html>
