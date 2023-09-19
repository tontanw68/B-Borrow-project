<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
            <a class="fs-6 navbar-brand" href="#">ระบบยืม-คืนหนังสือ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="fs-6 nav-link active" aria-current="page" href="<?php echo site_url('Officerdata');?>">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link active" href="">ถอยกลับ</a> -->
                </li>
                </ul>   
            </div>
            <div class="d-flex">
                <!-- <a class="fs-6 navbar-brand" href="#">เจ้าหน้าที่ : <?php /*echo $_SESSION['name'].' '.$_SESSION['surename']; */?></a> -->
                <a class="fs-6 navbar-brand" href="#"> <img style="height: 5vh;" src="<?php echo base_url('img/icon/officer.png');?>"> <?php echo $_SESSION['typename'];?>: <?php echo $_SESSION['id'].' '.$_SESSION['name'].' '.$_SESSION['surename'].' [ '.$_SESSION['userStatus_type'].' ] ';?></a>
            </div>
            </div>
        </nav>
    </div>
</div>