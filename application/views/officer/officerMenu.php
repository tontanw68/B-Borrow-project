<div class="col-md-3">
    <div class="card py-3 px-3 mt-10 h-100">      
    <p class="fs-2 text-center">เมนูหลัก</p>
        <div class="d-grid gap-3">
            <a href="<?php echo site_url('login/logout');?>" class="btn btn-danger" onclick="return confirm('ยืนยัน');">ออกจากระบบ</a>
            <a href="<?php echo site_url('Officerdata/profile');?>" class="btn btn-primary">แก้ไขข้อมูลผู้ใช้</a>
            <a href="<?php echo site_url('Showdata/bookShow4');?>" class="btn btn-primary">จัดการข้อมูลหนังสือ</a>
            <!-- Borrowdata/nextPage -->
            <a href="<?php echo site_url('Borrowdata/borrowpage');?>" class="btn btn-primary">จัดการข้อมูลการยืม-คืน</a>
            <!-- data-bs-toggle ให้สามารถเลือกเมนูย่อยได้ -->
            <!-- <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">จัดการข้อมูลการยืม-คืน </button>
                <div class="dropdown-menu">
                    <a href="<?php /*echo site_url('Borrowdata/nextPage');*/?>" class="dropdown-item">ยืมหนังสือ</a>
                    <a href="<?php /*echo site_url('Borrowdata/nextPage');*/?>" class="dropdown-item">คืนหนังสือ</a>
                </div> -->
            <a href="<?php echo site_url('showdata/reserveShow');?>" class="btn btn-primary">จัดการข้อมูลการจอง</a>
            <a href="<?php echo site_url('showdata/offineShow');?>" class="btn btn-primary">จัดการข้อมูลค่าปรับ</a>
            <a href="<?php echo site_url('Showdata/userStatusShow');?>" class="btn btn-primary">จัดการข้อมูลประเภทสถานภาพ</a>
            <a href="<?php echo site_url('Showdata/booktypeShow');?>" class="btn btn-primary">จัดการข้อมูลประเภทหนังสือ</a>
            <a href="<?php echo site_url('Showdata/staffShow2');?>" class="btn btn-primary">จัดการข้อมูลตารางงานเจ้าหน้าที่</a>
            <a href="<?php echo site_url('Showdata/announceShow1');?>" class="btn btn-primary">จัดการข้อมูลประกาศ</a>
            <!-- <a href="<?php /*echo site_url('');*/?>" class="btn btn-primary">รายงาน</a> -->
            <!-- data-bs-toggle ให้สามารถเลือกเมนูย่อยได้ -->
            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">รายงาน</button>
                <div class="dropdown-menu">
                    <!-- Report/userRp  อันเดิม-->
                    <a href="<?php echo site_url('Report/userRp');?>" class="dropdown-item">รายงานข้อมูลผู้ใช้</a>
                    <a href="<?php echo site_url('Report/index2');?>" class="dropdown-item">รายงานข้อมูลหนังสือ</a>
                    <a href="<?php echo site_url('Report/borrowRp');?>" class="dropdown-item">รายงานการยืม-คืน</a>
                    <a href="<?php echo site_url('Report/reserveRp');?>" class="dropdown-item">รายงานการจอง</a>
                    <a href="<?php echo site_url('Report/stReport');?>" class="dropdown-item">รายงานตารางงานเจ้าหน้าที่</a>
                    <a href="<?php echo site_url('Report/fineReport');?>" class="dropdown-item">รายงานข้อมูลค่าปรับ</a>
                </div>

            <!-- ทดสอบ -->
            <!-- <a href="<?php /*echo site_url('Autocompletedata');?>" class="btn btn-primary">click</a>
            <a href="<?php echo site_url('Autocompletedata/booknow');?>" class="btn btn-primary">click2</a>
            <a href="<?php echo site_url('Showdata/index2');*/?>" class="btn btn-primary">click3</a> -->
        </div>
    </div>
</div>