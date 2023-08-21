<?php

include "connect.php";
function mysort($arr)
{
    $all_members_csl = $arr[0];
    $all_members_lt = $arr[1];
    $all_members_got = $arr[2];
    $all_members_other = $arr[3];

    $no_forms_csl = $arr[4];
    $no_forms_lt = $arr[5];
    $no_forms_got = $arr[6];
    $no_forms_other = $arr[7];

    sort_arr($all_members_got);
}

function sort_arr($group)
{
    for ($i = 0; $i < count($group); $i++) {

        $min_idx = $i;

        for ($j = $i + 1; $j < count($group); $j++) {
            if (strcmp($group[$j][1], $group[$min_idx][1]) < 0) {
                $min_idx = $j;
            }
        }

        $temp = $group[$min_idx];
        $group[$min_idx] = $group[$i];
        $group[$i] = $temp;
    }

    var_dump($group);
}

$key_sql = "SELECT * FROM `pkey`";
$key_result = mysqli_query($conn, $key_sql);

$all_members = array();
$all_no_forms = array();

while ($key_row = mysqli_fetch_assoc($key_result)) {
    $id = $key_row['id'];
    $membership = $key_row['membership'];
    $fkey = $key_row['fkey'];

    $out = $id . "??||&&" . $membership . "??||&&" . $fkey;

    if ($membership == "member") {
        array_push($all_members, $out);
    } else if ($membership == "no_forms") {
        array_push($all_no_forms, $out);
    }
}

// handle all_members
$all_members_csl = array();
$all_members_lt = array();
$all_members_got = array();
$all_members_other = array();

for ($m = 0; $m < count($all_members); $m++) {
    $record = $all_members[$m];

    $comps = explode("??||&&", $record);

    $pkey = $comps[0];
    $fkey = $comps[2];

    $member_sql = "SELECT * FROM `members` WHERE `id`=$fkey";
    $member_result = mysqli_query($conn, $member_sql);
    $member_row = mysqli_fetch_assoc($member_result);

    $last_name = $member_row['last_name'];
    $first_name = $member_row['first_name'];
    $spouse = $member_row['spouse'];
    $address = $member_row['address'];
    $zip = $member_row['zip'];
    $home_phone = $member_row['home_phone'];
    $membership = "Member";
    $municipality = $member_row['municipality'];
    $table = "members";

    $temp = array($fkey, $last_name, $first_name, $spouse, $address, $zip, $home_phone, $membership, $municipality, $table);

    if ($municipality == "City of South Lyon") {
        array_push($all_members_csl, $temp);
    } else if ($municipality == "Lyon Township") {
        array_push($all_members_lt, $temp);
    } else if ($municipality == "Green Oak Township") {
        array_push($all_members_got, $temp);
    } else {
        array_push($all_members_other, $temp);
    }

}

// handle no_forms
$no_forms_csl = array();
$no_forms_lt = array();
$no_forms_got = array();
$no_forms_other = array();

for ($m = 0; $m < count($all_no_forms); $m++) {
    $record = $all_no_forms[$m];

    $comps = explode("??||&&", $record);

    $pkey = $comps[0];
    $fkey = $comps[2];

    $member_sql = "SELECT * FROM `no_forms` WHERE `id`=$fkey";
    $member_result = mysqli_query($conn, $member_sql);
    $member_row = mysqli_fetch_assoc($member_result);

    $last_name = $member_row['last_name'];
    $first_name = $member_row['first_name'];
    $spouse = $member_row['spouse'];
    $address = $member_row['address'];
    $zip = $member_row['zip'];
    $home_phone = $member_row['home_phone'];
    $membership = "Incomplete";
    $municipality = $member_row['municipality'];
    $table = "no_forms";

    $temp = array($fkey, $last_name, $first_name, $spouse, $address, $zip, $home_phone, $membership, $municipality, $table);

    if ($municipality == "City of South Lyon") {
        array_push($no_forms_csl, $temp);
    } else if ($municipality == "Lyon Township") {
        array_push($no_forms_lt, $temp);
    } else if ($municipality == "Green Oak Township") {
        array_push($no_forms_got, $temp);
    } else {
        array_push($no_forms_other, $temp);
    }
}

$output = array($all_members_csl, $all_members_lt, $all_members_got, $all_members_other, $no_forms_csl, $no_forms_lt, $no_forms_got, $no_forms_other);

mysort($output);
