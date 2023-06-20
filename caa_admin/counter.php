<?php

include "connect.php";

$members = 0;
$spouses = 0;

$sql = "SELECT * FROM `members` WHERE `municipality`='Green Oak Township'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $sp = $row['spouse'];

    if ($sp != "") {
        $spouses++;
    }

    $members++;
}

$sql = "SELECT * FROM `no_forms` WHERE `municipality`='Green Oak Township'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $sp = $row['spouse'];

    if ($sp != "") {
        $spouses++;
    }

    $members++;
}

$total = $members + $spouses;

echo "Members: " . $members . "</br>\n";
echo "Spouses: " . $spouses . "</br>\n";
echo "Total: " . $total . "</br>\n";
