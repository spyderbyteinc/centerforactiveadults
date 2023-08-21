<div class="modal_bg" id="createStaffItem">
    <div class="modal create_staff_item">

        <h4>Create Staff Item</h4>

        <div class="my_picture_chooser" id="picture_chosen">
            <span>Choose Picture</span>
        </div>

        <input type="hidden" name="chosenPicture" id="chosenPicture" class="chosenPictureHolder">

        <!-- <div class="staff_information">
            <span class="staff_name">Staff Name <input type="text" name="filter" id="filter" class="form_input" placeholder="Filter Last Name / First Name"></span>
            <span class="staff_role">Staff Role <input type="text" name="filter" id="filter" class="form_input" placeholder="Filter Last Name / First Name"></span>
            <span class="staff_email">Staff Email <input type="text" name="filter" id="filter" class="form_input" placeholder="Filter Last Name / First Name"></span>
        </div> -->

        <div class="staff_information">
            <div class="left_col">
                <span class="staff_detail">Staff Name: </span>
                <span class="staff_detail">Staff Role: </span>
                <span class="staff_detail">Staff Email: </span>
            </div>
            <div class="right_col">
                <input type="text" name="staff_name" id="staff_name" class="form_input" placeholder="Enter First Name, Last Name">
                <input type="text" name="staff_role" id="staff_role" class="form_input" placeholder="Enter Staff Role">
                <input type="text" name="staff_email" id="staff_email" class="form_input" placeholder="Enter Staff Email">
            </div>
        </div>

        <div class="staff_information_button_container">
            <a href="#" class="bidzbutton orange cancel_staff_creation">Cancel</a>
            <a href="#" class="bidzbutton devart create_staff_member">Save</a>
        </div>
    </div>

</div>
<div class="modal_bg" id="test_chooser">
    <div class="modal picture_chooser">
        <h4>Choose Picture</h4>

        <div class="picture_selection">
            <?php
$sql = "SELECT * FROM `images`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $image_name = $row['image_name'];

    ?>
            <img src="./uploads/<?php echo $image_name; ?>" name="staff_image_<?php echo $id; ?>" alt="<?php echo $image_name; ?>">
                <?php
}
?>
        </div>

        <div class="picture_button_container">
            <a href="#" class="bidzbutton orange cancel_picture_chooser"><i class="fa-solid fa-ban"></i>&nbsp; Cancel</a>
            <a href="#" class="bidzbutton devart choose_picture"><i class="fa-solid fa-image"></i>&nbsp; Choose</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="sortStaffMembers">
    <div class="modal">

        <h4>Sort Staff Items</h4>

        <div id="sorting_staff_items_container">

        </div>

        <div class="sorting_staff_button_container">
            <a href="#" class="bidzbutton devart save_sorting_staff">Save</a>
            <a href="#" class="bidzbutton orange cancel_sorting_staff">Close</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="deleteStaffMember">
    <div class="modal">

        <h4>Delete User: <span id="staff_member_name_delete">STAFF MEMBER</span></h4>

        <input type="hidden" name="staff_id" id="staff_id">

        <div class="delete_button_container">
            <a href="#" class="bidzbutton red" id="delete_staff_item">Delete</a>
            <a href="#" id="cancel_delete_staff" class="bidzbutton orange">Cancel</a>
        </div>
    </div>
</div>

<div class="modal_bg" id="editStaffMember">
    <div class="modal edit_staff_item">
        <h4>Edit User: <span id="staff_member_name_edit">STAFF MEMBER</span></h4>

        <input type="hidden" name="staff_member_id" id="staff_member_id">

        <div class="my_picture_chooser" id="picture_chosen_edit">
            <span>Choose Picture</span>
        </div>

        <input type="hidden" name="chosenPicture_edit" id="chosenPicture_edit" class="chosenPictureHolder">

        <div class="staff_information">
            <div class="left_col">
                <span class="staff_detail">Staff Name: </span>
                <span class="staff_detail">Staff Role: </span>
                <span class="staff_detail">Staff Email: </span>
            </div>
            <div class="right_col">
                <input type="text" name="staff_name_edit" id="staff_name_edit" class="form_input" placeholder="Enter First Name, Last Name">
                <input type="text" name="staff_role_edit" id="staff_role_edit" class="form_input" placeholder="Enter Staff Role">
                <input type="text" name="staff_email_edit" id="staff_email_edit" class="form_input" placeholder="Enter Staff Email">
            </div>
        </div>

        <div class="delete_button_container">
            <a href="#" class="bidzbutton devart" id="save_edit_staff">Save</a>
            <a href="#" id="cancel_edit_staff" class="bidzbutton orange">Cancel</a>
        </div>
    </div>
</div>
<div id="staff_information_container">

    <h2 class="table_heading"><span class="heading_contents">Staff Information</span></h2>

    <div class="button_container2">
        <!-- <a href="#" class="bidzbutton devart save_button"><i class="fa-regular fa-floppy-disk"></i> Save</a> -->
        <a href="#" class="bidzbutton orange create_button"><i class="fa-solid fa-circle-plus"></i> Create</a>
        <a href="#" class="bidzbutton devart sort_button"><i class="fa-solid fa-shuffle"></i> Sort</a>
    </div>

            <!-- <div class="staff_item">
                <div class="staff_image">
                    <img src="./uploads/' . $image . '" alt="Staff Image: ' . $name . '">
                </div>
                <div class="staff_info">
                    <span class="staff_name">' . $name . '</span>
                    <span class="staff_role">' . $role . '</span>
                    <span class="staff_email"><a href="mailto:' . $email . '">' . $email . '</a></span>
                </div>
                <div class="staff_actions">
                    <a href="#" class="bidzbutton orange edit_staff" name="edit_staff_' . $id . '"><i class="fa-solid fa-pen-to-square"></i> Edit Staff Record</a>
                    <a href="#" class="bidzbutton red delete_staff" name="delete_staff_' . $id . '"><i class="fa-solid fa-trash-can"></i> Delete Staff Record</a>
                </div>
            </div> -->

    <div class="staff_rows_container">
        <?php

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

for ($i = 0; $i < count($ids); $i++) {
    $id = $ids[$i];

    $sql = "SELECT * FROM `staff` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $image = $row['image'];
    $role = $row['role'];
    $email = $row['email'];

    ?>

        <div class="staff_item" id="my_staff_item_<?php echo $id; ?>">
            <div class="staff_image">
                <img src="./uploads/<?php echo $image; ?>" alt="Staff Image: ' . <?php echo $name; ?> . '">
            </div>
            <div class="staff_info">
                <span class="staff_name"><?php echo $name; ?></span>
                <span class="staff_role"><?php echo $role; ?></span>
                <span class="staff_email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
            </div>
            <div class="staff_actions">
                <a href="#" class="bidzbutton orange edit_staff" name="edit_staff_<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit Staff Record</a>
                <a href="#" class="bidzbutton red delete_staff" name="delete_staff_<?php echo $id; ?>"><i class="fa-solid fa-trash-can"></i> Delete Staff Record</a>
            </div>
        </div>
    <?php
}
?>

    </div>

</div>
<script>

    $(document).on("click",".my_picture_chooser",function() {
        $("#test_chooser").css("display", "block");
        $(".picture_selection img").each(function(){
            $(this).css("border", "0px");
        });
       $(".picture_chooser").css("display", "block");
    });
    $(document).on("click",".cancel_picture_chooser",function() {
       $(".picture_chooser").css("display", "none");
    });
    $(document).on("click",".picture_selection img",function() {
        $(".picture_selection img").each(function(){
            $(this).css("border", "0px");
        });
       $(this).css("border", "4px solid springgreen");

       var name = $(this).attr("name");

       $(".chosenPictureHolder").val(name);
    });
    $(document).on("click", ".choose_picture", function() {
        var chosenPicture = $(".chosenPictureHolder").val().replace("staff_image_", "");

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'pictureChooser',
                'picture': chosenPicture
            },
            success: function (out) {
                $(".picture_chooser").css("display", "none");
                var image = out;

                var image_out = `
                    <img src="./uploads/${image}" alt="${image}">
                `;
                $(".my_picture_chooser").html(image_out);

            }
        });
    });

    function clearForm(){
        $("#picture_chosen").html("Choose Picture");

        $("#chosenPicture").val("");
        $("#staff_name").val("");
        $("#staff_role").val("");
        $("#staff_email").val("");
    }
    $(document).on("click", ".create_button", function(e) {
        e.preventDefault();

        clearForm();

        $("#createStaffItem").css("display", "block");
    });

    $(document).on("click", ".cancel_staff_creation", function(e) {
        e.preventDefault();

        $("#createStaffItem").css("display", "none");
    });

    $(document).on("click", ".create_staff_member", function(e) {
        e.preventDefault();

        var image = $("#chosenPicture").val();
        var staff_name = $("#staff_name").val();
        var staff_role = $("#staff_role").val();
        var staff_email = $("#staff_email").val();

        if(image == "" || staff_name == "" || staff_role == "" || staff_email == ""){
            alert("Please complete the form");
        }
        else{
            // save to database
            image = image.replace("staff_image_", "");

            $.ajax({
                type: 'POST',
                url: "ajax.php",
                async: false,
                dataType: "json",
                data: {
                    'type': 'submitStaff',
                    'image': image,
                    'staff_name': staff_name,
                    "staff_role": staff_role,
                    "staff_email": staff_email
                },
                success: function (out) {
                     $("#createStaffItem").css("display", "none");

                    var record = out;

                    var id = record[0];
                    var image = record[1];
                    var staff_name = record[2];
                    var staff_email = record[3];
                    var staff_role = record[4];

                     var item = `

                        <div class="staff_item" id="my_staff_item_${id}">
                            <div class="staff_image">
                                <img src="./uploads/${image}" alt="Staff Image: ${image}'">
                            </div>
                            <div class="staff_info">
                                <span class="staff_name">${staff_name}</span>
                                <span class="staff_role">${staff_role}</span>
                                <span class="staff_email"><a href="mailto:${staff_email}">${staff_email}</a></span>
                            </div>
                            <div class="staff_actions">
                                <a href="#" class="bidzbutton orange edit_staff" name="edit_staff_${id}"><i class="fa-solid fa-pen-to-square"></i> Edit Staff Record</a>
                                <a href="#" class="bidzbutton red delete_staff" name="delete_staff_${id}"><i class="fa-solid fa-trash-can"></i> Delete Staff Record</a>
                            </div>
                        </div>
                     `;

                    $(".staff_rows_container").append(item);
                }
            });
        }
    });

    function deleteStaffItem(id){

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'delete_staff',
                'id': id
            },
            success: function (out) {
                var id = out.replace("done_", "");

                var selector = "#my_staff_item_" + id;
                $(selector).remove();

                $("#deleteStaffMember").css("display", "none");
            }
        });
    }

    $(document).on("click", "#delete_staff_item", function(e) {
        e.preventDefault();

        var id = $("#staff_id").val();

        deleteStaffItem(id);
    });

    $(document).on("click", ".delete_staff", function(e) {
        e.preventDefault();

        var id = $(this).attr("name").replace("delete_staff_", "");

        $("#deleteStaffMember").css("display", "block");

        $("#staff_id").val(id);
    });

    $(document).on("click", "#cancel_delete_staff", function(e) {
        e.preventDefault();

        $("#deleteStaffMember").css("display", "none");
    });

    function clear_edit_form(){
        $("#picture_chosen_edit").html("Choose Picture");

        $("#chosenPicture_edit").val("");
        $("#staff_name_edit").val("");
        $("#staff_role_edit").val("");
        $("#staff_email_edit").val("");
    }
    $(document).on("click", "#cancel_edit_staff", function(e){
        e.preventDefault();

        $("#editStaffMember").css("display", "none");

        $("#test_chooser").css("display", "none");

        // clear edit form

    });

    $(document).on("click", ".edit_staff", function(e){
        $("#editStaffMember").css("display", "block");
        var id = $(this).attr('name').replace("edit_staff_", "");

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'edit_staff',
                'id': id
            },
            success: function (out) {
                var record = out;

                var id = record[0];
                var name = record[1];
                var image = record[2];
                var role = record[3];
                var email = record[4];


                $("#staff_member_id").val(id);

                var image_out = `
                    <img src="./uploads/${image}" alt="${image}">
                `;

                $("#picture_chosen_edit").html(image_out);

                $("#staff_member_name_edit").text(name);

                $("#chosenPicture_edit").val("staff_image_" + image);
                $("#staff_name_edit").val(name);
                $("#staff_role_edit").val(role);
                $("#staff_email_edit").val(email);
            }
        });
    });

    $(document).on("click", "#save_edit_staff", function(e){
        e.preventDefault();

        var id = $("#staff_member_id").val();
        var name = $("#staff_name_edit").val();
        var role = $("#staff_role_edit").val();
        var email = $("#staff_email_edit").val();
        var image = $("#chosenPicture_edit").val().replace("staff_image_", "");


        console.log(image);
         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'save_edit',
                'id': id,
                'name': name,
                'role': role,
                'email': email,
                'image': image
            },
            success: function (out) {
                    var image_name = out;

                    $("#my_staff_item_" + id + " .my_picture_chooser img").attr("src", "./uploads/" + image_name);
                    $("#my_staff_item_" + id + " .staff_image img").attr("src", "./uploads/" + image_name);
                    $("#my_staff_item_" + id + " .staff_name").text(name);
                    $("#my_staff_item_" + id + " .staff_role").text(role);

                    var temp = `
                        <a href="mailto:${email}">${email}</a>
                    `;

                    $("#my_staff_item_" + id + " .staff_email").html(temp);

                    $("#editStaffMember").css("display", "none");

            }
        });

    });

    $(document).on("click", ".sort_button", function(e){

        $("#sortStaffMembers").css("display", "block");
        $("#sorting_staff_items_container").empty();

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'get_sort_items',
                'module': 'staff'
            },
            success: function (out) {
                var all_staff = out;

                for(var o = 0; o<all_staff.length; o++){
                    var staff_member = all_staff[o];

                    var id = staff_member[0];
                    var name = staff_member[1];
                    var image = staff_member[2];
                    var role = staff_member[3];
                    var email = staff_member[4];

                    var record = `

                            <div class="sort_staff_item" id="my_staff_${id}">
                                <div class="sort_staff_picture">
                                    <img src="./uploads/${image}" alt="${name}">
                                </div>
                                <div class="sort_staff_information">
                                    <span class="sort_staff_name sort_staff_detail">${name}</span>
                                </div>
                            </div>
                    `;

                    $("#sorting_staff_items_container").append(record);
                }
            }
        });
    });

    $(document).on("click", ".cancel_sorting_staff", function(e){
        e.preventDefault();

        $("#sortStaffMembers").css("display", "none");

    });

    $(document).on("click", ".save_sorting_staff", function(e){
        e.preventDefault();


        var sorted = $("#sorting_staff_items_container").sortable("toArray");

        var ids = [];

        for(var s =0; s<sorted.length; s++){
            var item = sorted[s];

            var id = item.replace("my_staff_", "");

            ids.push(id);
        }

        var new_sort = ids.join(",");

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'updateSorter',
                'module': 'staff',
                'new_sort': new_sort
            },
            success: function (out) {
                $("#sortStaffMembers").css("display", "none");
                $(".staff_rows_container").empty();

                var records = out;

                for(var r =0; r<records.length; r++){
                    var rec = records[r];

                    var id = rec[0];
                    var name = rec[1];
                    var email = rec[2];
                    var role = rec[3];
                    var image = rec[4];


                    var template = `
                        <div class="staff_item" id="my_staff_item_${id}">
                            <div class="staff_image">
                                <img src="./uploads/${image}" alt="Staff Image: ${name}">
                            </div>
                            <div class="staff_info">
                                <span class="staff_name">${name}</span>
                                <span class="staff_role">${role}</span>
                                <span class="staff_email"><a href="mailto:${email}">${email}</a></span>
                            </div>
                            <div class="staff_actions">
                                <a href="#" class="bidzbutton orange edit_staff" name="edit_staff_${id}"><i class="fa-solid fa-pen-to-square"></i> Edit Staff Record</a>
                                <a href="#" class="bidzbutton red delete_staff" name="delete_staff_${id}"><i class="fa-solid fa-trash-can"></i> Delete Staff Record</a>
                            </div>
                        </div>
                    `;

                    $(".staff_rows_container").append(template);
                }
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sorting_staff_items_container" ).sortable();
  } );
  </script>