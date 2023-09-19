<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <div class="row">
                    <div class="col">
                        <h2>ค่าปรับ</h2>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                <table id="myBorrowTable2" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style="width: 2px">No.</th>
                            <th>รหัสหนังสือ</th>
                            <th>รายละเอียดค่าปรับ</th>
                            <th>ค่าปรับ</th>
                            <th>วันที่ปรับ</th>
                            <th style="width: 2px">ชำระ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php $i=0; ?>
                        <?php foreach ($query as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $i+=1;?></td> 
                            <td><?php echo $row->book_id;?></td> 
                            <td><?php echo $row->fineType;?></td> 
                            <td><?php echo $row->fine;?></td> 
                            <td><?php echo date('d/m/Y',strtotime($row->fineDate))?></td>
                            <td>
                              <?php if($row->fineStatus_id == 1){?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                              <?php }else{ ?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                              <?php }?>  
                            </td>
                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
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
