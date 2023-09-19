<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .my-auto{
            /* margin-top: auto;
            margin-bottom: auto; */
            
            position: absolute;
            top: 20%;
            margin-top: -150px;
            left: 50%;
            margin-left: -180px;
            /* background: green; */
        }
        hr.new4 {
            border: 1px solid blue;
        }
        .font {
            font-family: 'Prompt', sans-serif;
        }

        body {
            background-image: url("/img/bookkid.jpg");
            font-family: 'Prompt', sans-serif;
        }

        .login {
            overflow: hidden;
            background-color: white;
            padding: 40px 30px 30px 30px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
            -moz-transition: -moz-transform 300ms, box-shadow 300ms;
            transition: transform 300ms, box-shadow 300ms;
            box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
        }

        .login::before,
        .login::after {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            border-top-left-radius: 40%;
            border-top-right-radius: 45%;
            border-bottom-left-radius: 35%;
            border-bottom-right-radius: 40%;
            z-index: -1;
        }

        .login::before {
            left: 40%;
            bottom: -130%;
            background-color: rgba(69, 105, 144, 0.15);
            -webkit-animation: wawes 6s infinite linear;
            -moz-animation: wawes 6s infinite linear;
            animation: wawes 6s infinite linear;
        }

        .login::after {
            left: 35%;
            bottom: -125%;
            background-color: rgba(2, 128, 144, 0.2);
            -webkit-animation: wawes 7s infinite;
            -moz-animation: wawes 7s infinite;
            animation: wawes 7s infinite;
        }

        .login>input {
            display: block;
            border-radius: 5px;
            font-size: 16px;
            background: white;
            width: 100%;
            border: 0;
            padding: 10px 10px;
            margin: 15px -10px;
        }

        .login>button {
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            width: 100px;
            border: 0;
            padding: 10px 0;
            margin-top: 10px;
            border-radius: 5px;
            background-color: #8fbc8b;
            -webkit-transition: background-color 300ms;
            -moz-transition: background-color 300ms;
            transition: background-color 300ms;
        }

        .login>button:hover {
            background-color: #2f4f4f;
        }

        @-webkit-keyframes wawes {
            from {
                -webkit-transform: rotate(0);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @-moz-keyframes wawes {
            from {
                -moz-transform: rotate(0);
            }

            to {
                -moz-transform: rotate(360deg);
            }
        }

        @keyframes wawes {
            from {
                -webkit-transform: rotate(0);
                -moz-transform: rotate(0);
                -ms-transform: rotate(0);
                -o-transform: rotate(0);
                transform: rotate(0);
            }

            to {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.6);
            position: absolute;
            right: 10px;
            bottom: 10px;
            font-size: 12px;
        }
        
    </style>
    </head>
    <body>
       <form class="login" action="<?php echo site_url("login/check2"); ?>" method="post">
            <p class="fs-2 text-center">เข้าสู่ระบบ</p>
            <label><i class="fa-solid fa-user"></i> ชื่อผู้ใช้</label>
            <input type="text" placeholder="Username" name="inputuser">
            <label for="password"><i class="fa-solid fa-lock"></i> รหัสผ่าน</label>
            <input type="password" id="password" placeholder="Password" name="inputpassword">
            <div class="d-grid gap-2 col-4 mx-auto">
                <button type="submit" class="btn btn-success" name="submit">เข้าสู่ระบบ <i class="fa-solid fa-right-to-bracket"></i></button>      
            </div>
        </form>
        <a href="<?php echo site_url(''); ?>" class="btn bt " type="submit"><< ย้อนกลับ</a>
    </body>
</html>