<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
                    <h2>เพิ่มข้อมูลระเบียบห้องสมุด</h2>
                  </div>
                </div>
                <hr>
                <!-- เมื่อมีการอัพโหลดไฟล์จะต้องมีแอดทริบิว enctype="multipart/form-data" -->
                <form action="<?php echo site_url ('Rulesdata/addRulesdata'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">หัวข้อ</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="rulesSection" name="rulesSection" value="<?php echo set_value('rulesSection'); ?>" required>
                    <input type='hidden' id='rulesSectiondata' value='<?php echo json_encode($adrulesSection);?>' />
                    <?php if(form_error('rulesSection') == ''){


                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('rulesSection'); ?><br><?php echo form_error('rulesSection');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รายละเอียด</label>
                    <div class="col-sm-6">
                    <textarea class="form-control" id="rulesDetails" name="rulesDetails" rows="4" cols="50" value="<?php echo set_value('rulesDetails'); ?>" required ></textarea>
                    <!-- <input type="text" class="form-control" id="rulesDetails" name="rulesDetails" value="<?php /*echo set_value('rulesDetails'); */?>" required> -->
                    <input type='hidden' id='rulesDetailsdata' value='<?php echo json_encode($adrulesDetails);?>' />
                    <?php if(form_error('rulesDetails') == ''){


                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('rulesDetails'); ?><br><?php echo form_error('rulesDetails');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">ประกาศ</label>
                      <div class="col-sm-3">
                      <!-- <input type="text" class="form-control" id="" name="active" value="<?php /* echo $query->active;*/ ?>" required> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="rulesActive" value="" required>
                        <option selected value="1">ประกาศ</option>
                        <optgroup label="เลือกข้อมูล">
                            <option value="1">ประกาศ</option>
                            <option value="2">ไม่ประกาศ</option>
                        </optgroup>                       
                      </select>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <!-- <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Content:</label>
                    <div class="col-sm-10">
                        <textarea id="editor" name="content" rows="8" placeholder="Enter content here" required></textarea>
                    </div>
                  </div> -->

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/rulesShow');?>" role="button">ยกเลิก</a>
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
        var adrulesSection = $("#rulesSectiondata").val();
        adrulesSection = JSON.parse(adrulesSection);
        $("#rulesSection" ).autocomplete({
            source: adrulesSection
        });
        var adrulesDetails = $("#rulesDetailsdata").val();
        adrulesDetails = JSON.parse(adrulesDetails);
        $("#rulesDetails" ).autocomplete({
            source: adrulesDetails
        });  
        });

        </script>
</body>
</html>
