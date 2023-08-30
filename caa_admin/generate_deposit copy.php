<?php
include "header.php";
include "connect.php";
?>
<script>
    $(document).ready(function(){

            var normal = ['memberships', 'class_fees', 'fund_raising', 'donations'];
            var special = ['travel_fees', 'swimming', 'court_fees', 'other'];

            var tree = {
                "memberships": {
                    "cash": ['membership_fee_cash', 'fob_replacement_cash'],
                    "check": ['membership_fee_check', 'fob_replacement_check'],
                    "wallet": ['membership_fee_wallet', 'fob_replacement_wallet'],
                    "ticket": ['membership_fee_ticket', 'fob_replacement_ticket'],

                    "totals": ['membership_cash_total', 'membership_check_total', "membership_wallet_total", "membership_ticket_total"],
                    "grand_total": "membership_total",
                    "class_ids": ["?", "?"]
                },
                "travel_fees": {
                    "totals" : ['travel_fees_cash', 'travel_fees_check', "travel_fees_wallet", 'travel_fees_ticket'],
                    "grand_total": "travel_fees_total",
                    "class_ids": ["?"]
                },
                "class_fees": {
                    "cash": ['ageless_strength_cash', 'anyone_can_paint_cash', 'card_making_cash', 'drawing_with_lori_cash', 'exercise_with_carol_cash', 'fitness_with_gail_cash', 'line_dancing_cash', 'pilates_cash', 'wallet_cash','watercolor_cash', 'yoga_cash', 'knit_crochet_cash'],

                    "check": ['ageless_strength_check', 'anyone_can_paint_check', 'card_making_check', 'drawing_with_lori_check', 'exercise_with_carol_check', 'fitness_with_gail_check', 'line_dancing_check', 'pilates_check', 'wallet_check','watercolor_check', 'yoga_check, "knit_crochet_check'],

                    "wallet": ['ageless_strength_wallet', 'anyone_can_paint_wallet', 'card_making_wallet', 'drawing_with_lori_wallet', 'exercise_with_carol_wallet', 'fitness_with_gail_wallet', 'line_dancing_wallet', 'pilates_wallet', 'wallet_wallet','watercolor_wallet', 'yoga_wallet', 'knit_crochet_wallet'],

                    "ticket": ['ageless_strength_ticket', 'anyone_can_paint_ticket', 'card_making_ticket', 'drawing_with_lori_ticket', 'exercise_with_carol_ticket', 'fitness_with_gail_ticket', 'line_dancing_ticket', 'pilates_ticket', 'ticket_ticket','watercolor_ticket', 'yoga_ticket', 'knit_crochet_ticket'],

                    "totals": ['class_fees_cash_total', 'class_fees_check_total', 'class_fees_wallet_total', 'class_fees_ticket_total'],
                    "grand_total": 'class_fees_total',
                    "class_ids": [14, 23, "?", "?", 16, 15, 17, 13, 28, 24, "1-12", 25];
                },
                "swimming":{
                    "totals": ['swimming_cash', 'swimming_check', 'swimming_wallet', 'swimming_ticket'],
                    "grand_total": "swim_total",
                    "class_ids": [18]
                },
                "fund_raising":{
                    "cash": ['closet_cash', 'coffee_cash', 'events_cash', 'kroger_cash', 'quick_lunch_cash', 'sponsorship_cash', 'water_cash', 'library_cash'],
                    "check":['closet_check', 'coffee_check', 'events_check', 'kroger_check', 'quick_lunch_check', 'sponsorship_check', 'water_check', 'library_check'],

                    "wallet": ['closet_wallet', 'coffee_wallet', 'events_wallet', 'kroger_wallet', 'quick_lunch_wallet', 'sponsorship_wallet', 'water_wallet', 'library_wallet'],

                    "ticket": ['closet_ticket', 'coffee_ticket', 'events_ticket', 'kroger_ticket', 'quick_lunch_ticket', 'sponsorship_ticket', 'water_ticket', 'library_ticket'],
                    "totals": ['fund_raising_cash_total', 'fund_raising_check_total', 'fund_raising_wallet_total','fund_raising_ticket_total'],
                    'grand_total': 'fund_raising_total',
                    "class_ids": [29, 29, "?", "?", 26, "?", 29, 30]
                },
                "donations":{
                    "cash": ['aarp_cash', 'angels_cash', 'medical_loan_cash', 'miscellaneous_cash'],
                    "check": ['aarp_check', 'angels_check', 'medical_loan_check', 'miscellaneous_check'],
                       "wallet": ['aarp_wallet', 'angels_wallet', 'medical_loan_wallet', 'miscellaneous_wallet'],

                    "ticket": ['aarp_ticket', 'angels_ticket', 'medical_loan_ticket', 'miscellaneous_ticket'],
                    "totals":['donation_total_cash', 'donation_total_check', 'donation_total_wallet', 'donation_total_ticket'],
                    "grand_total": 'donation_total',
                    "class_ids": ["?", 27, 34, "31-33"]
                },
                "court_fees":{
                    "totals": ['court_fees_cash', 'court_fees_check', 'court_fees_wallet', 'court_fees_ticket'],
                    "grand_total": "court_fees_total"
                    "class_ids": ["19-22"]
                },
                "other":{
                    "totals": ['other_cash', 'other_check', 'other_wallet', 'other_ticket'],
                    "grand_total": "other_total"
                    "class_ids": ["31-33"]
                },
                "totals":{
                    'totals': ['cash_total', 'check_total', 'wallet_total', 'ticket_total'],
                    'grand_total': 'grand_total'
                }
            };


    });
</script>
<main id="content">

            <h1 class="page_heading">Internal Deposit Form</h1>

        <a href="#" target="_blank" class="bidzbutton" id="deposit_archives">Deposit Archives</a>

        <p id="todays_date"></p>

    <div id="table_container" class='table_sticky_container'>
        <table class="fancy_table" style="width: 100%;" id="deposit_table">
            <tbody><tr class="table_header">
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
                <td class="table_col" id="membership_fee_cash"><input type="number" id="input_membership_fee_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="membership_fee_cash"></td>
                <td class="table_col" id="membership_fee_check"><input type="number" id="input_membership_fee_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="membership_fee_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row membership_group">
                <td class="table_col"></td>
                <td class="table_col">FOB Replacement</td>
                <td class="table_col" id="fob_replacement_cash"><input type="number" id="input_fob_replacement_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="fob_replacement_cash"></td>
                <td class="table_col" id="fob_replacement_check"><input type="number" id="input_fob_replacement_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="fob_replacement_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="membership_cash_total">0</td>
                <td class="table_col check_total" id="membership_check_total">0</td>
                <td class="table_col group_total" id="membership_total">0</td>
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
                <td class="table_col cash_total_special" id="travel_fees_cash"><input type="number" id="input_travel_fees_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="travel_fees_cash"></td>
                <td class="table_col check_total_special" id="travel_fees_check"><input type="number" id="input_travel_fees_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="travel_fees_check"></td>
                <td class="table_col group_total" id="travel_fees_total">0</td>
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
                <td class="table_col" id="ageless_strength_cash"><input type="number" id="input_ageless_strength_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="ageless_strength_cash"></td>
                <td class="table_col" id="ageless_strength_check"><input type="number" id="input_ageless_strength_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="ageless_strength_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Anyone Can Paint</td>
                <td class="table_col" id="anyone_can_paint_cash"><input type="number" id="input_anyone_can_paint_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="anyone_can_paint_cash"></td>
                <td class="table_col" id="anyone_can_paint_check"><input type="number" id="input_anyone_can_paint_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="anyone_can_paint_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Card Making</td>
                <td class="table_col" id="card_making_cash"><input type="number" id="input_card_making_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="card_making_cash"></td>
                <td class="table_col" id="card_making_check"><input type="number" id="input_card_making_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="card_making_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Drawing With Lori</td>
                <td class="table_col" id="drawing_with_lori_cash"><input type="number" id="input_drawing_with_lori_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="drawing_with_lori_cash"></td>
                <td class="table_col" id="drawing_with_lori_check"><input type="number" id="input_drawing_with_lori_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="drawing_with_lori_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Exercise With Carol</td>
                <td class="table_col" id="exercise_with_carol_cash"><input type="number" id="input_exercise_with_carol_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="exercise_with_carol_cash"></td>
                <td class="table_col" id="exercise_with_carol_check"><input type="number" id="input_exercise_with_carol_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="exercise_with_carol_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Fitness With Gail</td>
                <td class="table_col" id="fitness_with_gail_cash"><input type="number" id="input_fitness_with_gail_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="fitness_with_gail_cash"></td>
                <td class="table_col" id="fitness_with_gail_check"><input type="number" id="input_fitness_with_gail_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="fitness_with_gail_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Knitting and Crochet</td>
                <td class="table_col" id="knit_crochet_cash"><input type="number" id="input_knit_crochet_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="knit_crochet_cash"></td>
                <td class="table_col" id="knit_crochet_check"><input type="number" id="input_knit_crochet_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="knit_crochet_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Line Dancing</td>
                <td class="table_col" id="line_dancing_cash"><input type="number" id="input_line_dancing_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="line_dancing_cash"></td>
                <td class="table_col" id="line_dancing_check"><input type="number" id="input_line_dancing_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="line_dancing_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Pilates</td>
                <td class="table_col" id="pilates_cash"><input type="number" id="input_pilates_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="pilates_cash"></td>
                <td class="table_col" id="pilates_check"><input type="number" id="input_pilates_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="pilates_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Wallet</td>
                <td class="table_col" id="wallet_cash"><input type="number" id="input_wallet_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="wallet_cash"></td>
                <td class="table_col" id="wallet_check"><input type="number" id="input_wallet_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="wallet_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Watercolors</td>
                <td class="table_col" id="watercolor_cash"><input type="number" id="input_watercolor_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="watercolor_cash"></td>
                <td class="table_col" id="watercolor_check"><input type="number" id="input_watercolor_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="watercolor_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row class_fees_group">
                <td class="table_col"></td>
                <td class="table_col">Yoga</td>
                <td class="table_col" id="yoga_cash"><input type="number" id="input_yoga_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="yoga_cash"></td>
                <td class="table_col" id="yoga_check"><input type="number" id="input_yoga_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="yoga_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="class_fees_cash_total">0</td>
                <td class="table_col check_total" id="class_fees_check_total">0</td>
                <td class="table_col group_total" id="class_fees_total">0</td>
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
                <td class="table_col cash_total_special" id="swimming_cash"><input type="number" id="input_swimming_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="swimming_cash"></td>
                <td class="table_col check_total_special" id="swimming_check"><input type="number" id="input_swimming_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="swimming_check"></td>
                <td class="table_col group_total" id="swim_total">0</td>
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
                <td class="table_col" id="closet_cash"><input type="number" id="input_closet_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="closet_cash"></td>
                <td class="table_col" id="closet_check"><input type="number" id="input_closet_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="closet_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Coffee</td>
                <td class="table_col" id="coffee_cash"><input type="number" id="input_coffee_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="coffee_cash"></td>
                <td class="table_col" id="coffee_check"><input type="number" id="input_coffee_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="coffee_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Events</td>
                <td class="table_col" id="events_cash"><input type="number" id="input_events_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="events_cash"></td>
                <td class="table_col" id="events_check"><input type="number" id="input_events_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="events_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Kroger / Busches</td>
                <td class="table_col" id="kroger_cash"><input type="number" id="input_kroger_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="kroger_cash"></td>
                <td class="table_col" id="kroger_check"><input type="number" id="input_kroger_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="kroger_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Library</td>
                <td class="table_col" id="library_cash"><input type="number" id="input_library_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="library_cash"></td>
                <td class="table_col" id="library_check"><input type="number" id="input_library_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="library_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Quick Lunch / Soup's On</td>
                <td class="table_col" id="quick_lunch_cash"><input type="number" id="input_quick_lunch_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="quick_lunch_cash"></td>
                <td class="table_col" id="quick_lunch_check"><input type="number" id="input_quick_lunch_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="quick_lunch_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Sponsorship</td>
                <td class="table_col" id="sponsorship_cash"><input type="number" id="input_sponsorship_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="sponsorship_cash"></td>
                <td class="table_col" id="sponsorship_check"><input type="number" id="input_sponsorship_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="sponsorship_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row fund_raising_group">
                <td class="table_col"></td>
                <td class="table_col">Water</td>
                <td class="table_col" id="water_cash"><input type="number" id="input_water_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="water_cash"></td>
                <td class="table_col" id="water_check"><input type="number" id="input_water_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="water_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="fund_raising_cash_total">0</td>
                <td class="table_col check_total" id="fund_raising_check_total">0</td>
                <td class="table_col group_total" id="fund_raising_total">0</td>
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
                <td class="table_col" id="aarp_cash"><input type="number" id="input_aarp_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="aarp_cash"></td>
                <td class="table_col" id="aarp_check"><input type="number" id="input_aarp_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="aarp_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Angels</td>
                <td class="table_col" id="angels_cash"><input type="number" id="input_angels_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="angels_cash"></td>
                <td class="table_col" id="angels_check"><input type="number" id="input_angels_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="angels_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Medical Loan</td>
                <td class="table_col" id="medical_loan_cash"><input type="number" id="input_medical_loan_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="medical_loan_cash"></td>
                <td class="table_col" id="medical_loan_check"><input type="number" id="input_medical_loan_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="medical_loan_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row donation_group">
                <td class="table_col"></td>
                <td class="table_col">Miscellaneous</td>
                <td class="table_col" id="miscellaneous_cash"><input type="number" id="input_miscellaneous_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="miscellaneous_cash"></td>
                <td class="table_col" id="miscellaneous_check"><input type="number" id="input_miscellaneous_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="miscellaneous_check"></td>
                <td class="table_col"></td>
            </tr>
            <tr class="table_row main_group">
                <td class="table_col"></td>
                <td class="table_col">TOTAL</td>
                <td class="table_col cash_total" id="donation_total_cash">0</td>
                <td class="table_col check_total" id="donation_total_check">0</td>
                <td class="table_col group_total" id="donation_total">0</td>
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
                <td class="table_col cash_total_special" id="court_fees_cash"><input type="number" id="input_court_fees_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="court_fees_cash"></td>
                <td class="table_col check_total_special" id="court_fees_check"><input type="number" id="input_court_fees_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="court_fees_check"></td>
                <td class="table_col" id="court_fees_total">0</td>
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
                <td class="table_col cash_total_special" id="other_cash"><input type="number" id="input_other_cash" placeholder="0" class="my_deposit_field" height="0" width="0" name="other_cash"></td>
                <td class="table_col check_total_special" id="other_check"><input type="number" id="input_other_check" placeholder="0" class="my_deposit_field" height="0" width="0" name="other_check"></td>
                <td class="table_col group_total" id="other_total">0</td>
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
                <td class="table_col cash_total" id="cash_total">0</td>
                <td class="table_col check_total" id="check_total">0</td>
                <td class="table_col group_total" id="grand_total">0</td>
            </tr>

    </tbody>
    </table>
    </div>
</main>
