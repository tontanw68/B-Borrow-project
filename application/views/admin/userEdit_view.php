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
                <?php /*echo heading('แก้ไขข้อมูลผู้ใช้',2);*/?>
                <div class="row">
                  <div class="col">
                    <h2>แก้ไขข้อมูลผู้ใช้</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('insertdata/editdata'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผู้ใช้</label>
                    <div class="col-sm-2">
                      <!-- readonly ให้ส่งข้อมูลไปด้วยแต่ไม่ให้แก้ไขแต่ถ้าเป็น disable จะไม่ส่งข้อมูลไป -->
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $query->user_id;?>" readonly>
                    <input type='hidden' id='aduser_IDdata' value='<?php echo json_encode($adedituserid2);?>' />
                    
                  </div>
                  <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo $query->user;?>">
                    <input type='hidden' id='aduser_data' value='<?php echo json_encode($adedituser2);?>' />

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

                      <input type="password" class="form-control" id="" name="password" value="<?php echo $query->password;?>">
                      <?php if(form_error('password') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('password'); ?><br><?php echo form_error('password');?></span>
                      <?php } ?> 

                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">คำนำหน้า</label>
                      <div class="col-sm-2">

                      <!-- <input type="password" class="form-control" id="" name="prename" value=""> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="prename" value="" required>
                        <option selected><?php echo $query->prename;?></option>
                        <optgroup label="เลือกข้อมูล">
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

                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $query->name;?>">
                      <input type='hidden' id='adname_data' value='<?php echo json_encode($adeditname2);?>' />
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

                    <input type="text" class="form-control" id="surename" name="surename" value="<?php echo $query->surename;?>">
                    <input type='hidden' id='adsername_data' value='<?php echo json_encode($adeditsername2);?>' />
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

                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $query->email;?>">
                    <input type='hidden' id='ademail_data' value='<?php echo json_encode($adeditemail2);?>' />
                    <?php if(form_error('email') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('email'); ?><br><?php echo form_error('email');?></span>
                    <?php } ?> 

                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">

                    <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="<?php echo $query->phoneNo;?>">
                    <input type='hidden' id='adphone_data' value='<?php echo json_encode($adeditphone2);?>' />
                    <?php if(form_error('phoneNo') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('phoneNo'); ?><br><?php echo form_error('phoneNo');?></span>
                    <?php } ?> 

                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">ประเภทหนังสือที่ชอบ</label>
                    <div class="col-sm-3">

                    <!-- <input type="text" class="form-control" id="" name="bookType" value="<?php /*echo $query->bookType_id;*/ ?>"> -->

                    <select class="form-select" id="inputGroupSelect01" type="text" name="bookType" value="" required>
                        <option selected value="<?php echo $query->bookType_id;?>"><?php echo $query->bookType_name;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($booktype as $row){?> 
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

                    <!-- <input type="text" class="form-control" id="" name="type" value=""> -->
                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="type" value="" required>
                        <option selected value="<?php /*echo $query->type_id;?>"><?php echo $query->type;*/?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">ผู้ดูแลระบบ</option>
                        <option value="2">เจ้าหน้าที่</option>
                        <option value="3">สมาชิก</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="type" value="" required>
                        <option selected value="<?php echo $query->type_id;?>"><?php echo $query->type;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($typedt as $row){?> 
                            <option value="<?php echo $row->type_id;?>"><?php echo $row->type;?></option>
                          <?php } ?>
                        </optgroup>
                      </select>
                      <?php if(form_error('type') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('type'); ?><br><?php echo form_error('type');?></span>
                      <?php } ?> 

                  </div>
                  <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สิทธิ์การเข้าใช้งาน</label>
                    <div class="col-sm-3">

                    <!-- <input type="text" class="form-control" id="" name="allow" value=""> -->
                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="allow" value="" required>
                        <option selected value="<?php /*echo $query->allow_id;?>"><?php echo $query->allowd;*/?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">เข้าใช้งานได้</option>
                        <option value="2">เข้าใช้งานไม่ได้</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="allow" value="" required>
                        <option selected value="<?php echo $query->allow_id;?>"><?php echo $query->allowd;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($allowdata as $row){?> 
                            <option value="<?php echo $row->allow_id;?>"><?php echo $row->allowd;?></option>
                          <?php } ?>
                        </optgroup>
                      </select>
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
                    <!-- <input type="text" class="form-control" id="" name="userType" value="">   -->
                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="userType" value="" required>
                        <option selected value="<?php /*echo $query->userStatus_id;?>"><?php echo $query->userStatus_type;*/?></option>
                        <option value="">เลือกข้อมูล</option>
                        <option value="1">คุณครู</option>
                        <option value="2">นักเรียน</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="userType" value="" required>
                        <option selected value="<?php echo $query->userStatus_id;?>"><?php echo $query->userStatus_type;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($statusdt as $row){?> 
                            <option value="<?php echo $row->userStatus_id;?>"><?php echo $row->userStatus_type;?></option>
                          <?php } ?>
                        </optgroup>
                    </select>
                      <?php if(form_error('userType') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('userType'); ?><br><?php echo form_error('userType');?></span>
                      <?php } ?> 

                  </div>
                  <div class="col" style="color: red; font-size: 25px;">*</div> 
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">

                        <!-- เมื่อ form_validation == FALSE แล้วแก้ไขข้อมูลใหม่อีกครั้งจะไม่ส่งค่า user_id ไปแก้ไขด้วยทำให้แก้ไขข้อมูลไม่ได้ -->
                        <!-- <input type="hidden" name="user_id" value=""> -->

                        <a class="btn btn-warning" href="<?php echo site_url('Showdata/userShow1');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
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
        var adedituserid2 = $("#aduser_IDdata").val();
        adedituserid2 = JSON.parse(adedituserid2);
        $("#id" ).autocomplete({
            source: adedituserid2
        }); 
        var adedituser2 = $("#aduser_data").val();
        adedituser2 = JSON.parse(adedituser2);
        $("#user" ).autocomplete({
            source: adedituser2
        });
        var adeditname2 = $("#adname_data").val();
        adeditname2 = JSON.parse(adeditname2);
        $("#name" ).autocomplete({
            source: adeditname2
        });
        var adeditsername2 = $("#adsername_data").val();
        adeditsername2 = JSON.parse(adeditsername2);
        $("#surename" ).autocomplete({
            source: adeditsername2
        });
        var adeditemail2 = $("#ademail_data").val();
        adeditemail2 = JSON.parse(adeditemail2);
        $("#email" ).autocomplete({
            source: adeditemail2
        });
        var adeditphone2 = $("#adphone_data").val();
        adeditphone2 = JSON.parse(adeditphone2);
        $("#phoneNo" ).autocomplete({
            source: adeditphone2
        });
        });
        </script>
</body>
</html>
