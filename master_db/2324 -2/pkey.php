<?php
include "connect.php";

$sql = "SELECT * FROM `no_forms`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $fkey = $row['id'];
    $membership = "no_forms";

    $insert = "INSERT INTO `pkey` (`id`, `membership`, `fkey`) VALUES (NULL, '$membership', $fkey);";
    echo $insert;
}
