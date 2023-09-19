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
                <!-- <p class="fs-2">เพิ่มข้อมูลประเภทหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลประเภทหนังสือ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Bookdata/addbooktypedata'); ?>" method="post" enctype="multipart/form-data">
                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">ชื่อประเภทหนังสือ</label>
                      <div class="col-sm-6">
                      <!-- <input type="text" class="form-control" id="" name="bookType_name"  value="<?php /*echo set_value('bookType_name');*/ ?>" required> -->
                      
                      <input type="text" name="bookType_name" id="bookType_name" class="form-control" value="<?php echo set_value('bookType_name'); ?>" required/>
                      <input type='hidden' id='bookTypenamedata' value='<?php echo json_encode($btypeName);?>' />

                      <?php if(form_error('bookType_name') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookType_name'); ?><br><?php echo form_error('bookType_name');?></span>
                      <?php } ?>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                  <label for="inputprename" class="col-sm-2 col-form-label">สถานะ</label>
                    <div class="col-sm-4">
                      <select class="form-select" id="inputGroupSelect01" type="text" name="booktypeStatus_id" value="<?php echo set_value('booktypeStatus_id'); ?>" required>
                        <option selected value="1">ใช้งาน</option>
                        <optgroup label="เลือกข้อมูล">
                            <option value="1">ใช้งาน</option>
                            <option value="2">ไม่ใช้งาน</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/booktypeShow2');?>" role="button">ยกเลิก</a>
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
        var oData = 
            $("#bookTypenamedata").val();
                oData = JSON.parse(oData);
            $("#bookType_name" ).autocomplete({
                source: oData
            }); 
        });
</script> 
</body>
</html>
