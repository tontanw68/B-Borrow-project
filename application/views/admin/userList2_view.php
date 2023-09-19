<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <title>ระบบจัดการยืม-คืนหนังสือ</title>	
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->


</head>
<body>
    <div class="container font"> 
      <?php include('adminNavbar.php');?>    
          <div class="row">
          <?php include('adminMenu.php');?> 
          <!-- <div class="col-md-2">
              <div class="card py-3 px-3 mt-3">
                <h2 class="text-center" id="fr">menu</h2>
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-dark text-white list-group-item-action">A second link item</a>
                  <a href="#" class="list-group-item list-group-item-dark list-group-item-action">A third link item</a>
                  <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                  <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
                </div>
              </div>
            </div> -->
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100"> 
                <!-- <div class="justify-content-between">
                    <div class="container"> -->
                      <!-- <h1>menu</h1> -->
                      <div class="row">
                        <div class="col-md-9">
                          <h2>รายละเอียดข้อมูลผู้ใช้</h2>
                        </div>
                        <div class="col">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-primary" href="<?php echo site_url('Insertdata');?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                            <a class="btn btn-primary" href="<?php echo site_url('Insertdata/index2');?>" role="button">import file</a>
                          </div>
                        </div>
                      <!-- </div>
                    </div> -->
                  </div> 
                <!-- <div class="container">
                  <form class="row g-2" role="search" action="<?php /*echo site_url('insertdata/searchdata');*/ ?>" method="post">
                  <div class="col-auto">
                    <p class="fs-2">รายละเอียดข้อมูลผู้ใช้</p>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form>
                  <hr><br>
                </div> -->
                <hr>
                <table id="myTable" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th stype="width : 2%">No.</th>
                            <th>รหัสประจำตัว</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เบอร์โทร</th>
                            <!-- <th>email</th> -->
                            <!-- <th>user</th>
                            <th>password</th> -->
                            <th>ประเภท</th>
                            <th>สถานภาพ</th>
                            <th stype="width : 10%">สิทธิ์การเข้าใช้งาน</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; $page = 0;?>
                        <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                        <?php foreach ($query as $row) {?>
                        <tr>
                            <td><?php echo $page+$i+=1;?></td> 
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $row->user_id;?></td> 
                            <td><?php echo $row->prename; ?></td>
                            <td><?php echo $row->name." ".$row->surename; ?></td>
                            <td><?php echo $row->phoneNo; ?></td>
                            <td><?php echo $row->type; ?></td>
                            <td><?php echo $row->userStatus_type; ?></td>
                            <td>
                              <?php if(	$row->allow_id == 1){ ?>
                                <div class="badge bg-success text-wrap" style="width: 6rem;"><?php echo $row->allowd; ?></div>
                              <?php }else if($row->allow_id == 2){ ?>
                                <div class="badge bg-danger text-wrap" style="width: 6rem;"><?php echo $row->allowd; ?></div>
                              <?php } ?>
                            </td>
                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            <td><a class="btn btn-warning" href="<?php echo site_Url('insertdata/edit/').$row->user_id;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Admindata'); ?>" role="button">ย้อนกลับ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myTable');
        </script>
      <?php include('footer_admin.php');?>
</body>
</html>
