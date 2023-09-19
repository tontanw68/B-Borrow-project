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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
                      <h2>รายละเอียดข้อมูลการยืม-คืนหนังสือ</h2>
                    </div>
                    <div class="col-md-3">
                      <div align="right">
                        <a class="btn btn-primary" href="<?php echo site_url('Borrowdata/fieldUs'); ?>" role="button">ยืมหนังสือ</a>
                      </div>
                    </div>
                  </div>
                 <!-- </div>
                </div> -->

                  <!-- <div class="d-flex justify-content-end">
                    <form class="d-inline-flex p-2" role="search" action="<?php /*echo site_url('Borrowdata/searchdatapage');*/ ?>" method="post">
                        <p class="fs-5">ค้นหา</p>&nbsp;
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key" value="<?php /*echo set_value('key');*/ ?>">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                  </div> -->

                  <!-- Borrowdata/searchdata -->
                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Borrowdata/searchdatapage');*/ ?>" method="post">
                    <div class="col-auto">
                        <p class="fs-2">ค้นหา</p>
                    </div>
                    <div class="col-md-4 offset-md-4">
                      <div class="col-auto">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="key" value="<?php /*echo set_value('key');*/ ?>">  
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="<?php /*echo site_url('Borrowdata/nextPage');*/ ?>" class="btn btn-primary">Show All</a>
                      </div>
                    </div>
                  </form> -->
                <!-- </div> -->
                <hr>
                <div class="table-responsive">
                  <table id="myBorrowTable" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th>No.</th>
                            <!-- <th>รหัสผู้ใช้</th> -->
                            <th>ชื่อ-นามสกุล</th>
                            <th>ชื่อหนังสือ</th>
                            <th>วันที่ยืม</th>
                            <th>กำหนดส่ง</th>
                            <th style ="width: 2px">คืนแล้ว</th>
                            <th style ="width: 5%">แก้ไข</th>
                            <th>คืน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; $page = 0;?>
                        <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                        <?php foreach ($results as $row) {?>
                        <tr>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $page+$i+=1;?></td> 
                            <!-- <td><?php/* echo $row->user_id;*/?></td>  -->
                            <td><?php echo $row->name." ".$row->surename;?></td> 
                            <td><?php echo $row->book_id." ".$row->bookName;?></td> 
                            <!-- แสดงข้อมูลต่อกัน -->
                            <td><?php echo date('d/m/Y',strtotime($row->borrowDay));?></td> 
                            <td><?php echo date('d/m/Y',strtotime($row->returnDay));?></td>
                            <td>
                            <?php 
                              if ($row->borrowStatus_id == 1){ 
                              ?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                              <?php }else{?>
                                <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                                <?php }
                              ?>
                            </td>

                            <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                            <td><a class="btn btn-warning" href="<?php echo site_Url('Borrowdata/edit/').$row->borrow_id;?>"><i class="fa-solid fa-pen-to-square"></a></td>
                            <td>
                              <?php if($row->borrowStatus_id == 2){?>
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rtModal2<?php echo $row->borrow_id;?>">คืน</a>
                            
                              <?php }else {
                                  echo "คืนแล้ว";
                              }?>
                            </td>
                                
                          </tr>
                           <!-- //////////////////////////// -->
                            <!-- The Modal -->
                            <div class="modal" id="rtModal2<?php echo $row->borrow_id;?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="center" style="max-width: 3000px;">
                                            <div class="row g-0">
                                              <!-- FineTypedata/fineCountNew ที่จะแก้ใหม่แต่ไม่แก้แล้ว -->
                                              <form action="<?php echo site_url ('FineTypedata/fineCount'); ?>" method="post">
                                              <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">รหัสการยืม</label>
                                                  <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="" name="borrow_id" value="<?php echo $row->borrow_id?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
                                                  <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="" name="name" value="<?php echo $row->name." ".$row->surename;?>" readonly>
                                                  <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $row->user_id?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">หนังสือ</label>
                                                  <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="" name="book" value="<?php echo $row->book_id." ".$row->bookName;?>" readonly>
                                                  <input type="hidden" class="form-control" id="" name="book_id" value="<?php echo $row->book_id;?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">วันที่ยืม</label>
                                                  <div class="col-sm-4">
                                                  <input type="date" class="form-control" id="" name="borrowDay" value="<?php echo $row->borrowDay;?>" readonly>
                                                  </div>
                                                </div>
                                                <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">กำหนดส่ง</label>
                                                  <div class="col-sm-4">
                                                  <input type="date" class="form-control" id="" name="returnDay" value="<?php echo $row->returnDay;?>" readonly>
                                                  </div>
                                                </div>

                                                  <input type="hidden" class="form-control" id="" name="officer_return" value="<?php echo $_SESSION['id'];?>" readonly>

                                                <div class="mb-3 row">
                                                  <label for="staticEmail" class="col-sm-2 col-form-label">วันคืน</label>
                                                  <div class="col-sm-4">
                                                  <input type="date" class="form-control" id="" name="realreturnDay" value="<?php echo date("Y-m-d",strtotime("now"))?>">
                                                  <?php if(date("Y-m-d",strtotime("now")) > $row->returnDay){
                                                      $row->fineType_id = 1;
                                                  }?>
                                                  </div>
                                                </div>
                                                <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">ประเภทค่าปรับ</label>
                                                <div class="col-sm-4">

                                                  <select class="form-select" id="inputGroupSelect01" type="text" name="fineType" value="">
                                                    <?php if(date("Y-m-d",strtotime("now")) > $row->returnDay){?>
                                                      <option value="1" >เกินกำหนด</option>
                                                    <?php }else{ ?>
                                                      <option selected value="">เลือกข้อมูล</option>
                                                    <?php } ?>
                                                    
                                                    <optgroup label="เลือกข้อมูล">
                                                      <?php foreach ($fineType as $row) { ?>
                                                        <option value="<?php echo $row->fineType_id ; ?>"><?php echo $row->fineType; ?></option>
                                                      <?php } ?>
                                                    </optgroup>
                                                  </select>

                                                  </div>
                                                    <div class="col" style="color: red; font-size: 25px;">***</div>
                                                </div>
                                                <div class="mb-3 row">
                                                  <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                                                  <div class="col-sm-10" align="right">
                                                      <!-- <input type="hidden" name="borrow_id" value=""> -->
                                                      <!-- <a class="btn btn-warning" href="<?php /*echo site_url('Showdata/borrowShow');*/?>" role="button">ยกเลิก</a> -->
                                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                                                      <input class="btn btn-primary" type="submit" value="ยืนยัน">
                                                  </div>
                                                </div>
                                              </form>
                                                <!-- <div class="col-sm-6">
                                                <div class="card-body">
                                                    <h5 class="card-title">คืนหนังสือ</h5>
                                                    <p class="card-text">ชื่อ-นามสกุล<?php /*echo $row->name." ".$row->surename;?></p>
                                                    <p class="card-text">วันที่ยืม<?php echo date('d/m/Y',strtotime($row->borrowDay));?></p>
                                                    <p class="card-text">กำหนดส่ง<?php echo date('d/m/Y',strtotime($row->returnDay));*/ ?></p>
                                                    <hr>
                                                </div> 
                                                </div> -->
                                            </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <!-- <div class="modal-footer">
                                            <a class="btn btn-primary" href="<?php /*echo site_Url('Borrowdata/edit/').$row->borrow_id;*/?>" >แก้ไข</a>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- //////////////////////////// -->
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Officerdata'); ?>" role="button">ย้อนกลับ</a>
                </div>

                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a class="btn btn-primary" href="" role="button">ถอยกลับ</a>
                  <a class="btn btn-primary" href="" role="button">ยืม controller Borrowdata</a>
                </div> -->

                <!-- <div class="row">
                  <nav aria-label="Page navigation example">
                    <div class="dataTables_paginate_simple_numbers" id="" >Total <?php /*echo $total_rows;*/ ?></div>
                    <ul class="pagination justify-content-end">
                      <div class="pagination justify-content-end" id="" role="status" aria-live="polite"><?php /*echo $link;*/ ?></div>
                    </ul>
                  </nav>
                </div> -->

              </div>
            </div>
          </div>
        </div>
        <?php include('footer_officer.php');?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myBorrowTable');
        </script>
</body>
</html>
