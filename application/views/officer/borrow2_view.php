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

                <?php
                $k = $this->input->post('user_id');
                if ($k != '' ) {
                $brBorrow = 0;
                if($brStatus != null){
                  $brBorrow = $brStatus[0]->cb;
                  } 
                }
                if ($k != '' ) {
                  // $brBorrow = 0;
                  // if($brStatus != null){
                  //   $brBorrow = $brStatus[0]->cb;
                  // } 
                if ($brBorrow < $usStatus[0]->number) {
                        // echo "<p style='color: red'>555.</p>";
                ?>
                <form action="<?php echo site_url ('Borrowdata/selectBookBr'); ?>" method="post">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">กรอกข้อมูลหนังสือ</label>
                    </div>
                    <!-- </div> -->
                    <div class="col-auto">
                      <input type="text" name="book_id" id="book_id" class="form-control" value="<?php echo set_value('book_id'); ?>" required/>
                      <input type='hidden' id='book_IDdata' value='<?php echo json_encode($forB);?>' />
                      <!-- <input type='hidden' id='user_Ndata' value='<?php /*echo json_encode($userN);*/?>' /> -->
                    </div>
                    <div class="col-auto">
                      <input type="date" class="form-control" id="" name="borrowDay" value="<?php echo date("Y-m-d", strtotime("now")) ?>" hidden required>
                    </div>
                    <div class="col-auto">
                      <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                </form>
                <hr>
                <?php } ?>
                <?php } ?>  
                
                <p class="fs-5">"<?php echo $usStatus[0]->user_id." ".$usStatus[0]->name." ".$usStatus[0]->surename; ?>"<?php echo " [ ".$usStatus[0]->userStatus_type." = ".$usStatus[0]->number." เล่ม ]";?></p>
                <p class="fs-5">"หนังสือที่ยังไม่คืน : <?php echo $brBorrow; ?> เล่ม สามารถยืมได้อีก : <?php echo $usStatus[0]->number-$brBorrow; ?> เล่ม"</p>
                       
                <div class="table-responsive">
                        <table id="brUserTable" class="table table-striped table-bordered">
                            <thead style="background-color: darkgray;">
                                <tr>
                                    <th style ="width: 2px">No.</th>
                                    <th>รหัสหนังสือ</th>
                                    <th>ชื่อหนังสือ</th>
                                    <th>วันที่ยืม</th>
                                    <th>กำหนดคืน</th>
                                    <th style ="width: 2px">คืนแล้ว</th>
                                    <!-- <th>แก้ไข</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                                <?php $i = 0;
                                $page = 0; ?>
                                
                                <br>
                                <?php foreach ($query as $row) { ?>
                                    <tr>
                                        <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                                        <td><?php echo $page + $i += 1; ?></td>
                                        <td><?php echo $row->book_id; ?></td>
                                        <td><?php echo $row->bookName; ?></td>
                                        <td><?php echo $row->borrowDay; ?></td>
                                        <td><?php echo $row->returnDay; ?></td>
                                        <td>
                                        <?php 
                                          if ($row->borrowStatus_id == 1){ 
                                          ?>
                                            <img style="height: 5vh;" src="<?php echo base_url('img/check1.png'); ?>">
                                          <?php }else{?>
                                            <img style="height: 5vh;" src="<?php echo base_url('img/check2.png'); ?>">
                                            <?php }
                                          ?>
                                        </td>

                                        <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                                        <!-- <td><a class="btn btn-warning" href="<?php /*echo site_Url('fineTypedata/edit/') . $row->fineType_id;*/ ?>"><i class="fa-solid fa-pen-to-square"></i></a></td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    
                <div class="col-sm-10">
                    <!-- <input type="hidden" name="borrow_id" value=""> -->
                    <a class="btn btn-warning" href="<?php echo site_url('Borrowdata/fieldUs');?>" role="button">ยกเลิก</a>
                </div>
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
        var brbookID = $("#book_IDdata").val();
          brbookID = JSON.parse(brbookID);
        $("#book_id" ).autocomplete({
            source: brbookID
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
