<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>ระบบจัดการยืม-คืนหนังสือ</title>
        <!-- css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style type="text/css">
        .fr{
            color: red;
        }
      </style>
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
                <form action="<?php echo site_url('Reservedata/adddataform');?>" method="post"> 
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">รหัสหนังสือ</label>
                        <div class="col-sm-4">
                          <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="book_id" value="" required>
                              <option selected value="<?php /*echo $_SESSION['book_id'];?>"><?php echo $_SESSION['bookName'];*/?></option>
                          </select> -->
                          <input type="text" class="form-control" id="book_id" name="book_id" value="<?php echo set_value('book_id');?>" required>
                          <input type='hidden' id='book_IDdata' value='<?php echo json_encode($bookRs);?>' />

                          <?php if(form_error('book_id') == ''){
                          }else{ ?>
                          <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('book_id'); ?><br><?php echo form_error('book_id');?></span>
                          <?php } ?> 

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ชื่อ</label>
                        <div class="col-sm-4">
                          <!-- <select class="form-select" id="inputGroupSelect01" type="text" name="user_id" value="" required>
                              <option selected value="<?php /*echo $_SESSION['user_id'];?>"><?php echo $_SESSION['name'];*/?></option>
                          </select> -->

                          <input type="text" class="form-control" id="" name="name" value="<?php echo $_SESSION['name']." ".$_SESSION['surename'];?>" readonly>
                          <input type="hidden" class="form-control" id="" name="user_id" value="<?php echo $_SESSION['user_id'];?>">

                          <?php if(form_error('user_id') == ''){
                          }else{ ?>
                          <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('user_id'); ?><br><?php echo form_error('user_id');?></span>
                          <?php } ?> 

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div>
                    <div class="mb-3 row">
                        <label for="inputprename" class="col-sm-2 col-form-label">วันที่จอง</label>
                        <div class="col-sm-4">
                          <!-- echo $datenow; -->
                            <input type="date" class="form-control" id="" name="reserveDate" value="<?php echo date("Y-m-d",strtotime("now"))?>" readonly>

                            <?php if(form_error('reserveDate') == ''){
                            }else{ ?>
                            <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('reserveDate'); ?><br><?php echo form_error('reserveDate');?></span>
                            <?php } ?> 

                        </div>
                        <div class="col" style="color: red; font-size: 25px;">*</div> 
                    </div> 
                    <div class="mb-3 row">
                      <div class="col-sm-4">
                      <!-- <input type="text" class="form-control" id="" name="allow" required> -->
                      <select class="form-select" id="inputGroupSelect01" type="text" name="reserveStatus_id" value="" hidden>
                        <option selected value="3">รอพิจารณา</option>
                        <!-- <option value="">เลือกข้อมูล</option>
                        <option value="1">อนุมัติ</option>
                        <option value="2">ไม่อนุมัติ</option>
                        <option value="3">รอพิจารณา</option> -->
                      </select>

                      <?php if(form_error('reserveStatus_id') == ''){
                        }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('reserveStatus_id'); ?><br><?php echo form_error('reserveStatus_id');?></span>
                        <?php } ?> 

                    </div>
                  </div>
                    <div class="col-sm-10">
                        <a class="btn btn-warning" href="<?php echo site_url('Reservedata/index2');?>" role="button">ยกเลิก</a>
                        <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>                 
                </form>
              </div>
            </div> 
          </div>
        </div>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
        $( function() {
        var rsbookID = $("#book_IDdata").val();
          rsbookID = JSON.parse(rsbookID);
        $("#book_id" ).autocomplete({
            source: rsbookID
        }); 
        });
        </script>

        <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#reserveDate').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
            });
        </script>
        <?php include('footer_user.php');?>                   
    </body>
</html>