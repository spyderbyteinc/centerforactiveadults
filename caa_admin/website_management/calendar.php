<div id="calendar_container">

    <h2 class="table_heading"><span class="heading_contents">Calendar Selection</span></h2>

    <div class="button_container">
        <a href="#" class="bidzbutton devart save_calendar_button"><i class="fa-regular fa-floppy-disk"></i> Save</a>
    </div>

    <div class="scrolling_images">
        <div id="editor-container" class="">
            <div class="row droppable mybg">
                <?php
$sql = "SELECT * FROM `sorting` WHERE `type`='calendar'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sorted = $row['sorted'];
$temp = explode(",", $sorted);

for ($t = 0; $t < count($temp); $t++) {
    $id = $temp[$t];

    if ($id != "") {
        $image_sql = "SELECT * FROM `images` WHERE `id`=$id";
        $image_result = mysqli_query($conn, $image_sql);
        $image_row = mysqli_fetch_assoc($image_result);

        $image_name = $image_row['image_name'];

        ?>
                            <div id="draggable_<?php echo $id; ?>" class="span3 ui-draggable ui-draggable-handle ui-draggable-dragging editable">
                                <i class="remove_picture fa-solid fa-circle-xmark"></i>
                                <img src="./uploads/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>">
                            </div>
                        <?php
}
}
?>
            </div>
        </div>

        <?php include "./website_management/right_picture_drop.php";?>
    </div>

</div>
<script>

    $(document).on("click",".save_calendar_button",function(e) {
        e.preventDefault();


        var sorted = $(".droppable").sortable("toArray");

        var ids = [];

        for(var s = 0; s<sorted.length; s++){
            var item = sorted[s];

            var id = item.replace("draggable_", "");

            ids.push(id);
        }

        var new_sort = ids.join(",");

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'updateCalendar',
                'new_sort': new_sort
            },
            success: function (out) {
                console.log(out);
            }
        });

    });
</script>