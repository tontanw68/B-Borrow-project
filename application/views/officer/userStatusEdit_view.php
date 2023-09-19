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
                <!-- <p class="fs-2">แก้ไขข้อมูลการยืม-คืน</p> -->
                <div class="row">
                  <div class="col">
                    <h2>แก้ไขข้อมูลสถานภาพ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('UserStatusdata/editUserStatusdata'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประเภทสถานภาพ</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="userStatus_id" value="<?php echo $query->userStatus_id;?>" readonly>
                    <?php if(form_error('userStatus_id') == ''){
                    }else{ ?>
                    <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userStatus_id'); ?><br><?php echo form_error('userStatus_id');?></span>
                    <?php } ?>     
                 </div>
                 <div class="col" style="color: red; font-size: 25px;">*</div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">สถานภาพ</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="" name="userStatus_type" value="<?php echo $query->userStatus_type;?>" required>
                    
                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="bookStatus_id" value="" required>
                    <option value="<?php /*echo $query->userStatus_id; ?>"><?php echo $query->userStatus_type; ?></option>
                      <optgroup label="เลือกข้อมูล">
                        <?php foreach ($officerus as $row) { ?>
                          <option value="<?php echo $row->userStatus_id; ?>"><?php echo $row->userStatus_type; ?></option>
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
                    <label for="staticEmail" class="col-sm-2 col-form-label">จำนวนวันยืม</label>
                    <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="" name="borrowDate" value="<?php /*echo $query->borrowDate;*/?>" > -->
                    
                    <input type="text" name="borrowDate" id="borrowDate" class="form-control" value="<?php echo $query->borrowDate;?>" required/>
                    <input type='hidden' id='borrowDatedata' value='<?php echo json_encode($brNum);?>' />

                    <?php if(form_error('borrowDate') == ''){
                    }else{ ?>
                    <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('borrowDate'); ?><br><?php echo form_error('borrowDate');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">จำนวนเล่ม</label>
                      <div class="col-sm-2">
                      <!-- <input type="text" class="form-control" id="" name="number" value="<?php/* echo $query->number;*/?>" > -->
                      
                      <input type="text" name="number" id="number" class="form-control" value="<?php echo $query->number;?>" required/>
                      <input type='hidden' id='numberdata' value='<?php echo json_encode($brDate);?>' />

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
                        <!-- <input type="hidden" name="borrow_id" value=""> -->
                        <a class="btn btn-warning" href="<?php echo site_url('Showdata/userStatusShow');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
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
        var editbrDate = 
          $("#borrowDatedata").val();
            editbrDate = JSON.parse(editbrDate);
          $("#borrowDate" ).autocomplete({
              source: editbrDate
          }); 

          var editbrNum = 
          $("#numberdata").val();
            editbrNum = JSON.parse(editbrNum);
          $("#number" ).autocomplete({
              source: editbrNum
          }); 
        });
</script>
</body>
</html>
