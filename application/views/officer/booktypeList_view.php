<!-- แสดงข้อมูลการยืมทั้งหมด -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>ระบบจัดการยืม-คืนหนังสือ</title>	

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
                          <h2>รายละเอียดข้อมูลประเภทหนังสือ</h2>
                        </div>
                        <div class="col-md-3">
                          <div align="right">
                            <a class="btn btn-primary" href="<?php echo site_url('Bookdata/index4');?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                          </div>
                        </div>
                      </div>
                    <!-- </div>
                  </div> -->
                  <!-- Borrowdata/searchdata -->
                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Borrowdata/searchdatapage'); */?>" method="post"> -->
                    <!-- <div class="col-auto">
                        <p class="fs-2">รายละเอียดข้อมูลการยืม-คืน</p>
                    </div> -->
                    <!-- <div class="col-md-4 offset-md-4">
                      <div class="col-auto">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="key" value="<?php /*echo set_value('key');*/ ?>">  
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="<?php/* echo site_url('Borrowdata/nextPage'); */?>" class="btn btn-primary">Show All</a>
                      </div>
                    </div> -->
                    
                  <!-- </form> -->
                <!-- </div> -->
                <hr>
                <div class="table-responsive">
                  <table id="Table" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style ="width: 5%">No.</th>
                            <th>ชื่อประเภทหนังสือ</th>
                            <th style ="width: 2%">ใช้งาน</th>
                            <th style ="width: 2%">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; $page = 0;?>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php foreach ($query as $rw) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $page+$i+=1;?></td> 
                            <td><?php echo $rw->bookType_name;?></td> 
                            <td>
                                <?php if ($rw->booktypeStatus_id == 1){ ?>
                                  <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                                <?php }else{?>
                                  <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                                <?php } ?>
                            </td>

                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            <td><a class="btn btn-warning" href="<?php echo site_Url('Bookdata/editbooktype/').$rw->bookType_id;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
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
          let table = new DataTable('#Table');
        </script>
</body>
</html>
