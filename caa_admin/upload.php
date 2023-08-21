<?php
include "connect.php";

if (isset($_POST['submit'])) {

    $countfiles = count($_FILES['file']['name']);

    $totalFileUploaded = 0;
    for ($i = 0; $i < $countfiles; $i++) {
        $filename = time() . $_FILES['file']['name'][$i];

        ## Location
        $location = "uploads/" . $filename;
        $location2 = "../../uploads/" . $filename;
        $location3 = "../../dev/uploads/" . $filename;
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        ## File upload allowed extensions
        $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");

        $response = 0;
        ## Check file extension
        if (in_array(strtolower($extension), $valid_extensions)) {
            ## Upload file
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $location)) {

                $sql = "INSERT INTO `images` (`id`, `image_name`) VALUES (NULL, '$filename')";
                $result = mysqli_query($conn, $sql);

                $target = "../uploads/" . $filename;
                $target2 = "../dev/uploads/" . $filename;
                copy($location, $target);
                copy($location, $target2);

                // $target = "../uploads/" . $filename;
                // if (rename($target, $location)) {
                //     echo "success";
                // } else {
                //     echo "nope";
                // }
            }
        }
    }
}

header("location: imageUpload.php");
