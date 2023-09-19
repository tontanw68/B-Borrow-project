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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
    <style>
        .font {
            font-family: 'Prompt', sans-serif;
        }
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
    <div class="container font">
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

        <div class="col-md-12">
            <!-- <div class="card py-3 px-5 mt-3 h-100"> -->
                <?php foreach ($query as $row) { ?>
                <div class="card">
                    <div class="card-header fs-4">
                        <?php echo $row->rulesSection; ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br($row->rulesDetails);?></p>
                    </div>
                </div>
                <?php } ?>
                <br>
            <!-- </div> -->
        </div>
    </div>
    </div>
</body>

</html>
