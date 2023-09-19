<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>ระบบจัดการยืม-คืนหนังสือ</title>
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
               <!-- <p class="fs-2">รายละเอียดการจอง</p> -->
                <div class="row">
                  <div class="col">
                    <h2>รายละเอียดข้อมูลการจอง</h2>
                  </div>
                </div>
               <hr>
                <table id="myTable" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style ="width: 2px">No.</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>วันที่จอง</th>
                            <th>วันที่นัดรับ</th>
                            <th style ="width: 2px">สถานะ</th>
                            <th style ="width: 2px">อนุมัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=0; ?>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php foreach ($showrs as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $i+=1;?></td>
                            <td><?php echo $row->bookName;?></td>
                            <td><?php echo $row->name." ".$row->surename;?></td>
                            <td><?php echo date('d/m/Y',strtotime($row->reserveDate))?></td>
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
                              <?php /*echo $row->reserveStatus;*/
                                  if ($row->reserveStatus_id == '1'){ ?>
                                    <!-- echo "<p style='color: green'>อนุมัติ</p>"; -->
                                    <div class="badge bg-success text-wrap" style="width: 4rem;">อนุมัติ</div>
                                  <?php }elseif ($row->reserveStatus_id == '2'){ ?>
                                    <!-- echo "<p style='color: red'>ไม่อนุมัติ</p>"; -->
                                    <div class="badge bg-danger text-wrap" style="width: 4rem;">ไม่อนุมัติ</div>
                                  <?php }elseif ($row->reserveStatus_id == '3'){ ?>
                                    <!-- echo "<p style='color: darkorange'>รอพิจารณา</p>"; -->
                                    <div class="badge bg-warning text-wrap" style="width: 4rem;">รอพิจารณา</div>
                                  <?php }elseif ($row->reserveStatus_id == '4'){ ?>
                                    <div class="badge bg-secondary text-wrap" style="width: 4rem;">ยกเลิก</div>
                                  <?php }
                                ?>
                            </td>


                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->  
                            <td>
                              <?php if ($row->reserveStatus_id == '4'){ ?>
                                <a class="btn btn-light" disabled>อนุมัติ</a>
                              <?php }else{ ?>
                                <a class="btn btn-warning" href="<?php echo site_Url('Reservedata/edit/').$row->reserve_id;?>">อนุมัติ</a>
                              <?php } ?>
                            </td>  
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
          let table = new DataTable('#myTable');
        </script>
</body>
</html>