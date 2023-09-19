<html>

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <title>ระบบจัดการยืม-คืนหนังสือ</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>

  <div class="container font">
    <?php include('officerNavbar.php'); ?>
    <div class="row">
      <?php include('officerMenu.php'); ?>
      <div class="col-md-9">
        <div class="card py-3 px-5 mt-10 h-100">
          <div class="row">
            <div class="col">
              <h2>เจ้าหน้าที่</h2>
            </div>
          </div>
          
          <!-- <p class="fs-5">สถานภาพ : <?php /*echo $usStatus[0]->userStatus_type;*/ ?></p>  -->
          <hr>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                <div class="card-body" style="background: #FFFFCC;">
                    <h5 class="card-title">การจองที่รออนุมัติ</h5>
                    <!-- <p class="card-text"><?php /*echo $checkConfirm." รายการ";*/?></p> -->
                    <a style="text-decoration: none" href="<?php echo site_url('Showdata/reserveShow2');?>"><?php echo $checkConfirm." รายการ";?></a><?php echo nbs(20);?><i class="fa-sharp fa-solid fa-stopwatch"></i>
                    
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <div class="card-body" style="background: #7FFFD4;">
                    <h5 class="card-title">หนังสือที่ยังไม่คืน</h5>
                    <!-- <p class="card-text"><?php /*echo $checkRtbook." รายการ";*/?></p> -->
                    <a style="text-decoration: none" href="<?php echo site_url('Borrowdata/borrowpage2');?>"><?php echo $checkRtbook." รายการ";?></a><?php echo nbs(20);?><i class="fa-solid fa-circle-xmark"></i>
                        
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <div class="card-body" style="background: #FFC0CB;">
                    <h5 class="card-title">ค่าปรับที่รอชำระ</h5>
                    <!-- <p class="card-text"><?php /*echo $checkfine." รายการ";*/?></p> -->
                    <a style="text-decoration: none" href="<?php echo site_url('Showdata/fineUserShow');?>"><?php echo $checkfine." รายการ";?></a><?php echo nbs(20);?><i class="fa-solid fa-money-check-dollar"></i>
                    
                </div>
                </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <h2>ตารางงาน</h2>
            </div>
          </div>
          <div class="table-responsive">
            <table id="myBorrowTable2" class="table table-striped table-bordered">
              <thead style="background-color: darkgray;">
                <tr>

                  <!-- <th style="width: 10%">ชื่อ</th> -->
                  <th style="width: 10%">วันที่</th>
                  <th style="width: 20%">รายละเอียดงาน</th>
                  <th style="width: 10%">เวลาเริ่ม</th>
                  <th style="width: 10%">เวลาสิ้นสุด</th>
                  <!-- <th style="width: 5%">แก้ไข</th> -->
                </tr>
              </thead>
              <tbody>
                <!-- เอาตัวแปล query ที่มาจาก controller มาเปลี่ยนชื่อเป็น row -->
                <?php foreach ($query as $row) { ?>
                  <tr>
                    <!-- เอาข้อมูลจะต้องการแสดงแต่ละคอลัมออกมา -->
                    <!-- <td><?php/* echo $row->name; */?></td> -->
                    <td><?php echo date('d/m/Y',strtotime($row->workDate)); ?></td>
                    <td><?php echo $row->WorkDetails; ?></td>
                    <td><?php echo $row->workStart_time; ?></td>
                    <td><?php echo $row->workEnd_time; ?></td>

                    <!-- เรียกไปที่ controller insertdata แล้วไปฟังก์ชัน edit แล้วแก้ไขที่ id เท่าไหร่ -->
                    <!-- <td><a class="btn btn-warning" href="<?php /*echo site_Url('Staffdata/edit/') . $row->work_id; */?>"><i class="fa-solid fa-pen-to-square"></i></a></td> -->
                  </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>

          <!-- <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputprename" class="col-sm-2 col-form-label">Prename</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-sm-2 col-form-label">name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>
                </form> -->
        </div>
      </div>
    </div>
  </div>

  <?php include('footer_officer.php'); ?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myBorrowTable2');
  </script>
</body>

</html>