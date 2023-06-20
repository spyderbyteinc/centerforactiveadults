<?php
include "header.php";
include "connect.php";
?>

<main id="content">

    <h1 class="page_heading">Image Uploads</h1>

    <form method='post' action='upload.php' enctype='multipart/form-data'>

    <input type="file" name="file[]" id="file" multiple>
    <input type='submit' name='submit' value='Upload'>

    </form>

    <?php
$all_images = array();

$sql = "SELECT * FROM `images`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $image_name = $row['image_name'];

    array_push($all_images, $image_name);
}
?>

    <div id="all_images">
        <?php
for ($i = 0; $i < count($all_images); $i++) {
    $image = $all_images[$i];

    $img = "uploads/" . $image;
    ?>

        <img src="<?php echo $img; ?>" alt="<?php echo $image; ?>">
        <?php }?>
    </div>
</main>
