<?php
include "header.php";
?>

<?php

include "connect.php";

$all_users = array();

$sql = "SELECT * FROM `members` WHERE `member_fee_paid_notes`<>''";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $membership_date = $row['membership_date'];
    $member_fee_paid_notes = $row['member_fee_paid_notes'];
    $email = $row['email'];
    $home_phone = $row['home_phone'];

    $temp = array($id, $last_name, $first_name, $membership_date, $member_fee_paid_notes, $email, $home_phone);

    array_push($all_users, $temp);
}
?>
<div id="spinner_holder">
    <div id="loader" class="center"></div>
</div>
<div id="table_container">
<main id="content">

    <h1 class="page_heading2">Membership Fee Tracker</h1>


    <div class="filter_area">
        <div class="line">
            <input type="text" name="filter" id="filter" class="form_input" placeholder="Filter Last Name / First Name">

            <div class="color_selection">
                <div class="checkbox_container">
                    <div class="checkbox_label">All Members</div>
                    <div class="checkbox" id="check_box_all">
                        <div class="checkbox_bullet active"></div>
                    </div>
                </div>
                <div class="checkbox_container">
                    <div class="checkbox_label">Just Orange and Red</div>
                    <div class="checkbox" id="check_box_orange">
                        <div class="checkbox_bullet inactive"></div>
                    </div>
                </div>
                <div class="checkbox_container">
                    <div class="checkbox_label">Just Red</div>
                    <div class="checkbox" id="check_box_red">
                        <div class="checkbox_bullet inactive"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line">
            <a href="#" class="bidzbutton orange" id="clear_button">Clear</a>
        </div>
    </div>

        <h2 class="table_heading2"><span class="heading_contents">Members</span></h2>

        <table class="fancy_table" id="member_fee_table">
            <tr class="table_header">
                <th class="table_col">#ID</th>
                <th class="table_col">Last Name</th>
                <th class="table_col">First Name</th>
                <th class="table_col">Email</th>
                <th class="table_col">Home Phone</th>
                <th class="table_col">Membership Date</th>
                <th class="table_col">Member Fee Paid Notes</th>
                <th class="table_col">Last Payment</th>
                <th class="table_col">Alert Notice</th>
            </tr>

            <?php
function convertSecToTime($sec)
{
    $date1 = new DateTime("@0"); //starting seconds
    $date2 = new DateTime("@$sec"); // ending seconds
    $interval = date_diff($date1, $date2); //the time difference
    return $interval->format('%y-%m-%d'); // convert into Years, Months, Days, Hours, Minutes and Seconds
}
$v = array();
for ($a = 0; $a < count($all_users); $a++) {
    $current = $all_users[$a];

    $id = $current[0];
    $last_name = $current[1];
    $first_name = $current[2];
    $membership_date = date("M Y", strtotime($current[3]));
    $member_fee_paid_notes = $current[4];
    $email = $current[5];
    $home_phone = $current[6];

    $regs = array('/\d{1,2}\/\d{1,2}\/\d{2,4}/', '/\d{1,2}\/\d{2,4}/', '/\d{1,2}-\d{1,2}-\d{2,4}/', '/\d{1,2}-\d{2,4}/', '/\d{1,2}\.\d{1,2}\.\d{2,4}/', '/\d{1,2}\.\d{2,4}/');

    for ($r = 0; $r < count($regs); $r++) {
        $rg = $regs[$r];

        preg_match($rg, $member_fee_paid_notes, $matches, PREG_OFFSET_CAPTURE);
        if (count($matches) == 0) {
            continue;
        } else if (!$v[$id]) {
            $my_match = $matches[0][0];
            $my_match = str_replace('.', '/', $my_match);
            $my_match = str_replace('-', '/', $my_match);

            $comps = explode("/", $my_match);

            if (count($comps) == 2) {
                $month = $comps[0];
                $year = $comps[1];
                $day = 1;

                $out = $month . "/" . $day . "/" . $year;
            } else {
                $out = $my_match;
            }

            $comps2 = explode("/", $out);
            $month = $comps2[0];
            $day = $comps2[1];
            $year = $comps2[2] * 1;

            if ($year < 100) {
                $year = 2000 + $year;
            }

            $done = $month . "/" . $day . "/" . $year;

            $v[$id] = $done;

            $now = strtotime("now");
            $sec = strtotime($done);

            $diff = $now - $sec;

            if (!$v[$id]) {
                echo 'jordan' . $my_match;
                echo "<br>\n";

                $rem = 0;
            } else {
                $rem = convertSecToTime($diff);
            }
        }
    }

    ?>
                    <tr class="table_row" id="table_row_<?php echo $id; ?>">
                        <td class="table_col"><?php echo $id; ?></td>
                        <td class="table_col last_name"><?php echo $last_name; ?></td>
                        <td class="table_col first_name"><?php echo $first_name; ?></td>
                        <td class="table_col"><?php echo $email; ?></td>
                        <td class="table_col"><?php echo $home_phone; ?></td>
                        <td class="table_col"><?php echo $membership_date; ?></td>
                        <td class="table_col"><?php echo $member_fee_paid_notes; ?></td>
                        <td class="table_col last_payment"><?php echo $v[$id]; ?></td>
                        <td class="table_col"><div class="remaining_time"><?php echo $rem; ?></div></td>
                    </tr>
                    <?php
}
?>
        </table>

</main>
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
</script>

</script><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $(".last_payment").each(function(){
            var text = $(this).text();

            if(text == ""){
                $(this).parent().find(".remaining_time").text("-");
            }
        });

        $(".remaining_time").each(function(){
            var text = $(this).text();

            if(text == "-"){
                return;
            }

            var comps = text.split("-");
            var year = comps[0] * 1;
            var month = comps[1] * 1;
            var day = comps[2] * 1;

            var my_months = month + (day / 31);
            var my_years = year + (my_months / 12);

            my_years = parseFloat(my_years).toFixed(2);

            if(my_years >= 1){
                $(this).parent().css("background-color", "red");
            }
            else if(my_years >= .5){
                $(this).parent().css("background-color", "chocolate");
            }
            else{
                $(this).parent().css("background-color", "red");
            }

            $(this).text(my_years);
        });
    });
</script>
<script>
    $(document).ready(function(){
        var colors = ['rgb(255, 0, 0)', 'rgba(0, 0, 0, 0)', 'rgb(210, 105, 30)'];

        function orange(){
            all();
            $(".remaining_time").each(function(){
                var color = $(this).parent().css("background-color");

                if(color == colors[0] || color == colors[2]){
                    // do nothing
                }
                else{
                    $(this).parent().parent().css("display", "none");
                }
            })
        }

        $('#filter').on("input", function() {
            var input = $(this).val().toLowerCase();


            // get checked button
            var checked;
            var options = ['check_box_all', 'check_box_orange', 'check_box_red'];
            for(var o = 0; o<options.length; o++){
                var option = options[o];

                var classes = $("#" + option).find(".checkbox_bullet").attr("class");
                var class_arr = classes.split(" ");

                if(class_arr.includes("active")){
                    checked = option.replace("check_box_", "");
                    break;
                }
            }

            filter_it(checked, input);
        });


        function red(){
            all();
            $(".remaining_time").each(function(){
                var color = $(this).parent().css("background-color");

                if(color == colors[0]){
                    // do nothing
                }
                else{
                    $(this).parent().parent().css("display", "none");
                }
            })
        }
        function onlyUnique(value, index, array) {
            return array.indexOf(value) === index;
        }


        function filter_it(bullet, input){
            // show all rows
            var orig_ids = [];
            $(".table_row").each(function(){
                $(this).css("display", "table-row");

                var id = $(this).attr("id").replace("table_row_", "");
                orig_ids.push(id);
            })

            // get all row ids


            var all_ids = [];
            // filter names
            $(".first_name").each(function(){
                var first_name = $(this).text().toLowerCase();
                var id = $(this).parent().attr('id').replace("table_row_", "");

                if(first_name.includes(input)){
                    all_ids.push(id);
                }
            })
            $(".last_name").each(function(){
                var last_name = $(this).text().toLowerCase();
                var id = $(this).parent().attr('id').replace("table_row_", "");

                if(last_name.includes(input)){
                    all_ids.push(id);
                }
            })

            var unique = all_ids.filter(onlyUnique);

            // console.log(orig_ids);

            for(var m = 0; m<orig_ids.length; m++){
                var id = orig_ids[m];

                if(!unique.includes(id)){
                    $("#table_row_" + id).css("display", "none");
                }
            }

            if(bullet == "all"){
                // nothing needed
            }
            else if(bullet == "orange"){
                $(".remaining_time").each(function(){
                    var color = $(this).parent().css("background-color");

                    if(color == colors[0] || color == colors[2]){
                        // do nothing
                    }
                    else{
                        $(this).parent().parent().css("display", "none");
                    }
                })
            }
            else if(bullet == "red"){
                $(".remaining_time").each(function(){
                    var color = $(this).parent().css("background-color");

                    if(color == colors[0]){
                        // do nothing
                    }
                    else{
                        $(this).parent().parent().css("display", "none");
                    }
                });
            }
        }

        function all(){
            $(".remaining_time").each(function(){
                $(this).parent().parent().css("display", "table-row");
            })
        }

        $(".checkbox").click(function(){
            // clear out all bullets
            $(".checkbox_bullet").each(function(){
                $(this).removeClass("active");
                $(this).addClass("inactive");
            })

            // set active bullet
            $(this).find(".checkbox_bullet").removeClass('inactive').addClass("active");

            // get bullet type
            var id = $(this).attr("id").replace("check_box_", "");

            var input = $("#filter").val().toLowerCase();

            filter_it(id, input);
        });
    });


    $("#clear_button").click(function(e){
        e.preventDefault();

        $(".table_row").each(function(){
            $(this).css("display", "table-row");
        })

        $("#filter").val("");

        $("#check_box_red").find(".checkbox_bullet").removeClass("active").addClass('inactive');
        $("#check_box_orange").find(".checkbox_bullet").removeClass("active").addClass('inactive');
        $("#check_box_all").find(".checkbox_bullet").removeClass("inactive").addClass('active');
    })
</script>