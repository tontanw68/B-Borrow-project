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
    <?php include('userNavbar.php');?>
    </div>
    <div class="container">     
          <div class="row">
            <div class="col-md-12">
              <div class="card py-3 px-5 mt-3">  

                <div class="container">
                  <form class="row g-2" role="search" action="<?php echo site_url('Borrowdata/Usearchdata'); ?>" method="post">
                  <div class="col-auto">
                    <!-- <h1>menu</h1> -->
                    <p class="fs-2">รายละเอียดข้อมูลการยืม-คืน</p>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form>
                  <hr><br>
                </div>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        
                        <?php foreach ($query as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <th><?php echo $i+=1;?></th> 
                            <th><?php echo $row->book_name;?></th> 
                            <th><?php echo $row->book_type;?></th> 

                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <!-- <a class="btn btn-primary" href="" role="button">ถอยกลับ</a> -->
                 
                </div>
                
              </div>
            </div>
          </div>
        </div>
</body>
</html>
