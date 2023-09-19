<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
	<title>ระบบจัดการยืม-คืนหนังสือ</title>
  <style type="text/css">
        .fr{
            color: red;
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
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">เพิ่มข้อมูลผู้ใช้</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลผู้ใช้</h2>
                  </div>
                  <div class="col">
                    <div align="right">
                      <a class="btn btn-primary" href="<?php echo site_url(''); ?>" data-bs-toggle="modal" data-bs-target="#myModal2">วิธีใช้งาน <i class="fa-solid fa-gear" style="font-size:25px"></i></a>														
                    </div>
                  </div>
                </div>
                <hr>

                <div class="card text-center">
                  <div class="card-body" style="background-color: #B3DBD8;"		>
                    <form action="<?php echo site_url ('Insertdata/addUserFile'); ?>" enctype="multipart/form-data" method="post">
                    <fieldset>
                      <legend>Import CSV file</legend>
                      <div class="control-group">
                        <div class="control-label">
                          <label>CSV File:</label>
                        </div>
                        <div class="controls">
                          <input type="file" name="file" id="file" class="input-large" required>
                        </div>
                      </div>
                      <br>
                      <div class="control-group">
                        <div class="controls">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                        </div>
                      </div>
                    </fieldset>
                    </form>
                  </div>
                </div>

                 <!-- //////////////////////////// -->
                    <!-- The Modal Details -->
                    <div class="modal" id="myModal2">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal body -->
                            <div class="modal-body " style="background-color: #408080;">
                            <div class="center">
                                <div class="row ">
                                <!-- <div class="col"> -->
                                <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
                                <!-- <img src="<?php /*echo base_url('img/book'); */ ?>" width="300px"> -->
                                <!-- </div> -->
                                <div class="col">
                                    <div class="card-body t" style="background-color: #ffffff;">
                                    <h5 class="card-title fs-2"></h5>
                                    <!-- <hr> -->
                                    <p class="card-text"></p>
                                    <p class="card-text"><b>1. สร้างไฟล์ในโปรแกรม Exel </b> </p>
                                    <p class="card-text"><b>2. กรอกข้อมูลหนังสือตามลำดับช่อง A,B,C,... ในตาราง Excel ดังนี้ </b> </p>
                                    <hr>
                                    <p class="card-text"><b>รหัสนักเรียน user password คำนำหน้า ชื่อ นามสกุล อีเมล เบอร์โทร ประเภทผู้ใช้(1=ผู้ดูแลระบบ,2=เจ้าหน้าที่,3=ผู้ใช้) สิทธิ์เข้าใช้งาน(1=เข้าใช้งานได้,2=เข้าใช้งานไม่ได้) ประเภทสถานภาพ(1=คุณครู,2=นักเรียน,3=ศิษย์เก่า)</b> </p>
                                    <hr>
                                    <p class="card-text"><b>3. เมื่อกรอกข้อมูลครบตามที่ต้องการแล้ว ให้บันทึกเป็นนามสกุลไฟล์ .csv เท่านั้น</b> </p>
                                    <p class="card-text"><b>4. เมื่ออัปโหลดไฟล์ข้อมูลผู้ใช้เสร็จแล้ว สามารถแก้ไขข้อมูลได้ที่ เมนูแก้ไข</b></p>
                                    <!-- <hr> -->
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

                <?php  echo nbs(20); ?>
                <div>
                    <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Showdata/userShow1'); ?>" role="button">ย้อนกลับ</a>
                </div>

              </div>
            </div>
          </div>
        </div>
</body>
</html>
