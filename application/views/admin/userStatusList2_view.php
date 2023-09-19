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
    <?php include('adminNavbar.php');?>     
          <div class="row">
          <?php include('adminMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <div class="container">
                  <div class="justify-content-between">
                    <div class="container"> -->
                      <!-- <h1>menu</h1> -->
                      <div class="row">
                        <div class="col">
                          <h2>รายละเอียดข้อมูลสถานภาพ</h2>
                        </div>
                        <div class="col">
                          <div align="right">
                            <a class="btn btn-primary" href="<?php echo site_url('UserStatusdata/index2');?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                          </div>
                        </div>
                      </div>
                    <!-- </div>
                  </div> -->
                  <hr>
                  <!-- <div class="d-flex justify-content-end">
                    <form class="d-inline-flex p-2" role="search" action="<?php /*echo site_url('Bookdata/searchdata');*/ ?>" method="post">
                        <p class="fs-5">ค้นหา</p>&nbsp;
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" >
                        <button class="btn btn-success" type="submit">Search</button>
                    </form> -->

                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Bookdata/searchdata');*/ ?>" method="post">
                    <div class="col-auto">
                    <?php /*echo heading('ค้นหา',5);*/?>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form> -->
                <!-- </div> -->
                <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 2%">No.</th>
                              <th>สถานภาพ</th>
                              <th>จำนวนวันที่ยืม/วัน</th>
                              <th>จำนวนเล่ม/เล่ม</th> 
                              <th style ="width: 2%">แก้ไข</th> 
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i=0;$page=0;?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <td><?php echo $page+$i+=1;?></td>
                              <td><?php echo $row->userStatus_type;?></td> 
                              <td><?php echo $row->borrowDate." วัน"; ?></td>
                              <td><?php echo $row->number." เล่ม"; ?></td>
                              
                              <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                              <td><a class="btn btn-warning" href="<?php echo site_Url('UserStatusdata/editUserStatus2/').$row->userStatus_id;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>

                </table>
                </div>
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Admindata'); ?>" role="button">ย้อนกลับ</a>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
        <?php include('footer_admin.php');?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myTable');
        </script>
</body>
</html>
