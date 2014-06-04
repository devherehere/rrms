<script>
    $(function () {

        $('div.tmp').click(function () {
            var room_id = $(this).find('span.name').text();
            //alert(name);
            var boolean = confirm('ต้องการ Check in ห้อง ' + room_id);
            if (boolean == true) {
                window.location = '<?php echo $base_url;?>temporary/do_checkin/' + room_id;

            }

        });


    });

</script>