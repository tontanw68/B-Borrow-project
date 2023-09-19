<div class="col-md-3">
    <div class="card py-3 px-3 mt-10 h-100">
    <p class="fs-2 text-center">เมนูหลัก</p>
        <div class="d-grid gap-3">
            <a href="<?php echo site_url('login/logout');?>" class="btn btn-danger" onclick="return confirm('ยืนยัน');">ออกจากระบบ</a>
            <a href="<?php echo site_url('Showdata/userShow1');?>" class="btn btn-primary">จัดการข้อมูลผู้ใช้</a>
            <a href="<?php echo site_url('Showdata/bookShow3');?>" class="btn btn-primary">จัดการข้อมูลหนังสือ</a>
            <a href="<?php echo site_url('Showdata/fineShow');?>" class="btn btn-primary">จัดการข้อมูลค่าปรับ</a>
            <a href="<?php echo site_url('Showdata/userStatusShow2');?>" class="btn btn-primary">จัดการข้อมูลประเภทสถานภาพ</a>
            <a href="<?php echo site_url('Showdata/booktypeShow2');?>" class="btn btn-primary">จัดการข้อมูลประเภทหนังสือ</a>
            <a href="<?php echo site_url('Showdata/staffDetail');?>" class="btn btn-primary">จัดการข้อมูลรายละเอียดตารางงานเจ้าหน้าที่</a>
            <a href="<?php echo site_url('Showdata/staffShow');?>" class="btn btn-primary">จัดการข้อมูลตารางงานเจ้าหน้าที่</a>
            <a href="<?php echo site_url('Showdata/announceShow');?>" class="btn btn-primary">จัดการข้อมูลประกาศ</a>
            <a href="<?php echo site_url('Showdata/rulesShow');?>" class="btn btn-primary">จัดการข้อมูลระเบียบห้องสมุด</a>
            <!-- <a href="<?php /*echo site_url('Insertdata/index2');*/?>" class="btn btn-primary">Upload file</a> -->
            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">รายงาน</button>
                <div class="dropdown-menu">
                    <a href="<?php echo site_url('Report/userRp2');?>" class="dropdown-item">รายงานข้อมูลผู้ใช้</a>
                    <a href="<?php echo site_url('Report/bookRpadmin');?>" class="dropdown-item">รายงานข้อมูลหนังสือ</a>
                    <a href="<?php echo site_url('Report/borrowReportAdmin');?>" class="dropdown-item">รายงานการยืม-คืน</a>
                    <a href="<?php echo site_url('Report/stReportAdmin');?>" class="dropdown-item">รายงานตารางงานเจ้าหน้าที่</a>
                </div>
        </div>
    </div>
</div>