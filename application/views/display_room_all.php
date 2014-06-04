<div style="margin-top: 50px;" xmlns="http://www.w3.org/1999/html"></div>


<div class="grid">
    <div class="row">
        <div class="span4">
            <nav class="sidebar light span3">
                <ul>
                    <li class="title">ห้องพักชั่วคราว</li>
                    <li class=""><a class="icon-home" href="<?php echo $base_url . 'temporary/index' ?>">
                            สถานะการเข้าพัก</a> </a></li>
                    <li class=""><a class="icon-home" href="<?php echo $base_url . 'temporary/check_in' ?>"> Check
                            in</a></a></li>
                    <li class=""><a class="icon-home" href="<?php echo $base_url . 'temporary/check_out' ?>"> Check
                            out</a></a></li>


                </ul>
            </nav>

        </div>
        <div class="span10">

            <p>
                <span class="text-info">ห้องทั้งหมด [ <?php echo $num_room_temp_all; ?> ] ห้อง </span> /
                <span class="text-success">ห้องว่าง [ <?php echo $num_room_empty; ?> ] ห้อง </span>/
                <span class="text-alert">เข้าพัก [ <?php echo $num_room_check_in; ?> ] ห้อง </span>
            </p>
            <?php foreach ($query->result() as $row) :
                $bg = '';
                if ($row->room_status == 0) {
                    $bg = 'bg-blue';
                } else {
                    $bg = 'bg-gray';

                }
                ?>
                <div class=" tile <?php echo $bg; ?>" data-click="tranform">
                    <div class="tile-content icon">
                        <i class="icon-home"></i>
                    </div>

                    <div class="tile-status">
                        <span class="name"><?php echo $row->room_id; ?> </span>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>






