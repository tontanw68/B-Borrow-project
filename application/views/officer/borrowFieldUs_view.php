<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>ระบบจัดการยืม-คืนหนังสือ</title>
  <!-- สำหรับวันเดือนปีแบบไทย -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/datepicker-th.js"></script>

  <!-- วันที่แบบไทยใหม่ -->
  <!-- css -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- js -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet"> -->
   
  <style type="text/css">
        .fr{
            color: red;
        }
  </style>
	
</head>
<body>
    <div class="container font"> 
      <?php include('officerNavbar.php');?>    
          <div class="row">
          <?php include('officerMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">ยืมหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>ยืมหนังสือ</h2>
                  </div>
                </div>
                <hr>

                <div class="col-auto">
                <form action="<?php echo site_url ('Borrowdata/selectUserBr'); ?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">กรอกข้อมูลสมาชิก</label>
                    </div>
                    <!-- </div> -->
                    <div class="col-auto">
                      <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo set_value('user_id'); ?>" required/>
                      <input type='hidden' id='user_IDdata' value='<?php echo json_encode($forUs);?>' />
                      <!-- <input type='hidden' id='user_Ndata' value='<?php /*echo json_encode($userN);*/?>' /> -->
                    </div>
                    <div class="col-auto">
                      <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                </form>
                </div>
                    
                <!-- <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php /*echo site_url('Borrowdata');*/?>" role="button">ยกเลิก</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#brUserTable');
        </script>
      

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
        $( function() {
        var bruserID = $("#user_IDdata").val();
          bruserID = JSON.parse(bruserID);
        $("#user_id" ).autocomplete({
            source: bruserID
        }); 
        });
        </script>
        <!-- <script type="text/javascript">
        var date_start = new Date();
        date_start.setDate(date_start.getDate());
        $('#borrowDay').datepicker({
            format:'dd-mm-yyyy',
            language:'th',
            startDate: date_start,
        });
      </script> -->
      <?php include('footer_officer.php');?>
</body>
</html>
