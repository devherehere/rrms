<?php
$row = $query->row();
?>
<div class="row">ห้อง <?php echo $room_id; ?></div>

<div class="row ">check in</div>
<div class="row ">วันที่ : <?php echo $row->date; ?></div>
<div class="row time-check-in" data-time="<?php echo $row->time; ?>">เวลา : <?php echo $row->time; ?></div>