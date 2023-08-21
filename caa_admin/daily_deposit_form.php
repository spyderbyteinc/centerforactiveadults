<?php
include "header.php";
include "connect.php";
?>

           <?php

$all_records = array();
$pkey_sql = "SELECT * FROM `pkey`";

$pkey_result = mysqli_query($conn, $pkey_sql);
while ($pkey_row = mysqli_fetch_assoc($pkey_result)) {
    $id = $pkey_row['fkey'];
    $membership = $pkey_row['membership'];

    if ($membership == "member") {
        $membership = "members";
    }

    $user_sql = "SELECT * FROM `$membership` WHERE `id`=$id";
    $user_result = mysqli_query($conn, $user_sql);
    $user_row = mysqli_fetch_assoc($user_result);

    $first_name = $user_row['first_name'];
    $last_name = $user_row['last_name'];
    $municipality = $user_row['municipality'];

    $temp = array($id, $first_name, $last_name, $municipality, $membership);
    array_push($all_records, $temp);
}
?>
<script>
    <?php
$js_array = json_encode($all_records);
echo "var all_records = " . $js_array . ";";
?>

function reset_modals(){
    $("#chosen_user_display").text("");
    $(".option_mark").each(function(){
        $(this).addClass("empty");
    });
}

$(document).on("click", ".option", function(){
    $(".option_mark").each(function(){
        $(this).addClass("empty");
    });

    $(this).find(".option_mark").removeClass("empty");
    var id = $(this).attr("id");
    $("#payment_type").val(id);
});
function setup_rows(){
    var rows = "";
    for(var r = 0; r<all_records.length; r++){
        var record = all_records[r];

        var id = record[0];
        var first_name = record[1];
        var last_name = record[2];
        var municipality = record[3];
        var membership = record[4];

        if(membership == "members"){
            membership = "Member";
        }
        else if(membership == "no_forms"){
            membership = "Incomplete";
        }
            var template = `
                <tr class="table_row search_row" id="${membership}_row_${id}">
                    <td class="table_col last_name">${last_name}</td>
                    <td class="table_col first_name">${first_name}</td>
                    <td class="table_col municipality">${municipality}</td>
                    <td class="table_col membership">${membership}</td>
                    <td class="table_col"><a href="#" class="bidzbutton devart show_details_button" id="showDetails_${membership}_${id}">Show Details</a></td>
                    <td class="table_col"><a href="#" class="bidzbutton select_member_button" id="selectMember_${membership}_${id}">Select Member</a></td>
                </tr>
                `;
        rows = rows + template;
    }

    $(".fancy_table_green tbody").append(rows);
}
$(document).ready(function(){
    setup_rows();


    function getMonthByIndex(index){
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        return months[index];
    }

    $(document).on("click", ".select_member_button", function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        $("#chosen_user_id").val(id);
        var comps = id.split("_");

        var membership = comps[1];
        id = comps[2];

        var parent = $(this).closest("tr.search_row");
        var last_name = parent.find(".last_name").text();
        var first_name = parent.find(".first_name").text();
        var municipality = parent.find(".municipality").text();

        var out = last_name + ", " + first_name + " - " + municipality;
        $("#chosen_user_display").text(out);

        $("#chooseMemberModal").css("display", "none");
    })

    $(document).on("click", ".show_details_button", function(e){
        e.preventDefault();

        // $("#showUserDetails").css("display", "block");

        var id = $(this).attr('id');
        var comps = id.split("_");
        var table = comps[1];
        var id = comps[2];

        if(table == "Member"){
            table = "members";
        }
        else if(table == "Incomplete"){
            table = "no_forms";
        }

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'view_record',
                'table': table,
                'id': id
            },
            success: function (out) {
                var date_flags = ['first_visit_main', 'first_visit_spouse', 'last_visit_main', 'last_visit_spouse', 'membership_date'];

                if(table == "no_forms"){

                    var nf_cols = ['id', 'last_name', 'first_name', 'first_visit_main', 'spouse', 'first_visit_spouse', 'address', 'city', 'state', 'zip', 'home_phone', 'municipality'];

                    console.log('jordan', nf_cols);

                    // var id = out['id'];
                    // var last_name = out['last_name'];
                    // var first_name = out['first_name'];
                    // var first_visit_main = out['first_visit_main'];
                    // var spouse = out['spouse'];
                    // var first_visit_spouse = out['first_visit_spouse'];
                    // var address = out['address'];
                    // var city = out['city'];
                    // var state = out['state'];
                    // var zip = out['zip'];
                    // var home_phone = out['home_phone'];
                    // var municipality = out['municipality'];

                    for(var c = 0; c<nf_cols.length; c++){
                        var col = nf_cols[c];

                        var data = out[col];

                        if(data == ""){
                            data = "N/A";
                        }
                        else if(date_flags.includes(col)){
                            var temp = new Date(data + "Z");
                            data = getMonthByIndex(temp.getMonth()) + " " + temp.getFullYear();
                        }

                        var output_field = "#nf_" + col;

                        $(output_field).text(data);
                    }

                    $("#no_form_member_details").css("display", "block");
                }
                else if(table == "members"){
                    var mem_cols = ['id', 'last_name', "first_name", "key_tag", "last_visit_main", "spouse", "last_visit_spouse", "address", "city", "state", "zip", "home_phone", "municipality", "email", "newsletter", "emergency_contact_1", "emergency_phone_1", "emergency_contact_2", "emergency_phone_2", "number_in_home", "head_of_household", "race", "62_older", "membership_date", "member_fee_paid_notes"];

                    for(var c = 0; c<mem_cols.length; c++){
                        var col = mem_cols[c];

                        var data = out[col];

                        if(data == ""){
                            data = "N/A";
                        }
                        else if(date_flags.includes(col)){
                            var temp = new Date(data + "Z");
                            data = getMonthByIndex(temp.getMonth()) + " " + temp.getFullYear();
                        }


                        // console.log(data, typeof data);

                        var output_field = "#mem_" + col;

                        $(output_field).text(data);
                    }

                    $("#showUserDetails").css("display", "block");
                }
            }
        });
    });

    $(document).on("click", "#close_member", function(e){
        e.preventDefault();

        $("#showUserDetails").css("display", "none");
    });
});
</script>

<div class="modal_bg" id="no_form_member_details">
    <div class="modal detail_modal">
        <h4>User Details - Incomplete Member</h4>

        <input type="hidden" name="nf_id" id="nf_id">
        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Last Name</p>
                <p class="element_value" id="nf_last_name">Halaby</p>
            </div>
            <div class="grouping">
                <p class="element_label">First Name</p>
                <p class="element_value" id="nf_first_name">Jordan</p>
            </div>
            <div class="grouping">
                <p class="element_label">Spouse Name</p>
                <p class="element_value"  id="nf_spouse">Jennifer</p>
            </div>
        </div>

        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">First Visit - Main</p>
                <p class="element_value" id="nf_first_visit_main">12/21/2012</p>
            </div>
            <div class="grouping">
                <p class="element_label">First Visit - Spouse</p>
                <p class="element_value" id="nf_first_visit_spouse">12/21/2012</p>
            </div>
            <div class="grouping">
                <p class="element_label">Home Phone</p>
                <p class="element_value" id="nf_home_phone">(248) 912-7636</p>
            </div>
        </div>

        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Address</p>
                <p class="element_value" id="nf_address">10137 Devonshire</p>
            </div>
            <div class="grouping">
                <p class="element_label">City</p>
                <p class="element_value" id="nf_city">South Lyon</p>
            </div>
            <div class="grouping">
                <p class="element_label">ZipCode</p>
                <p class="element_value" id="nf_zip">48178</p>
            </div>
        </div>

        <div class="row1 myrow">
            <div class="grouping">
                <p class="element_label">Municipality</p>
                <p class="element_value" id="nf_municipality">City of South Lyon</p>
            </div>
        </div>

        <div class="button_container" id="no_form_button_container">
            <a href="#" id="close_noform" class="bidzbutton orange">Close</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="showUserDetails">
    <div class="modal detail_modal">
        <h2>Show Details: Jordan Halaby</h2>

        <input type="hidden" name="mem_id" id="mem_id">

        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Last Name</p>
                <p class="element_value" id="mem_last_name">Halaby</p>
            </div>
            <div class="grouping">
                <p class="element_label">First Name</p>
                <p class="element_value" id="mem_first_name">Jordan</p>
            </div>
            <div class="grouping">
                <p class="element_label">Spouse Name</p>
                <p class="element_value" id="mem_spouse">Jennifer</p>
            </div>
        </div>

        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Last Visit - Main</p>
                <p class="element_value" id="mem_last_visit_main">12/21/2012</p>
            </div>
            <div class="grouping">
                <p class="element_label">Last Visit - Spouse</p>
                <p class="element_value" id="mem_last_visit_spouse">12/21/2012</p>
            </div>
            <div class="grouping">
                <p class="element_label">Key Tag</p>
                <p class="element_value" id="mem_key_tag">3051</p>
            </div>
        </div>

        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Address</p>
                <p class="element_value" id="mem_address">10137 Devonshire</p>
            </div>
            <div class="grouping">
                <p class="element_label">City</p>
                <p class="element_value" id="mem_city">South Lyon</p>
            </div>
            <div class="grouping">
                <p class="element_label">Zip Code</p>
                <p class="element_value" id="mem_zip">48178</p>
            </div>
        </div>

        <div class="row1 myrow">
            <div class="grouping">
                <p class="element_label">Municipality</p>
                <p class="element_value" id="mem_municipality">City of South Lyon</p>
            </div>
        </div>


        <div class="row3 myrow">
            <div class="grouping">
                <p class="element_label">Home Phone</p>
                <p class="element_value" id="mem_home_phone">(248) 912-7636</p>
            </div>
            <div class="grouping">
                <p class="element_label">Email</p>
                <p class="element_value" id="mem_email">jhalaby@emich.edu</p>
            </div>
            <div class="grouping">
                <p class="element_label">Newsletter</p>
                <p class="element_value" id="mem_newsletter">Email</p>
            </div>
        </div>

        <div class="row2 myrow">
            <div class="grouping">
                <p class="element_label">Emergency Contact #1</p>
                <p class="element_value" id="mem_emergency_contact_1">Jordan Halaby</p>
            </div>
            <div class="grouping">
                <p class="element_label">Emergency Phone #1</p>
                <p class="element_value" id="mem_emergency_phone_1">(248) 912-7636</p>
            </div>
        </div>

        <div class="row2 myrow">
            <div class="grouping">
                <p class="element_label">Emergency Contact #2</p>
                <p class="element_value" id="mem_emergency_contact_2">Jordan Halaby</p>
            </div>
            <div class="grouping">
                <p class="element_label">Emergency Phone #2</p>
                <p class="element_value" id="mem_emergency_phone_2">(248) 912-7636</p>
            </div>
        </div>

        <div class="row2 myrow">
            <div class="grouping">
                <p class="element_label">Number In Home</p>
                <p class="element_value" id="mem_number_in_home">19</p>
            </div>
            <div class="grouping">
                <p class="element_label">Head of Household</p>
                <p class="element_value" id="mem_head_of_household">Male</p>
            </div>
        </div>

        <div class="row2 myrow">
            <div class="grouping">
                <p class="element_label">Race</p>
                <p class="element_value" id="mem_race">White</p>
            </div>
            <div class="grouping">
                <p class="element_label">62 or Older?</p>
                <p class="element_value" id="mem_62_older">No</p>
            </div>
        </div>

        <div class="row2 myrow">
            <div class="grouping">
                <p class="element_label">Membership Date</p>
                <p class="element_value" id="mem_membership_date">12/21/2012</p>
            </div>
            <div class="grouping">
                <p class="element_label">Membership Fee Paid</p>
                <p class="element_value" id="mem_member_fee_paid_notes">9/9/1994</p>
            </div>
        </div>

        <div class="button_container">
            <a href="#" id="close_member" class="bidzbutton orange">Close</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="addRecordModal">
    <div class="modal">

        <h2>Add Deposit Record</h2>

        <div class="class_description_holder" id="class_name_holder">Class Name</div>
        <div class="class_description_holder" id="class_type_holder">Class Type</div>
        <div class="class_description_holder" id="class_instructor_holder">Class Instructor</div>

        <div id="class_cost_holder">
            <label for="class_cost">Class Cost</label>
            <input type="number" class="input_text" id="class_cost" placeholder="0">
        </div>

        <h3 class="table_heading"><span>Choose a User</span></h3>
        <div id="choose_user_container">

            <span class="click_here">Click Here</span>
        </div>
        <h5 id="chosen_user_display"></h5>
        <input type="hidden" id="chosen_user_id">

        <h3 class="table_heading"><span>Payment Type</span></h3>
        <div id="payment_type_container">
            <div class="payment_type">
                <label for="">Cash</label>
                <div class="option" id="cash_option">
                    <div class="option_hole">
                        <div class="option_mark empty"></div>
                    </div>
                </div>
            </div>
            <div class="payment_type">
                <label for="">Check</label>
                <div class="option" id="check_option">
                    <div class="option_hole">
                        <div class="option_mark empty"></div>
                    </div>
                </div>
            </div>
            <div class="payment_type">
                <label for="">Wallet</label>
                <div class="option" id="wallet_option">
                    <div class="option_hole">
                        <div class="option_mark empty"></div>
                    </div>
                </div>
            </div>
            <div class="payment_type">
                <label for="">Ticket</label>
                <div class="option" id="ticket_option">
                    <div class="option_hole">
                        <div class="option_mark empty"></div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="payment_type" id="payment_type">
        </div>

        <h3 class="table_heading"><span>Special Information</span></h3>
        <div id="special_type_container">
<!--
            <div class="payment_type">
                <label for="">Special</label>
                <div class="option">
                    <div class="option_hole">
                        <div class="option_mark empty"></div>
                    </div>
                </div>
            </div> -->
            <textarea name="special_type_text" id="special_type_text" placeholder="Enter Special Information Here"></textarea>
        </div>

        <div class="modal_button_container">
            <a href="#" class="bidzbutton devart" id="save_record_button">Save Record</a>
            <a href="#" class="bidzbutton orange" id="cancel_record_creation">Cancel</a>
        </div>
    </div>
</div>

<div class="modal_bg" id="chooseMemberModal">
    <div class="modal">
        <h2>Choose Member</h2>

        <div id="filter_container">

            <input type="text" class="input_text filter_input" id="member_filter_text" placeholder="Filter Members">

            <select name="member_filter_municipality" id="member_filter_municipality" class="input_text input_select filter_input">
                <option value="">Choose Municipality</option>
                <option value="csl">City of South Lyon</option>
                <option value="got">Green Oak Township</option>
                <option value="lt">Lyon Township</option>
                <option value="other">Other</option>
            </select>

            <select name="membership_filter" id="membership_filter" class="input_text input_select filter_input">
                <option value="">Choose Membership</option>
                <option value="Member">Member</option>
                <option value="Incomplete">Incomplete</option>
            </select>

        </div>

        <div id="filter_button">
            <a href="#" class="bidzbutton devart" id="do_the_filter"><i class="fa-solid fa-filter"></i>&nbsp;Filter</a>
            <a href="#" class="bidzbutton orange" id="clear_filter">Clear</a>
        </div>

        <div id="user_table_container">
       <table class="fancy_table fancy_table_green" id="daily_deposit_form">

           <tr class="table_header">
               <th class="table_col">Last Name</th>
               <th class="table_col">First Name</th>
               <th class="table_col">Municipality</th>
               <th class="table_col">Membership</th>
                <th class="table_col">Show Details</th>
                <th class="table_col">Select Member</th>
           </tr>
        </table>
        </div>

        <div class="modal_button_container">
            <a href="#" class="bidzbutton" id="enter_other_member">Guest Record</a>
            <a href="#" class="bidzbutton orange" id="cancel_choose_member">Cancel</a>
        </div>



    </div>
</div>
<script>

    function getDatesInRange(startDate, endDate){
        var dates = [];

        let tempDate = new Date(startDate.getTime());

        tempDate.setDate(tempDate.getDate() + 1);

        while(tempDate <= endDate){
            dates.push(new Date(tempDate));
            tempDate.setDate(tempDate.getDate() + 1);
        }

        dates.push(endDate);

        return dates;
    }

    $(document).ready(function() {
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var last_deposit = new Date("2023-08-09");
            var today = new Date(Date.now());

            var date_diff = getDatesInRange(last_deposit, today);


            var yyyy = last_deposit.getFullYear();
            var mm = last_deposit.getMonth() +1;
            var dd = last_deposit.getDate();

            var mrd_date = mm + "/" + dd + "/" + yyyy;

            var mrd_day = days[last_deposit.getDay()];
            var most_recent_deposit = "Last Deposit: " + mrd_day + ", " + mrd_date;
            $("#most_recent_deposit").text(most_recent_deposit);

            // var day_of_week = days[last_deposit.getDay()];
            // console.log(date_diff);
            // console.log(last_deposit, today);

            var all_dates = [];
            var all_names = [];
            for(var d =0; d<date_diff.length; d++){
                var mydate = date_diff[d];

                var day_of_week = days[mydate.getDay()];

                if(day_of_week != "Saturday" && day_of_week != "Sunday"){
                    all_dates.push(mydate);
                    all_names.push(day_of_week);
                }
            }

            console.log(all_dates);
            console.log(all_names);

            var buttons = `<ul id="days_of_the_week">`;

            for(var a =0; a<all_names.length; a++){
                var name = all_names[a];
                var dte = all_dates[a];

                var yyyy = dte.getFullYear();
                var mm = dte.getMonth() +1;
                var dd = dte.getDate();

                var mdate = mm + "/" + dd + "/" + yyyy;

                var day = "";

                if(name == "Monday" || name == "monday"){
                    day = "M";
                }
                else if(name == "Tuesday" || name == "tuesday"){
                    day = "T";
                }
                else if(name == "Wednesday" || name == "wednesday"){
                    day = "W";
                }
                else if(name == "Thursday" || name == "thursday"){
                    day = "Th";
                }
                else if(name == "Friday" || name == "friday"){
                    day = "F";
                }
                var li = `
                    <li class="day_picker"><button id="${mdate}">${day}</button></li>`;

                buttons = buttons + li;
            }

            buttons = buttons + `</ul>`;

            $("#days_of_the_week_container").append(buttons);

            // set up current day
            var currentDate = all_dates[all_dates.length -1];
            var yyyy = currentDate.getFullYear();
            var mm = currentDate.getMonth() +1;
            var dd = currentDate.getDate();

            var cdate = mm + "/" + dd + "/" + yyyy;

            console.log(currentDate, cdate);
            $("li.day_picker:last button").css("color", "chocolate");
            $("li.day_picker:last button").css("border", "2px solid #06acdc");
            $("#currentDate").html(cdate);
    })

</script>
<main id="content">

    <div id="daily_deposit_form_container">
        <h1 class="page_heading">Daily Deposit Form</h1>

        <div id="button_container">
            <a href="#" class="bidzbutton devart" id="generate_deposit">Generate Deposit</a>
        </div>

        <div id="most_recent_deposit">4/5/6</div>

        <div id="days_of_the_week_container">

        </div>

        <div id="currentDate">1/2/3</div>
    </div>
<div id="table_container">

   <table class="fancy_table" id="daily_deposit_form">
       <tr class="table_header">
           <th class="table_col">Class Name</th>
           <th class="table_col">Class Type</th>
           <th class="table_col">Instructor</th>
           <th class="table_col">Cash</th>
           <th class="table_col">Check</th>
           <th class="table_col">Wallet</th>
           <th class="table_col">Ticket</th>
           <th class="table_col">Add Record</th>
           <th class="table_col">View History</th>
       </tr>

       <?php
$class_sql = "SELECT * FROM `deposit_classes`";
$class_result = mysqli_query($conn, $class_sql);
while ($class_row = mysqli_fetch_assoc($class_result)) {
    $id = $class_row['id'];
    $class_name = $class_row['class_name'];
    $class_type = $class_row['class_type'];
    $class_instructor = $class_row['instructor'];
    ?>
    <tr class="table_row">
        <td class="table_col"><?php echo $class_name; ?></td>
        <td class="table_col"><?php echo $class_type; ?></td>
        <td class="table_col"><?php echo $class_instructor; ?></td>
        <td class="table_col">$0.00</td>
        <td class="table_col">$0.00</td>
        <td class="table_col">$0.00</td>
        <td class="table_col">$0.00</td>
        <td class="table_col special_col"><a href="#" class="bidzbutton xbox add_record" id="classId_<?php echo $id; ?>_addRecord"><i class="fa-solid fa-user-plus"></i>&nbsp;Add Record</a></td>
        <td class="table_col special_col"><a href="#" class="bidzbutton orange view_history" id="classId<?php echo $id; ?>_viewHistory"><i class="fa-solid fa-eye"></i>&nbsp;View History</a></td>
    </tr>
<?php
}

?>
    </table>

    <p class="petty_cash_label" id="petty_cash_start">Petty Cash Start of Day: <input type="number" class="input_text"></p>
    <p class="petty_cash_label" id="petty_cash_end">Petty Cash End of Day: <input type="number" class="input_text"></p>
</div>
</main>


<script>
    $(document).on("click", "li.day_picker button", function(){
        $("li.day_picker button").each(function(){
            $(this).css("color", "black");
            $(this).css("border", "2px solid whitesmoke");
        });

        $(this).css("color", "chocolate");
        $(this).css("border", "2px solid #06acdc");

        var button_date = $(this).attr("id");
        $("#currentDate").html(button_date);
    });

    $(document).on("click", "#cancel_choose_member", function(){
        $("#chooseMemberModal").css("display", "none");
    });
    $(document).on("click", "#cancel_record_creation", function(){
        reset_modals();
        $("#addRecordModal").css("display", "none");
    });

    $(document).on("click", ".add_record", function(e){
        e.preventDefault();

        reset_modals();

        var id = $(this).attr("id");
        var class_id = id.split("_")[1];

        // get data from classes table

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'class_details',
                'class_id': class_id
            },
            success: function (out) {
                var class_name = out[0];
                var class_type = out[1];
                var class_cost = out[2];
                var class_instructor = out[3];

                $("#class_name_holder").text(class_name);
                $("#class_type_holder").text(class_type);
                $("#class_instructor_holder").text(class_instructor);

                $("#class_cost").val(class_cost);
            }
        });

        $("#addRecordModal").css("display", "block");
    });
    $(document).on("click", "#choose_user_container", function(){
        $("#chooseMemberModal").css("display", "block");
    });

    $(document).on("click", "#close_noform", function(e){
        e.preventDefault();

        $("#no_form_member_details").css("display", "none");
    })

    $(document).on("click", "#clear_filter", function(e){
        e.preventDefault();

        $(".search_row").each(function(){
            $(this).remove();
        })

        setup_rows();
    })

    $(document).on("click", "#do_the_filter", function(e){
        e.preventDefault();

        $(".search_row").each(function(){
            $(this).remove();
        });

        setup_rows();

        var name = $("#member_filter_text").val().toLowerCase();
        var municipality = $("#member_filter_municipality").val();
        var membership = $("#membership_filter").val();

            var names = [];
            var munics = [];
            var mems = [];
        // handle first and last name

        if(name != ""){
            console.log('halaby');

            $(".last_name").each(function(){

                var last_name = $(this).text().toLowerCase();
                var id = $(this).parent().attr("id");

                if(last_name.includes(name)){
                    if(!names.includes(id)){
                        names.push(id);
                    }
                }
            });

            $(".search_row .first_name").each(function(){
                var first_name = $(this).text().toLowerCase();
                var id = $(this).parent().attr("id");

                if(first_name.match(name)){
                    if(!names.includes(id)){
                        names.push(id);
                    }
                }
            });
        }
        else{
            $(".search_row").each(function(){
                var id = $(this).attr("id");
                names.push(id);
            })
        }

        // handle municipality
        if(municipality != ""){
            var munic_out = "";
            if(municipality == "csl"){
                munic_out = "City of South Lyon";
            }
            else if(municipality == "got"){
                munic_out = "Green Oak Township";
            }
            else if(municipality == "lt"){
                munic_out = "Lyon Township";
            }
            else{
                munic_out = "Other";
            }

            for(var n =0; n<names.length; n++){
                var curr = names[n];

                var mymunic = $("#" + curr).find(".municipality").text();

                if(mymunic == munic_out){
                    munics.push(curr);
                }
            }
        }
        else{
            munics = names;
        }

        if(membership != ""){
            for(var m =0; m<munics.length; m++){
                var curr = munics[m];

                var mymembership = $("#" + curr).find(".membership").text();

                if(mymembership == membership){
                    mems.push(curr);
                }
            }
        }
        else{
            mems = munics;
        }

        $(".search_row").each(function(){
            var id = $(this).attr("id");

            if(mems.includes(id)){
                // do nothing
            }
            else{
                $(this).remove();
            }
        })
    });

    $(document).on("click", "#close_member", function(e){
        e.preventDefault();

        $("#showUserDetails").css("display", "none");
    });

    $(document).on("click", "#save_record_button", function(e){
        e.preventDefault();
        reset_modals();

        alert("ready to go!");
    });
</script>
