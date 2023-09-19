<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <title>ระบบจัดการยืม-คืนหนังสือ</title>	

  <!-- dataTable -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>
<body>
    <div class="container font"> 
    <?php include('officerNavbar.php');?>    
          <div class="row">
          <?php include('officerMenu.php');?>   
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <div class="container">
                  <div class="justify-content-between">
                    <div class="container"> -->
                      <!-- <h1>menu</h1> -->
                      <div class="row">
                        <div class="col">
                          <h2>รายละเอียดตารางงานเจ้าหน้าที่</h2>
                        </div>
                        <div class="col-md-3">
                          <div align="right">
                          <a class="btn btn-primary" href="<?php echo site_url('Staffdata/index2');?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                          </div>
                        </div>
                      </div>
                    <!-- </div>
                  </div> -->

                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Staffdata/searchdata');*/ ?>" method="post">
                  <div class="col-auto">
                    <p class="fs-2">รายละเอียดข้อมูลตารางงานเจ้าหน้าที่</p>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form> -->
                  <hr>
                <!-- </div> -->
              <table id="staffTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 5%">No.</th>
                              <th style ="width: 20%">ชื่อ-นามสกุล</th>
                              <th style ="width: 20%">รายละเอียดงาน</th>
                              <th style ="width: 10%">วันที่</th>
                              <th style ="width: 10%">เวลาเริ่ม</th>
                              <th style ="width: 10%">เวลาสิ้นสุด</th>
                              <th style ="width: 5%">แก้ไข</th> 
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i=0;$page=0; ?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <td><?php echo $page+$i+=1;?></td>
                              <td><?php echo $row->name." ".$row->surename;?></td> 
                              <td><?php echo $row->WorkDetails; ?></td>
                              <td><?php echo date('d/m/Y',strtotime($row->workDate));?></td>
                              <td><?php echo $row->workStart_time; ?></td>
                              <td><?php echo $row->workEnd_time; ?></td>

                              <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                              <td><a class="btn btn-warning" href="<?php echo site_Url('Staffdata/edit/').$row->work_id;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>

                </table>
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Officerdata'); ?>" role="button">ย้อนกลับ</a>
                </div>
              </div>             
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>  
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#staffTable');
        </script>
</body>
</html>
