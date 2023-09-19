<!-- ไม่ได้ใช้ไฟล์นี้นะ -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>ระบบจัดการยืม-คืนหนังสือ</title>
        <!-- JavaScript Bundle with Popper -->
        <!-- เพื่อให้แสดงดรอปดาว -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
       
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
              <div class="card py-3 px-5 mt-3">
                <div class="row">
                  <div class="col-md-12">
                    <form class="form-horizontal" action="<?php echo site_url('Bookdata/book_search');?>" method="post">
                        <div class="form-group ">
                            <div class="col-sm-3 control-label">
                               กรอกคำค้นหา    
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>เลือก</option>
                                  <option value="1">ชื่อหนังสือ</option>
                                  <option value="2">คำสำคัญ</option>
                                  <option value="3">หัวข้อ</option>
                                </select>&nbsp;
                                <input type="text" class="form-control" name="keyword"  placeholder="พิมพ์คำค้น"  style="width:200px;"> 
                              </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="btn_search" class="btn btn-primary btn-block">ค้นหา</button>    
                            </div>
                        </div>                       
                    </form>
                    <?php 
                    $k = $this->input->post('keyword');
                    if($k != ''){?>
                      <p class="fs-3">ผลการค้นหา"
                        <?php $key = $this->input->post('keyword');
                        echo $key;?> "</p>
                      <p>จำนวน <?php echo $count;?> รายการ</p>
                      <?php foreach ($query as $row) {?>  
                        <div class="center" style="max-width: 1000px;">
                          <div class="row g-0">
                            <div class="col-md-3">
                              <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
                              <img src="<?php echo base_url('img');?>/<?php echo $row->image; ?>" width="200px">
                            </div>
                            <div class="col-sm-8">
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
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            
        </div>   
    </body>
</html>