<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <title>ระบบจัดการยืม-คืนหนังสือ</title>	
    <!-- เพื่อให้แสดงดรอปดาว -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
       

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="yearpicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="yearpicker.js" async></script>

    <style>
        .center {
          padding: 30px 0;
          border: 1px solid green;
          margin: auto;
          width: 80%;
        }
    </style>
</head>
<body>
    <div class="container font">
      <?php include('officerNavbar.php');?>     
          <div class="row">
          <?php include('officerMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">  
                <!-- <h1>menu</h1> -->
                <div class="row">
                    <div class="col">
                        <h2>รายงานข้อมูลค่าปรับตามปี</h2>
                    </div>
                    <div class="col">
                      <div align="right">
                        <a href="<?php echo site_url('Report/reportfineYearsExp');?>" class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                      </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-auto">
                  <form action="<?php echo site_url ('Report/reportfineYears2');?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">ปี</label>
                    </div>
                    <div class="col-auto">
                      <!-- <input type="year" id="" name="brYear" class="form-contror" value="" require> -->
                      <input type="text" id="fineYear" name="fineYear" class="form-contror" value="" required>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-info">ค้นหา</button>
                    </div>
                  </div>
                  </form>
                  </div>
                  <div class="col-auto">
                    <form action="<?php echo site_url ('Report/reportfineYears2');?>" method="post">
                      <div class="col-auto">
                        <button type="" class="btn btn-secondary">ล้างการค้นหา</button>
                      </div>
                    </form>
                  </div>
                </div>
                <?php 
                    $k = $this->input->post('fineYear');
                    if($k != ''){?>
                        <p class="fs-5">ผลการค้นหา"
                        <?php $key = $this->input->post('fineYear');
                        echo date('Y',strtotime($key));?> "</p>
                    <?php }else{
                        echo "";
                    }?>
                <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 5%">ลำดับ</th>
                              <th>ปีที่</th>
                              <th>ประเภทค่าปรับ</th>
                              <th>จำนวน</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;$page=0;
                          
                        ?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <td><?php echo $page+$i+=1;?></td> 
                              <td><?php echo $row->fY;?></td> 
                              <td><?php echo $row->fineType; ?></td>
                              <!-- echo $brYTT1; -->
                              <td>
                                <?php if($row->fineType_id == 1){
                                    echo $row->ex1." รายการ";
                                }else if($row->fineType_id == 2){
                                    echo $row->ex2." รายการ";
                                }else{
                                    echo $row->ex3." รายการ";
                                } ?>
                              </td> 
                          </tr>
                          <?php } ?>
                      </tbody>
                </table>
                </table>
                </div>
                <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="<?php echo site_url('Report/fineReport');?>" role="button">ยอนกลับ</a>
                    </div>
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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(document).ready(function() {


                var dp = $("#fineYear").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true
                });
            })
        </script>

</body>
</html>
