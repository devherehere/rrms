<div class="row">


    <div class="tab-control  offset1 span12 " data-effect="fade" data-role="tab-control" style="margin-top: 20px;">
        <ul class="tabs">

            <li class="active"><a href="#page1"><i class="icon-home"></i>ห้อง</a></li>
            <li class=""><a href="#page2"><i class="icon-cog"></i>ประเภทห้อง</a></li>


        </ul>

        <div class="frames">
            <div class="frame" id="page1">
                <div class="toolbar transparent">


                    <button class="add_room" id="add-room"><i class="icon-plus-2 on-left "></i>เพิ่มห้อง</button>


                </div>

                <div id="ajax-page1">
                    <table class="table bordered striped hovered">
                        <thead>
                        <th>หมายเลขห้อง</th>
                        <th>ประเภทห้อง</th>
                        <th>ดำเนินการ</th>


                        </thead>
                        <tbody>

                        <?php foreach ($all_room as $row): ?>
                            <tr>
                                <td class="span4"><?php echo $row->room_id ?></td>
                                <td class="span4"
                                    data-type-room-id="<?php echo $row->type_room_id; ?>"><?php echo $row->type_room_name; ?></td>
                                <td class="text-center">

                                    <button class="edit_room icon-wrench on-left info"
                                            data-room-id="<?php echo $row->room_id ?>"><i
                                            ></i> แก้ไข
                                    </button>
                                    <button class="del_room icon-minus-2 on-left info"
                                            data-room-id="<?php echo $row->room_id ?>"><i
                                            ></i> ลบ
                                    </button>


                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>


            </div>


            <div class="frame" id="page2">
                <div class="toolbar transparent">


                    <button id="add_type_room"><i class="icon-plus-2 on-left"></i>เพิ่มประเภทห้อง</button>

                </div>
                <div id="ajax-page2">

                    <table class="table bordered striped hovered">
                        <thead>
                        <th>ประเภทห้อง</th>
                        <th>ราคา</th>
                        <th>ดำเนินการ</th>
                        </thead>
                        <tbody>

                        <?php foreach ($all_type_room as $row): ?>
                            <tr>
                                <td class="span4"><?php echo $row->type_room_name ?></td>
                                <td class="span4 text-center"><?php echo $row->type_room_price ?></td>
                                <td class="text-center">

                                    <button class="edit_type_room icon-wrench on-left  info "
                                            data-type-room-id="<?php echo $row->type_room_id ?>"><i
                                            ></i> แก้ไข
                                    </button>
                                    <button class="del_type_room icon-minus-2 on-left info"
                                            data-type-room-id="<?php echo $row->type_room_id ?>"><i
                                            ></i> ลบ
                                    </button>


                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>


    </div>


</div>


<div id="dialog-add-room" title="เพิ่มห้อง">

    <form id="form-add-room" class="offset1 span4" autocomplete="off" method="post">
        <fieldset>

            <label>ชื่อห้อง</label>


            <div class="input-control text ">
                <input type="text" name="room_name" id="room_name"
                       placeholder="ใส่ชื่อห้อง...." required/>
            </div>

            <label>ประเภท</label>

            <div class="input-control select ">
                <select name="type_room_id" id="type_room_id" class="required">
                    <option value="">-เลือก-</option>
                    <?php foreach ($all_type_room as $row): ?>
                        <option value="<?php echo $row->type_room_id; ?>"><?php echo $row->type_room_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-action">
                <input type="button" id="btn-add-room" class="button primary size1 submit " value="เพิ่ม"/>
                <input type="button" id="close-dialog-add-room" class="button close" value="ปิด"/>
            </div>

        </fieldset>


    </form>

</div>

<div id="dialog-edit-room" title="แก้ไขห้อง">

    <form id="form-edit-room" class="offset1 span4" autocomplete="off" method="post">
        <fieldset>

            <label>ชื่อห้อง</label>


            <div class="input-control text ">
                <input type="text" name="edit_room_name" id="edit_room_name" disabled
                       placeholder="ใส่ชื่อห้อง...." required/>
            </div>

            <label>ประเภท</label>

            <div class="input-control select ">
                <select name="edit_type_room_id" id="edit_type_room_id" class="required">
                    <option value="">-เลือก-</option>
                    <?php foreach ($all_type_room as $row): ?>
                        <option value="<?php echo $row->type_room_id; ?>"><?php echo $row->type_room_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-action">
                <input type="button" id="btn-edit-room" class="button primary size1 submit " value="แก้ไข"/>
                <input type="button" id="close-dialog-edit-room" class="button close" value="ปิด"/>
            </div>

        </fieldset>


    </form>

</div>

<div id="dialog-model" title="เพิ่มประเภทห้อง">


    <form id="form-add-type" class="offset1 span4" autocomplete="off" method="post">
        <fieldset>

            <label>ชื่อประเภทห้อง</label>


            <div class="input-control text ">

                <input type="text" name="type_room_name" id="type_room_name" value="" class=""
                       placeholder="ใส่ชื่อประเภท" required/>
            </div>
            <label>ราคา</label>

            <div class="input-control text ">
                <input type="text" name="type_room_price" id="type_room_price" value="" class=" text-warning"
                       placeholder="ใส่ราคา"
                       required/>
            </div>

            <div class="form-action">
                <input type="button" id="add-type" class="button primary size1 submit " value="เพิ่ม"/>
                <input type="button" id="close-dialog-add" class="button close" value="ปิด"/>
            </div>

        </fieldset>


    </form>

</div>

<div id="dialog-edit" title="แก้ไขประเภทห้อง">


    <form id="form-edit-type-room" class="offset1 span4" autocomplete="off" method="post">
        <fieldset>

            <label>ชื่อประเภทห้อง</label>


            <div class="input-control text ">

                <input type="text" name="edit_type_room_name" id="edit-type-room-name" value="" class=""
                       placeholder="ใส่ชื่อประเภท" required/>
            </div>
            <label>ราคา</label>

            <div class="input-control text ">
                <input type="text" name="edit_type_room_price" id="edit-type-room-price" value="" class=" text-warning"
                       placeholder="ใส่ราคา"
                       required/>
            </div>

            <div class="form-action">
                <input type="button" id="edit-type" data-type-room-id="" class="button primary size1 submit "
                       value="แก้ไข"/>
                <input type="button" id="close-dialog-edit" class="button close" value="ปิด"/>
                <input type="hidden" id="room-id" name="room_id" value=""/>
            </div>

        </fieldset>


    </form>

</div>

<div id="debug"></div>


<script>
$(function () {

    var dialog_add_room = $('#dialog-add-room');
    var form_add = $('#form-add-type');
    var form_add_room = $('#form-add-room');
    var form_edit_room = $('#form-edit-room');
    var form_edit = $('#form-edit-type-room');
    var dialog_add = $('#dialog-model');
    var dialog_edit = $('#dialog-edit');
    var dialog_edit_room = $('#dialog-edit-room');
    var valid_form  , valid_form2, valid_form3 , valid_form4;
    var base_url = '<?php echo $base_url;?>';

    valid_form = form_add.validate({
        errorClass: 'text-warning tertiary-text-secondary',
        rules: {
            type_room_name: {
                required: true
            },
            type_room_price: {
                required: true,
                number: true

            }

        },
        messages: {
            type_room_name: "*ต้องกรอกประเภทห้อง",
            type_room_price: {
                required: "*ต้องกรอกราคา",
                number: "*ตัวเลขเท่านั้น!"

            }


        }

    });

    valid_form2 = form_edit.validate({
        errorClass: 'text-warning tertiary-text-secondary',
        rules: {
            edit_type_room_name: {
                required: true
            },
            edit_type_room_price: {
                required: true,
                number: true

            }

        },
        messages: {
            edit_type_room_name: "*ต้องกรอกประเภทห้อง",
            edit_type_room_price: {
                required: "*ต้องกรอกราคา",
                number: "*ตัวเลขเท่านั้น!"

            }


        }

    });

    valid_form3 = form_add_room.validate({
        errorClass: 'text-warning tertiary-text-secondary',
        rules: {
            room_name: {
                required: true
            },
            type_room_id: {
                required: true


            }

        },
        messages: {
            room_name: "*ต้องกรอกชื่อห้อง",
            type_room_id: "*ต้องเลือกปรเภท"

        }

    });

    valid_form4 = form_edit_room.validate({
        errorClass: 'text-warning tertiary-text-secondary',
        rules: {
            room_name: {
                required: true
            },
            type_room_id: {
                required: true


            }

        },
        messages: {
            room_name: "*ต้องกรอกชื่อห้อง",
            type_room_id: "*ต้องเลือกปรเภท"

        }

    });

    dialog_add.dialog({
        model: true,
        height: 500,
        width: 700,
        autoOpen: false

    });

    dialog_edit.dialog({
        model: true,
        height: 500,
        width: 700,
        autoOpen: false

    });

    dialog_add_room.dialog({

        model: true,
        autoOpen: false,
        height: 500,
        width: 700

    });


    dialog_edit_room.dialog({

        model: true,
        autoOpen: false,
        height: 500,
        width: 700

    });


    form_add.submit(function (event) {
        event.preventDefault();
        var type_room_name = $("input[name='type_room_name']").val();
        var type_room_price = $("input[name='type_room_price']").val();
        if (valid_form.form()) {

            $.post(base_url + 'ma_room/add_type_room', {type_room_name: type_room_name, type_room_price: type_room_price}, function () {

                $('#ajax-page2').load(base_url + 'ma_room #ajax-page2');
            });

            $('input[name*="type"]').val('');
            dialog_add.dialog('close');

        }


    });

    form_edit.submit(function (event) {
        event.preventDefault();
        var type_room_id = $("#room-id").val();

        var type_room_name = $("input[name='edit_type_room_name']").val();
        var type_room_price = $("input[name='edit_type_room_price']").val();


        if (valid_form2.form()) {

            $.post(base_url + 'ma_room/edit_type_room', {type_room_id: type_room_id, type_room_name: type_room_name, type_room_price: type_room_price}, function (data) {

                $('#ajax-page2').load(base_url + 'ma_room #ajax-page2');
                dialog_edit.dialog('close');
            });

        }
    });

    form_add_room.submit(function (event) {
        event.preventDefault();
        var room_id = $('input[name="room_name"]').val();
        var type_room = $('select[name="type_room_id"]').val();

        if (valid_form3.form()) {

            $.post(base_url + 'ma_room/add_room', {room_id: room_id, type_room: type_room}, function (data) {

                $('#ajax-page1').load(base_url + 'ma_room #ajax-page1');
                dialog_add_room.dialog('close');
            });

        }


    });


    form_edit_room.submit(function (evnet) {
        evnet.preventDefault();

        var room_id = $('input[name="edit_room_name"]').val();
        var type_room = $('select[name="edit_type_room_id"]').val();

        if (valid_form4.form()) {


            $.post(base_url + 'ma_room/edit_room', {room_id: room_id, type_room: type_room}, function (data) {

                $('#ajax-page1').load(base_url + 'ma_room #ajax-page1');
                dialog_edit_room.dialog('close');
            });


        }


    });


    $('#add-room').click(function () {
        dialog_add_room.dialog('open');

    });

    $('#btn-add-room').click(function () {
        form_add_room.submit();


    });


    $(document.body).on('click', '#btn-edit-room', function () {

        form_edit_room.submit();

    });


    $(document.body).on('click', '#add-type', function () {
        form_add.submit();
    });

    $(document.body).on('click', '#edit-type', function () {
        form_edit.submit();
    });

    $('#close-dialog-add').click(function () {
        dialog_add.dialog('close');

    });

    $('#close-dialog-add-room').click(function () {
        dialog_add_room.dialog('close');

    });

    $('#close-dialog-edit').click(function () {
        dialog_edit.dialog('close');
    });

    $('#close-dialog-edit-room').click(function () {
        dialog_edit_room.dialog('close');
    });


    $('#add_type_room').click(function () {
        $("input[name='type_room_name']").val("");
        $("input[name='type_room_price']").val("");
        dialog_add.dialog('open');

    });

    $('#ajax-page2').on('click', '.edit_type_room', function () {


        var type_room_name = $("input[name='edit_type_room_name']");
        var type_room_price = $("input[name='edit_type_room_price']");
        $('#room-id').val($(this).data('type-room-id'));
        dialog_edit.dialog('open');
        type_room_name.val($(this).parent().parent().find('td').first().text());
        type_room_price.val($(this).parent().parent().find('td').first().next().text());


    });


    $('#ajax-page2').on('click', '.del_type_room', function () {

        var type_room_id = $(this).data('type-room-id');
        var boolean = confirm('ต้องการลบ');
        if (boolean == true) {
            $.get(base_url + 'ma_room/del_type_room/' + type_room_id);
            $(this).parent().parent().remove();
            $.Notify.show('ลบข้อมูล')

        }

    });


    $('#ajax-page1').on('click', '.edit_room', function () {

        dialog_edit_room.dialog('open');
        var room_name = $(this).parent().parent().find('td').first().text();
        var type_room = $(this).parent().parent().find('td').first().next().data('type-room-id');
        $('#edit_room_name').val(room_name);
        $('#edit_type_room_id').val(type_room);
        $('#edit_type_room_id').val(type_room);

    });

    $('#ajax-page1').on('click', '.del_room', function () {

        var boolean = confirm('ต้องการลบ');
        var room_id = $(this).data('room-id');

        if (boolean == true) {
            $.post(base_url + 'ma_room/del_room/', {room_id: room_id});
            $(this).parent().parent().remove();
            $.Notify.show('ลบข้อมูล')

        }


    });


});


</script>