<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>
  
  <!-- วันที่แบบไทยแต่ปี ค.ศ -->
  <!-- css -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- js -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
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
            <!-- <div class="col-md-3">
              <div class="card py-3 px-3 mt-3">
              <p class="fs-2 text-center">เมนูหลัก</p>
                <div class="d-grid gap-3">
                    <a href="<?php /*echo site_url('login/logout');?>" class="btn btn-primary" onclick="return confirm('ยืนยัน');">ออกจากระบบ</a>
                    <a href="<?php echo site_url('Officerdata/profile');?>" class="btn btn-primary">แก้ไขข้อมูลผู้ใช้</a>
                    <a href="<?php echo site_url('Showdata/bookShow4');?>" class="btn btn-primary">จัดการข้อมูลหนังสือ</a>
                    <a href="<?php echo site_url('showdata/borrowShow');?>" class="btn btn-primary">จัดการข้อมูลการยืม-คืน</a>
                    <a href="<?php echo site_url('');?>" class="btn btn-primary">จัดการข้อมูลการจอง</a>
                    <a href="<?php echo site_url('');?>" class="btn btn-primary">จัดการข้อมูลค่าปรับ</a>
                    <a href="<?php echo site_url('');?>" class="btn btn-primary">จัดการข้อมูลประเภทสถานะภาพ</a>
                    <a href="<?php echo site_url('');?>" class="btn btn-primary">จัดการข้อมูลประเภทหนังสือ</a>
                    <a href="<?php echo site_url('Showdata/staffShow2');?>" class="btn btn-primary">จัดการข้อมูลตารางงานเจ้าหน้าที่</a>
                    <a href="<?php echo site_url('Showdata/announceShow1');*/?>" class="btn btn-primary">จัดการข้อมูลประกาศ</a>
                </div>
              </div>
            </div> -->
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">อนุมัติการจอง</p> -->
                <div class="row">
                  <div class="col">
                    <h2>อนุมัติการจอง</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Reservedata/editdata'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสการจอง</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="reserve_id" value="<?php echo $rsedit->reserve_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสหนังสือ</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="book_id" value="<?php echo $rsedit->book_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสประจำตัว</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" id="" name="user_id" value="<?php echo $rsedit->user_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่จอง</label>
                      <div class="col-sm-4">
                      <input type="date" class="form-control" id="" name="reserveDate" value="<?php echo $rsedit->reserveDate;?>" readonly>
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">อนุมัติ</label>
                    <div class="col-sm-4">
                    <!-- <input type="text" class="form-control" id="" name="allow" required> -->
                      <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="reserveStatus_id" value="" required>
                        <option selected value="<?php /*echo $rsedit->reserveStatus_id;?>"><?php echo $rsedit->reserveStatus;*/?></option>
                        <optgroup label="เลือกข้อมูล">
                            <option value="1">อนุมัติ</option>
                            <option value="2">ไม่อนุมัติ</option>
                        </optgroup>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="reserveStatus_id" value="" required>
                      <option selected value="<?php echo $rsedit->reserveStatus_id; ?>"><?php echo $rsedit->reserveStatus; ?></option>
                      <optgroup label="เลือกข้อมูล">
                        <?php foreach ($rst as $row) { ?>
                          <option value="<?php echo $row->reserveStatus_id; ?>"><?php echo $row->reserveStatus; ?></option>
                        <?php } ?>
                      </optgroup>
                    </select>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">วันที่นัดรับ</label>
                      <div class="col-sm-4">
                      <input type="date" class="form-control" id="" name="receiveDate" value="<?php echo $rsedit->receiveDate;?>" >
                      </div>
                  </div>

                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                        <!-- <input type="hidden" name="borrow_id" value=""> -->
                        <a class="btn btn-warning" href="<?php echo site_url('Showdata/reserveShow');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#receiveDate').datepicker({
            language:'th',
            format:'dd-mm-yyyy',
            yearOffset:543,
            startDate: date_start,
        });
      </script> -->
      <?php include('footer_officer.php');?>
</body>
</html>
