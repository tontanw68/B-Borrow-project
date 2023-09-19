<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<title>ระบบจัดการยืม-คืนหนังสือ</title>	

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
      <?php include('userNavbar.php');?> 
          <div class="row">
          <?php include('userMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
              <!-- <div class="container">
                  <div class="justify-content-between">
                    <div class="container"> -->
                      <!-- <h1>menu</h1> -->
                      <div class="row">
                        <div class="col">
                          <h2>รายละเอียดข้อมูลประกาศ</h2>
                        </div>
                      </div>
                    <!-- </div>
                  </div> -->

                  <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Announcedata/an_searchdata');*/ ?>" method="post">
                  <div class="col-auto">
                    <p class="fs-2">รายละเอียดข้อมูลประกาศ</p>
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
                <table id="Table" class="table table-striped table-bordered">
                    <thead style="background-color: darkgray;">
                        <tr>
                            <th style ="width: 2%">No.</th>
                            <th style ="width: 5%">รูปภาพ</th>
                            <th style ="width: 15%">ชื่อ-นามสกุล</th>
                            <th style ="width: 20%">หัวข้อ</th>
                            <th style ="width: 20%">รายละเอียด</th>
                            <th style ="width: 10%">วันที่</th>
                            <th style ="width: 2%">ประกาศ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; $page = 0;?>
                        <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                        <?php foreach ($query as $row) {?>
                        <tr>
                            <td><?php echo $page+$i+=1;?></td> 
                            <td>
                              <?php if($row->announceImage != ''){?>
                                  <img src="<?php echo base_url('img/announce');?>/<?php echo $row->announceImage; ?>" width="100px" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->announce_id ; ?>" >
                              <?php }else{ ?>
                                  <img class="d-block w-100" src="<?php echo base_url('img/announce/announce_default.png'); ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->announce_id ; ?>" >
                              <?php } ?>
                            </td>
                            <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                            <td><?php echo $row->name." ".$row->surename;?></td>
                            <td><?php echo $row->announceSection;?></td>
                            <td><?php echo $row->announceDetails; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($row->announceDate));?></td>
                            <td>
                              <?php 
                                if ($row->active == 1){ 
                                ?>
                                  <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                                <?php }else{?>
                                  <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                                  <?php }
                                ?>
                            </td>
                        </tr>
                        <!-- //////////////////////////// -->
                                    <!-- The Modal Details -->
                                    <div class="modal" id="myModal2<?php echo $row->announce_id; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal body -->
                                                <div class="modal-body ">
                                                    <div class="center" style="max-width: 3000px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-6">
                                                                <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
                                                                <?php if($row->announceImage != ''){?>
                                                                    <img src="<?php echo base_url('img/announce'); ?>/<?php echo $row->announceImage;?>" width="300px">
                                                                <?php }else{ ?>
                                                                    <img class="d-block w-100" src="<?php echo base_url('img/announce/announce_default.png'); ?>" >
                                                                <?php } ?>
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fs-2"><?php echo $row->announceSection; ?></h5>
                                                                    <hr>
                                                                    <p class="card-text"><b>รายละเอียด :</b> <?php echo $row->announceDetails; ?></p>
                                                                    <p class="card-text"><b>วันที่ประกาศ :</b> <?php echo date('d/m/Y',strtotime($row->announceDate)); ?></p>
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
          let table = new DataTable('#Table');
        </script>
</body>
</html>
