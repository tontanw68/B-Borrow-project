<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบจัดการยืม-คืนหนังสือ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    
        <div class="container">
          <?php include('userNavbar.php');?>
              <div class="card py-3 px-5 mt-3">
              <p class="fs-2">ค้นหาข้อมูลการยืม-คืน</p>
                <hr><br>
                <div class="row">
                  <div class="col-xs-10">
                    <form class="form-horizontal" action="<?php echo site_url('borrowdata/Usearchdata');?>" method="post">
                        <div class="form-group">
                            <label for="query" class="col-xs-2 text-right" style="padding-top:6px;padding-right:0px;">คำค้น</label>
                            <div class="col-xs-10">
                                <br><input type="text" class="form-control" name="key"  placeholder="พิมพ์คำค้น">
                            </div>
                        </div>
                        <div class="col-xs-2">
                                <br><button type="submit" name="btn_search" class="btn btn-primary btn-block">ค้นหา</button>    
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>   
    </body>
</html>