<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>	
</head>
<body>
    <div class="container">
        <?php include('adminNavbar.php');?>
    </div>
    <div class="container">     
          <div class="row">
            <div class="col-md-12">
              <div class="card py-3 px-5 mt-3">  
              <p class="fs-2">รายละเอียดข้อมูลผู้ใช้</p>
              <hr><br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>รหัสประจำตัว</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เบอร์โทร</th>
                            <!-- <th>email</th> -->
                            <!-- <th>user</th>
                            <th>password</th> -->
                            <th>ประเภท</th>
                            <th>สิทธิ์การเข้าใช้งาน</th>
                            <th>สถานะภาพ</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                        <?php foreach ($query as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <th><?php echo $row->id;?></th>
                            <th><?php echo $row->prename; ?></th>
                            <th><?php echo $row->name; ?></th>
                            <th><?php echo $row->surename; ?></th>
                            <th><?php echo $row->phoneNo; ?></th>
                            <th><?php echo $row->type; ?></th>
                            <th><?php echo $row->allowd; ?></th>
                            <th><?php echo $row->userStatus_type; ?></th>

                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            <td><a class="btn btn-warning" href="<?php echo site_Url('insertdata/edit/').$row->user_id;?>">edit</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <!-- <a class="btn btn-primary" href="" role="button">ถอยกลับ</a> -->
                  <a class="btn btn-primary" href="<?php echo site_url('Insertdata');?>" role="button">เพิ่ม</a>
                </div>       
              </div>
            </div>
          </div>
        </div>
</body>
</html>
