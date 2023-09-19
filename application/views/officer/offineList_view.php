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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container font">
    <?php include('officerNavbar.php'); ?>
        <div class="row">
            <?php include('officerMenu.php'); ?>
            <div class="col-md-9">
                <div class="card py-3 px-5 mt-10 h-100">
                    <!-- <h1>menu</h1> -->
                    <!-- <p class="fs-2">รายละเอียดข้อมูลค่าปรับ</p> -->
                    <div class="row">
                        <div class="col">
                            <h2>รายละเอียดข้อมูลค่าปรับ</h2>
                        </div>
                        <div class="col" align="right">
                            <a class="btn btn-primary" href="<?php echo site_url('FineTypedata/fineView'); ?>" role="button"><i class="fa-solid fa-circle-plus" style="font-size:25px"></i></a>
                        </div>
                    </div>
                    

                        <!-- <form class="row g-2" role="search" action="<?php /*echo site_url('Staffdata/searchdata');*/ ?>" method="post">
                  <div class="col-auto">
                    
                    <p class="fs-2">รายละเอียดข้อมูลตารางงานเจ้าหน้าที่</p>
                    </div>
                    <div class="col-auto">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" size="30%" name="search">  
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                  </form> -->
                    <hr>
                    <div class="table-responsive">
                        <table id="myBorrowTable2" class="table table-striped table-bordered">
                            <thead style="background-color: darkgray;">
                                <tr>
                                    <th style ="width: 5%">N0.</th>
                                    <th>รายละเอียดค่าปรับ</th>
                                    <th>ค่าปรับ</th>
                                    <th style ="width: 5%">ใช้งาน</th>
                                    <th style ="width: 5%">แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                                <?php $i = 0;
                                $page = 0; ?>
                                <?php foreach ($query as $row) { ?>
                                    <tr>
                                        <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                                        <td><?php echo $page + $i += 1; ?></td>
                                        <td><?php echo $row->fineType; ?></td>
                                        <td>
                                            <?php if($row->fineType_id == 1){
                                                echo $row->fineRate." บาท/เล่ม";
                                            }else if($row->fineType_id == 2){
                                                echo $row->fineRate." บาท/เล่ม";
                                            }else if($row->fineType_id == 3){
                                                echo $row->fineRate." บาท/วัน";
                                            }else{
                                                echo $row->fineRate;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if($row->fineType_Status == 1){ ?>
                                                <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                                            <?php }else{ ?>
                                                <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                                            <?php } ?>
                                        </td>

                                        <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                                        <td><a class="btn btn-warning" href="<?php echo site_Url('fineTypedata/edit/') . $row->fineType_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <div align="left">
                        <a class="btn btn-primary" style="font-size: 15px;" href="<?php echo site_url('Officerdata'); ?>" role="button">ย้อนกลับ</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include('footer_officer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myBorrowTable2');
    </script>
</body>

</html>