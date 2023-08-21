<?php
include "header.php";

include "add_users/member.php";
include "add_users/noform.php";
include "add_users/transition.php";

?>

<?php

include "connect.php";

?>
<style>
    body{
        overflow-y: hidden;
    }
    #noform, #members{
        display: none;
    }
</style>
<div class="modal_bg" id="confirmDeletion">
    <div class="modal">
        <h4>Delete Record: <span id="deleted_user">JORDAN HALABY</span></h4>

        <input type="hidden" name="my_user_dets" id="my_user_dets" value="">

        <div class="delete_button_container">
            <a href="#" class="bidzbutton red" id="delete_user_record">Delete</a>
            <a href="#" class="bidzbutton orange" id="cancel_deletion">Cancel</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="member_details">
    <div class="modal detail_modal">
        <h4>User Details - Complete Member</h4>

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

<div class="modal_bg" id="no_form_details">
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

        <div class="button_container">
            <a href="#" id="close_noform" class="bidzbutton orange">Close</a>
        </div>
    </div>
</div>
<div class="modal_bg" id="member_map">
    <div class="modal">

        <h4>View Member Location</h4>

        <p id="one_location_text"></p>

        <iframe id="single_map_frame" width="600" height="450" frameborder="0" allowfullscreen=""src="">
        </iframe>

        <div id="close_button"><a href="#" class="bidzbutton orange">Close Map</a></div>
    </div>
</div>

<div class="modal_bg" id="my_maps">
    <div class="modal_container">
        <div class="fake_modal">
            <h4>View Member Location</h4>

            <p id="member_location_address">10137 Devonshire, South Lyon, MI</p>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2943.557728332937!2d-83.67103632305948!3d42.45842542888033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882356a8c21ff171%3A0xb924b65486a98e40!2s10137%20Devonshire%20Dr%2C%20South%20Lyon%2C%20MI%2048178!5e0!3m2!1sen!2sus!4v1684165470565!5m2!1sen!2sus" width="600" height="450" id="member_map_embed" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="fake_modal">
            <h4>View Municipality Maps</h4>

            <select name="municipality_maps" id="municipality_maps" class="form_input form_select">
                <option value="csl">City of South Lyon</option>
                <option value="lt">Lyon Township</option>
                <option value="got">Green Oak Township</option>
            </select>


            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&amp;q=South Lyon, MI&zoom=13" width="600" height="450" style="border:0;" allowfullscreen="" id="pick_munic_frame" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<div id="spinner_holder">
    <div id="loader" class="center"></div>
</div>
<div id="table_container">
<main id="content">

    <h1 class="page_heading">User Database</h1>


    <div class="filter_area">
        <div class="line">
            <input type="text" name="filter" id="filter" class="form_input" placeholder="Filter Last Name / First Name">

            <select name="municipality_filter" id="municipality_filter" class="form_input form_select">
                <option value="">Filter by Municipality</option>
                <option value="all">All Municipalities</option>
                <option value="csl">City of South Lyon</option>
                <option value="lt">Lyon Township</option>
                <option value="got">Green Oak Township</option>
                <option value="other">Other</option>
                <option value="na">Unrecognized</option>
            </select>
        </div>
        <div class="line">
            <a href="#" class="bidzbutton devart" id="do_the_filter"><i class="fa-solid fa-filter"></i>&nbsp; Filter</a>
            <a href="#" class="bidzbutton orange" id="clear_button">Clear</a>
        </div>

        <div class="dropdown">
            <input type="checkbox" id="dropdown" />
            <label for="dropdown" class="dropdown-btn">
                <span>Add User</span>
                <div class="dropdown-sep"></div>
                <span id="addMemberButton">
                    <i class="fa-solid fa-circle-plus"></i>
                </span>
            </label>

            <ul class="dropdown-content" role="menu">
                <li><a href="#" id="create_new_member">Member</a></li>
                <li><a href="#" id="create_new_incomplete">Incomplete Member</a></li>
            </ul>
        </div>
    </div>

    <script>
        $(document).on('click', ".dropdown", function(event){
            event.stopPropagation();
        });

        $(document).on("click", ".dropdown-btn", function(){
            $(".dropdown-content").css("display", "block");
            $(".dropdown-content").css("visibility", "visible");
                $(".dropdown-content").css("transform", "translateY(1px)");
        });
        // Closes the menu in the event of outside click
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown')) {
                $(".dropdown-content").css("display", "none");
                $(".dropdown-content").css("visibility", "hidden");
                $(".dropdown-content").css("transform", "translateY(0)");
            }
        }
    </script>

    <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="all_members" class="nav_link tab_handler">All Members / Incomplete</a></li>
            <li class="nav_item"><a href="#" id="module2" name="just_members" class="nav_link tab_handler">Master Database</a></li>
            <li class="nav_item"><a href="#" id="module3" name="just_incomplete" class="nav_link tab_handler">Just Incomplete</a></li>
        </ul>

        <?php include 'membership_tables/all.php';?>
        <?php include 'membership_tables/members.php';?>
        <?php include 'membership_tables/noform.php';?>
</main>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script><script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>

    function setTransitionIcon(){
        $(".table_row").each(function(){
            var table_row = $(this);
            var membership = table_row.find(".table_col:nth-child(8)").text();
            var id = table_row.find("input.all_id").val();

            var special_actions = table_row.find(".table_col:nth-child(10)");

            var curr_actions = special_actions.html();

            if(membership == "Incomplete"){
                var template = `
                    <a href="#" class="transition_record"  name="transition_${id}" title="Transition User">
                        <i class="fa-solid fa-shuffle"></i>
                    </a>
                `;

                curr_actions = curr_actions + template;
                special_actions.html(curr_actions);

            }
        });
    }
    function getMonthByIndex(index){
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        return months[index];
    }
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
            "body").style.visibility = "hidden";
            document.querySelector(
            "#loader").style.visibility = "visible";
            $("html").css("overflow-y", "hidden");

            $("#spinner_holder").css("visibility", "visible");
        } else {
            document.querySelector(
            "#loader").style.display = "none";
            $("#spinner_holder").css("visibility", "hidden");
            $("body").css("visibility", "visible");
            $("body").css("overflow-y", "auto");

            // add transition icon
            setTransitionIcon();
        }
    };

    var munics = {};

    munics['csl'] = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=South Lyon, MI&zoom=13";
    munics['lt'] = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=Lyon Township, MI&zoom=12";
    munics['got'] = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=Green Oak Township, MI&zoom=12";

    var current = "all_members";

    function close_all(){
        $("#all_membership").hide();
        $("#members").hide();
        $("#noform").hide();

        $("li.nav_item").each(function(){
            $(this).removeClass("active");
        });
    }

    $("li.nav_item").click(function(e){
        var name = $(this).find("a").attr("name");

        if(name == current){
            // do nothing
        }
        else{
            current = name;

            if(current == "all_members"){
                close_all();
                $("#all_membership").css("display", "block");
                $("#all_membership").show();

                $("#module1").parent().addClass("active");
            }
            else if(current == "just_members"){
                close_all();
                $("#members").css("display", "block");
                $("#members").show();

                $("#module2").parent().addClass("active");
            }
            else if(current == "just_incomplete"){
                close_all();
                $("#noform").css("display", "block");
                $("#noform").show();

                $("#module3").parent().addClass("active");
            }
        }

    });
</script>
<!-- Handle special actions -->
<script>
    function getParameters(object){
        var name = $(object).attr("name");


        var comps = name.split(",");


        var id = comps[0];
        id = id.split("=");
        id = id[1];

        var table = comps[1];
        table = table.split("=");
        table = table[1];

        var ret = [id, table];
        return ret;

    }
    // Handle view record
    $(document).on('click','.view_record',function(e){
        e.preventDefault();


        var arr = getParameters(this);
        var id = arr[0];
        var table = arr[1];

        console.log(id,table);
    });

    // Handle View Map
    $(document).on('click','.view_map',function(e){


        var arr = getParameters(this);
        var id = arr[0];
        var table = arr[1];

        $("#my_maps").css("display", "block");

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'munic',
                'id': id,
                'table': table
            },
            success: function (out) {
                var abbr = "";

                if(out == "City of South Lyon"){
                    abbr = "csl";
                }
                else if(out == "Lyon Township"){
                    abbr = "lt";
                }
                else if(out == "Green Oak Township"){
                    abbr = "got";
                }
                else{
                    abbr = "csl";
                }

                var address = munics[abbr];

                $("#pick_munic_frame").attr("src", address);

                $("#municipality_maps").val(abbr);
            }
        });

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'map',
                'id': id,
                'table': table
            },
            success: function (out) {
                var addr = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + out;
                $("#member_location_address").text(out);
                $("#member_map_embed").attr("src", addr);
            }
        });
    });
    $(document).on('click','#close_button a',function(e){
        $("#member_map").css("display", "none");
    });

    function municipality_conversion(abbr){
        var full = "";

        console.log(abbr);

        if(abbr == "csl"){
            full = "City of South Lyon";
        }
        else if(abbr == "lt"){
            full = "Lyon Township";
        }
        else if(abbr == "got"){
            full = "Green Oak Township";
        }
        else if(abbr == "other"){
            full = "Other";
        }
        else if(abbr == "na"){
            full = "na";
        }
        else{
            full = "all";
        }

        return full;
    }

    function printAllRows(members, no_form){
        var out = "";

        for(var m = 0; m < members.length; m++){
            var record = members[m];

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
                    <input type="hidden" name="all_id" class="all_id" value="${id}">
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

            out = out + template;
        }

        for(var m = 0; m < no_form.length; m++){
            var record = no_form[m];

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
                    <input type="hidden" name="all_id" class="all_id" value="${id}">
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

            out = out + template;
        }
        console.log(out);
            $("#all_user_table").append(out);
    }
    function printMemberRows(members){

        var out = "";

        for(var m = 0; m < members.length; m++){
            var record = members[m];

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
                    <input type="hidden" name="all_id" class="all_id" value="${id}">
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

            out = out + template;
        }

        $("#all_member_table").append(out);
    }
    function printNoFormRows(no_form){

        var out = "";

        for(var m = 0; m < no_form.length; m++){
            var record = no_form[m];

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
                    <input type="hidden" name="all_id" class="all_id" value="${id}">
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

            out = out + template;
        }
        $("#noform_table").append(out);
    }

    // Clear user database filter
    $("#clear_button").click(function(e){
        e.preventDefault();


        $(".table_row").remove();

        $("select#municipality_filter").val("");
        $("#filter").val("");

        var users = getAllUsers();


        var csl_member_group = users[0];
        var lt_member_group = users[1];
        var got_member_group = users[2];
        var other_member_group = users[3];

        var csl_noform_group = users[4];
        var lt_noform_group = users[5];
        var got_noform_group = users[6];
        var other_noform_group = users[7];

        var tab = getTabName();

        var tables = ["all_user_table", "all_member_table", "noform_table"];

                var table = tables[0];

                printGroup(csl_member_group, table);
                printGroup(lt_member_group, table);
                printGroup(got_member_group, table);
                printGroup(other_member_group, table);

                printGroup(csl_noform_group, table);
                printGroup(lt_noform_group, table);
                printGroup(got_noform_group, table);
                printGroup(other_noform_group, table);

                var table = tables[1];

                printGroup(csl_member_group, table);
                printGroup(lt_member_group, table);
                printGroup(got_member_group, table);
                printGroup(other_member_group, table);

                var table = tables[2];
                printGroup(csl_noform_group, table);
                printGroup(lt_noform_group, table);
                printGroup(got_noform_group, table);
                printGroup(other_noform_group, table);
    });


    function filter_it(vale, table, id_cont){
        var all_ids = [];

        var filter_val = vale.toLowerCase();

        if(filter_val != ""){
            var table_dom = "#" + table;
            var holder_dom = "." + id_cont;

            $(table_dom).find(".last_name").each(function(){
                var last_name = $(this).text().toLowerCase();

                var myid = $(this).parent().find(holder_dom).val();

                if(last_name.includes(filter_val)){
                    all_ids.push(myid);
                }
            });

            $(table_dom).find(".first_name").each(function(){
                var first_name = $(this).text().toLowerCase();

                var myid = $(this).parent().find(holder_dom).val();

                if(first_name.includes(filter_val)){
                    if(!all_ids.includes(myid)){
                        all_ids.push(myid);
                    }
                }
            });
        }
        else{
            all_ids = [];
        }


        return all_ids;
    }

    function printDatabase(filtered_users){
        var out = "";

        // get selected text
        var sel = $("select#municipality_filter").val();
        var selected = municipality_conversion(sel);

        $(".table_row").css("display", "none");

        $(".all_id").each(function(){
            var current_id = $(this).val();

            if(filtered_users.includes(current_id)){

                // filter municipality
                var munic = $(this).parent().find(".municipality_selection").text();

                if(selected == "all"){
                    $(this).parent().css("display", 'table-row');
                }
                else if(selected == "na"){
                    if(munic != "City of South Lyon" && munic != "Green Oak Township" && munic != "Lyon Township" && munic != "Other"){
                        $(this).parent().css("display", "table-row");
                    }
                }
                else{
                    if(munic == selected){
                        $(this).parent().css("display", 'table-row');
                    }
                }

            }
        });
    }

    function filter_database(ids, table){

        var users = getAllUsers();

        var all_members = $.merge(users[0], users[1], users[2], users[3]);
        var all_no_form = $.merge(users[4], users[5], users[6], users[7]);

        var all_users = $.merge(all_members, all_no_form);

        var useful_arr = [];

        if(table == "all_user_table"){

            useful_arr = all_users;
        }

        var intercept = [];


        for(var u = 0; u<useful_arr.length; u++){
            var user_id = useful_arr[u][0];
            var element = useful_arr[u];

            for(var i = 0; i<ids.length; i++){
                var curr = ids[i];

                if(user_id == curr){
                    intercept.push(user_id);
                }
            }
        }

        if(intercept.length == 0){
        }
        else{
            printDatabase(intercept);
        }


    }

    function doTheFilter(){
        $(".table_row").each(function(){
            $(this).css("display", "table-row");
        });

        // get filter and select values
        var filter = $("#filter").val();
        var select = $("#municipality_filter").val();

        var selected = municipality_conversion(select);

        if(filter == "" && (selected == "" || selected == "all")){
            // show everyting
            // do nothing - everything is shown
            console.log('show everything');
        }
        else if(filter == "" && selected != "all" && selected != ""){
            // filter municipality

            $(".table_row").each(function(){
                var munic = $(this).find(".municipality_selection").text();
            console.log("filter municipality", munic);

                if(selected == munic){
                    // do nothing
                }
                else if(selected == "na"){
                    // unrecognizable
                    if(munic != "City of South Lyon" && munic != "Lyon Township" && munic != "Green Oak Township" && munic != "Other"){
                        // do nothing
                    }
                    else{
                        $(this).css("display", "none");
                    }
                }
                else{
                    $(this).css("display", "none");
                }
            });
        }
        else if(filter != "" && (selected == "" || selected == "all")){
            // filter input
            console.log('filter input');

            filter = filter.toLowerCase();

            $(".table_row").each(function(){
                var first_name = $(this).find(".first_name").text().toLowerCase();
                var last_name = $(this).find(".last_name").text().toLowerCase();

                if(first_name.includes(filter) || last_name.includes(filter)){
                    // do nothing
                }
                else{
                    $(this).css("display", "none");
                }
            });
        }
        else{
            // filter municipality and input
            console.log('filter all');

            filter = filter.toLowerCase();

            $(".table_row").each(function(){
                var first_name = $(this).find(".first_name").text().toLowerCase();
                var last_name = $(this).find(".last_name").text().toLowerCase();
                var munic = $(this).find(".municipality_selection").text();


                if(selected == munic && (first_name.includes(filter) || last_name.includes(filter))){
                    // do nothing
                }
                else if(selected == "na"){
                    if(munic != "City of South Lyon" && munic != "Lyon Township" && munic != "Green Oak Township" && munic != "Other"){
                        // do nothing
                        if(first_name.includes(filter) || last_name.includes(filter)){
                            // do nothing
                        }
                        else{
                            $(this).css('display', "none");
                        }
                    }
                    else{
                            $(this).css('display', "none");
                    }
                }
                else{
                    $(this).css("display", "none");
                }

            });
        }
    }

    function printGroup(group, table_name){
        var printArr = [];

        var out = "";
        for(var v = 0; v<group.length; v++){
            var record = group[v];

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
                    <input type="hidden" name="all_id" class="all_id" value="${id}">
                    <td class="table_col last_name">${last_name}</td>
                    <td class="table_col first_name">${first_name}</td>
                    <td class="table_col">${spouse}</td>
                    <td class="table_col address">${address}</td>
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

            out = out + template;

        }

        $("#" + table_name).append(out);
    }
    function getTabName(){
        var tabname = $("ul#nav_tabs li.active").find("a").attr('name');
        return tabname;
    }
    function myNewFilter(){

        $("tr.table_row").each(function(){
            $(this).remove();
        });
        var tab = getTabName();

        var users = getAllUsers();

        var csl_member_group = users[0];
        var lt_member_group = users[1];
        var got_member_group = users[2];
        var other_member_group = users[3];

        var csl_noform_group = users[4];
        var lt_noform_group = users[5];
        var got_noform_group = users[6];
        var other_noform_group = users[7];

        var inp = $("#filter").val();
        var sel = $("#municipality_filter").val();

        var munic_inp = municipality_conversion(sel);

        // output all data based on tab
        if(tab == "all_members"){
            var printArr = printGroup(csl_member_group, "all_user_table");
            console.log(printArr);
        }
        else if(tab == "just_members"){

        }
        else if(tab == "just_incomplete"){

        }

        // console.log(users);
    }

    function jordanFilter(){

        $("tr.table_row").each(function(){
            $(this).remove();
        });

        var users = getAllUsers();

        var csl_member_group = users[0];
        var lt_member_group = users[1];
        var got_member_group = users[2];
        var other_member_group = users[3];

        var csl_noform_group = users[4];
        var lt_noform_group = users[5];
        var got_noform_group = users[6];
        var other_noform_group = users[7];

        var tab = getTabName();

        var inp = $("#filter").val().toLowerCase();
        var sel = $("#municipality_filter").val();

        var munic_inp = municipality_conversion(sel);

        console.log(munic_inp);

        var tables = ["all_user_table", "all_member_table", "noform_table"];

        if(tab == "all_members"){
            for(var t = 0; t<tables.length; t++){
                var table = tables[t];

                if(munic_inp == "all"){
                    printGroup(csl_member_group, table);
                    printGroup(lt_member_group, table);
                    printGroup(got_member_group, table);
                    printGroup(other_member_group, table);

                    printGroup(csl_noform_group, table);
                    printGroup(lt_noform_group, table);
                    printGroup(got_noform_group, table);
                    printGroup(other_noform_group, table);
                }
                else if(munic_inp == "City of South Lyon"){
                    printGroup(csl_member_group, table);
                    printGroup(csl_noform_group, table);
                }
                else if(munic_inp == "Green Oak Township"){
                    printGroup(got_member_group, table);
                    printGroup(got_noform_group, table);
                }
                else if(munic_inp == "Lyon Township"){
                    printGroup(lt_member_group, table);
                    printGroup(lt_noform_group, table);
                }
                else if(munic_inp == "Other"){
                    var other_member_output = [];
                    var other_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_member_output.push(record);
                        }
                    }

                    for(var om = 0; om<other_noform_output.length; om++){
                        var record = other_noform_output[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_noform_output.push(record);
                        }
                    }

                    printGroup(other_member_output, table);
                    printGroup(other_noform_output, table);
                }
                else if(munic_inp == "na"){
                    var na_member_output = [];
                    var na_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_member_output.push(record);
                        }
                    }


                    for(var om = 0; om<other_noform_group.length; om++){
                        var record = other_noform_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_noform_output.push(record);
                        }
                    }

                    printGroup(na_member_output, table);
                    printGroup(na_noform_output, table);

                }
            }
        }
        else if(tab == "just_members"){

            for(var t = 0; t<tables.length; t++){
                var table = tables[t];

                if(munic_inp == "all"){
                    printGroup(csl_member_group, table);
                    printGroup(lt_member_group, table);
                    printGroup(got_member_group, table);
                    printGroup(other_member_group, table);
                }
                else if(munic_inp == "City of South Lyon"){
                    printGroup(csl_member_group, table);
                }
                else if(munic_inp == "Green Oak Township"){
                    printGroup(got_member_group, table);
                }
                else if(munic_inp == "Lyon Township"){
                    printGroup(lt_member_group, table);
                }
                else if(munic_inp == "Other"){
                    var other_member_output = [];
                    var other_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_member_output.push(record);
                        }
                    }

                    for(var om = 0; om<other_noform_output.length; om++){
                        var record = other_noform_output[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_noform_output.push(record);
                        }
                    }

                    printGroup(other_member_output, table);
                }
                else if(munic_inp == "na"){
                    var na_member_output = [];
                    var na_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_member_output.push(record);
                        }
                    }


                    for(var om = 0; om<other_noform_group.length; om++){
                        var record = other_noform_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_noform_output.push(record);
                        }
                    }

                    printGroup(na_member_output, table);

                }
            }
        }
        else if(tab == "just_incomplete"){

            for(var t = 0; t<tables.length; t++){
                var table = tables[t];

                if(munic_inp == "all"){
                    printGroup(csl_noform_group, table);
                    printGroup(lt_noform_group, table);
                    printGroup(got_noform_group, table);
                    printGroup(other_noform_group, table);
                }
                else if(munic_inp == "City of South Lyon"){
                    printGroup(csl_noform_group, table);
                }
                else if(munic_inp == "Green Oak Township"){
                    printGroup(got_noform_group, table);
                }
                else if(munic_inp == "Lyon Township"){
                    printGroup(lt_noform_group, table);
                }
                else if(munic_inp == "Other"){
                    var other_member_output = [];
                    var other_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_member_output.push(record);
                        }
                    }

                    for(var om = 0; om<other_noform_output.length; om++){
                        var record = other_noform_output[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            other_noform_output.push(record);
                        }
                    }

                    printGroup(other_noform_output, table);
                }
                else if(munic_inp == "na"){
                    var na_member_output = [];
                    var na_noform_output = [];

                    for(var om = 0; om<other_member_group.length; om++){
                        var record = other_member_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_member_output.push(record);
                        }
                    }


                    for(var om = 0; om<other_noform_group.length; om++){
                        var record = other_noform_group[om];

                        var municipality = record[8];

                        if(municipality == "Other"){
                            // do nothing
                        }
                        else{
                            na_noform_output.push(record);
                        }
                    }

                    printGroup(na_noform_output, table);

                }
            }
        }

        $(".table_row").each(function(){
            var last_name = $(this).find(".last_name").text().toLowerCase();
            var first_name = $(this).find(".first_name").text().toLowerCase();

            if(last_name.includes(inp) || first_name.includes(inp)){
                // do nothing
            }
            else{
                $(this).remove();
            }
        })


        setTransitionIcon();
    }

    $(document).on("click", "#do_the_filter", function(e){
        jordanFilter();
    });

    // filter text
    // $('#filter').on("input", function() {
    //     jordanFilter();


    // });

    // // select municipality filter
    // $('select#municipality_filter').on('change', function() {
    //     jordanFilter();


    // });

    // change tab
    $(document).on("click", ".tab_handler", function(){
        jordanFilter();
    });

    $(document).on('click','#close_noform',function(e){
        $("#no_form_details").css("display", "none");
    });
    $(document).on('click','#close_member',function(e){
        $("#member_details").css("display", "none");
    });

    $(document).on('click','#my_maps',function(e){
        if (e.target === e.currentTarget) {
            $("#my_maps").css("display", "none");
        }
    });


    $("#municipality_maps").on('change', function() {
        var pick = $(this).val();
        var address = munics[pick];

        $("#pick_munic_frame").attr("src", address);
    });

    $(document).on('click','.view_record',function(e){
        e.preventDefault();


        var name = $(this).attr('name');

        var comps = name.split(",");
        var id = comps[0].split("=")[1];
        var table = comps[1].split("=")[1];


        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'view_record',
                'id': id,
                'table': table
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

                    $("#no_form_details").css("display", "block");
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

                    $("#member_details").css("display", "block");
                }
            }
        });
    });

</script><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var nform_fields = ['nf_last_name', 'nf_first_name', 'nf_spouse', 'nf_first_visit_main', 'nf_first_visit_spouse', 'nf_home_phone', 'nf_address', 'nf_city', 'nf_zip', 'nf_municipality'];

    var member_fields = ['mem_last_name', 'mem_first_name', 'mem_spouse', 'mem_last_visit_main', 'mem_last_visit_spouse', 'mem_key_tag', 'mem_address', 'mem_city', 'mem_zip', 'mem_municipality', 'mem_home_phone', 'mem_email', 'mem_newsletter', 'mem_emergency_contact_1', 'mem_emergency_phone_1', 'mem_emergency_contact_2', 'mem_emergency_phone_2', 'mem_number_in_home', 'mem_head_of_household', 'mem_race', 'mem_62_older', 'mem_membership_date', 'mem_member_fee_paid_notes'];
</script>
<script>
    $(document).on("click", ".cancel_member_add", function(){
        $("#add_noform").css("display", "none");
        $("#add_member").css("display", "none");
    });
    $(document).on("click", "#create_new_member", function(){
        $("#add_member").css("display", "block");
    });
    $(document).on("click", "#create_new_incomplete", function(){
        $("#add_noform").css("display", "block");
    });

    $(document).on("click", ".delete_record", function(){
        $("#confirmDeletion").css("display", "block");

        var data = $(this).closest(".table_row");
        var first_name = data.find(".first_name").text();
        var last_name = data.find(".last_name").text();

        var full_name = first_name + " " + last_name;

        $("#deleted_user").text(full_name);

        var name = $(this).attr('name');
        $("#my_user_dets").val(name);
    });
    $(document).on("click", "#cancel_deletion", function(){
        $("#confirmDeletion").css("display", "none");
    })
    $(document).on('click', '#delete_user_record', function(){
        var dets = $("#my_user_dets").val();
        var comps = dets.split(",");

        var ids = comps[0];
        var tables = comps[1];

        var id_comps = ids.split('=');
        var table_comps = tables.split("=");

        var id = id_comps[1];
        var table = table_comps[1];

        var full_name = $("#deleted_user").text();

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'delete_user_record',
                'id': id,
                'table': table
            },
            success: function (out) {
                alert(full_name + " has been deleted");

                location.reload();
            }
        });
    })

    $(document).on("click", ".transition_record", function(e){
        e.preventDefault();

        var name = $(this).attr("name");
        var id = name.replace("transition_", "");

    var cols = ['first_name', 'last_name', 'spouse', 'first_visit_main', 'first_visit_spouse', 'address', 'city', 'state', 'municipality', 'zip', 'home_phone'];

    var input = ['last_name', 'first_name', 'key_tag', 'last_visit_main', 'spouse', 'last_visit_spouse', 'address', 'city', 'state', 'zip', 'home_phone', 'municipality', 'email', 'newsletter', 'emergency_contact_1', 'emergency_phone_1', 'emergency_contact_2', 'emergency_phone_2', 'number_in_home', 'head_of_household', 'race', '62_older', 'membership_date', 'member_fee_paid_notes'];

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'get_noform_data',
                'id': id,
                'cols': cols
            },
            success: function (out) {
                console.log(out);

                $("#tr_old_id").val(id);
                var name = out['first_name'] + " " + out['last_name'];

                $("#transition_name").text(name);
                $("#transition_member_modal").css("display", "block");

                for(var c =0; c<cols.length; c++){
                    var col = cols[c];

                    var v = out[col];

                    if(v != ""){
                        if(input.includes(col)){
                            // col, v
                            var selector = "#tr_" + col;
                            $(selector).val(v);
                        }
                    }
                }
            }
        });
    })
</script>