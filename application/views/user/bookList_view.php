<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <title>ระบบจัดการยืม-คืนหนังสือ</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

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
  <?php include('userNavbar.php'); ?>
    <div class="row">
    <?php include('userMenu.php'); ?>
      <div class="col-md-9 h-100">
        <div class="card py-3 px-5 mt-10 h-100">
          <!-- <p class="fs-2">รายละเอียดข้อมูลหนังสือ</p> -->
          <div class="row">
            <div class="col">
              <h2>รายละเอียดข้อมูลหนังสือ</h2>
            </div>
          </div>
          <hr>
          <div class="table-responsive">
            <table id="myBorrowTable" class="table table-striped table-bordered">
              <thead style="background-color: darkgray;">
                <tr>
                  <th style="width: 2%">No.</th>
                  <th style="width: 5%">รูปภาพ</th>
                  <th>ชื่อหนังสือ</th>
                  <th>ผู้แต่ง</th>
                  <th>ประเภท</th>
                  <th>คำสำคัญ</th>
                  <th>สถานะ</th>
                  <!-- <th style="width: 2%">รายละเอียด</th> -->
                  <th style="width: 2%">จองหนังสือ</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0; $page = 0;?>
                <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                <?php foreach ($qu as $row) { ?>
                  <tr>
                    
                    <td><?php echo $page+$i+=1;?></td> 
                    <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                    <td>
                    <?php if($row->image != ''){?>
                        <img src="<?php echo base_url('img/book');?>/<?php echo $row->image; ?>" width="100px" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" alt="ไม่มีรูปภาพ">
                    <?php }else{ ?>
                        <img class="d-block w-100" src="<?php echo base_url('img/book/book_default.jpg'); ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" >
                    <?php } ?>
                    </td>
                    <td><?php echo $row->bookName; ?></td>
                    <td><?php echo $row->author; ?></td>
                    <td><?php echo $row->bookType_name; ?></td>
                    <td><?php echo $row->keyword; ?></td>
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
                      <a href="<?php /*echo site_url('Userdata/officer_book_details/'); ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; */?>">
                        <i class="fa-solid fa-eye"></i></a>
                    </td> -->
                    <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                    <td><a href="<?php echo site_url('Userdata/reserve/') . $row->book_id; ?>" class="btn btn-warning">จอง</a></td>
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
                                        <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" width="300px">
                                    <?php }else{ ?>
                                        <img class="d-block w-100" src="<?php echo base_url('img/book/book_default.jpg'); ?>" width="300px">
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
          </div>
          <?php /*foreach ($query as $row) {?> 
                <!-- <div class="center" style="max-width: 1000px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      
                      <img src="<?php echo base_url('img');?>/<?php echo $row->image; ?>" width="200px">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row->bookName;?></h5>
                        <p class="card-text"><?php echo $row->Section; ?></p>
                        <p class="card-text">ชื่อผู้แต่ง : <?php echo $row->author; ?></p>
                        <p class="card-text">สำนักพิมพ์ : <?php echo $row->publisher; ?></p>
                        <p class="card-text">ISBN : <?php echo $row->barcode; ?></p>
                        <a href="<?php echo site_url ('Userdata/reserve/').$row->book_id; ?>" class="btn btn-primary" >จอง</a>
                        <hr>
                      </div>  
                    </div>
                  </div>
                </div> -->
                <?php } */ ?>
                <div align="left">
                  <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Userdata'); ?>" role="button">ย้อนกลับ</a>
                </div>
        </div>
        
      </div>
    </div>
  </div>
  <?php include('footer_user.php'); ?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myBorrowTable');
  </script>
</body>
</body>

</html>