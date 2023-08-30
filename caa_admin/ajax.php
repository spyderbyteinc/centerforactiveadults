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

    $temp = explode(",", $sorted);

    $new_ids = array();

    for ($t = 0; $t < count($temp); $t++) {
        $curr = $temp[$t];

        if ($curr != $id) {
            array_push($new_ids, $curr);
        }
    }

    $new_sorted = join(",", $new_ids);

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
} else if ($type == "get_events") {
    $id = $_POST['id'];

    $all_events = array();

    $sql = "SELECT * FROM `classes` WHERE `class_type`=$id";
    $result = mysqli_query($conn, $sql);
    while ($event_row = mysqli_fetch_assoc($result)) {
        $id = $event_row['id'];
        $class_name = $event_row['class_name'];
        $class_type = $event_row['class_type'];
        $day = $event_row['day'];
        $time = $event_row['time'];
        $picture = $event_row['picture'];

        $event_arr = array($id, $class_name, $class_type, $day, $time, $picture);
        array_push($all_events, $event_arr);
    }

    echo json_encode($all_events);
    exit();
} else if ($type == "my_event") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `classes` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $class_name = $row['class_name'];
    $class_type = $row['class_type'];
    $day = $row['day'];
    $time = $row['time'];
    $picture = $row['picture'];

    $sql = "SELECT * FROM `class_type` WHERE `id`=$class_type";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $type = $row['type'];

    $image_sql = "SELECT * FROM `images` WHERE `image_name`='$picture'";
    $image_result = mysqli_query($conn, $image_sql);
    $image_row = mysqli_fetch_assoc($image_result);

    $image_id = $image_row['id'];

    $event_arr = array($id, $class_name, $type, $day, $time, $picture, $class_type, $image_id);

    echo json_encode($event_arr);
    exit();
} else if ($type == "get_picture") {
    $id = $_POST['id'];

    if ($id == -1) {
        // no image selected
        echo json_encode('na');
        exit();
    }
    $sql = "SELECT * FROM `images` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $image_name = $row['image_name'];
    $image_id = $row['id'];

    $out = array($image_id, $image_name);
    echo json_encode($out);
    exit();
} else if ($type == "update_event") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $class_type = $_POST['class_type'];
    $picture_id = $_POST['picture_id'];

    $image_sql = "SELECT * FROM `images` WHERE `id`=$picture_id";
    $image_result = mysqli_query($conn, $image_sql);
    $image_row = mysqli_fetch_assoc($image_result);

    $image_name = $image_row['image_name'];

    $classtype_sql = "SELECT * FROM `class_type` WHERE `id`=$class_type";
    $classtype_result = mysqli_query($conn, $classtype_sql);
    $classtype_row = mysqli_fetch_assoc($classtype_result);

    $ctype = $classtype_row['type'];

    $sql = "UPDATE `classes` SET `class_name` = '$name', `class_type`= '$class_type', `day`='$day', `time`='$time', `picture`='$image_name' WHERE `id` = $id;";

    mysqli_query($conn, $sql);

    $out = array($image_name, $ctype);

    echo json_encode($out);
    exit();
} else if ($type == "create_event") {
    $name = $_POST['name'];
    $day = $_POST['days'];
    $time = $_POST['times'];
    $class_type = $_POST['class_type'];
    $picture_id = $_POST['picture_id'];

    $image_sql = "SELECT * FROM `images` WHERE `id`=$picture_id";
    $image_result = mysqli_query($conn, $image_sql);
    $image_row = mysqli_fetch_assoc($image_result);

    $image_name = $image_row['image_name'];

    $sql = "INSERT INTO `classes` (`id`, `class_name`, `class_type`, `day`, `time`, `picture`) VALUES (NULL, '$name', '$class_type', '$day', '$time', '$image_name');";

    mysqli_query($conn, $sql);
    $id = mysqli_insert_id($conn);

    echo json_encode($id);
    exit();
} else if ($type == "event_name") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `classes` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $class_name = $row['class_name'];

    echo json_encode($class_name);
    exit();
} else if ($type == "delete_event") {
    $id = $_POST['id'];

    $sql = "DELETE FROM `classes` WHERE `id`=$id";
    mysqli_query($conn, $sql);

    echo json_encode("deleted");
    exit();
} else if ($type == "create_member") {
    $data = $_POST['data'];
    $columns = $_POST['columns'];

    $out = array();

    for ($c = 0; $c < count($columns); $c++) {
        $col = $columns[$c];

        $value = $data[$col];

        $out[$col] = $value;
    }

    // var columns = ['last_name', 'first_name', 'key_tag', 'last_visit_main', 'spouse', 'last_visit_spouse', 'address', 'city', 'state', 'zip', 'home_phone', 'municipality', 'email', 'newsletter', 'emergency_contact_1', 'emergency_phone_1', 'emergency_contact_2', 'emergency_phone_2', 'number_in_home', 'head_of_household', 'race', '62_older', 'membership_date', 'member_fee_paid_notes'];

    $last_name = $out['last_name'];
    $first_name = $out['first_name'];
    $key_tag = $out['key_tag'];
    $last_visit_main = $out['last_visit_main'];
    $spouse = $out['spouse'];
    $last_visit_spouse = $out['last_visit_spouse'];
    $address = $out['address'];
    $city = $out['city'];
    $state = $out['state'];
    $zip = $out['zip'];
    $home_phone = $out['home_phone'];
    $municipality = $out['municipality'];
    $email = $out['email'];
    $newsletter = $out['newsletter'];
    $emergency_contact_1 = $out['emergency_contact_1'];
    $emergency_phone_1 = $out['emergency_phone_1'];
    $emergency_contact_2 = $out['emergency_contact_2'];
    $emergency_phone_2 = $out['emergency_phone_2'];
    $number_in_home = $out['number_in_home'];
    $head_of_household = $out['head_of_household'];
    $race = $out['race'];
    $sixty_to_older = $out['62_older'];
    $membership_date = $out['membership_date'];
    $member_fee_paid_notes = $out['member_fee_paid_notes'];

    $sql = "INSERT INTO `members` (`id`, `last_name`, `first_name`, `key_tag`, `last_visit_main`, `spouse`, `last_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`, `email`, `newsletter`, `emergency_contact_1`, `emergency_phone_1`, `emergency_contact_2`, `emergency_phone_2`, `number_in_home`, `head_of_household`, `race`, `62_older`, `membership_date`, `member_fee_paid_notes`, `vaccine`) VALUES (NULL, '$last_name', '$first_name', '$key_tag', '$last_visit_main', '$spouse', '$last_visit_spouse', '$address', '$city', '$state', '$zip', '$home_phone', '$municipality', '$email', '$newsletter', '$emergency_contact_1', '$emergency_phone_1', '$emergency_contact_2', '$emergency_phone_2', '$number_in_home', '$head_of_household', '$race', '$sixty_to_older', '$membership_date', '$member_fee_paid_notes', '-1')";

    mysqli_query($conn, $sql);

    $new_id = mysqli_insert_id($conn);

    $sql2 = "INSERT INTO `pkey` (`id`, `membership`, `fkey`) VALUES (NULL, 'member', $new_id)";
    mysqli_query($conn, $sql2);

    echo json_encode("done");
    exit();
} else if ($type == "add_newsletter") {
    $month1 = $_POST['month1'];
    $month2 = $_POST['month2'];
    $year = $_POST['year'];
    $pdf_choice = $_POST['pdf_choice'];

    $month = $month1 . ", " . $month2;

    $sql = "INSERT INTO `newsletters` (`id`, `name`, `month`, `year`) VALUES (NULL, '$pdf_choice', '$month', '$year');";

    mysqli_query($conn, $sql);

    echo json_encode($sql);
    exit();
} else if ($type == "update_newsletters") {
    $sorted = $_POST['sorted'];
    $active = $_POST['active'];

    $update_sql = "UPDATE `sorting` SET `sorted` = '$sorted' WHERE `type`='newsletters'";
    mysqli_query($conn, $update_sql);

    $newsletter_sql = "UPDATE `newsletters` SET `active`=''";
    mysqli_query($conn, $newsletter_sql);

    $active_sql = "UPDATE `newsletters` SET `active`='active' WHERE `id`=$active";
    mysqli_query($conn, $active_sql);

    echo json_encode("Saved!");
    exit();
} else if ($type == "delete_user_record") {
    $id = $_POST['id'];
    $table = $_POST['table'];

    $sql = "DELETE FROM `$table` WHERE `id`=$id";
    mysqli_query($conn, $sql);

    $pkey_membership = "";
    if ($table == "members") {
        $pkey_membership = "member";
    } else if ($table == "no_forms") {
        $pkey_membership = "no_forms";
    }
    $sql = "DELETE FROM `pkey` WHERE `membership`='$pkey_membership' AND `fkey`=$id";
    mysqli_query($conn, $sql);

    echo json_encode('done');
    exit();
} else if ($type == "create_noform") {
    $data = $_POST['data'];

    $first_name = $data[0];
    $last_name = $data[1];
    $spouse = $data[2];
    $first_visit_main = $data[3];
    $first_visit_spouse = $data[4];
    $address = $data[5];
    $city = $data[6];
    $state = $data[7];
    $municipality = $data[8];
    $zip = $data[9];
    $home_phone = $data[10];

    $sql = "INSERT INTO `no_forms` (`id`, `last_name`, `first_name`, `first_visit_main`, `spouse`, `first_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`) VALUES (NULL, '$last_name', '$first_name', '$first_visit_main', '$spouse', '$first_visit_spouse', '$address', '$city', '$state', '$zip', '$home_phone', '$municipality')";
    mysqli_query($conn, $sql);

    $new_id = mysqli_insert_id($conn);

    $sql2 = "INSERT INTO `pkey` (`id`, `membership`, `fkey`) VALUES (NULL, 'no_forms', $new_id)";
    mysqli_query($conn, $sql2);

    echo json_encode("done");
    exit();
} else if ($type == "get_noform_data") {
    $id = $_POST['id'];
    $cols = $_POST['cols'];

    $out = array();

    for ($c = 0; $c < count($cols); $c++) {
        $col = $cols[$c];

        $sql = "SELECT `$col` AS `col` FROM `no_forms` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $out[$col] = $row['col'];
    }

    echo json_encode($out);
    exit();
} else if ($type == "transition_member") {
    $data = $_POST['data'];
    $columns = $_POST['columns'];
    $old_id = $_POST['old_id'];

    $out = array();

    for ($c = 0; $c < count($columns); $c++) {
        $col = $columns[$c];

        $value = $data[$col];

        $out[$col] = $value;
    }

    $last_name = $out['last_name'];
    $first_name = $out['first_name'];
    $key_tag = $out['key_tag'];
    $last_visit_main = $out['last_visit_main'];
    $spouse = $out['spouse'];
    $last_visit_spouse = $out['last_visit_spouse'];
    $address = $out['address'];
    $city = $out['city'];
    $state = $out['state'];
    $zip = $out['zip'];
    $home_phone = $out['home_phone'];
    $municipality = $out['municipality'];
    $email = $out['email'];
    $newsletter = $out['newsletter'];
    $emergency_contact_1 = $out['emergency_contact_1'];
    $emergency_phone_1 = $out['emergency_phone_1'];
    $emergency_contact_2 = $out['emergency_contact_2'];
    $emergency_phone_2 = $out['emergency_phone_2'];
    $number_in_home = $out['number_in_home'];
    $head_of_household = $out['head_of_household'];
    $race = $out['race'];
    $sixty_to_older = $out['62_older'];
    $membership_date = $out['membership_date'];
    $member_fee_paid_notes = $out['member_fee_paid_notes'];

    $sql = "INSERT INTO `members` (`id`, `last_name`, `first_name`, `key_tag`, `last_visit_main`, `spouse`, `last_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`, `email`, `newsletter`, `emergency_contact_1`, `emergency_phone_1`, `emergency_contact_2`, `emergency_phone_2`, `number_in_home`, `head_of_household`, `race`, `62_older`, `membership_date`, `member_fee_paid_notes`, `vaccine`) VALUES (NULL, '$last_name', '$first_name', '$key_tag', '$last_visit_main', '$spouse', '$last_visit_spouse', '$address', '$city', '$state', '$zip', '$home_phone', '$municipality', '$email', '$newsletter', '$emergency_contact_1', '$emergency_phone_1', '$emergency_contact_2', '$emergency_phone_2', '$number_in_home', '$head_of_household', '$race', '$sixty_to_older', '$membership_date', '$member_fee_paid_notes', '-1')";

    mysqli_query($conn, $sql);

    $new_id = mysqli_insert_id($conn);

    $sql2 = "INSERT INTO `pkey` (`id`, `membership`, `fkey`) VALUES (NULL, 'member', $new_id)";
    mysqli_query($conn, $sql2);

    $sql3 = "DELETE FROM `pkey` WHERE `membership`='no_forms' AND `fkey`=$old_id";
    mysqli_query($conn, $sql3);

    $sql4 = "DELETE FROM `no_forms` WHERE `id`=$old_id";
    mysqli_query($conn, $sql4);

    echo json_encode("done");
    exit();
} else if ($type == "submit_deposit") {
    $sql = $_POST['sql'];

    mysqli_query($conn, $sql);

    echo json_encode("done!");
    exit();
} else if ($type == "class_details") {
    $class_id = $_POST['class_id'];

    $sql = "SELECT * FROM `deposit_classes` WHERE `id`=$class_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $class_name = $row['class_name'];
    $class_type = $row['class_type'];
    $class_cost = $row['cost'];
    $class_instructor = $row['instructor'];

    $out = array($class_name, $class_type, $class_cost, $class_instructor);

    echo json_encode($out);
    exit();
} else if ($type == "pkey_grabber") {
    $id = $_POST['id'];
    $membership = $_POST['membership'];

    $sql = "SELECT * FROM `pkey` WHERE `membership`='$membership' AND `fkey`=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $key = $row['id'];

    $out = $key . "--" . $membership . "--" . $id;

    echo json_encode($out);
    exit();
} else if ($type == "create_deposit_record") {
    $mydate = $_POST['mydate'];
    $class_id = $_POST['class_id'];
    $class_instructor = $_POST['class_instructor'];
    $class_cost = $_POST['class_cost'];
    $user_pkey = $_POST['user_pkey'];
    $payment_type = $_POST['payment_type'];
    $special_information = $_POST['special_information'];

    $sql = "INSERT INTO `deposit_record` (`id`, `record_date`, `class_id`, `class_instructor`, `class_cost`, `user_pkey`, `payment_type`, `special_information`) VALUES (NULL, '$mydate', '$class_id', '$class_instructor', '$class_cost', '$user_pkey', '$payment_type', '$special_information');";

    mysqli_query($conn, $sql);
    echo json_encode($sql);
    exit();
} else if ($type == "update_table_arr") {
    $the_date = $_POST['the_date'];

    $all_data = array();
    $sql = "SELECT * FROM `deposit_record` WHERE `record_date`='$the_date';";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $class_id = $row['class_id'];
        $class_cost = $row['class_cost'];
        $payment_type = $row['payment_type'];

        $record = array($class_id, $class_cost, $payment_type);

        array_push($all_data, $record);
    }

    echo json_encode($all_data);
    exit();
}
