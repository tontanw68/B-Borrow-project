<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <title>ระบบจัดการยืม-คืนหนังสือ</title>	
    <!-- เพื่อให้แสดงดรอปดาว -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
       

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->
    
    <!-- วันที่แบบไทยใหม่ -->
    <!-- css -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <style>
        .center {
          padding: 30px 0;
          border: 1px solid green;
          margin: auto;
          width: 80%;
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
                <div class="row">
                    <div class="col">
                        <h2>รายงานการยืมตามช่วงเวลา</h2>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                  <form action="<?php echo site_url ('Report/reportBrTime');?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">วันเริ่ม</label>
                    </div>
                    <div class="col-auto">
                      <input type="date" id="" name="br_ds" class="form-contror" value="" required>
                    </div>
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">วันสิ้นสุด</label>
                    </div>
                    <div class="col-auto">
                      <input type="date" id="" name="br_de" class="form-contror" required>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-info">ค้นหา</button>
                    </div>
                  </div>
                  </form>

                  
                <!-- <div class="row">
                  <div class="col-sm-10">
                    <form action="" method="port" class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-1">
                            วันเริ่ม
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="ds" class="form-contror" require>
                        </div>
                        <div class="col-sm-1">
                            วันสิ้นสุด
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="de" class="form-contror" require>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-info">ส่ง</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> -->
                
              </div>
              <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="<?php echo site_url('Report/borrowRp');?>" role="button">ยอนกลับ</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>
        <!-- <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#ds').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
        });

        var date_end = new Date();
        date_end.setDate(date_end.getDate());
        $('#de').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_end,
        });
      </script> -->
</body>
</html>
