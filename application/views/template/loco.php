<!-- <div class="row">
    <div class="col-md-3">
        <img src="img/Lake-Oeschinensee.jpg" class="img-thumbnail" style="width: 18rem;">
    </div>
    <div class="col-md-9">
        <br>
        <h5 class="card-title">โรงเรียนห้วยเม็กราษฎร์นุกูล</h5>
    </div>
</div> -->

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bt {
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {
            background-color: #3e8e41
        }

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .font {
            font-family: 'Prompt', sans-serif;
        }
        .sh {
            text-shadow: 5px 10px 10px rgba(2, 128, 144, 0.5);
        }
        .sh {
            /* color: coral; */
            /* text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; */
            text-shadow: 2px 2px 4px #000000;
        }

        .tales {
            width: 100%;
            height: 500px;
        }
        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            /* border: 3px solid #f1f1f1; */
            position: absolute;
            /* width: 80%; */
            /* padding: 20px; */
            text-align: center;
        }
    </style>
</head>
<body>

<div class="col-md-12 font">
        <nav class="navbar navbar-dark navbar-expand-lg bg-light" style="background-image: url('<?php echo base_url('img/books.jpg'); ?>'); ">
            <img style="height: 20vh;" src="<?php echo base_url('img/sig.png'); ?>">
            <div class="row">
                <div class="col-10">
                    <label class="navbar-brand fs-2 sh" href="#">ระบบยืม-คืนหนังสือโรงเรียนห้วยเม็กราษฎร์นุกูล</label>
                </div><br/>
                <div class="col-10">
                    <label class="navbar-brand fs-6 sh" style="color: #fff;" href="#"><i class="fa-regular fa-clock" style="font-size:20px"></i> วันจันทร์-วันศุกร์ เวลา 8:00-15:30 น.</label>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav" style="font-size: 20px;">
                        <a class="nav-link active" aria-current="page" href="<?php echo site_url(''); ?>"><b>หน้าแรก</b></a>
                        <a class="nav-link" href="<?php echo site_url('Login/new_rules'); ?>">ระเบียบห้องสมุด</a>
                    </div>
                </div>
                <div align="right">

                    <a href="<?php echo site_url('login'); ?>" class="btn bt " type="submit">เข้าสู่ระบบ <i class="fa-solid fa-arrow-pointer" style="font-size:20px"></i></a>

                </div>
            </div>
        </nav><br />

    <div class="col-md-12 col-xs-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              $i=0;
              foreach($query as $row){
                $actives='';
                if($i==0){
                    $actives='active';
                }
              ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php echo $actives;?> ">
                
              </li>
              <?php 
              $i++;} ?>
            </ol>
            <div class="carousel-inner">
              <?php
              $i=0;
              foreach($query as $row){
                $actives='';
                if($i==0){
                    $actives='active';
                }
              ?>
              <div class="carousel-item <?php echo $actives;?>">
                <!-- <a href="https://www.youtube.com/c/devbanban" target="_blank"> -->
                  <?php if($row->announceImage != ''){?>
                    <img class="d-block w-100 tales" src="<?php echo base_url('img/announce');?>/<?php echo $row->announceImage;?>" alt="devbanban">
                  <?php }else{ ?>
                    <img class="d-block w-100 tales" src="<?php echo base_url('img/announce/bongpiang.jpg'); ?>" >
                  <?php } ?>
                  <!-- <img src="<?php /*echo base_url('img');*/?>/<?php /*echo $row->announceImage;*/?>" width="100px" > -->
                  <div class="carousel-caption d-none d-md-block bg-text">
                    <h5><?php echo $row->announceSection;?></h5>
                    <p><?php echo $row->announceDetails."<br> ประกาศวันที่ ".date('d/m/Y',strtotime($row->announceDate));?></p>
                    <!-- <p><?php //echo date('d/m/Y',strtotime($row->announceDate));?></p> -->
                </div>
                <!-- </a> -->
              </div>
              <?php 
              $i++;}?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
          </div>
          
        </div>
</div>
<!-- Optional JavaScript devbanban.com-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>