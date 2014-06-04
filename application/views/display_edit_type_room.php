<form id="form1" class="offset1 span4" autocomplete="off" method="post">
    <fieldset>
        <legend>แก้ไขประเภท</legend>
        <label>ชื่อประเภทห้อง</label>

        <div class="input-control text ">

            <input type="text" name="type_room_name" data-type-room-id="<?php echo $type_room->type_room_id; ?>"
                   value="<?php echo $type_room->type_room_name; ?>" class="size3" placeholder="ใส่ชื่อประเภท"
                   required/>
        </div>
        <label>ราคา</label>

        <div class="input-control text ">
            <input type="number" name="type_room_price" value="<?php echo $type_room->type_room_price; ?>"
                   class="size3 text-warning" placeholder="ใส่ราคา"
                   required/>
        </div>

        <div class="form-action">
            <input type="submit" class="button primary size1 " id="submit" value="แก้ไข"/>
            <input type="button" class="button" value="ปิด" onclick="$.Dialog.close();"/>
        </div>

    </fieldset>


</form>


<script>
    $(function () {


        $('#form1').submit(function (event) {
            var type_room_id = $("input[name='type_room_name']").data('type-room-id');
            var type_room_name = $("input[name='type_room_name']").val();
            var type_room_price = $("input[name='type_room_price']").val();


            $.post('<?php echo $base_url?>ma_room/edit_type_room', {type_room_id: type_room_id, type_room_name: type_room_name, type_room_price: type_room_price}, function () {
                event.preventDefault();
                $('body.metro').load('<?php echo $base_url;?>ma_room');

            });


        });


    });


</script>