<?php
include "header.php";
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
            <a href="#" class="bidzbutton orange" id="clear_button">Clear</a>
        </div>
    </div>

    <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="all_members" class="nav_link">All Members / Incomplete</a></li>
            <li class="nav_item"><a href="#" id="module2" name="just_members" class="nav_link">Just Members</a></li>
            <li class="nav_item"><a href="#" id="module3" name="just_incomplete" class="nav_link">Just Incomplete</a></li>
        </ul>

        <?php include 'membership_tables/all.php';?>
        <?php include 'membership_tables/members.php';?>
        <?php include 'membership_tables/noform.php';?>
</main>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script><script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>

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

        var users = getAllUsers();

        var all_members = $.merge(users[0], users[1], users[2], users[3]);
        var all_no_form = $.merge(users[4], users[5], users[6], users[7]);

        printAllRows(all_members, all_no_form);
        printMemberRows(all_members);
        printNoFormRows(all_no_form);

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
            console.log("filter municipality");

            $(".table_row").each(function(){
                var munic = $(this).find(".municipality_selection").text();

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

    // filter text
    $('#filter').on("input", function() {
        doTheFilter();


    });

    // select municipality filter
    $('select#municipality_filter').on('change', function() {
        doTheFilter();


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


                        console.log(data, typeof data);

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
