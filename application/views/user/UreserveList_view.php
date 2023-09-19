<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>	

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->
       
</head>
<body>
    <div class="container font">
    <?php include('userNavbar.php');?>
          <div class="row">
          <?php include('userMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100"> 

                <!-- <div class="justify-content-between">
                  <div class="container font"> -->
                    <!-- <h1>menu</h1> -->
                    <div class="row">
                      <div class="col">
                        <h2>รายละเอียดการจอง</h2>
                      </div>
                      <div class="col">
                        <div align="right">
                          <a class="btn btn-primary" href="<?php echo site_url('Reservedata/index3');?>" role="button">จองหนังสือ</a>
                        </div>
                      </div>
                    </div>
                  <!-- </div>
                </div>  -->

               <!-- <p class="fs-2">รายละเอียดการจอง</p> -->
               <hr>
                <table id="UserRSTable" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style ="width: 2%">No.</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>วันที่จอง</th>
                            <th>วันที่นัดรับ</th>
                            <th style ="width: 2%">สถานะ</th>
                            <!-- <th>แก้ไข</th> -->
                            <th>ยกเลิก</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; ?>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php foreach ($showrs as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $i+=1;?></td> 
                            <td><?php echo $row->bookName;?></td> 
                            <td><?php echo $row->name." ".$row->surename;?></td> 
                            <td><?php echo date('d/m/Y',strtotime($row->reserveDate));?></td>
                            <td>
                              <?php 
                                if($row->receiveDate != null){
                                  echo date('d/m/Y',strtotime($row->receiveDate));
                                }else{
                                  echo '';
                                }
                              ?>
                            </td>  
                            <td>
                              <?php if($row->reserveStatus_id == '1'){?>
                                <div class="badge bg-success text-wrap" style="width: 4rem;">อนุมัติ</div>
                              <?php }else if($row->reserveStatus_id == '2'){ ?>
                                <div class="badge bg-danger text-wrap" style="width: 4rem;">ไม่อนุมัติ</div>
                              <?php }else if($row->reserveStatus_id == '3'){ ?>
                                <div class="badge bg-warning text-wrap" style="width: 4rem;">รอพิจารณา</div>
                              <?php }else if($row->reserveStatus_id == '4'){ ?>
                                <div class="badge bg-secondary text-wrap" style="width: 4rem;">ยกเลิก</div>
                              <?php } ?>
                            </td> 
                            <td>
                              <?php if($row->reserveStatus_id == 3){?>
                                <a class="btn btn-warning" onclick="return confirm('ยืนยันการยกเลิก')" href="<?php echo site_Url('Reservedata/cancelRs/').$row->reserve_id;?>">ยกเลิก</a>
                            
                              <?php }else {?>
                                  <a class="btn btn-light" disabled>ยกเลิก</a>
                              <?php } ?>
                            </td>

                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->  
                            <!-- <td><a class="btn btn-warning" onclick="return confirm('ยืนยันการยกเลิก')" href="<?php /*echo site_Url('Reservedata/cancle/').$row->reserve_id;*/?>">ยกเลิก</a></td>   -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="<?php echo site_url('Userdata');?>" role="button">ย้อนกลับ</a>
                    </div>
                </div>
              </div>

            </div>
          </div>
          <?php include('footer_user.php');?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#UserRSTable');
        </script>
</body>
</html>
