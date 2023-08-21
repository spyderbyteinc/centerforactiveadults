<?php
$all_keys = array();

$key_sql = "SELECT * FROM `pkey` WHERE `membership`='member'";
$key_result = mysqli_query($conn, $key_sql);
while ($key_row = mysqli_fetch_assoc($key_result)) {
    $fkey = $key_row['fkey'];
    array_push($all_keys, $fkey);
}

// handle all_members
$all_members_csl = array();
$all_members_lt = array();
$all_members_got = array();
$all_members_other = array();

for ($k = 0; $k < count($all_keys); $k++) {
    $fkey = $all_keys[$k];

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

$output = array($all_members_csl, $all_members_lt, $all_members_got, $all_members_other);

?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <div id="members">
        <h2 class="table_heading"><span class="heading_contents">Just Members</span></h2>

        <table class="fancy_table" id="all_member_table">
            <tr class="table_header">
                <th class="table_col" id="last_name">Last Name</th>
                <th class="table_col" id="first_name">First Name</th>
                <th class="table_col" id="spouse">Spouse</th>
                <th class="table_col">Address</th>
                <th class="table_col" id="zipcode">ZipCode</th>
                <th class="table_col">Phone</th>
                <th class="table_col" id="membership">Membership</th>
                <th class="table_col" id="municipality">Municipality</th>
                <th class="table_col" id="special_actions">Special Actions</th>
            </tr>
        </table>
    </div>

<script>
    var users = <?php echo json_encode($output); ?>;

    for(var u = 0; u < users.length; u++){

        var group = users[u];

        for(var g = 0; g  < group.length; g++){
            var record = group[g];

            var id = record[0];
            var last_name = record[1];
            var first_name = record[2];
            var spouse = record[3];
            var address = record[4];
            var zip = record[5];
            var home_phone = record[6];
            var membership = record[7];
            var municipality = record[8];
            var table = record[9];

            var template = `
                <tr class="table_row">
                    <input type="hidden" name="member_id" class="member_id" value="${id}">
                    <td class="table_col last_name">${last_name}</td>
                    <td class="table_col first_name">${first_name}</td>
                    <td class="table_col">${spouse}</td>
                    <td class="table_col">${address}</td>
                    <td class="table_col">${zip}</td>
                    <td class="table_col">${home_phone}</td>
                    <td class="table_col"><strong>${membership}</strong></td>
                    <td class="table_col municipality_selection">${municipality}</td>
                    <td class="table_col special_actions">
                        <a href="#" class="view_record" name="id=${id},table=${table}" title="View Record">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="#" class="view_map"  name="id=${id},table=${table}" title="View Map">
                            <i class="fa-solid fa-earth-americas"></i>
                        </a>
                        <a href="#" class="delete_record"  name="id=${id},table=${table}" title="Delete User">
                           <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            `;

            $("#all_member_table").append(template);
        }
    }
</script>