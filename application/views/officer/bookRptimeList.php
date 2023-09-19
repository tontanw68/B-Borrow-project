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
                        <h2>รายงานหนังสือตามช่วงเวลา</h2>
                    </div>
                    <!-- <div class="col">
                      <div align="right">
                        <a href="<?php /*echo site_url('Report/reportBtimeExp');*/?>" class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                      </div>
                    </div> -->
                </div>
                <hr>
                <div class="row ">
                  <form action="<?php echo site_url ('Report/reportBtime');?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">ปีที่พิมพ์เริ่ม</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="book_s" name="book_s" class="form-contror" value="" require>
                    </div>
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">ปีที่พิมพ์สิ้นสุด</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="book_e" name="book_e" class="form-contror" require>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-info">ส่ง</button>
                    </div>
                  </div>
                  </form>
                  <?php 
                    $k = $this->input->post('book_s');
                    if($k != ''){?>
                        <p class="fs-5">ผลการค้นหา ปี"
                        <?php $key1 = $this->input->post('book_s');
                        $key2 = $this->input->post('book_e');
                        echo $key1." ถึง ".$key2;?> "</p>
                    <?php }else{
                        echo "";
                    }?>
                <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                      <thead style="background-color: darkgray;">
                          <tr>
                              <th style ="width: 2%">No.</th>
                              <th>ชื่อหนังสือ</th>
                              <th>ประเภทหนังสือ</th>
                              <th>ผู้แต่ง</th>
                              <th>สำนักพิมพ์</th>
                              <th>ปีที่พิมพ์</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;$page=0;?>
                          <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                          <?php foreach ($query as $row) {?>
                          <tr>
                              <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                              <td><?php echo $page+$i+=1;?></td> 
                              <td><?php echo $row->bookName;?></td> 
                              <td><?php echo $row->bookType_name; ?></td>
                              <td><?php echo $row->author; ?></td>
                              <td><?php echo $row->publisher; ?></td>
                              <td><?php echo $row->years; ?></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                </table>
                </div>
                
              </div>
              <div class="row">
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-primary" href="<?php echo site_url('Report/index2');?>" role="button">ยอนกลับ</a>
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

                var dp = $("#book_s").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true
                });
                var de = $("#book_e").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true
                });
            })
        </script>
</body>
</html>