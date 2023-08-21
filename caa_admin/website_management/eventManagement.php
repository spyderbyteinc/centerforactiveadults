<div class="modal_bg" id="confirm_deletion">
    <div class="modal">
        <h4>Do you want to delete: </h4>

        <h5 id="event_name_deletion">Event Name</h5>

        <input type="hidden" name="event_to_delete" id="event_to_delete">

        <div class="button_cont">
            <a href="#" class="bidzbutton red" id="delete_confirmation">Delete</a>
            <a href="#" class="bidzbutton orange" id="delete_cancellation">Cancel</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="updateEvent">
    <div class="modal picture_chooser" id="pictureSelectionModal">
        <h4>Choose Picture</h4>

        <div class="picture_selection">
            <?php
$sql = "SELECT * FROM `images`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $image_name = $row['image_name'];

    ?>

                <img src="./uploads/<?php echo $image_name; ?>" name="img_<?php echo $id; ?>" alt="<?php echo $image_name; ?>">

                <?php
}
?>
        </div>

        <input type="hidden" name="ourPicture" id="ourPicture">

        <div class="button_container">
            <a href="#" class="bidzbutton devart" id="chooseMyPicture">Choose Picture</a>
            <a href="#" class="bidzbutton orange" id="closePictureSelection">Close</a>
        </div>
    </div>
    <div class="modal" id="add_event_modal">
        <h4>Create Event</h4>

        <div class="pictureSelection" id="create_picture_selection_show">
            Picture Goes Here
        </div>

        <input type="hidden" name="create_picture_selection_hidden" id="create_picture_selection_hidden">

        <div class="event_information">
            <div class="left_col">
                <span class="event_detail">Event Name: </span>
                <span class="event_detail">Event Type: </span>
                <span class="event_detail">Event Days: </span>
                <span class="event_detail">Event Times: </span>
            </div>
            <div class="right_col">
                <input type="text" name="create_my_event_name" id="create_my_event_name" class="form_input" placeholder="Enter Event Name">
                <select name="create_my_event_type" id="create_my_event_type" class="form_input form_select">
                    <option value="">Choose an event type</option>
                    <?php
$sql = "SELECT * FROM `class_type` WHERE `myorder`<>0";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $type = $row['type'];

    ?>
                    <option value="<?php echo $id; ?>"><?php echo $type; ?></option>
                        <?php
}
?>
                </select>
                <input type="text" name="create_my_event_days" id="create_my_event_days" class="form_input" placeholder="Enter Event Days">
                <input type="text" name="create_my_event_times" id="create_my_event_times" class="form_input" placeholder="Enter Event Times">
            </div>
        </div>

        <div class="button_container">
            <a href="#" class="bidzbutton devart" id="create_event_button">Save</a>
             <a href="#" class="bidzbutton orange" id="close_create_event">Cancel</a>
        </div>

    </div>
    <div class="modal" id="event_update_modal">

        <h4>Update Event Details</h4>

        <input type="hidden" name="the_event_id" id="the_event_id">

        <div class="pictureSelection" id="picture_selection_show">
            Picture Goes Here
        </div>

        <input type="hidden" name="picture_selection_hidden" id="picture_selection_hidden">

        <div class="event_information">
            <div class="left_col">
                <span class="event_detail">Event Name: </span>
                <span class="event_detail">Event Type: </span>
                <span class="event_detail">Event Days: </span>
                <span class="event_detail">Event Times: </span>
            </div>
            <div class="right_col">
                <input type="text" name="my_event_name" id="my_event_name" class="form_input" placeholder="Enter Event Name">
                <select name="my_event_type" id="my_event_type" class="form_input form_select">
                    <option value="">Choose an event type</option>
                    <?php
$sql = "SELECT * FROM `class_type` WHERE `myorder`<>0";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $type = $row['type'];

    ?>
                    <option value="<?php echo $id; ?>"><?php echo $type; ?></option>
                        <?php
}
?>
                </select>
                <input type="text" name="my_event_days" id="my_event_days" class="form_input" placeholder="Enter Event Days">
                <input type="text" name="my_event_times" id="my_event_times" class="form_input" placeholder="Enter Event Times">
            </div>
        </div>

        <div class="button_container">
            <a href="#" class="bidzbutton devart" id="update_event_button">Update</a>
             <a href="#" class="bidzbutton orange" id="close_update_event">Cancel</a>
        </div>
    </div>
</div>
<div id="event_management_container">

    <h2 class="table_heading"><span class="heading_contents">Event Management</span></h2>

    <div class="class_type_list">
        <ul id="event_tabs">
                    <?php
$myorders = array();
// get highest myorder in table
$highest_sql = "SELECT * FROM `class_type` WHERE `myorder`<>0";
$highest_result = mysqli_query($conn, $highest_sql);
while ($highest_row = mysqli_fetch_assoc($highest_result)) {
    $myorder = $highest_row['myorder'];

    array_push($myorders, $myorder);
}

$max = max($myorders);

for ($m = 1; $m <= $max; $m++) {
    $col_sql = "SELECT * FROM `class_type` WHERE `myorder`=$m";
    $col_result = mysqli_query($conn, $col_sql);
    $col_row = mysqli_fetch_assoc($col_result);

    $id = $col_row['id'];
    $type = $col_row['type'];

    $extra = "";
    if ($m == 1) {
        $extra = "active";
    }
    ?>
    <li class="nav_item <?php echo $extra; ?> event_type_item"><a href="#" id="type_module<?php echo $id; ?>" name="<?php echo $type; ?>" class="nav_link"><?php echo $type; ?></a></li>
<?php
}
?>
        </ul>

    </div>

    <div class="main_activity">
        <div class="event_col col_left">
            <?php
$col_sql = "SELECT * FROM `class_type` WHERE `myorder`=1";
$col_result = mysqli_query($conn, $col_sql);
$col_row = mysqli_fetch_assoc($col_result);

$col_id = $col_row['id'];

$all_events = array();

$event_sql = "SELECT * FROM `classes` WHERE `class_type`=$col_id";
$event_result = mysqli_query($conn, $event_sql);
while ($event_row = mysqli_fetch_assoc($event_result)) {
    $id = $event_row['id'];
    $class_name = $event_row['class_name'];
    $class_type = $event_row['class_type'];
    $day = $event_row['day'];
    $time = $event_row['time'];
    $picture = $event_row['picture'];

    $event_arr = array($id, $class_name, $class_type, $day, $time, $picture);
    array_push($all_events, $event_arr);
}
?>

    <div class="left_button_container">
        <a href="#" class="bidzbutton" id="create_new_event"><i class="fa-solid fa-circle-plus"></i>&nbsp Create Event</a>
        <a href="#" class="bidzbutton devart" id="sort_these_events"><i class="fa-solid fa-shuffle"></i>&nbsp Sort Events</a>
    </div>
            <div id="event_container">
                <?php
for ($e = 0; $e < count($all_events); $e++) {
    $event = $all_events[$e];

    $id = $event[0];
    $class_name = $event[1];
    $class_type = $event[2];
    $day = $event[3];
    $time = $event[4];
    $picture = $event[5];
    ?>
                <div class="event_block" id="event_<?php echo $id; ?>">
                    <div class="hover">
                        <div class="class_name">
                            <?php echo $class_name; ?>
                        </div>																					                      <div class="choc_bar"></div>
                    </div>
                </div>
                <?php
}
?>
            </div>

        </div>

        <div class="vertical_bar"></div>

        <div class="event_col col_right" id="event_details">
        </div>
    </div>
</div>
<script>

    function clearCreation(){
        $("#create_my_event_name").val("");
        $("#create_my_event_type").val("");
        $("#create_my_event_days").val("");
        $("#create_my_event_times").val("");
        $("#create_picture_selection_show").html("Picture Goes Here");
        $("#create_picture_selection_hidden").val("");
    }
    $(document).on("click", "#picture_selection_show", function(e){
        e.preventDefault();
        $("#pictureSelectionModal").css("display", "block");

    })
    $(document).on("click", "#create_picture_selection_show", function(e){
        e.preventDefault();

        $(".picture_selection img").each(function(){
            $(this).css("border", "0px");
        })
        $("#pictureSelectionModal").css("display", "block");
    })
    $(document).on("click", "#closePictureSelection", function(e){
        e.preventDefault();
        $("#pictureSelectionModal").css("display", "none");
    });
    $(document).on("click", "#update_event", function(e){
        e.preventDefault();

        $("#updateEvent").css("display", "block");
        $("#event_update_modal").css("display", "block");

        var id = $("#event_id").val();

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'my_event',
                'id': id
            },
            success: function (out) {
                console.log(out);

                var id = out[0];
                var name = out[1];
                var type = out[2];
                var day = out[3];
                var time = out[4];
                var picture = out[5];
                var class_type = out[6];
                var image_id = out[7];


                var template = `
                    <img src="./uploads/${picture}" alt="Image ${image_id}">
                `;

                $("#the_event_id").val(id);
                $("#picture_selection_show").html(template);
                $("#picture_selection_hidden").val(image_id);

                $("#my_event_name").val(name);
                $("#my_event_days").val(day);
                $("#my_event_times").val(time);
                $("#my_event_type").val(class_type);

                $(".picture_selection img").each(function(){
                    var alt = $(this).attr("alt");

                    if(alt == picture){
                        $(this).css("border", "4px solid springgreen");
                    }
                });
            }
        });
    });

    $(document).on("click", "#update_event_button", function(e){
        e.preventDefault();

        var id = $("#the_event_id").val();
        var name = $("#my_event_name").val();
        var day = $("#my_event_days").val();
        var time = $("#my_event_times").val();
        var class_type = $("#my_event_type").val();
        var picture_id = $("#picture_selection_hidden").val();

        if(name == "" || day == "" || time == "" || class_type == ""){
            alert("Please complete form");
            return;
        }

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'update_event',
                'id': id,
                'name': name,
                'day': day,
                'time': time,
                'class_type': class_type,
                'picture_id': picture_id
            },
            success: function (out) {
                var image_name = out[0];
                var ctype = out[1];


                $("#updateEvent").css("display", "none");
                $("#event_update_modal").css("display", "none");


                var template = `
                    <div class="event_name">Event: ${name}</div>
                    <div class="event_name">Event Type: ${ctype}</div>

                    <input type="hidden" name="event_id" id="event_id" value="${id}">

                    <div class="event_picture">
                        <div class="picture_container">
                            <img src="./uploads/${image_name}" alt="Event Picture Missing">
                        </div>
                    </div>

                    <div class="event_day_time">
                        <div class="event_day">Day(s): ${day}</div>
                        <div class="event_time">Time: ${time}</div>
                    </div>

                    <div class="button_container">
                        <a href="#" class="bidzbutton devart" id="update_event">Update</a>
                        <a href="#" class="bidzbutton red" id="delete_event">Delete</a>
                    </div>
                `;

                $("#event_details").empty();
                $("#event_details").html(template);

                $("#event_" + id).find(".class_name").text(name);
            }
        });


    })
    $(document).on("click", "#close_update_event", function(e){
        e.preventDefault();

        $("#updateEvent").css("display", "none");
        $("#event_update_modal").css("display", "none");
    });
    $(document).on("click", ".event_block", function(e){
        e.preventDefault();

        var id = $(this).attr("id").replace("event_", "");

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'my_event',
                'id': id
            },
            success: function (out) {

                var id = out[0];
                var name = out[1];
                var type = out[2];
                var day = out[3];
                var time = out[4];
                var picture = out[5];

                var template = `
                    <div class="event_name">Event: ${name}</div>
                    <div class="event_name">Event Type: ${type}</div>

                    <input type="hidden" name="event_id" id="event_id" value="${id}">

                    <div class="event_picture">
                        <div class="picture_container">
                            <img src="./uploads/${picture}" alt="Event Picture Missing">
                        </div>
                    </div>

                    <div class="event_day_time">
                        <div class="event_day">Day(s): ${day}</div>
                        <div class="event_time">Time: ${time}</div>
                    </div>

                    <div class="button_container">
                        <a href="#" class="bidzbutton devart" id="update_event">Update</a>
                        <a href="#" class="bidzbutton red" id="delete_event">Delete</a>
                    </div>
                `;

                $("#event_details").empty();
                $("#event_details").html(template);
            }
        });
    });


    $(document).on("click", ".picture_selection img", function(e){
        e.preventDefault();

        $(".picture_selection img").each(function(){
            $(this).css("border", "0px");
        })

        var id = $(this).attr("name").replace("img_", "");

        var v = $("#ourPicture").val();

        if(v != id){
            $("#picture_selection_hidden").val(id);
            $("#create_picture_selection_hidden").val(id);
            $("#ourPicture").val(id);
            $(this).css("border", "4px solid springgreen");
        }
        else{
            $("#picture_selection_hidden").val(-1);
            $("#create_picture_selection_hidden").val(-1);
            $("#ourPicture").val(-1);
        }
    })

    $(document).on("click", "#chooseMyPicture", function(e){
        e.preventDefault();

        var picid = $("#ourPicture").val();

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'get_picture',
                'id': picid
            },
            success: function (out) {
                $("#pictureSelectionModal").css("display", "none");

                var id = out[0];
                var image = out[1];

                var template = `
                    <img src="./uploads/${image}" alt="Image ${id}">
                `;

                console.log(template);
                $("#picture_selection_show").html(template);
                $("#create_picture_selection_show").html(template);
            }
        });
    });

    $(document).on("click", ".event_type_item", function(e){
        e.preventDefault();

        $("#event_details").empty();

        var myobj = $(this);

        var id = $(this).find("a").attr("id").replace("type_module", "");

        $("#event_container").empty();

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'get_events',
                'id': id
            },
            success: function (out) {
                $(".event_type_item").each(function(){
                    $(this).removeClass("active");
                });

                myobj.addClass("active");

                for(var o = 0; o<out.length; o++){
                    var event = out[o];

                    var id = event[0];
                    var class_name = event[1];

                    var template = `
                        <div class="event_block" id="event_${id}">
                            <div class="hover">
                                <div class="class_name">
                                    ${class_name}
                                </div>																					                      <div class="choc_bar"></div>
                            </div>
                        </div>
                    `;

                    $("#event_container").append(template);

                }
            }
        });
    });

    $(document).on("click", "#create_new_event", function(e){
        e.preventDefault();

        $("#updateEvent").css("display", "block");
        $("#add_event_modal").css("display", "block");

        clearCreation();
    });

    $(document).on('click', '#close_create_event', function(e){
        e.preventDefault();

        $("#updateEvent").css("display", "none");
        $("#add_event_modal").css("display", "none");

    })

    $(document).on("click", "#create_event_button", function(e){
        e.preventDefault();

        var picture_id = $("#create_picture_selection_hidden").val();
        var name = $("#create_my_event_name").val();
        var type = $("#create_my_event_type").val();
        var days = $("#create_my_event_days").val();
        var times = $("#create_my_event_times").val();

        if(name == "" || type == "" || days == "" || times == ""){
            alert("please complete form");
            return;
        }

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'create_event',
                'name': name,
                'class_type': type,
                'days': days,
                'times': times,
                'picture_id': picture_id
            },
            success: function (out) {
                var id = out;

                $("#updateEvent").css("display", "none");
                $("#add_event_modal").css("display", "none");

                var active = $("#type_module" + type).parent().hasClass("active");

                if(active){

                    var template = `
                        <div class="event_block" id="event_${id}">
                            <div class="hover">
                                <div class="class_name">
                                    ${name}
                                </div>																					                      <div class="choc_bar"></div>
                            </div>
                        </div>
                    `;

                    $("#event_container").append(template);
                }
            }
        });

    });

    $(document).on('click', '#delete_event', function(e){
        e.preventDefault();

        var id = $("#event_id").val();
        var event_name;

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'event_name',
                'id': id
            },
            success: function (out) {
                event_name = out;
            }
        });
        $("#event_to_delete").val(id);

        $("#event_name_deletion").text(event_name);
        $("#confirm_deletion").css("display", "block");
    })
    $(document).on("click", "#delete_cancellation", function(e){
        e.preventDefault();
        $("#confirm_deletion").css("display", "none");
    })

    $(document).on("click", "#delete_confirmation", function(e){
        e.preventDefault();
        var id = $("#event_to_delete").val();

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'delete_event',
                'id': id
            },
            success: function (out) {
                console.log(out);
                $("#confirm_deletion").css("display", "none");

                $("#event_" + id).remove();

                $("#event_details").empty();
            }
        });
    });
</script>