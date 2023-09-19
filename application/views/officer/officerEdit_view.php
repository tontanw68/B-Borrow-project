<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>ระบบจัดการยืม-คืนหนังสือ</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
              <div class="card py-3 px-5 mt-10">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">แก้ไขข้อมูลเจ้าหน้าที่</p> -->
                <div class="row">
                  <div class="col">
                    <h2>รายละเอียดข้อมูลเจ้าหน้าที่</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Officerdata/editdata'); ?>" method="post">
                <div class="mb-3 row">
                    <!-- <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผู้ใช้</label> -->
                    <div class="col-sm-3">
                    <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $query->user_id;?>" readonly>
                    <?php if(form_error('user_id') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('user_id'); ?><br><?php echo form_error('user_id');?></span>
                    <?php } ?> 

                    </div>
                  </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประจำตัว</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="" name="id" value="<?php echo $query->id;?>" readonly>
                    <?php if(form_error('id') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('id'); ?><br><?php echo form_error('id');?></span>
                    <?php } ?> 
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                    <div class="col-sm-6">
                    <!-- <input type="text" class="form-control" id="" name="user" value="<?php /*echo $query->user;*/?>"> -->
                    
                    <input type="text" name="user" id="user" class="form-control" value="<?php echo $query->user;?>" required/>
                    <input type='hidden' id='userdata' value='<?php echo json_encode($editUsf_Uname);?>' />

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
                      <input type="password" class="form-control" id="" name="password" value="<?php echo $query->password;?>" required>
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
                      <!-- <input type="text" class="form-control" id="" name="prename" value=""> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="prename" value="" required>
                        <option selected><?php echo $query->prename;?></option>
                        <optgroup label="เลือกข้อมูล">
                        <option value="เด็กหญิง">เด็กหญิง</option>
                        <option value="เด็กชาย">เด็กชาย</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                        </optgroup>
                      </select>
                      <?php if(form_error('prename') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('prename'); ?><br><?php echo form_error('prename');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputName" class="col-sm-2 col-form-label">ชื่อ</label>
                      <div class="col-sm-6">
                      <!-- <input type="text" class="form-control" id="" name="name" value="<?php /*echo $query->name;*/?>"> -->
                      
                      <input type="text" name="name" id="name" class="form-control" value="<?php echo $query->name;?>" required/>
                      <input type='hidden' id='namedata' value='<?php echo json_encode($editUsf_name);?>' />
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
                    <!-- <input type="text" class="form-control" id="" name="surename" value="<?php /*echo $query->surename;*/?>"> -->
                    
                    <input type="text" name="surename" id="surename" class="form-control" value="<?php echo $query->surename;?>" required/>
                    <input type='hidden' id='surenamedata' value='<?php echo json_encode($editUsf_Sname);?>' />
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
                    <!-- <input type="email" class="form-control" id="" name="email" value="<?php /*echo $query->email;*/?>"> -->
                    
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $query->email;?>"/>
                    <input type='hidden' id='emaildata' value='<?php echo json_encode($editUsf_email);?>' />
                    <?php if(form_error('email') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('email'); ?><br><?php echo form_error('email');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">
                    <!-- <input type="text" class="form-control" id="" name="phoneNo" value="<?php /*echo $query->phoneNo;*/?>"> -->
                    
                    <input type="text" name="phoneNo" id="phoneNo" class="form-control" value="<?php echo $query->phoneNo;?>"/>
                    <input type='hidden' id='phoneNodata' value='<?php echo json_encode($editUsf_phone);?>' />
                    <?php if(form_error('phoneNo') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('phoneNo'); ?><br><?php echo form_error('phoneNo');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">ประเภทหนังสือที่ชอบ</label>
                    <div class="col-sm-3">

                    <select class="form-select" id="inputGroupSelect01" type="text" name="bookType" value="" >
                        <option selected value="<?php echo $query->bookType_id;?>"><?php echo $query->bookType_name;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($uBook as $row){?> 
                            <option value="<?php echo $row->bookType_id;?>"><?php echo $row->bookType_name;?></option>
                          <?php } ?>
                        </optgroup>
                    </select>

                    <?php if(form_error('bookType') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookType'); ?><br><?php echo form_error('bookType');?></span>
                    <?php } ?> 
                  </div>
                  <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">ประเภท</label>
                    <div class="col-sm-3">

                    <input type="text" class="form-control" id="" name="typeN" value="<?php echo $query->type;?>" readonly>
                    <input type="hidden" class="form-control" id="" name="type" value="<?php echo $query->type_id;?>" required>

                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="type" value="" >
                        <option selected value="<?php /*echo $query->type_id;?>"><?php echo $query->type;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($typeOption as $row){?> 
                            <option disabled value="<?php echo $row->type_id;?>"><?php echo $row->type;?></option>
                          <?php }*/ ?>
                        </optgroup>
                    </select> -->

                    <?php if(form_error('type') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('type'); ?><br><?php echo form_error('type');?></span>
                    <?php } ?> 
                  </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สิทธิ์การเข้าใช้งาน</label>
                    <div class="col-sm-3">

                    <input type="text" class="form-control" id="" name="allowN" value="<?php echo $query->allowd;?>" readonly>
                    <input type="hidden" class="form-control" id="" name="allow" value="<?php echo $query->allow_id;?>" required>

                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="allow" value="" >
                        <option selected value="<?php /*echo $query->allow_id;?>"><?php echo $query->allowd;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($allowOption as $row){?> 
                            <option disabled value="<?php echo $row->allow_id;?>"><?php echo $row->allowd;?></option>
                          <?php }*/ ?>
                        </optgroup>
                    </select> -->
                    <?php if(form_error('allow') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('allow'); ?><br><?php echo form_error('allow');?></span>
                    <?php } ?> 
                  </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สถานภาพ</label>
                    <div class="col-sm-3">

                    <input type="text" class="form-control" id="" name="userTypeN" value="<?php echo $query->userStatus_type;?>" readonly>
                    <input type="hidden" class="form-control" id="" name="userType" value="<?php echo $query->userStatus_id;?>" required>

                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="userType" value="" >
                      <option selected value="<?php /*echo $query->userStatus_id;?>"><?php echo $query->userStatus_type;?></option>
                      <optgroup label="เลือกข้อมูล">
                        <?php foreach($userOption as $row){?> 
                          <option disabled value="<?php echo $row->userStatus_id;?>"><?php echo $row->userStatus_type;?></option>
                        <?php }*/ ?>
                      </optgroup>
                    </select> -->
                      <?php if(form_error('userType') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userType'); ?><br><?php echo form_error('userType');?></span>
                      <?php } ?> 
                  </div>
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                        <!-- <input type="hidden" name="user_id" value=""> -->
                        <a class="btn btn-warning" href="<?php echo site_url('Officerdata');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน" >
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>
        <!-- autocomplete -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>

        $( function() {
          var editUsf_Uname = 
              $("#userdata").val();
              editUsf_Uname = JSON.parse(editUsf_Uname);
          $("#user" ).autocomplete({
              source: editUsf_Uname
          }); 

          var editUsf_name = 
              $("#namedata").val();
              editUsf_name = JSON.parse(editUsf_name);
          $("#name" ).autocomplete({
              source: editUsf_name
          }); 

          var editUsf_Sname = 
              $("#surenamedata").val();
              editUsf_Sname = JSON.parse(editUsf_Sname);
          $("#surename" ).autocomplete({
              source: editUsf_Sname
          });

          var editUsf_email = 
              $("#emaildata").val();
              editUsf_email = JSON.parse(editUsf_email);
          $("#email" ).autocomplete({
              source: editUsf_email
          });

          var editUsf_phone = 
              $("#phoneNodata").val();
              editUsf_phone = JSON.parse(editUsf_phone);
          $("#phoneNo" ).autocomplete({
              source: editUsf_phone
          });
        });
        </script>
</body>
</html>


