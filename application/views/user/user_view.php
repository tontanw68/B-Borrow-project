<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>ระบบจัดการยืม-คืนหนังสือ</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>

    <style type="text/css">
        /*  ส่วนเนื้อหาที่เลื่อนได้ในแนวนอน*/
        .scroll-x {
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
            box-shadow: 0 0 15px hsla(196, 50%, 50%, 1);
        }
    </style>

    <div class="container font">
        <?php include('userNavbar.php'); ?>
        <div class="row">
            <?php include('userMenu.php'); ?>
            <div class="col-md-9">
                <div class="card py-3 px-5 mt-10 h-100">
                    <!-- <p class="fs-2">สมาชิก</p> -->
                    <div class="row">
                        <div class="col">
                            <h2>สมาชิก</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body" style="background: #FFFFCC;">
                                    <h5 class="card-title">การจองที่ได้รับอนุมัติแล้ว</h5>
                                    <!-- <p class="card-text"><?php /*echo $checkUserRs." รายการ";*/ ?></p> -->
                                    <a style="text-decoration: none" href="<?php echo site_url('Reservedata/reserveUserConfirm'); ?>"><?php echo $checkUserRs . " รายการ"; ?></a><?php echo nbs(20); ?> <i class="fa-solid fa-check"></i>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body" style="background: #7FFFD4;">
                                    <h5 class="card-title">หนังสือที่ยังไม่คืน</h5>
                                    <!-- <p class="card-text"><?php /*echo $checkUserRt." รายการ";*/ ?></p> -->
                                    <a style="text-decoration: none" href="<?php echo site_url('Borrowdata/userCheckReturnpag'); ?>"><?php echo $checkUserRt . " รายการ"; ?></a><?php echo nbs(20); ?><i class="fa-solid fa-circle-xmark"></i>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body" style="background: #FFC0CB;">
                                    <h5 class="card-title">ค่าปรับที่ต้องชำระ</h5>
                                    <!-- <p class="card-text"><?php /*echo $checkUserfine." รายการ";*/ ?></p> -->
                                    <a style="text-decoration: none" href="<?php echo site_url('Userdata/fineSearch'); ?>"><?php echo $checkUserfine . " รายการ"; ?></a><?php echo nbs(20); ?><i class="fa-solid fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="container-fluid m-0 p-0 bg-light">
                        <h5 class="p-2 text-secondary">แนะนำหนังสือที่ชอบ 10 เล่ม</h5>
                        <div class="scroll">
                            <div class="card-group d-flex flex-row flex-nowrap scroll-x">
                                <?php foreach ($showBlike as $row) { ?>
                                    
                                        <div class="card shadow-sm mb-2 mx-1" style="min-width:250px;">


                                            <?php if ($row->image != '') { ?>
                                                <img class="d-block w-100" src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" alt="ไม่มีรูปภาพ">
                                            <?php } else { ?>
                                                <img class="d-block w-100" src="<?php echo base_url('img/book/shopnow.jpg'); ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>">
                                            <?php } ?>

                                            <div class="card-body">
                                                <h5 class="card-text"><?php echo $row->bookName; ?></h5>
                                                <p class="card-text"><?php echo $row->Section; ?></p>
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
                                                                    <?php if ($row->image != '') { ?>
                                                                        <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" width="300px">
                                                                    <?php } else { ?>
                                                                        <img class="d-block w-100" src="<?php echo base_url('img/book/shopnow.jpg'); ?>">
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
                            </div>
                        </div>
                    </div>
                </div>


                <?php /*<div class="container-fluid m-0 p-0 bg-light">
                        <h5 class="p-2 text-secondary">แนะนำหนังสือที่ชอบ</h5>
                        <div class="scroll">
                            <div class="card-group d-flex flex-row flex-nowrap scroll-x"> <!--card group-->
                                <?php foreach ($showBlike as $row) { ?>

                                    <div class="card shadow-sm mb-2 mx-1" style="width: 18rem;">
                                        <!-- <img class="card-img-top" src="https://www.ninenik.com/images/10.jpg" > -->
                                        <!-- echo site_url('Login/BookDetails'); -->
                                        <img class="d-block w-100" src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" href="" data-bs-toggle="modal" data-bs-target="#myModal2<?php echo $row->book_id; ?>" alt="ไม่มีรูปภาพ">
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
                                                                <img src="<?php echo base_url('img/book'); ?>/<?php echo $row->image; ?>" width="300px">
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
                </div> */ ?>

            </div>
        </div>
    </div>
    </div>
    <!-- footer  -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <!-- <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a> -->
                <span class="mb-3 mb-md-0 text-muted">© 2023 B-Borrow MSU</span>
            </div>
            <!-- end footer -->
</body>

</html>