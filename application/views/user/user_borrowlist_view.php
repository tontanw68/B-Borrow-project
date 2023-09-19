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
      <?php include('userNavbar.php');?>   
          <div class="row">
          <?php include('userMenu.php');?>
            <div class="col-md-9">  
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <div class="container"> -->
                    <!-- <div class="justify-content-between">
                        <div class="container"> -->
                            <!-- <h1>menu</h1> -->
                            <div class="row">
                              <div class="col">
                                  <h2>รายละเอียดข้อมูลการยืม-คืน</h2>
                              </div>
                            <!-- <div class="col">
                                <div align="right">
                                <a class="btn btn-primary" href="<?php /*echo site_url('Borrowdata');*/?>" role="button">เพิ่ม</a>
                                </div>
                            </div> -->
                            </div>
                        <!-- </div>
                    </div> -->
                <hr>
                <div class="row">
                <div class="col-auto">
                  <form action="<?php echo site_url ('Borrowdata/userBorrowpageS');?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">วันที่ยืมเริ่ม</label>
                    </div>
                    <div class="col-auto">
                      <input type="date" id="" name="brStart" class="form-contror" value="" required>
                    </div>
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">วันที่ยืมสิ้นสุด</label>
                    </div>
                    <div class="col-auto">
                      <input type="date" id="" name="brEnd" class="form-contror" required>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-info">ค้นหา</button>
                    </div>
                  </div>
                  </form>
                  </div>

                  <div class="col-auto">
                    <form action="<?php echo site_url ('Borrowdata/userBorrowpage');?>" method="post">
                      <div class="col-auto">
                        <button type="" class="btn btn-secondary">ล้างการค้นหา</button>
                      </div>
                    </form>
                  </div>
	              </div>
                
                  <?php 
                    $k = $this->input->post('brStart');
                    if($k != ''){?>
                        <p class="fs-5">ผลการค้นหา วันที่"
                        <?php $key1 = $this->input->post('brStart');
                        $key2 = $this->input->post('brEnd');
                        echo date('d/m/Y',strtotime($key1))." ถึง ".date('d/m/Y',strtotime($key2));?> "</p>
                    <?php }else{
                        echo "";
                    }?>
                
                <div class="table-responsive">
                  <table id="myBorrowTable2" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style ="width: 2px">No.</th>
                            <th>รหัสผู้ใช้</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ชื่อหนังสือ</th>
                            <th>วันที่ยืม</th>
                            <!-- <th>จนท.บริการการยืม</th> -->
                            <th>กำหนดส่ง</th>
                            <th style ="width: 2%">คืนแล้ว</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; $page = 0;?>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php foreach ($results as $rw) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $page+$i+=1;?></td> 
                            <td><?php echo $rw->user_id;?></td> 
                            <td><?php echo $rw->name." ".$rw->surename;?></td> 
                            <td><?php echo $rw->bookName;?></td> 
                            <!-- แสดงข้อมูลต่อกัน -->
                            <td><?php echo date('d/m/Y',strtotime($rw->borrowDay));?></td> 
                            <!-- <td><?php /*echo $rw->officer_borrow;*/?></td> -->
                            <td><?php echo date('d/m/Y',strtotime($rw->returnDay)); ?></td>                       
                            <td>
                              <?php if ($rw->borrowStatus_id == 1){ ?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                              <?php }else{?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                              <?php } ?>
                            </td>
                            
                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            <!-- <td><a class="btn btn-warning" href="<?php /*echo site_Url('').$rw->borrow_id;*/?>">แก้ไข</a></td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>

                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a class="btn btn-primary" href="" role="button">ถอยกลับ</a>
                  <a class="btn btn-primary" href="" role="button">ยืม controller Borrowdata</a>
                </div> -->
                
                <!-- total and pagination original-->
                <!-- <div class="row">
                  <nav aria-label="Page navigation example">
                    <div class="dataTables_paginate_simple_numbers" id="" >Total <?php /*echo $total_rows;*/ ?></div>
                    <ul class="pagination justify-content-end">
                      <div class="pagination justify-content-end" id="" role="status" aria-live="polite"><?php /*echo $link;*/ ?></div>
                    </ul>
                  </nav>
                </div> -->
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Userdata'); ?>" role="button">ย้อนกลับ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('footer_user.php');?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myBorrowTable2');
        </script>
</body>
</html>
