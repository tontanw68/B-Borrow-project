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
                <!-- <p class="fs-2">เพิ่มข้อมูลหนังสือ</p> -->
                <div class="row">
                  <div class="col">
                    <h2>เพิ่มข้อมูลหนังสือ</h2>
                  </div>
                </div>
                <hr>
                <form action="<?php echo site_url ('Bookdata/addbookdata'); ?>" method="post" enctype="multipart/form-data">
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="bookName" name="bookName"  value="<?php echo set_value('bookName'); ?>" required>
                    <input type='hidden' id='bookNamedata' value='<?php echo json_encode($adbookName);?>' />

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
                      <input type="text" class="form-control" id="author" name="author"  value="<?php echo set_value('author'); ?>" required>
                      <input type='hidden' id='authordata' value='<?php echo json_encode($adauthor);?>' />

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
                      <input type="text" class="form-control" id="years" name="years"  value="<?php echo set_value('years'); ?>" required>
                      <input type='hidden' id='yearsdata' value='<?php echo json_encode($adyears);?>' />

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
                      <input type="text" class="form-control" id="publisher" name="publisher"  value="<?php echo set_value('publisher'); ?>" required>
                      <input type='hidden' id='publisherdata' value='<?php echo json_encode($adpublisher);?>' />
                      
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
                    <input type="text" class="form-control" id="keyword" name="keyword"  value="<?php echo set_value('keyword'); ?>" required>
                    <input type='hidden' id='keyworddata' value='<?php echo json_encode($adkeyword);?>' />
                    
                    <?php if(form_error('keyword') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('keyword'); ?><br><?php echo form_error('keyword');?></span>
                    <?php } ?>
                    </div>
                    <div class="col" style="color: red; font-size: 25px;">*</div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">หัวข้อ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="Section" name="Section"  value="<?php echo set_value('Section'); ?>">
                    <input type='hidden' id='Sectiondata' value='<?php echo json_encode($adSection);?>' />
                    
                    <?php if(form_error('Section') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('Section'); ?><br><?php echo form_error('Section');?></span>
                    <?php } ?>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">เลขเรียกหนังสือ</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="bookNumber" name="bookNumber"  value="<?php echo set_value('bookNumber'); ?>" required>
                    <input type='hidden' id='bookNumberdata' value='<?php echo json_encode($adbookNumber);?>' />
                  
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
                    <input type="text" class="form-control" id="barcode" name="barcode"  value="<?php echo set_value('barcode'); ?>">
                    <input type='hidden' id='barcodedata' value='<?php echo json_encode($adbookbar);?>' />
                  
                    <?php if(form_error('barcode') == ''){

                    }else{ ?>
                      <span class="fr">ข้อมูลไม่ถูกต้อง : <?php echo set_value('barcode'); ?><br><?php echo form_error('barcode');?></span>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">สถานะ</label>
                    <div class="col-sm-3">

                      <!-- <select name="bookStatus_id" id="" class="form-select" required>
                        <option value="" ><?php /*echo set_value('bookStatus_id');*/ ?></option>
                        <option value="" >เลือกข้อมูล</option>
                        <option value="1">ยังไม่ถูกยืม</option>
                        <option value="2">ถูกยืมไปแล้ว</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="bookStatus_id" value="" required>
                        <!-- <option selected value="">เลือกข้อมูล</option> -->
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach ($bstdata as $row) { ?>
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
                      <!-- <select name="bookType_id" id="" class="form-select" required> 
                        <option value="" ><?php /*echo set_value('bookType_id'); */?></option>
                        <option value="" >เลือกข้อมูล</option>
                        <option value="1">สารคดี</option>
                        <option value="2">นิทาน</option>
                      </select> -->

                      <select class="form-select" id="inputGroupSelect01" type="text" name="bookType_id" value="" required>
                        <option selected value="">-เลือกข้อมูล-</option>
                        <optgroup label="เลือกข้อมูล">
                          <?php foreach($btdata as $row){?> 
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
                    <input type="file" class="form-control" id="" name="image" accept="image/*"><p><small>ไฟล์รูปภาพ gif/jpeg/png/ ขนาดไม่เกิน 3000x3000</small></p>
                    </div>
                  </div>
                  
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <a class="btn btn-warning" href="<?php echo site_url('Showdata/bookShow3');?>" role="button">ยกเลิก</a>
                    <input class="btn btn-primary" type="submit" value="บันทึก">
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
          var adauthor = 
              $("#authordata").val();
              adauthor = JSON.parse(adauthor);
          $("#author" ).autocomplete({
              source: adauthor
          }); 

          var adbookName = 
              $("#bookNamedata").val();
              adbookName = JSON.parse(adbookName);
          $("#bookName" ).autocomplete({
              source: adbookName
          }); 

          var adyears = 
              $("#yearsdata").val();
              adyears = JSON.parse(adyears);
          $("#years" ).autocomplete({
              source: adyears
          }); 

          var adpublisher = 
              $("#publisherdata").val();
              adpublisher = JSON.parse(adpublisher);
          $("#publisher" ).autocomplete({
              source: adpublisher
          });

          var adkeyword = 
              $("#keyworddata").val();
              adkeyword = JSON.parse(adkeyword);
          $("#keyword" ).autocomplete({
              source: adkeyword
          });

          var adSection = 
              $("#Sectiondata").val();
              adSection = JSON.parse(adSection);
          $("#Section" ).autocomplete({
              source: adSection
          });

          var adbookNumber = 
              $("#bookNumberdata").val();
              adbookNumber = JSON.parse(adbookNumber);
          $("#bookNumber" ).autocomplete({
              source: adbookNumber
          });

          var adbookbar = 
              $("#barcodedata").val();
              adbookbar = JSON.parse(adbookbar);
          $("#barcode" ).autocomplete({
              source: adbookbar
          });
        });
        </script>
</body>
</html>
