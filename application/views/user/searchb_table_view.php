<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>ระบบจัดการยืม-คืนหนังสือ</title>
        <!-- JavaScript Bundle with Popper -->
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
        <div class="container">
          <?php include('userNavbar.php');?>
            <div class="row">
                <?php include('userMenu.php');?>
                <div class="col-md-9">
                  <div class="card py-3 px-5 mt-10">
                    <!-- <form class="form-horizontal" action="<?php /*echo site_url('Bookdata/book_search');*/?>" method="post">
                        <div class="form-group ">
                            <div class="col-sm-3 control-label">
                               กรอกคำค้นหา    
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example">
                                    <optgroup  label="เลือกข้อมูล">
                                        <option value="1">ชื่อหนังสือ</option>
                                        <option value="2">คำสำคัญ</option>
                                        <option value="3">ประเภทหนังสือ</option>
                                    </optgroup> 
                                </select>&nbsp;
                                <input type="text" class="form-control" name="keyword"  placeholder="พิมพ์คำค้น"  style="width:200px;"> 
                              </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="btn_search" class="btn btn-primary btn-block">ค้นหา</button>    
                            </div>
                        </div>                       
                    </form> -->
                    <div class="table-responsive">
                    <table id="UserBookTable" class="table table-striped table-bordered">
                        <?php 
                        $k = $this->input->post('keyword');
                        if($k != ''){?>
                            <p class="fs-3">ผลการค้นหา"
                                <?php $key = $this->input->post('keyword');
                                echo $key;?> "</p>
                            <!-- <p>จำนวน <?php /*echo $count;*/?> รายการ</p> -->
                            <thead>
                                <tr>
                                    <th style ="width: 10%">ลำดับที่</th>
                                    <th>รุปภาพ</th>
                                    <th>ชื่อหนังสือ</th>
                                    <th>ชื่อผู้แต่ง</th>
                                    <th style ="width: 10%">รายละเอียด</th>
                                    <th style ="width: 10%">การจอง</th>
                                </tr>
                            </thead>
                            <?php } ?>
                        <tbody>
                            <?php $i=0; ?>
                            <!-- เอาตัวแปล query ที่มาจากการไปดึงเอาข้อมูลที่บันทึกไว้มาแสดง -->
                            <?php foreach ($query as $row) {?>
                            <tr>
                                <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                                <th><?php echo $i+=1;?></th> 
                                <th>
                                    <?php if($row->image != ''){?>
                                        <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" width="300px">
                                    <?php }else{ ?>
                                        <img class="d-block w-100" src="<?php echo base_url('img/book/book_default.jpg'); ?>" width="300px">
                                    <?php } ?>
                                </th>
                                <th><?php echo $row->bookName;?></th> 
                                <th><?php echo $row->author;?></th> 
                                <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                                <th>    
                                    <a href="<?php echo site_url ('Userdata/book_details/'); ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row->book_id;?>">รายละเอียด</a>
                                </th>
                                <th>    
                                    <a href="<?php echo site_url ('Userdata/reserveList/').$row->book_id;?>" class="btn btn-primary" >จอง</a> 
                                    <!-- <a id="action-button" href="" class="btn btn-primary" data-bookname="'.$row->bookname.'" >จองจ้า</a>   -->
                                </th>
                            </tr>
                            <!-- //////////////////////////// -->
                            <!-- The Modal -->
                            <div class="modal" id="myModal<?php echo $row->book_id;?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="center" style="max-width: 3000px;">
                                            <div class="row g-0">
                                                <div class="col-md-6">
                                                    <?php if($row->image != ''){?>
                                                        <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" width="300px">
                                                    <?php }else{ ?>
                                                        <img class="d-block w-100" src="<?php echo base_url('img/book/book_default.jpg'); ?>" width="300px">
                                                    <?php } ?>
    
                                                </div>
                                                <div class="col-sm-6">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row->bookName;?></h5>
                                                    <p class="card-text"><?php echo $row->Section; ?></p>
                                                    <p class="card-text">ชื่อผู้แต่ง : <?php echo $row->author; ?></p>
                                                    <p class="card-text">สำนักพิมพ์ : <?php echo $row->publisher; ?></p>
                                                    <p class="card-text">ISBN : <?php echo $row->barcode; ?></p>
                                                    <p class="card-text">ประเภท : <?php echo $row->bookType_name; ?></p>
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
                  </div>
                </div>
              </div>
            </div>
        <?php include('footer_user.php');?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#UserBookTable');
        </script>
    </body>
</html>