<?php
include "includes/connect.php";

$type = $_POST['type'];
$entry = $_POST['entry'];

if ($type == "first_col") {
    $sql = "SELECT * FROM `classes` WHERE `class_type`='$entry'";
    $result = mysqli_query($conn, $sql);

    $all_data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $class_name = ucwords(strtolower($row['class_name']));

        $temp = array($id, $class_name);

        array_push($all_data, $temp);
    }

    echo json_encode($all_data);
    exit();
} else if ($type == "second_col") {
    $sql = "SELECT * FROM `classes` WHERE `id`=$entry";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $days = ucwords(strtolower($row['day']));
    $time = $row['time'];

    $ret = array($days, $time);

    echo json_encode($ret);
    exit();
} else if ($type == "slides") {
    $entry = $_POST['entry'];

    $sql = "SELECT * FROM `classes` WHERE `id`=$entry";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);
    exit();
}
