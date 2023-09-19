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
              <?php echo heading('รายละเอียดข้อมูลหนังสือ',2);?>
              <hr><br>
              <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>รูปภาพ</th>
                              <th>ชื่อหนังสือ</th>
                              <th>ผู้แต่ง</th>
                              <th>ประเภท</th>
                              <th>สถานะ</th>
                              <th>แก้ไข</th> 
                          </tr>
                      </thead>
                      <tbody>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <th>
                                <img src="<?php echo base_url('img');?>/<?php echo $row->image; ?>" width="100px" >
                              </th>
                              <th><?php echo $row->bookName;?></th> 
                              <th><?php echo $row->author; ?></th>
                              <th><?php echo $row->bookType_name; ?></th>
                              <th><?php echo $row->bookStatus; ?></th>

                              <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                              <td><a href="<?php echo site_Url('Bookdata/edit/').$row->book_id;?>">edit</a></td>
                          </tr>
                          <?php } ?>
                      </tbody>

                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <!-- <a class="btn btn-primary" href="" role="button">ยกเลิก</a> -->
                  <a class="btn btn-primary" href="<?php echo site_url('Bookdata/index2');?>" role="button">เพิ่ม</a>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
</body>
</html>
