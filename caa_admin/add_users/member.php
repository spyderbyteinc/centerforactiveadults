
<div class="modal_bg" id="add_member">
    <div class="modal add_member_modal">

        <h4>Add New Member</h4>

        <form action="#" method="post">

            <h4 class="sign_heading">
                <span>Member/Spouse Information</span>
            </h4>

            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="last_name" class="input_label">Last Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="first_name" class="input_label">First Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="spouse" class="input_label">Spouse Name <span class="required"></span></label>
                        <input type="text" class="input_text" name="spouse" id="spouse" placeholder="Spouse Name">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="last_visit_main" class="input_label">Member Last Visit <span class="required">*</span></label>
                        <input type="text" class="input_text datepicker" name="last_visit_main" id="last_visit_main" placeholder="Member Last Visit">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="last_visit_spouse" class="input_label">Spouse Last Visit <span class="required"></span></label>
                        <input type="text" class="input_text datepicker" name="last_visit_spouse" id="last_visit_spouse" placeholder="Spouse Last Visit">
                    </div>
                </div>
            </div>


            <h4 class="sign_heading">
                <span>Address Information</span>
            </h4>

            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="address" class="input_label">Member Address <span class="required">*</span></label>
                        <input type="text" class="input_text" name="address" id="address" placeholder="Member Address">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="city" class="input_label">Member City <span class="required">*</span></label>
                        <input type="text" class="input_text " name="city" id="city" placeholder="Member City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="state" class="input_label">Member State <span class="required">*</span></label>
                        <select name="state" id="state" class="input_text input_select">
                            <option value="MI" selected>Michigan</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="municipality" class="input_label">Member Municipality <span class="required">*</span></label>
                        <select name="municipality" id="municipality" class="input_text input_select">
                            <option value="">Member Municipality</option>
                            <option value="Lyon Township">Lyon Township</option>
                            <option value="City of South Lyon">City of South Lyon</option>
                            <option value="Green Oak Township">Green Oak Township</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="zip" class="input_label">Member Zip Code <span class="required">*</span></label>
                        <input type="text" class="input_text" name="zip" id="zip" placeholder="Member Zip Code">
                    </div>
                </div>
            </div>


            <h4 class="sign_heading">
                <span>Contact Information</span>
            </h4>


            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="home_phone" class="input_label">Member Home Phone <span class="required">*</span></label>
                        <input type="text" class="input_text" name="home_phone" id="home_phone" placeholder="Member Home Phone">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="email" class="input_label">Member Email <span class="required"></span></label>
                        <input type="text" class="input_text " name="email" id="email" placeholder="Member Email">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="newsletter" class="input_label">Newsletter Method <span class="required">*</span></label>
                        <select name="newsletter" id="newsletter" class="input_text input_select">
                            <option value="">Select Newsletter Method</option>
                            <option value="Mail">Mail</option>
                            <option value="Email">Email</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
            </div>


            <h4 class="sign_heading">
                <span>Emergency Contact Information</span>
            </h4>

            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="emergency_contact_1" class="input_label">Emergency Contact 1 - Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="emergency_contact_1" id="emergency_contact_1" placeholder="Emergency Contact 1 - Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="emergency_phone_1" class="input_label">Emergency Contact 1 - Phone <span class="required">*</span></label>
                        <input type="text" class="input_text " name="emergency_phone_1" id="emergency_phone_1" placeholder="Emergency Contact 1 - Phone">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="emergency_contact_2" class="input_label">Emergency Contact 2 - Name</label>
                        <input type="text" class="input_text" name="emergency_contact_2" id="emergency_contact_2" placeholder="Emergency Contact 2 - Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="emergency_phone_2" class="input_label">Emergency Contact 2 - Phone</label>
                        <input type="text" class="input_text " name="emergency_phone_2" id="emergency_phone_2" placeholder="Emergency Contact 2 - Phone">
                    </div>
                </div>
            </div>


            <h4 class="sign_heading">
                <span>Membership Information</span>
            </h4>


            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="membership_date" class="input_label">Membership Date <span class="required">*</span></label>
                        <input type="text" class="input_text datepicker" name="membership_date" id="membership_date" placeholder="Membership Date">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="member_fee_paid_notes" class="input_label">Membership Fee Paid <span class="required">*</span></label>
                        <input type="text" class="input_text " name="member_fee_paid_notes" id="member_fee_paid_notes" placeholder="Member Fee Paid Notes">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="key_tag" class="input_label">Member Key Tag <span class="required">*</span></label>
                        <input type="text" class="input_text" id="key_tag" name="key_tag" placeholder="Member Key Tag"/>
                    </div>
                </div>
            </div>



            <h4 class="sign_heading">
                <span>Miscellaneous Information</span>
            </h4>



            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="number_in_home" class="input_label">Number in Home <span class="required">*</span></label>
                        <input type="text" class="input_text" name="number_in_home" id="number_in_home" placeholder="Number in Home">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="head_of_household" class="input_label">Head of Household <span class="required">*</span></label>
                        <input type="text" class="input_text " name="head_of_household" id="head_of_household" placeholder="Head of Household">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="race" class="input_label">Member Race <span class="required">*</span></label>
                        <input type="text" class="input_text" name="race" id="race" placeholder="Member Race">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="62_older" class="input_label">62 or Older? <span class="required">*</span></label>
                        <select name="62_older" id="62_older" class="input_text input_select">
                            <option value="">Is Member 62 or Older</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="horizontal_line"></div>

            <div class="member_button_container">
                <a href="#" class="bidzbutton devart" id="create_member"><i class="fa-solid fa-user-plus"></i> Create Member</a>
                <a href="#" class="bidzbutton orange cancel_member_add">Cancel</a>
            </div>

        </form>
    </div>
</div>
<script>
    $(".datepicker").datepicker();

    var columns = ['last_name', 'first_name', 'key_tag', 'last_visit_main', 'spouse', 'last_visit_spouse', 'address', 'city', 'state', 'zip', 'home_phone', 'municipality', 'email', 'newsletter', 'emergency_contact_1', 'emergency_phone_1', 'emergency_contact_2', 'emergency_phone_2', 'number_in_home', 'head_of_household', 'race', '62_older', 'membership_date', 'member_fee_paid_notes'];

    var reqs = ['last_name', 'first_name', 'last_visit_main', 'address', 'city', 'state', 'municipality', 'zip', 'home_phone', 'newsletter', 'emergency_contact_1', 'emergency_phone_1', 'membership_date', 'member_fee_paid_notes', 'key_tag', 'number_in_home', 'head_of_household', 'race', '62_older'];

    $(document).on("click", "#create_member", function(){

        var data = {};

        for(var c = 0; c < columns.length; c++){
            var col = columns[c];
            var el = $("#" + col);
            var val = el.val();

            if(reqs.includes(col)){
                if(val == ""){
                    alert("Please Complete Form");
                    el.css("background-color", "lightpink");
                    el.focus();
                    return;
                }
            }

            data[col] = val;
        }

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'create_member',
                'data': data,
                'columns': columns
            },
            success: function (out) {
                if(out == "done"){
                    $("#add_member").css("display", "none");
                }

                location.reload();
            }
        });

    })

    $(".input_select").change(function(){
        $(this).css("background-color", "whitesmoke");
    });

    $(document).on("click", ".input_text", function(){
        $(this).css("background-color", "whitesmoke");
    });

    $("input").keydown(function(){
        $(this).css("background-color", "whitesmoke");
    });
</script>
