
    <div class="row  mybg special">
        <?php
include "../connect.php";

$sql = "SELECT * FROM `images`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $image = $row['image_name'];
    ?>
        <div id="draggable_<?php echo $id; ?>" class= "draggable span3">
            <i class="remove_picture fa-solid fa-circle-xmark"></i>
            <img src="uploads/<?php echo $image; ?>" alt="<?php echo $image; ?>">
        </div>

        <?php }?>
    </div>
