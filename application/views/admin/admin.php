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
        <div class="container font">
        <?php include('adminNavbar.php');?>    
          <div class="row">
          <?php include('adminMenu.php');?> 
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <p class="fs-2">ผู้แลระบบ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>ผู้แลระบบ</h2>
                  </div>
                </div>
                <hr>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card">
                        <div class="card-body" style="background: #FFFFCC;">
                            <h5 class="card-title">ระเบียบห้องสมุดที่ประกาศ</h5>
                            <!-- <p class="card-text"><?php /*echo $checkUserRs." รายการ";*/?></p> -->
                            <a style="text-decoration: none" href="<?php echo site_url('Showdata/rulesShow2');?>"><?php echo $rulesActive." รายการ";?></a><?php echo nbs(20);?><i class="fa-solid fa-bullhorn"></i>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <div class="card-body" style="background: #7FFFD4;">
                            <h5 class="card-title">ผู้ใช้ที่มีสิทธิ์เข้าใช้งาน</h5>
                            <!-- <p class="card-text"><?php /*echo $checkUserRt." รายการ";*/?></p> -->
                            <a style="text-decoration: none" href="<?php echo site_url('Showdata/userShow2');?>"><?php echo $allow." คน";?></a><?php echo nbs(20);?><i class="fa-solid fa-person"></i>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <div class="card-body" style="background: #FFC0CB;">
                            <h5 class="card-title">ผู้ใช้ที่ไม่มีสิทธิ์เข้าใช้งาน</h5>
                            <!-- <p class="card-text"><?php /*echo $checkUserfine." รายการ";*/?></p> -->
                            <a style="text-decoration: none" href="<?php echo site_url('Showdata/userShow3');?>"><?php echo $unallow." คน"?></a><?php echo nbs(20);?><i class="fa-solid fa-person"></i>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
        <?php include('footer_admin.php');?> 
    </body>
</html>