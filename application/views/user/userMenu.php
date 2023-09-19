<div class="col-md-3">
    <div class="card py-3 px-3 mt-10 h-100">
    <p class="fs-2 text-center">เมนูหลัก</p>
        <div class="d-grid gap-3">
            <a href="<?php echo site_url('login/logout');?>" class="btn btn-danger" onclick="return confirm('ยืนยัน');">ออกจากระบบ</a>
            <a href="<?php echo site_url('userdata/profile');?>" class="btn btn-primary">แก้ไขข้อมูลผู้ใช้</a>
            <a href="<?php echo site_url('Bookdata/index5');?>" class="btn btn-primary">ค้นหาหนังสือ</a>
            <a href="<?php echo site_url('Reservedata/index2');?>" class="btn btn-primary">จัดการข้อมูลการจอง</a>
            <!-- Usearchdata -->
            <a href="<?php echo site_url('Borrowdata/userBorrowpage');?>" class="btn btn-primary">ค้นหาข้อมูลการยืม-คืน</a>
            <a href="<?php echo site_url('Showdata/announceShow2');?>" class="btn btn-primary">ค้นหาข้อมูลประกาศ</a>
            <a href="<?php echo site_url('Userdata/fineSearch');?>" class="btn btn-primary">ค้นหาข้อมูลค่าปรับ</a>
        </div> 
    </div>
</div>