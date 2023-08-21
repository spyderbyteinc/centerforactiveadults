<?php
include "header.php";
?>

<?php

include "connect.php";

function getMonthName($index)
{

    $months = array(null, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    $month_name = $months[$index];

    return $month_name;
}
?>
<div class="modal_bg" id="deposit_archive_list" style="display: block;">
    <div class="modal">
        <h2>Deposit Archives</h2>

        <?php
$all_dates = array();

$sql = "SELECT * FROM `deposit`";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $deposit_date = $row['deposit_date'];

    array_push($all_dates, $deposit_date);
}

$all_years = array();
for ($d = 0; $d < count($all_dates); $d++) {
    $date = $all_dates[$d];

    $comps = explode("/", $date);

    $year = $comps[2];

    if (!in_array($year, $all_years)) {
        array_push($all_years, $year);
    }
}

sort($all_years);

$master_dates = array();
for ($a = 0; $a < count($all_years); $a++) {
    $year = $all_years[$a];

    $months = array();

    for ($d = 0; $d < count($all_dates); $d++) {
        $date = $all_dates[$d];

        $comps = explode("/", $date);

        $d_year = $comps[2];
        $d_month = $comps[0];

        if ($year == $d_year) {
            array_push($months, $d_month);
        }
    }

    $master_dates[$year] = $months;
}

var_dump($master_dates);

$my_years = array_keys($master_dates);
sort($my_years);
?>

        <?php
for ($y = 0; $y < count($my_years); $y++) {
    $year = $my_years[$y];
    ?>

            <h3 class="year_heading archive_heading">
                <span><?php echo $year; ?>
                    <i class="fa-solid fa-caret-up caret_up" id="caret_up_<?php echo $year; ?>"></i>
                    <i class="fa-solid fa-caret-down caret_down" id="caret_down_<?php echo $year; ?>"></i>
                </span>
            </h3>
            <div class="year_container" id="year_container_<?php echo $year; ?>">

            <?php
$branch = $master_dates[$year];
    $branch = array_unique($branch);
    for ($b = 0; $b < count($branch); $b++) {
        $month = getMonthName($branch[$b]);
        ?>

             <h3 class="month_heading archive_heading">
                <span><?php echo $month; ?>
                    <i class="fa-solid fa-caret-up caret_up" id="caret_up_<?php echo $year; ?>_<?php echo $month; ?>"></i>
                    <i class="fa-solid fa-caret-down caret_down" id="caret_down_<?php echo $year; ?>_<?php echo $month; ?>"></i>
                </span>
            </h3>
             <div class="month_container" id="month_container_<?php echo $month; ?>"></div>
        <?php
}
    ?>

            </div>
        <?php
}
?>

        <div class="close_button_container">
            <a href="#" class="bidzbutton orange" id="close_deposit_archive">Close</a>
        </div>
    </div>
</div>
<script>
    var all_dates = <?php echo json_encode($all_dates); ?>;

    console.log(all_dates);
</script>
<main id="content">

            <h1 class="page_heading">Internal Deposit Form</h1>

        <a href="#" target="_blank" class="bidzbutton" id="deposit_archives">Deposit Archives</a>

        <p id="todays_date"></p>

    <div id="table_container">
        <table class="fancy_table" style="width: 100%;" id="deposit_table">
            <tr class="table_header">
                <th class="table_col special_col">Group</th>
                <th class="table_col special_col">Sub-Group</th>
                <th class="table_col">Cash</th>
                <th class="table_col">Check</th>
                <th class="table_col">Group Total</th>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col">Memberships</td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row membership_group">
                <td class="table_col"></td>
                <td class="table_col">Membership Fee</td>
                <td class="table_col" id="membership_fee_cash">___</td>
                <td class="table_col" id="membership_fee_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row membership_group">
                <td class="table_col"></td>
                <td class="table_col">FOB Replacement</td>
                <td class="table_col" id="fob_replacement_cash">___</td>
                <td class="table_col" id="fob_replacement_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="membership_cash_total">___</td>
                <td class="table_col check_total" id="membership_check_total">___</td>
                <td class="table_col group_total" id="membership_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group travel_fees_group">
                <td class="table_col">Travel Fees</td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total_special" id="travel_fees_cash">___</td>
                <td class="table_col check_total_special" id="travel_fees_check">___</td>
                <td class="table_col group_total" id="travel_fees_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col">Class Fees</td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Ageless Strength</td>
                <td class="table_col" id="ageless_strength_cash">___</td>
                <td class="table_col" id="ageless_strength_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Anyone Can Paint</td>
                <td class="table_col" id="anyone_can_paint_cash">___</td>
                <td class="table_col" id="anyone_can_paint_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Card Making</td>
                <td class="table_col" id="card_making_cash">___</td>
                <td class="table_col" id="card_making_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Drawing With Lori</td>
                <td class="table_col" id="drawing_with_lori_cash">___</td>
                <td class="table_col" id="drawing_with_lori_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Exercise With Carol</td>
                <td class="table_col" id="exercise_with_carol_cash">___</td>
                <td class="table_col" id="exercise_with_carol_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Fitness With Gail</td>
                <td class="table_col" id="fitness_with_gail_cash">___</td>
                <td class="table_col" id="fitness_with_gail_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Line Dancing</td>
                <td class="table_col" id="line_dancing_cash">___</td>
                <td class="table_col" id="line_dancing_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Pilates</td>
                <td class="table_col" id="pilates_cash">___</td>
                <td class="table_col" id="pilates_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Wallet</td>
                <td class="table_col" id="wallet_cash">___</td>
                <td class="table_col" id="wallet_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Watercolors</td>
                <td class="table_col" id="watercolor_cash">___</td>
                <td class="table_col" id="watercolor_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Yoga</td>
                <td class="table_col" id="yoga_cash">___</td>
                <td class="table_col" id="yoga_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="class_fees_cash_total">___</td>
                <td class="table_col check_total" id="class_fees_check_total">___</td>
                <td class="table_col group_total" id="class_fees_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group swim_group">
                <td class="table_col">Swim</td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total_special" id="swimming_cash">___</td>
                <td class="table_col check_total_special" id="swimming_check">___</td>
                <td class="table_col group_total" id="swim_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col">Fund Raising</td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Closet</td>
                <td class="table_col" id="closet_cash">___</td>
                <td class="table_col" id="closet_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Coffee</td>
                <td class="table_col" id="coffee_cash">___</td>
                <td class="table_col" id="coffee_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Events</td>
                <td class="table_col" id="events_cash">___</td>
                <td class="table_col" id="events_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Kroger / Busches</td>
                <td class="table_col" id="kroger_cash">___</td>
                <td class="table_col" id="kroger_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Quick Lunch / Soup's On</td>
                <td class="table_col" id="quick_lunch_cash">___</td>
                <td class="table_col" id="quick_lunch_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Sponsorship</td>
                <td class="table_col" id="sponsorship_cash">___</td>
                <td class="table_col" id="sponsorship_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Water</td>
                <td class="table_col" id="water_cash">___</td>
                <td class="table_col" id="water_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="fund_raising_cash_total">___</td>
                <td class="table_col check_total" id="fund_raising_check_total">___</td>
                <td class="table_col group_total" id="fund_raising_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col">Donations</td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">AARP</td>
                <td class="table_col" id="aarp_cash">___</td>
                <td class="table_col" id="aarp_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Angels</td>
                <td class="table_col" id="angels_cash">___</td>
                <td class="table_col" id="angels_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Medical Loan</td>
                <td class="table_col" id="medical_loan_cash">___</td>
                <td class="table_col" id="medical_loan_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Miscellaneous</td>
                <td class="table_col" id="miscellaneous_cash">___</td>
                <td class="table_col" id="miscellaneous_check">___</td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="donation_total_cash">___</td>
                <td class="table_col check_total" id="donation_total_check">___</td>
                <td class="table_col group_total" id="donation_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group court_fees_group">
                <td class="table_col">Court Fees / Pickleball</td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total_special" id="court_fees_cash">___</td>
                <td class="table_col check_total_special" id="court_fees_check">___</td>
                <td class="table_col" id="court_fees_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group other_group">
                <td class="table_col">Other</td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total_special" id="other_cash">___</td>
                <td class="table_col check_total_special" id="other_check">___</td>
                <td class="table_col group_total" id="other_total">___</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row empty_row main_group">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col">Cash Total</td>
                <td class="table_col">Check Total</td>
                <td class="table_col">Grand Total</td>
            </tr>
            <tr class="table_row empty_row">
                <td class="table_col"></td>
                <td class="table_col"></td>
                <td class="table_col cash_total" id="cash_total">___</td>
                <td class="table_col check_total" id="check_total">___</td>
                <td class="table_col group_total" id="grand_total">___</td>
            </tr>

    </table>


        </div>


        <a href="#" class="bidzbutton devart" id="submit_deposit">Submit Deposit</a>
</main><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    #deposit_table{
        padding: 40px;
        margin-top: 20px;
    }
    #todays_date{
        text-align: center;
        margin-top: 20px;
        font-size: 20px;
        font-weight: bold;
    }
</style>
		<script>

            function flatten(tree){
                var columns = ['memberships', 'travel_fees', 'class_fees', 'swimming', 'fund_raising', 'donations', 'court_fees', 'other'];
                var normal = ['memberships', 'class_fees', 'fund_raising', 'donations'];
                var special = ['travel_fees', 'swimming', 'court_fees', 'other'];

                var flat = [];
                for(var c =0; c<columns.length; c++){
                    var key = columns[c];

                    var branch = tree[key];

                    if(normal.includes(key)){
                        var cash = branch['cash'];
                        var check = branch['check'];

                        for(var h = 0; h<cash.length; h++){
                            var leaf = cash[h];

                            flat.push(leaf);
                        }
                        for(var k = 0; k<check.length; k++){
                            var leaf = check[k];

                            flat.push(leaf);
                        }
                    }
                    else if(special.includes(key)){
                        var totals = branch['totals'];

                        var cash = totals[0];
                        var check = totals[1];

                        flat.push(cash);
                        flat.push(check);
                    }
                }

                return flat;
            }
            var normal = ['memberships', 'class_fees', 'fund_raising', 'donations'];
            var special = ['travel_fees', 'swimming', 'court_fees', 'other'];

            var all = normal.concat(special);

            var tree = {
                "memberships": {
                    "cash": ['membership_fee_cash', 'fob_replacement_cash'],
                    "check": ['membership_fee_check', 'fob_replacement_check'],
                    "totals": ['membership_cash_total', 'membership_check_total'],
                    "grand_total": "membership_total"
                },
                "travel_fees": {
                    "totals" : ['travel_fees_cash', 'travel_fees_check'],
                    "grand_total": "travel_fees_total"
                },
                "class_fees": {
                    "cash": ['ageless_strength_cash', 'anyone_can_paint_cash', 'card_making_cash', 'drawing_with_lori_cash', 'exercise_with_carol_cash', 'fitness_with_gail_cash', 'line_dancing_cash', 'pilates_cash', 'wallet_cash','watercolor_cash', 'yoga_cash'],

                    "check": ['ageless_strength_check', 'anyone_can_paint_check', 'card_making_check', 'drawing_with_lori_check', 'exercise_with_carol_check', 'fitness_with_gail_check', 'line_dancing_check', 'pilates_check', 'wallet_check','watercolor_check', 'yoga_check'],
                    "totals": ['class_fees_cash_total', 'class_fees_check_total'],
                    "grand_total": 'class_fees_total'
                },
                "swimming":{
                    "totals": ['swimming_cash', 'swimming_check'],
                    "grand_total": "swim_total"
                },
                "fund_raising":{
                    "cash": ['closet_cash', 'coffee_cash', 'events_cash', 'kroger_cash', 'quick_lunch_cash', 'sponsorship_cash', 'water_cash'],
                    "check":['closet_check', 'coffee_check', 'events_check', 'kroger_check', 'quick_lunch_check', 'sponsorship_check', 'water_check'],
                    "totals": ['fund_raising_cash_total', 'fund_raising_check_total'],
                    'grand_total': 'fund_raising_total'
                },
                "donations":{
                    "cash": ['aarp_cash', 'angels_cash', 'medical_loan_cash', 'miscellaneous_cash'],
                    "check": ['aarp_check', 'angels_check', 'medical_loan_check', 'miscellaneous_check'],
                    "totals":['donation_total_cash', 'donation_total_check'],
                    "grand_total": 'donation_total'
                },
                "court_fees":{
                    "totals": ['court_fees_cash', 'court_fees_check'],
                    "grand_total": "court_fees_total"
                },
                "other":{
                    "totals": ['other_cash', 'other_check'],
                    "grand_total": "other_total"
                },
                "totals":{
                    'totals': ['cash_total', 'check_total'],
                    'grand_total': 'grand_total'
                }
            };

            var flat = flatten(tree);

            function onlyNumberKey(event){
                var code = event.which ? event.which : event.keyCode;
                alert(code);
            }
            var spaces = [];

            $("td.table_col").each(function(){

                var id = $(this).attr("id");

                if(id && id != ""){
                    spaces.push(id);
                }
            });

            for(var s = 0; s<spaces.length; s++){
                var container = spaces[s];
                var cont = "#" + container;

                if(container.includes("_total")){
                    continue;
                }

                var id = "input_" + container;
                var name = container;

                var newTextInput = $(document.createElement("input")).prop({
                    type: "number",
                    id: id,
                    placeholder: "0",
                    class: 'my_deposit_field',
                    height: "100%",
                    width: "100%",
                    name: name
                });
                $(cont).html(newTextInput);
            }

            function findTreeRoot(name){
                // console.log(tree, name);
                for(var n = 0; n<normal.length; n++){
                    var norm = normal[n];

                    var branch = tree[norm];

                    var cash = branch["cash"];
                    var check = branch["check"];

                    if(cash.includes(name) || check.includes(name)){
                        return norm;
                    }
                }

                for(var s = 0; s<special.length; s++){
                    var spec = special[s];

                    var branch = tree[spec];

                    var totals = branch["totals"];

                    if(totals.includes(name)){
                        return spec;
                    }
                }
            }
            function findTreeType(root){
                if(normal.includes(root)){
                    return "normal";
                }
                else if(special.includes(root)){
                    return "special";
                }
            }

            function normalAddition(root){
                var branch = tree[root];

                var cash = branch['cash'];
                var check = branch['check'];


                var ch_total = 0;
                var ck_total = 0;

                for(var h = 0; h<cash.length; h++){
                    var cash_item = cash[h];

                    var item = $("#input_" + cash_item).val();

                    if(item == "" || !item){
                        item = 0;
                    }

                    ch_total = ch_total + parseInt(item);
                }
                for(var k =0; k<check.length; k++){
                    var check_item = check[k];

                    var item = $("#input_" + check_item).val();

                    if(item == "" || !item){
                        item = 0;
                    }

                    ck_total = ck_total + parseInt(item);
                }

                var cash_total = branch["totals"][0];
                var check_total = branch["totals"][1];

                $("#" + cash_total).text(ch_total);
                $("#" + check_total).text(ck_total);

                var grand_total = branch["grand_total"];
                var gd_total = parseInt(ch_total) + parseInt(ck_total);
                $("#" + grand_total).text(gd_total);
            }

            function specialAddition(root){
                var branch = tree[root];
                var inputs = branch["totals"];

                var cashSelector = "#input_" + inputs[0];
                var checkSelector = "#input_" + inputs[1];

                var cashTotal = parseInt($(cashSelector).val());
                var checkTotal =  parseInt($(checkSelector).val());

                if(!cashTotal || cashTotal == ""){
                    cashTotal = 0;
                }
                if(!checkTotal || checkTotal == ""){
                    checkTotal = 0;
                }

                var grand_total = cashTotal + checkTotal;

                var g_sel = branch['grand_total'];
                $("#" + g_sel).text(grand_total);
            }

            function mytotal(){
                // normal types
                var cashTotals = [];
                var checkTotals = [];

                for(var n = 0; n<normal.length; n++){
                    var norm = normal[n];

                    var branch = tree[norm];
                    var totals = branch["totals"];

                    var cashTOT = totals[0];
                    var checkTOT = totals[1];

                    cashTotals.push(cashTOT);
                    checkTotals.push(checkTOT);
                }
                // special type
                for(var s =0; s<special.length; s++){
                    var spec = special[s];
                    var branch = tree[spec];

                    var totals = branch['totals'];
                    var cashTOT = "input_" + totals[0];
                    var checkTOT = "input_" + totals[1];

                    cashTotals.push(cashTOT);
                    checkTotals.push(checkTOT);
                }

                var ch_tot = 0;
                for(var h = 0; h<cashTotals.length; h++){
                    var item = cashTotals[h];
                    var entry = $("#" + item).text();

                    if(!entry || entry == ""){
                        entry = $("#" + item).val();
                    }

                    if(entry == ""){
                        entry = 0;
                    }

                    ch_tot = ch_tot + parseInt(entry);
                }
                var ck_tot = 0;
                for(var k = 0; k<checkTotals.length; k++){
                    var item = checkTotals[k];
                    var entry = $("#" + item).text();

                    if(!entry || entry == ""){
                        entry = $("#" + item).val();
                    }

                    if(entry == ""){
                        entry = 0;
                    }

                    ck_tot = ck_tot + parseInt(entry);
                }
                $("#cash_total").text(ch_tot);
                $("#check_total").text(ck_tot);

                var gd = ch_tot + ck_tot;
                $("#grand_total").text(gd);
            }

            function do_the_addition(name){
                var root = findTreeRoot(name);
                var type = findTreeType(root);

                if(type == "normal"){
                    normalAddition(root);
                }
                else if(type == "special"){
                    specialAddition(root);
                }

                mytotal();
            }

            // initialize totals to zero
            for(var n = 0; n<normal.length; n++){
                var norm = normal[n];

                var branch = tree[norm];
                var totals = branch["totals"];

                var grand_total = "#" + branch['grand_total'];

                var cash_total = "#" + totals[0];
                var check_total = "#" + totals[1];

                $(cash_total).text("0");
                $(check_total).text("0");
                $(grand_total).text("0");
            }
            for(var s = 0; s<special.length; s++){
                var spec = special[s];

                var branch = tree[spec];
                var grand_total = "#" + branch['grand_total'];

                $(grand_total).text("0");
            }
            $("#cash_total").text("0");
            $("#check_total").text("0");
            $("#grand_total").text("0");


            $(document).ready(function(){
                let date = new Date().toLocaleDateString();
                $("#todays_date").text("Date: " + date);

                $(".my_deposit_field").on("keyup", function(evt){
                        var name = $(this).attr("name");
                        do_the_addition(name);
                });

            });

			// const button = document.getElementById('cmd');

			// function generatePDF() {
			// 	// Choose the element that your content will be rendered to.
			// 	const element = document.getElementById('table_container');
			// 	// Choose the element and save the PDF for your user.
			// 	html2pdf().from(element).save();
			// }

			// button.addEventListener('click', generatePDF);

            $(document).on("click", "#submit_deposit", function(e){
                e.preventDefault();

                var keys = flat;

                var vals = [];

                var date = $("#todays_date").text().replace("Date: ", "");

                var sql1 = "INSERT INTO `deposit` ";
                var sql2 = "(`id`,`deposit_date`,";
                var sql3 = " VALUES (NULL, '" + date + "', ";

                for(var k =0; k<keys.length; k++){
                    var key = keys[k];

                    var id = "#input_" + key;

                    var item = $(id).val();

                    if(item == "" || !item){
                        item = 0;
                    }

                    if(k == keys.length - 1){
                        sql2 = sql2 + "`" + key + "`)";

                        sql3 = sql3 + "'" + item + "');";
                    }
                    else{
                        sql2 = sql2 + "`" + key + "`, ";

                        sql3 = sql3 + "'" + item + "', ";
                    }
                }

                var sql = sql1 + sql2 + sql3;

                $.ajax({
                    type: 'POST',
                    url: "ajax.php",
                    async: false,
                    dataType: "json",
                    data: {
                        'type': 'submit_deposit',
                        'sql': sql
                    },
                    success: function (out) {
                        console.log(out);
                    }
                });
            });

            $(document).on("click", '#close_deposit_archive', function(e){
                e.preventDefault();

                $("#deposit_archive_list").css("display", "none");
            })
		</script>