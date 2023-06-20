<?php
include "header.php";
?>

<?php

include "connect.php";

?>
<main id="content">
    <button id="cmd">generate PDF</button>

    <div id="table_container">
            <h1 class="page_heading">Internal Deposit Form</h1>

        <p id="todays_date"></p>

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
                <td class="table_col cash_total_special" id="travel_fees_cash_total">___</td>
                <td class="table_col check_total_special" id="travel_fees_check_total">___</td>
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
                <td class="table_col" id="palates_cash">___</td>
                <td class="table_col" id="palates_check">___</td>
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
                <td class="table_col cash_total_special" id="swim_cash_total">___</td>
                <td class="table_col check_total_special" id="swim_check_total">___</td>
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

        </div>
    </table>
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
            $(document).ready(function(){
                let date = new Date().toLocaleDateString();
                $("#todays_date").text("Date: " + date);
            });

			const button = document.getElementById('cmd');

			function generatePDF() {
				// Choose the element that your content will be rendered to.
				const element = document.getElementById('table_container');
				// Choose the element and save the PDF for your user.
				html2pdf().from(element).save();
			}

			button.addEventListener('click', generatePDF);
		</script>