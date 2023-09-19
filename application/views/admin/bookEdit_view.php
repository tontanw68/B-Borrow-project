<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>ระบบจัดการยืม-คืนหนังสือ</title>
  <style type="text/css">
        .fr{
            color: red;
        }
    </style>

	
</head>
<body>
    <div class="container font"> 
      <?php include('adminNavbar.php');?>    
          <div class="row">
          <?php include('adminMenu.php');?>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-10 h-100">
                <!-- <h1>menu</h1> -->
                <!-- <p class="fs-2">แก้ไขข้อมูลหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>แก้ไขข้อมูลหนังสือ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Bookdata/editBookdata'); ?>" method="post" enctype="multipart/form-data">
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">รหัสหนังสือ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="" name="book_id"  value="<?php echo $query->book_id;?>" readonly>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="bookName" name="bookName"  value="<?php echo $query->bookName;?>" required>
                    <input type='hidden' id='bookNamedata' value='<?php echo json_encode($adeditbookName);?>' />
                    
                    <!-- เช็คข้อมูลว่าถ้าไม่มี form_error เกิดขึ้นไม่ต้องแสดงข้อความ เพราะถ้าไม่ทำเงื่อนไขทุกๆ field จะแสดงข้อความ -->
                    <?php if(form_error('bookName') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookName'); ?><br><?php echo form_error('bookName');?></span>
                    <?php } ?> 
                    
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">ผู้แต่ง</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" id="author" name="author" value="<?php echo $query->author;?>" required>
                      <input type='hidden' id='authordata' value='<?php echo json_encode($adeditauthor);?>' />
                     
                      <?php if(form_error('author') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('author'); ?><br><?php echo form_error('author');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputprename" class="col-sm-2 col-form-label">ปีที่พิมพ์หนังสือ</label>
                      <div class="col-sm-3">
                      <input type="text" class="form-control" id="years" name="years" value="<?php echo $query->years;?>" required>
                      <input type='hidden' id='yearsdata' value='<?php echo json_encode($adedityears);?>' />
                      
                      <?php if(form_error('years') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('years'); ?><br><?php echo form_error('years');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                      <label for="inputName" class="col-sm-2 col-form-label">สำนักพิมพ์</label>
                      <div class="col-sm-6">
                      <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $query->publisher;?>" required>
                      <input type='hidden' id='publisherdata' value='<?php echo json_encode($adeditpublisher);?>' />
                      
                      <?php if(form_error('publisher') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('publisher'); ?><br><?php echo form_error('publisher');?></span>
                      <?php } ?> 
                      </div>
                      <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">คำสำคัญ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo $query->keyword;?>">
                    <input type='hidden' id='keyworddata' value='<?php echo json_encode($adeditkeyword);?>' />
                    
                    <?php if(form_error('keyword') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('keyword'); ?><br><?php echo form_error('keyword');?></span>
                    <?php } ?> 
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">หัวข้อ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="Section" name="Section" value="<?php echo $query->Section;?>">
                    <input type='hidden' id='Sectiondata' value='<?php echo json_encode($adeditSection);?>' />
                    
                    <?php if(form_error('Section') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('Section'); ?><br><?php echo form_error('Section');?></span>
                    <?php } ?> 
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เลขเรียกหนังสือ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="bookNumber" name="bookNumber" value="<?php echo $query->bookNumber;?>" required>
                    <input type='hidden' id='bookNumberdata' value='<?php echo json_encode($adeditbookNumber);?>' />
                    
                    <?php if(form_error('bookNumber') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookNumber'); ?><br><?php echo form_error('bookNumber');?></span>
                    <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">บาร์โค้ด</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?php echo $query->barcode;?>">
                    <input type='hidden' id='barcodedata' value='<?php echo json_encode($adeditbookbar);?>' />
                    
                    <?php if(form_error('barcode') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('barcode'); ?><br><?php echo form_error('barcode');?></span>
                    <?php } ?> 
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สถานะ</label>
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="bookStatus" required> -->
                      <!-- <select type="text" name="bookStatus_id" id="" class="form-select" required>
                      <option selected value="<?php echo $query->bookStatus_id;?>"><?php echo $query->bookStatus;?></option> 
                        <option value="" >เลือกข้อมูล</option>
                        <option value="1">ยังไม่ถูกยืม</option>
                        <option value="2">ถูกยืมแล้ว</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="bookStatus_id" value="" required>
                      <option selected value="<?php echo $query->bookStatus_id; ?>"><?php echo $query->bookStatus; ?></option>
                      <optgroup label="เลือกข้อมูล">
                        <?php foreach ($stdata as $row) { ?>
                          <option value="<?php echo $row->bookStatus_id; ?>"><?php echo $row->bookStatus; ?></option>
                        <?php } ?>
                      </optgroup>
                      </select>

                      <?php if(form_error('bookStatus_id') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookStatus_id'); ?><br><?php echo form_error('bookStatus_id');?></span>
                      <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">ประเภทหนังสือ</label>
                    <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="" name="bookType"> -->
                      <!-- <select type="text" name="bookType_id" id="" class="form-select" value="" required> 
                        <option  selected value="<?php /*echo $query->bookType_id;?>"><?php echo $query->bookType_name;*/?></option>
                        <option value="" >เลือกข้อมูล</option>
                        <option value="1">สารคดี</option>
                        <option value="2">นิทาน</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="bookType_id" value="" >
                        <option selected value="<?php echo $query->bookType_id;?>"><?php echo $query->bookType_name;?></option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($bookt as $row){?> 
                            <option value="<?php echo $row->bookType_id;?>"><?php echo $row->bookType_name;?></option>
                          <?php } ?>
                        </optgroup>
                    </select>
                      <?php if(form_error('bookType_id') == ''){

                      }else{ ?>
                        <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('bookType_id'); ?><br><?php echo form_error('bookType_id');?></span>
                      <?php } ?> 
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  
                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">รูปหน้าปก</label>
                    <div class="col-sm-6">
                      <!-- image/* ให้เลือกแค่ไฟล์ภาพเท่านั้น -->
                      <br>
                      ภาพเก่า<br>
                      <br>
                      <?php if($query->image != ''){?>
                        <img src="<?php echo base_url('img/book/'.$query->image);?>" width="300px" alt="">
                      <?php }else{ ?>
                        <img src="<?php echo base_url('img/book/book_default.jpg'); ?>" width="300px">
                      <?php } ?>
                    <input type="file" class="form-control" id="" name="image" accept="image/*" ><p><small>ไฟล์รูปภาพ gif/jpeg/png/ ขนาดไม่เกิน 3000x3000</small></p>
                    </div>
                  </div>


                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/bookShow3');?>" role="button">ยกเลิก</a>
                    <input class="btn btn-primary" type="submit" value="ยืนยัน">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php include('footer_admin.php');?>
       <!-- autocomplete -->
       <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>

        $( function() {
          var adeditauthor = 
              $("#authordata").val();
              adeditauthor = JSON.parse(adeditauthor);
          $("#author" ).autocomplete({
              source: adeditauthor
          }); 

          var adeditbookName = 
              $("#bookNamedata").val();
              adeditbookName = JSON.parse(adeditbookName);
          $("#bookName" ).autocomplete({
              source: adeditbookName
          }); 

          var adedityears = 
              $("#yearsdata").val();
              adedityears = JSON.parse(adedityears);
          $("#years" ).autocomplete({
              source: adedityears
          }); 

          var adeditpublisher = 
              $("#publisherdata").val();
              adeditpublisher = JSON.parse(adeditpublisher);
          $("#publisher" ).autocomplete({
              source: adeditpublisher
          });

          var adeditkeyword = 
              $("#keyworddata").val();
              adeditkeyword = JSON.parse(adeditkeyword);
          $("#keyword" ).autocomplete({
              source: adeditkeyword
          });

          var adeditSection = 
              $("#Sectiondata").val();
              adeditSection = JSON.parse(adeditSection);
          $("#Section" ).autocomplete({
              source: adeditSection
          });

          var adeditbookNumber = 
              $("#bookNumberdata").val();
              adeditbookNumber = JSON.parse(adeditbookNumber);
          $("#bookNumber" ).autocomplete({
              source: adeditbookNumber
          });

          var adeditbookbar = 
              $("#barcodedata").val();
              adeditbookbar = JSON.parse(adeditbookbar);
          $("#barcode" ).autocomplete({
              source: adeditbookbar
          });
        });
        </script>
</body>
</html>
