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

            <p class="text-success"> เข้าพัก [ <?php echo $query->num_rows(); ?> ] ห้อง</p>
            <?php foreach ($query->result() as $row) : ?>
                <div class=" tile bg-gray check-out " data-time="" data-click="tranform" data-hint=""
                     data-hint-position="top">

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


    <script>

        $(function () {

            $('div.check-out').each(function () {
                var checkout = $(this);
                var room_id = checkout.find('span.name').text();
                $.get('<?php echo $base_url;?>temporary/display_detail_check_in/' + room_id, {}, function (data) {
                    checkout.data('hint', data);
                });

                $.get('<?php echo $base_url;?>temporary/top_time_check_in/' + room_id, {}, function (data) {
                    checkout.data('time', data);
                });


            });

            $('div.check-out').click(function () {
                var checkout = $(this);
                var room_id = checkout.find('span.name').text();
                var boolean = confirm('ต้องการ Check out ห้อง ' + room_id);
                var d = new Date();
                var hours = d.getHours().toString();
                var min = d.getMinutes().toString();
                var sec = d.getSeconds().toString();
                var time = hours + ':' + min + ':' + sec;
                var time_check_in = checkout.data('time');


                if (boolean == true) {

                    $.get('<?php echo $base_url;?>temporary/check_out/' + room_id, {}, function () {


                        $('body.metro').load('<?php echo $base_url;?>temporary/check_out/', {}, function () {

                            $.get('<?php echo $base_url;?>temporary/compare_date/' + room_id, {}, function (data) {

                                var content = data;

                                $.Dialog({
                                    icon: '<span class="icon-windows"></div> ',
                                    title: 'RRMS',
                                    overlay: true,
                                    content: content,
                                    width: 400,
                                    height: 300


                                });
                            });
                        });

                    });
                }


            });
        });


    </script>