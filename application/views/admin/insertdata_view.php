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
                <!-- <p class="fs-2">เพิ่มข้อมูลผู้ใช้</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลผู้ใช้</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('insertdata/adddata'); ?>" method="post">
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประจำตัว</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo set_value('id'); ?>" required>
                    <input type='hidden' id='user_IDdata' value='<?php echo json_encode($aduserid);?>' />
                    <!-- <span class="fr"><?php /*echo form_error('id');*/?></span> -->

                    <?php if(form_error('id') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('id'); ?><br><?php echo form_error('id');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo set_value('user'); ?>" required>
                    <input type='hidden' id='aduser_data' value='<?php echo json_encode($aduser);?>' />
                    <!-- <span class="fr"><?php /*echo form_error('user');*/ ?></span> -->

                    <?php if(form_error('user') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('user'); ?><br><?php echo form_error('user');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่าน</label>
                      <div class="col-sm-6">
                      <input type="password" class="form-control" id="" name="password" value="<?php echo set_value('password'); ?>" required>
                      <!-- <span class="fr"><?php /*echo form_error('password');*/ ?></span> -->

                      <?php if(form_error('password') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('password'); ?><br><?php echo form_error('password');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">คำนำหน้า</label>
                      <div class="col-sm-3">
                      <!-- <input type="text" class="form-control" id="" name="prename" required>  -->
                      <!-- <div class="input-group mb-3"> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="prename" value="" required>
                        <option selected><?php echo set_value('prename');?></option>
                        <optgroup label="เลือกข้อมูล">
                          <option value="เด็กหญิง">เด็กหญิง</option>
                          <option value="เด็กชาย">เด็กชาย</option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        </optgroup>
                      </select>
                      <!-- <span class="fr"><?php /*echo form_error('prename');*/?></span> -->

                      <?php if(form_error('prename') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('prename'); ?><br><?php echo form_error('prename');?></span>
                      <?php } ?> 
                    <!-- </div> -->
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                      <label for="inputName" class="col-sm-2 col-form-label">ชื่อ</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required>
                      <input type='hidden' id='adname_data' value='<?php echo json_encode($adname);?>' />
                      <!-- <span class="fr"><?php /*echo form_error('name');*/?></span> -->

                      <?php if(form_error('name') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('name'); ?><br><?php echo form_error('name');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="surename" name="surename" value="<?php echo set_value('surename'); ?>" required>
                    <input type='hidden' id='adsername_data' value='<?php echo json_encode($adsername);?>' />
                    <!-- <span class="fr"><?php /*echo form_error('surename');*/?></span> -->

                    <?php if(form_error('surename') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('surename'); ?><br><?php echo form_error('surename');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">อีเมล</label>
                    <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                    <input type='hidden' id='ademail_data' value='<?php echo json_encode($ademail);?>' />
                    <!-- <span class="fr"><?php /*echo form_error('email');*/?></span> -->

                    <?php if(form_error('email') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('email'); ?><br><?php echo form_error('email');?></span>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="<?php echo set_value('phoneNo'); ?>">
                    <input type='hidden' id='adphone_data' value='<?php echo json_encode($adphone);?>' />
                    <!-- <span class="fr"><?php /*echo form_error('phoneNo');*/?></span> -->

                    <?php if(form_error('phoneNo') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('phoneNo'); ?><br><?php echo form_error('phoneNo');?></span>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="" name="bookType" value="2">
                    <!-- <span class="fr"><?php /*echo form_error('bookType');*/?></span> -->

                    <?php if(form_error('bookType') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookType'); ?><br><?php echo form_error('bookType');?></span>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">ประเภท</label>
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="type" required> -->
                      <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="type" value="" required>
                        <option selected><?php /*echo set_value('type'); */?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">ผู้ดูแลระบบ</option>
                        <option value="2">เจ้าหน้าที่</option>
                        <option value="3">สมาชิก</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="userType" value="" required>
                        <option selected value="">-เลือกข้อมูล-</option>
                          <?php foreach($typedt as $row){?> 
                            <option value="<?php echo $row->type_id;?>"><?php echo $row->type;?></option>
                          <?php } ?>
                      </select>
                      <!-- <span class="fr"><?php /*echo form_error('type');*/?></span> -->

                      <?php if(form_error('userType') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userType'); ?><br><?php echo form_error('userType');?></span>
                      <?php } ?>
                  </div>
                  <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สิทธิ์การเข้าใช้งาน</label>
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="allow" required> -->
                      <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="allow" value="" required>
                        <option selected value="<?php /*echo $query->allow_id;?>"><?php echo set_value('allow'); */?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">เข้าใช้งานได้</option>
                        <option value="2">เข้าใช้งานไม่ได้</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="allow" value="" required>
                        <option selected value="">-เลือกข้อมูล-</option>
                          <?php foreach($allowdata as $row){?> 
                            <option value="<?php echo $row->allow_id;?>"><?php echo $row->allowd;?></option>
                          <?php } ?>
                      </select>
                      <!-- <span class="fr"><?php /*echo form_error('allow');*/ ?></span> -->

                      <?php if(form_error('allow') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('allow'); ?><br><?php echo form_error('allow');?></span>
                      <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สถานภาพ</label>
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="userType" required> -->
                      <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="userType" value="" required>
                        <option selected><?php /*echo set_value('userType'); */?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">คุณครู</option>
                        <option value="2">นักเรียน</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="userStatus" value="" required>
                        <option selected value="">-เลือกข้อมูล-</option>
                          <?php foreach($statusdt as $row){?> 
                            <option value="<?php echo $row->userStatus_id;?>"><?php echo $row->userStatus_type;?></option>
                          <?php } ?>
                      </select>
                      <!-- <span class="fr"><?php /*echo form_error('userType');*/ ?></span> -->

                      <?php if(form_error('userStatus') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userStatus'); ?><br><?php echo form_error('userStatus');?></span>
                      <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/userShow1');?>" role="button">ยกเลิก</a>
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
        var brbookID = $("#user_IDdata").val();
          brbookID = JSON.parse(brbookID);
        $("#id" ).autocomplete({
            source: brbookID
        }); 
        var aduser = $("#aduser_data").val();
        aduser = JSON.parse(aduser);
        $("#user" ).autocomplete({
            source: aduser
        });
        var adname = $("#adname_data").val();
        adname = JSON.parse(adname);
        $("#name" ).autocomplete({
            source: adname
        });
        var adsername = $("#adsername_data").val();
        adsername = JSON.parse(adsername);
        $("#surename" ).autocomplete({
            source: adsername
        });
        var ademail = $("#ademail_data").val();
        ademail = JSON.parse(ademail);
        $("#email" ).autocomplete({
            source: ademail
        });
        var adphone = $("#adphone_data").val();
        adphone = JSON.parse(adphone);
        $("#phoneNo" ).autocomplete({
            source: adphone
        });
        });
        </script>
</body>
</html>
