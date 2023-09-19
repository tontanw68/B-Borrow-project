<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>

  <!-- วันที่แบบไทยใหม่ -->
  <!-- css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <!-- <p class="fs-2">คืนหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>คืนหนังสือ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Borrowdata/editdata'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสการยืม-คืน</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="borrow_id" value="<?php echo $query->borrow_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประจำตัว</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="user_id" value="<?php echo $query->user_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่ยืม</label>
                      <div class="col-sm-4">
                      <input type="date" class="form-control" id="" name="borrowDay" value="<?php echo $query->borrowDay;?>" readonly>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันกำหนดส่ง</label>
                      <div class="col-sm-4">
                        <!-- echo $query->returnDay; -->
                      <input type="date" class="form-control" id="" name="returnDay" value="<?php echo $query->returnDay;?>" readonly>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่คืนจริง</label>
                      <div class="col-sm-4">
                        <!-- echo $query->returnDay; -->
                      <input type="date" class="form-control" id="" name="realreturnDay" value="<?php echo $query->realreturnDay; /*echo date("d/m/Y",strtotime("now"))*/ ?>" required>
                      </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">เจ้าหน้าที่การคืน</label>
                    <div class="col-sm-6">

                    <input type="text" class="form-control" id="" name="officer_re" value="<?php echo $_SESSION['name'];?>" required>
                    <input type="hidden" class="form-control" id="" name="officer_return" value="<?php echo $_SESSION['user_id'];?>" required>
                      
                    <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="officer_return" value="" required>
                        <option selected value="<?php /*echo $_SESSION['user_id'];?>"><?php echo $_SESSION['name'];*/ ?></option>
                    </select>  -->
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputName" class="col-sm-2 col-form-label">สถานะ</label>
                      <div class="col-sm-4">
                      <!-- <input type="text" class="form-control" id="" name="borrowStatus" value="" required> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="borrowStatus" value="" required>
                        <option selected value="<?php echo $query->borrowStatus_id;?>"><?php echo $query->borrowStatus;?></option>
                        <optgroup label="เลือกข้อมูล">
                            <option value="1">คืนแล้ว</option>
                            <option value="2">ยังไม่คืน</option>
                        </optgroup>                       
                      </select>
                      <?php if(form_error('borrowStatus') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('borrowStatus'); ?><br><?php echo form_error('borrowStatus');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                        <!-- <input type="hidden" name="borrow_id" value=""> -->
                        <!-- Showdata/borrowShow -->
                        <a class="btn btn-warning" href="<?php echo site_url('Borrowdata/borrowpage');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>
        <!-- </script>
        <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#returnDay').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
        });

        var realrtD = new Date();
        realrtD.setDate(realrtD.getDate());
        $('#realreturnDay').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
        });
      </script> -->
</body>
</html>
