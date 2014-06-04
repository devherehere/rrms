<nav class="navigation-bar bg-blue">
    <nav class="navigation-bar-content">


        <a href="<?php echo $base_url . 'ui/ui'; ?>" class="element"><i class="icon-windows"></i>หน้าหลัก</a>

        <span class="element-divider"></span>


        <div class="element">
            <i class="icon-cog"></i>
            <a href="#" class="dropdown-toggle">จัดการข้อมูลพื้นฐาน</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="<?php echo $base_url . 'ma_room'; ?>">จัดการข้อมูลห้องพัก</a></li>
                <li><a href="#">จัดการข้อมูลลูกค้า</a></li>
                <li><a href="#">จัดการข้อมูลค่าใช้จ่าย</a></li>
                <li><a href="#">จัดการข้อมูลสถานที่</a></li>
                <li><a href="#">ตั้งค่าระบบ</a></li>
            </ul>

        </div>
        <span class="element-divider"></span>

        <div class="element">
            <i class="icon-clipboard-2"></i>
            <a href="#" class="dropdown-toggle">จัดการห้องพัก</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li>
                    <a class="dropdown-toggle">รายชั่วคราว</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="<?php echo $base_url . 'temporary/index'; ?>">สถานะการเข้าพัก</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $base_url . 'temporary/check_in'; ?>">Check in</a></li>
                        <li><a href="<?php echo $base_url . 'temporary/check_out'; ?>">Check Out</a></li>
                        <li><a href="#">Setting</a></li>
                    </ul>
                </li>
                <li><a href="#" class="dropdown-toggle">รายวัน</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="#">Check in</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="#">Setting</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">รายเดือน</a>
                    <ul class="dropdown-menu" data-role="dropdown">
                        <li><a href="#">Check in</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="#">Setting</a></li>
                    </ul>
                </li>

            </ul>
        </div>


        <span class="element-divider"></span>

        <div class="element">
            <a href="#" class="dropdown-toggle"><i class="icon-printer"></i> รายงาน</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li class="span4"><a href="#">รายงานการเข้าพัก [ รายวัน ]</a></li>
                <li class="span4"><a href="#">รายงานการเข้าพัก [ รายเดือน ]</a></li>
                <li class="span4"><a href="#">รายงานสถานะห้องพัก </a></li>
                <li class="span4"><a href="#">รายงาน [ รายรับ/รายจ่าย ]</a></li>

            </ul>

        </div>
        <span class="element-divider"></span>

    </nav>
</nav>