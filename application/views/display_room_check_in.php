<div style="margin-top: 50px;" xmlns="http://www.w3.org/1999/html"></div>
<div class="grid">
    <div class="row ">

        <div class="span4  ">
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
            <p class="text-success"> ห้องว่าง [ <?php echo $query->num_rows(); ?> ] ห้อง</p>
            <?php foreach ($query->result() as $row) : ?>
                <div class=" tile bg-blue check-in" data-click="tranform">
                    <div class="tile-content icon">
                        <i class="icon-home"></i>
                    </div>
                    <div class="tile-status">
                        <span class="name"><?php echo $row->room_id; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</div>


<script>
    $(function () {

        $('div.check-in').click(function () {

            var room_id = $(this).find('span.name').text();
            var boolean = confirm('ต้องการ Check in ห้อง' + room_id);

            if (boolean == true) {

                $.get('<?php echo $base_url;?>temporary/check_in/' + room_id, {}, function () {
                    $('body.metro').load('<?php echo $base_url;?>temporary/check_in/', {}, function () {
                        $.Notify.show('Check in ห้อง' + room_id);

                    });

                });


            }

        });


    });

</script>