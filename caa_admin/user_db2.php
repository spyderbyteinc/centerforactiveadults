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
<div class="modal_bg" id="member_map">
    <div class="modal">

        <h4>View Member Location</h4>

        <p id="one_location_text"></p>

        <iframe id="single_map_frame" width="600" height="450" frameborder="0" allowfullscreen=""src="">
        </iframe>

        <div id="close_button"><a href="#" class="bidzbutton orange">Close Map</a></div>
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

        $("#member_map").css("display", "block");

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
                $("#single_map_frame").attr("src", addr);
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

    // filter text
    $('#filter').on("input", function() {
        $(".table_row").each(function(){
            $(this).css("display", "table-row");
        });

        var vf = $("#filter").val();
        var ids = filter_it(vf, "all_user_table", "all_id");
        filter_database(ids, "all_user_table");

    });

    // select municipality filter
    $('select#municipality_filter').on('change', function() {
        var selected = this.value;

        var filtered = $("#filter").val();

        $(".table_row").each(function(){
            $(this).css("display", "table-row");
        });

        var ids = filter_it(filtered, "all_user_table", "all_id");
        filter_database(ids, "all_user_table");


        var my_munic = municipality_conversion(selected);

        if(my_munic == "na"){
            $(".municipality_selection").each(function(){
                var text = $(this).text();

                if(text != "City of South Lyon" && text != "Green Oak Township" && text != "Lyon Township" && text != "Other"){
                    // do nothing
                    console.log('jordan', text);
                }
                else{
                    $(this).parent().css("display", "none");
                }
            });
        }
        else if(my_munic == "all"){
            // do nothing
        }
        else{
            $(".municipality_selection").each(function(){
                var text = $(this).text();

                if(text != my_munic){
                    $(this).parent().css("display", "none");
                }
            });
        }

        // $(".table_row").remove();

        // var users = getAllUsers();

        // var members, no_form;

        // if(my_munic == "Other"){
        //     members = users[3];
        //     no_form = users[7];
        // }
        // else{
        //     if(my_munic == "City of South Lyon"){
        //         members = users[0];
        //         no_form = users[4];
        //     }
        //     else if(my_munic == "Lyon Township"){
        //         members = users[1];
        //         no_form = users[5];
        //     }
        //     else if(my_munic == "Green Oak Township"){
        //         members = users[2];
        //         no_form = users[6];
        //     }
        // }

        // printAllRows(members, no_form);
        // printMemberRows(members);
        // printNoFormRows(no_form);
    });
</script><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
