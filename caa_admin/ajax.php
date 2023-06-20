
<?php

include "connect.php";

$type = $_POST['type'];
$id = $_POST['id'];
$table = $_POST['table'];

if ($type == "map") {
    $sql = "SELECT * FROM `$table` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];

    $out = $address . ", " . $city . ", " . $state . ", " . $zip;

    echo json_encode($out);
    exit();
} else if ($type == "munic") {
    $sql = "SELECT * FROM `$table` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $municipality = $row['municipality'];

    echo json_encode($municipality);
    exit();
} else if ($type == "filter") {
    $users = $_POST['users'];

    echo json_encode($users);
    exit();
} else if ($type == "view_record") {
    $sql = "SELECT * FROM `$table` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);
    exit();
} else if ($type == "pictureChooser") {
    $picture_id = $_POST['picture'];

    $sql = "SELECT * FROM `images` WHERE `id`=$picture_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $image_name = $row['image_name'];

    echo json_encode($image_name);
    exit();
} else if ($type == "submitStaff") {
    $image = $_POST['image'];
    $staff_name = $_POST['staff_name'];
    $staff_role = $_POST['staff_role'];
    $staff_email = $_POST['staff_email'];

    $sql1 = "SELECT * FROM `images` WHERE `id`=$image";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $image_name = $row1['image_name'];

    $sql = "INSERT INTO `staff` (`id`, `name`, `image`, `role`, `email`) VALUES (NULL, '$staff_name', '$image_name', '$staff_role', '$staff_email');";

    mysqli_query($conn, $sql);

    $id = mysqli_insert_id($conn);

    $sort_sql = "SELECT * FROM `sorting` WHERE `type`='staff'";
    $sort_result = mysqli_query($conn, $sort_sql);
    $sort_row = mysqli_fetch_assoc($sort_result);

    $sorted = $sort_row['sorted'];

    $new_sorted = $sorted . "," . $id;

    $update_sql = "UPDATE `sorting` SET `sorted` = '$new_sorted' WHERE `type`='staff'";
    mysqli_query($conn, $update_sql);

    $out = array($id, $image_name, $staff_name, $staff_email, $staff_role);

    echo json_encode($out);
    exit();
} else if ($type == "delete_staff") {
    $id = $_POST['id'];

    $sql = "DELETE FROM `staff` WHERE `staff`.`id` = $id";
    mysqli_query($conn, $sql);

    $sort_sql = "SELECT * FROM `sorting` WHERE `type`='staff'";
    $sort_result = mysqli_query($conn, $sort_sql);
    $sort_row = mysqli_fetch_assoc($sort_result);

    $sorted = $sort_row['sorted'];

    $new_sorted = str_replace($id, "", $sorted);
    $update_sql = "UPDATE `sorting` SET `sorted` = '$new_sorted' WHERE `type`='staff'";
    mysqli_query($conn, $update_sql);

    echo json_encode("done_" . $id);
    exit();
} else if ($type == "edit_staff") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `staff` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $image = $row['image'];
    $role = $row['role'];
    $email = $row['email'];

    $out = array($id, $name, $image, $role, $email);

    echo json_encode($out);
    exit();
} else if ($type == "save_edit") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $image = $_POST['image'];

    // get image name
    $sql = "SELECT * FROM `images` WHERE `id`=$image";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image_name = $row['image_name'];

    $update_sql = "UPDATE `staff` SET `name` = '$name', `image` = '$image_name', `role` = '$role', `email` = '$email' WHERE `id`=$id";
    mysqli_query($conn, $update_sql);

    echo json_encode($image_name);
    exit();
} else if ($type == "get_sort_items") {
    $module = $_POST['module'];

    if ($module == "staff") {
        $sort_sql = "SELECT * FROM `sorting` WHERE `type`='staff'";
        $sort_result = mysqli_query($conn, $sort_sql);
        $sort_row = mysqli_fetch_assoc($sort_result);

        $sorted = $sort_row['sorted'];

        $temp = explode(",", $sorted);

        $ids = array();

        for ($t = 0; $t < count($temp); $t++) {
            $curr = $temp[$t];

            if ($curr != "") {
                array_push($ids, $curr);
            }
        }

        $all_staff = array();

        for ($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];

            $sql = "SELECT * FROM `staff` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $name = $row['name'];
            $email = $row['email'];
            $role = $row['role'];
            $image = $row['image'];

            $record = array($id, $name, $image, $role, $email);

            array_push($all_staff, $record);
        }

        echo json_encode($all_staff);
        exit();
    }
} else if ($type == "updateSorter") {
    $module = $_POST['module'];
    $new_sort = $_POST['new_sort'];

    if ($module == "staff") {
        $update_sql = "UPDATE `sorting` SET `sorted` = '$new_sort' WHERE `type`='staff'";
        mysqli_query($conn, $update_sql);

        $temp = explode(",", $new_sort);

        $records = array();

        for ($t = 0; $t < count($temp); $t++) {
            $id = $temp[$t];

            if ($id != "") {
                $sql = "SELECT * FROM `staff` WHERE `id`=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $name = $row['name'];
                $email = $row['email'];
                $role = $row['role'];
                $image = $row['image'];

                $record = array($id, $name, $email, $role, $image);

                array_push($records, $record);
            }
        }

        echo json_encode($records);
        exit();
    }

} else if ($type == "updateCalendar") {
    $new_sort = $_POST['new_sort'];

    $update_sql = "UPDATE `sorting` SET `sorted` = '$new_sort' WHERE `type`='calendar'";

    mysqli_query($conn, $update_sql);

    echo json_encode('done');
    exit();
} else if ($type == "updateScrolling") {
    $new_sort = $_POST['new_sort'];

    $update_sql = "UPDATE `sorting` SET `sorted` = '$new_sort' WHERE `type`='scrolling'";

    mysqli_query($conn, $update_sql);

    echo json_encode($update_sql);
    exit();
}