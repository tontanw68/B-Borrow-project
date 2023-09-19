<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการยืม-คืนหนังสือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <style>
        .font {
            font-family: 'Prompt', sans-serif;
        }
        
    </style>
</head>

<body>
    <style type="text/css">
    /*  ส่วนเนื้อหาที่เลื่อนได้ในแนวนอน*/
    .scroll-x{
        display: flex;
        overflow-y: hidden;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }       
    /*ส่วนกำหนดให้ไม่แสดง scrollbar ของเนื้อหาแนวนอนี่กำหนด*/
    .scroll-x::-webkit-scrollbar {
        /* display: none;  */
    }
    .center {
        padding: 30px 0;
        /* border: 1px solid blue; */
        margin: auto;
        width: 100%;
        box-shadow: 0 0 15px hsla(196,50%,50%,1);
      }
    </style>
    <div class="container font">
        <?php include('template/loco.php'); ?>
        <div class="col-md-12">
            <div class="card py-3 px-5 mt-3">
                <div class="card-header fs-5"><b>แนะนำหนังสือใหม่</b></div>
                <div class="card-body">
                    <!-- <h5><b>- ขั้นตอนการยืม-คืนหนังสือในห้องสมุด</b></h5> -->
                    <!-- <p class="fs-5"> 1. ห้าม...</p>
                    <p class="fs-5"> 2. ห้าม...</p>
                    <p class="fs-5"> 3. ห้าม...</p> -->

                    <div class="container-fluid m-0 p-0 bg-light"> <!--container-fluid-->
                        <!-- <h5 class="p-2 text-secondary">แนะนำหนังสือมาใหม่</h5> -->
                        <div class="scroll">
                            <div class="card-group d-flex flex-row flex-nowrap scroll-x"> <!--card group-->
                                <?php foreach ($showNbook as $row) { ?>
                                    <?php /*for($i=1;$i<=6;$i++){*/ ?>

                                    <div class="card shadow-sm mb-2 mx-1" style="min-width:250px;">
                                        <!-- <img class="card-img-top" src="https://www.ninenik.com/images/10.jpg" > -->
                                        <!-- echo site_url('Login/BookDetails'); -->
                                        <?php if($row->image != ''){?>
                                            <img class="d-block w-100" src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" alt="ไม่มีรูปภาพ">
                                        <?php }else{ ?>
                                            <img class="d-block w-100" src="<?php echo base_url('img/book/shopnow.jpg'); ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" >
                                        <?php } ?>

                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row->bookName; ?></h5>
                                            <p class="card-text"><?php echo $row->Section; ?>
                                            </p>
                                        </div>
                                    </div>
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
                                                                    <img class="d-block w-100" src="<?php echo base_url('img/book/shopnow.jpg'); ?>" width="300px">
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fs-2"><?php echo $row->bookName; ?></h5>
                                                                    <hr>
                                                                    <p class="card-text"><?php echo $row->Section; ?></p>
                                                                    <p class="card-text"><b>ชื่อผู้แต่ง :</b> <?php echo $row->author; ?></p>
                                                                    <p class="card-text"><b>สำนักพิมพ์ :</b> <?php echo $row->publisher; ?></p>
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
                            </div>
                        </div> <!--card group-->
                    </div>
                    
                    <!-- <div class="container-fluid m-0 p-0 bg-light">
                    <h5 class="p-2 text-secondary">Best Items</h5>
                        <div class="row no-gutters px-1">
                            <?php /*foreach ($showNbook as $row) {?>
                                <?php /*for($i=1;$i<=4;$i++){*/?>
                                <div class="col-6 col-sm-4 col-md-3 bg-light px-1">
                                    <a href="javascript:void(0);">
                                    <div class="bg-warning pic_preview" style="background-image:url('https://www.ninenik.com/images/10.jpg')">
                                    <img class="d-block w-100" src="<?php /*echo base_url('img');?>/<?php echo $row->image;*/?>" alt="devbanban">
                                    </div>
                                    <div class="bg-white mb-2 shadow-sm">
                                        <div>หัวเรื่องรายการทดสอบ This is test title</div>
                                        <div class="price">฿1,500</div>
                                        <div class="discount_price">฿2,500 <span>-50%</span></div>
                                    </div>    
                                    </a>        
                                </div>
                                <?php/* } */?>
                            <?php /*}*/ ?>
                        </div>
                    </div>  -->
                    

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
