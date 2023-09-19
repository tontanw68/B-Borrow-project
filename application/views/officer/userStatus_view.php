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
      <?php include('officerNavbar.php');?>     
          <div class="row">
          <?php include('officerMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">เพิ่มข้อมูลประเภทสถานภาพ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลสถานภาพ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('UserStatusdata/addUserStatusdata'); ?>" method="post" enctype="multipart/form-data">
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">สถานภาพ</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" id="userStatus_type" name="userStatus_type"  value="<?php echo set_value('userStatus_type'); ?>" required>
                      <input type='hidden' id='userStatus_typedata' value='<?php echo json_encode($ofUstType);?>' />
                      
                      <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="userStatus_type" value="" required>
                        <option selected value="">-เลือกข้อมูล-</option>
                        <optgroup label="เลือกข้อมูล">
                          <?php /*foreach($userSt as $row){?> 
                            <option value="<?php echo $row->userStatus_id;?>"><?php echo $row->userStatus_type;?></option>
                          <?php }*/ ?>
                        </optgroup>
                    </select> -->
                      <?php if(form_error('userStatus_type') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userStatus_type'); ?><br><?php echo form_error('userStatus_type');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนวันยืม</label>
                      <div class="col-sm-4">
                      <!-- <input type="text" class="form-control" id="" name="borrowDate"  value="<?php /*echo set_value('borrowDate'); */?>" required> -->
                      
                      <input type="text" name="borrowDate" id="borrowDate" class="form-control" value="<?php echo set_value('borrowDate'); ?>" required/>
                      <input type='hidden' id='borrowDatedata' value='<?php echo json_encode($brDate);?>' />
                      <?php if(form_error('borrowDate') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('borrowDate'); ?><br><?php echo form_error('borrowDate');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนเล่ม</label>
                      <div class="col-sm-4">
                      <!-- <input type="text" class="form-control" id="" name="number"  value="<?php /*echo set_value('number'); */?>" required> -->
                      
                      <input type="text" name="number" id="number" class="form-control" value="<?php echo set_value('number'); ?>" required/>
                      <input type='hidden' id='numberdata' value='<?php echo json_encode($bName);?>' />
                      <?php if(form_error('number') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('number'); ?><br><?php echo form_error('number');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/userStatusShow');?>" role="button">ยกเลิก</a>
                    <input class="btn btn-primary" type="submit" value="บันทึก">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>

        $( function() {
          var ofUstType = $("#userStatus_typedata").val();
            ofUstType = JSON.parse(ofUstType);
          $("#userStatus_type" ).autocomplete({
              source: ofUstType
          });
          var brDate = $("#borrowDatedata").val();
            brDate = JSON.parse(brDate);
          $("#borrowDate" ).autocomplete({
              source: brDate
          }); 

          var bName = $("#numberdata").val();
            bName = JSON.parse(bName);
          $("#number" ).autocomplete({
              source: bName
          });
        });
        </script> 
</body>
</html>
