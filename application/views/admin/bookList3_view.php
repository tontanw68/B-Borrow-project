<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>	
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->

  <style>
    .center {
        padding: 30px 0;
        /* border: 1px solid blue; */
        margin: auto;
        width: 100%;
        box-shadow: 0 0 15px hsla(196,50%,50%,1);
      }
  </style>
</head>
<body>
    <div class="container font"> 
      <?php include('adminNavbar.php');?>    
          <div class="row">
          <?php include('adminMenu.php');?>  
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <div class="container"> -->
                  <div class="row">
                    <div class="col">
                      <h2>รายละเอียดข้อมูลหนังสือ</h2>
                    </div>
                    <div class="col">
                      <div align="right">
                        <a class="btn btn-primary" href="<?php echo site_url('Bookdata/index2');?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                        <a class="btn btn-primary" href="<?php echo site_url('Insertdata/index4');?>" role="button">Upload file</a>
                      </div>
                    </div>
                  </div>
                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Bookdata/searchdata');*/ ?>" method="post">
                  <div class="col-auto">
                    <p class="fs-2">รายละเอียดข้อมูลหนังสือ</p>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form> -->
                  <hr>
                <!-- </div> -->
              <table id="adminBTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 2%">No.</th>
                              <th style ="width: 5%">รูปภาพ</th>
                              <th>ชื่อหนังสือ</th>
                              <th>ผู้แต่ง</th>
                              <th>ประเภท</th>
                              <th style ="width: 5%">สถานะ</th>
                              <!-- <th style ="width: 2%">รายละเอียด</th> -->
                              <th style ="width: 2%">แก้ไข</th> 
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 0; $page = 0;?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <td><?php echo $page+$i+=1;?></td> 
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <td>
                              <?php if($row->image != ''){?>
                                  <img src="<?php echo base_url('img/book');?>/<?php echo $row->image; ?>" width="100px" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>">
                              <?php }else{ ?>
                                  <img class="d-block" src="<?php echo base_url('img/book/book_default.jpg'); ?>" width="100px" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" >
                              <?php } ?>
                              </td>
                              <td><?php echo $row->bookName;?></td> 
                              <td><?php echo $row->author; ?></td>
                              <td><?php echo $row->bookType_name; ?></td>
                              <td>
                              <?php 
                                  if ($row->bookStatus_id == '1'){?>
                                    <!-- echo "<p style='color: green'>ยังไม่ถูกยืม</p>"; -->
                                    <div class="badge bg-success text-wrap" style="width: 5rem;">ยังไม่ถูกยืม</div>

                                  <?php }elseif ($row->bookStatus_id == '2'){ ?>
                                    <!-- echo "<p style='color: red'>ถูกยืมแล้ว</p>"; -->
                                    <div class="badge bg-danger text-wrap" style="width: 5rem;">ถูกยืมแล้ว</div>
                                  <?php } ?>
                              </td>
                              <!-- <td>
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2<?php/* echo $row->book_id;*/?>"><i class="fa-solid fa-eye"></i></a>
                              </td> -->
                              <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                              <td>
                                <a class="btn btn-warning" href="<?php echo site_Url('Bookdata/edit/').$row->book_id;?>"><i class="fa-solid fa-pen-to-square"></i></a>
                              </td>
                          </tr>
                          <!-- //////////////////////////// -->
                                    <!-- The Modal Details -->
                                    <div class="modal" id="myModal2<?php echo $row->book_id; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal body -->
                                                <div class="modal-body ">
                                                    <div class="center" style="max-width: 3000px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-6">
                                                                <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
                                                                <?php if($row->image != ''){?>
                                                                    <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image;?>" width="300px">
                                                                <?php }else{ ?>
                                                                    <img class="d-block w-100" src="<?php echo base_url('img/book/book_default.jpg'); ?>" >
                                                                <?php } ?>
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fs-2"><?php echo $row->bookName; ?></h5>
                                                                    <hr>
                                                                    <p class="card-text"><?php echo $row->Section; ?></p>
                                                                    <p class="card-text"><b>ชื่อผู้แต่ง :</b> <?php echo $row->author; ?></p>
                                                                    <p class="card-text"><b>สำนักพิมพ์ :</b> <?php echo $row->publisher; ?></p>
                                                                    <p class="card-text"><b>ปีที่พิมพ์ :</b> <?php echo $row->years; ?></p>
                                                                    <p class="card-text"><b>ISBN :</b> <?php echo $row->barcode; ?></p>
                                                                    <p class="card-text"><b>ประเภท :</b> <?php echo $row->bookType_name; ?></p>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //////////////////////////// -->
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
          let table = new DataTable('#adminBTable');
        </script>
      <?php include('footer_admin.php');?>
</body>
</html>
