<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>ระบบจัดการยืม-คืนหนังสือ</title>
        <!-- วันที่แบบไทยใหม่ -->
        <!-- css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
        <div class="container font">
        <?php include('userNavbar.php');?>
          <div class="row">
          <?php include('userMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <p class="fs-2">จองหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>จองหนังสือ</h2>
                  </div>
                </div>
                <hr>
                <!-- Reservedata/adddata -->
                <form action="<?php echo site_url('Reservedata/adddata');?>" method="post"> 
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                        <div class="col-sm-4">

                        <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="book_id" value="" required>
                             <option selected value="<?php /*echo $query->book_id;?>"><?php echo $query->bookName;*/?></option>
                        </select> -->

                        <input type="text" class="form-control" id="" name="book_name" value="<?php echo $query->bookName;?>" readonly>
                        <input type="hidden" class="form-control" id="" name="book_id" value="<?php echo $query->book_id;?>">

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ชื่อ</label>
                        <div class="col-sm-4">

                        <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="user_id" value="" required>
                             <option selected value="<?php /*echo $_SESSION['user_id'];?>"><?php echo $_SESSION['name'];*/?></option>
                        </select> -->

                        <input type="text" class="form-control" id="" name="user_name" value="<?php echo $_SESSION['name']." ".$_SESSION['surename'];?>" readonly>
                        <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $_SESSION['user_id'];?>">

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div>
                    <div class="mb-3 row">
                        <label for="inputprename" class="col-sm-2 col-form-label">วันที่จอง</label>
                        <div class="col-sm-4">

                        <!-- echo $datenow;? -->
                        <input type="date" class="form-control" id="" name="reserveDate" value="<?php echo date("Y-m-d",strtotime("now"))?>">

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div> 
                    <div class="mb-3 row">
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="allow" required> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="reserveStatus_id" value="" required hidden>
                        <option selected value="3">รอพิจารณา</option>
                        <!-- <option value="">เลือกข้อมูล</option>
                        <option value="1">อนุมัติ</option>
                        <option value="2">ไม่อนุมัติ</option>
                        <option value="3">รอพิจารณา</option> -->
                      </select>

                    </div>
                  </div>
                    <div class="col-sm-10">
                        <a class="btn btn-warning" href="<?php echo site_url('bookdata/index5');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>                 
                </form>
              </div>
            </div> 
          </div>
        </div>
        <?php include('footer_user.php');?>
        <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#reserveDate').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
        });
    </script>
    </body>
</html>