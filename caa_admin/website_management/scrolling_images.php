<div id="scrolling_image_container">

    <h2 class="table_heading"><span class="heading_contents">Scrolling Images</span></h2>

    <div class="button_container">
        <a href="#" class="bidzbutton devart save_scrolling_button"><i class="fa-regular fa-floppy-disk"></i> Save</a>
        <a href="#" class="bidzbutton preview_button"><i class="fa-regular fa-circle-play"></i> Preview</a>
    </div>

    <div class="scrolling_images">
        <div id="editor-container" class="">
            <div class="row droppable mybg">

                <?php
$sort_sql = "SELECT * FROM `sorting` WHERE `type`='scrolling'";
$sort_result = mysqli_query($conn, $sort_sql);
$sort_row = mysqli_fetch_assoc($sort_result);

$sorted = $sort_row['sorted'];

$temp = explode(",", $sorted);

$ids = array();

for ($t = 0; $t < count($temp); $t++) {
    $id = $temp[$t];

    if ($id != "") {
        $sql = "SELECT * FROM `images` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $image_name = $row['image_name'];

        ?>
                            <div id="draggable_<?php echo $id; ?>" class="span3 ui-draggable ui-draggable-handle ui-draggable-dragging editable">
                                <i class="remove_picture fa-solid fa-circle-xmark"></i>
                                <img src="uploads/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>">
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
    $(document).on("click",".save_scrolling_button",function(e) {
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
                'type': 'updateScrolling',
                'new_sort': new_sort
            },
            success: function (out) {
                console.log("done");
            }
        });
    });
</script>