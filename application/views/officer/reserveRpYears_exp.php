<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=รายงานการจองตามปี.xls");
header("Pragma: no-cache");
header("Expires: 0");
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
      <?php /*include('officerNavbar.php');*/?>     
          <div class="row">
          <?php /*include('officerMenu.php');*/?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <h1>menu</h1> -->
                <div class="row">
                    <div class="col">
                        <!-- <h2>รายงานการจองตามปี</h2> -->
                        <p class="fs-6">รายงานการจองตามปี ปี พ.ศ. <?php $date = date("Y",strtotime("now")); echo $datenew = $date + 543;?></p>
                        <p class="fs-4">ชื่อสถานศึกษา : โรงเรียนห้วยเม็กราษฎร์นุกูล</p>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 2%">No.</th>
                              <th>ปีที่</th>
                              <th>จำนวนการจอง</th>
                              <th>อนุมัติ</th>
                              <th>ไม่อนุมัติ</th>
                              <th>รอพิจารณา</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;$page=0;?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <td><?php echo $page+$i+=1;?></td> 
                              <td><?php echo $row->rsY;?></td> 
                              <td><?php echo $row->rsYeartotal." รายการ"; ?></td>
                              <td><?php echo $row->ex1." รายการ"; ?></td>
                              <td><?php echo $row->ex2." รายการ"; ?></td>
                              <td><?php echo $row->ex3." รายการ"; ?></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                </table>
                </div>
                <!-- <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="<?php /*echo site_url('Report/reserveRp');*/?>" role="button">ยอนกลับ</a>
                    </div>
                </div> -->
              </div>
              
            </div>
          </div>
        </div>
        <?php /*include('footer_officer.php');*/?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myTable');
        </script>
</body>
</html>
