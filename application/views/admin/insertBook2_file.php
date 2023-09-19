<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>ระบบจัดการยืม-คืนหนังสือ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
    <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>
<style type="text/css">
    .fr {
        color: red;
    }
</style>
</head>

<body>
    <div class="container font">
        <?php include('adminNavbar.php'); ?>
    </div>
    <div class="container font">
        <div class="row">
            <?php include('adminMenu.php'); ?>
            <div class="col-md-9">
                <div class="card py-3 px-5 mt-10 h-100">
                    <!-- <h1>menu</h1> -->
                    <!-- <p class="fs-2">เพิ่มข้อมูลหนังสือ</p> -->
                    <div class="row">
                        <div class="col">
                          <h2>เพิ่มข้อมูลหนังสือ</h2>
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
                        <form class="form-horizontal well" action="<?php echo site_url('Bookdata/addBookFile2'); ?>" method="post" name="upload_excel" enctype="multipart/form-data">
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
                                <br />
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
                                                    <p class="card-text"><b>2. กรอกข้อมูลหนังสือตามลำดับช่อง คอลัมน์A แถวที่1,คอลัมน์B แถวที่1,คอลัมน์C แถวที่1,... ในตาราง Excel ดังนี้ </b> </p>
                                                    <hr>
                                                    <p class="card-text"><b>ชื่อหนังสือ, ชื่อผู้แต่ง, ปีที่พิมพ์, สำนักพิมพ์, คำสำคัญ, หัวข้อหนังสือ(ถ้ามี), เลขเรียกหนังสือ, สถานะหนังสือ(1=ยังไม่ถูกยืม,2=ถูกยืมแล้ว), บาร์โค้ด(ถ้ามี), รหัสประเภทหนังสือ(1=สารคดี,2=นิทาน,3=หนังสือพิมพ์,4=วารสาร,5=วิจัย,6=อ้างอิง,7=หนังสือทั่วไป)</b> </p>
                                                    <hr>
                                                    <p class="card-text"><b>3. เมื่อกรอกข้อมูลครบตามที่ต้องการแล้ว ให้บันทึกเป็นนามสกุลไฟล์ .csv เท่านั้น</b> </p>
                                                    <p class="card-text"><b>4. เมื่ออัปโหลดไฟล์ข้อมูลหนังสือเสร็จแล้ว สามารถเพิ่มรูปหรือแก้ไขข้อมูลได้ที่ เมนูแก้ไข</b></p>
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
                        <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Showdata/bookShow3'); ?>" role="button">ย้อนกลับ</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include('footer_admin.php'); ?>
</body>

</html>