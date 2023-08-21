
<div class="modal_bg" id="add_noform">
    <div class="modal add_member_modal">

        <h4>Add New Incomplete</h4>

        <form action="#" method="post">

            <h4 class="sign_heading">
                <span>Member/Spouse Information</span>
            </h4>

            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="last_name" class="input_label">Last Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="last_name" id="nf_2_last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="first_name" class="input_label">First Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="first_name" id="nf_2_first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="spouse" class="input_label">Spouse Name</label>
                        <input type="text" class="input_text" name="spouse" id="nf_2_spouse" placeholder="Spouse Name">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">

                <div class="col2">
                    <div class="signup_group">
                        <label for="first_visit_main" class="input_label">First Visit - Main</label>
                        <input type="text" class="input_text datepicker" name="first_visit_main" id="nf_2_first_visit_main" placeholder="First Visit - Main">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="first_visit_spouse" class="input_label">First Visit - Spouse</label>
                        <input type="text" class="input_text datepicker" name="first_visit_spouse" id="nf_2_first_visit_spouse" placeholder="First Visit - Spouse">
                    </div>
                </div>
            </div>


            <h4 class="sign_heading">
                <span>Address Information</span>
            </h4>

            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="address" class="input_label">Member Address</label>
                        <input type="text" class="input_text" name="address" id="nf_2_address" placeholder="Member Address">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="city" class="input_label">Member City</label>
                        <input type="text" class="input_text " name="city" id="nf_2_city" placeholder="Member City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="state" class="input_label">Member State</label>
                        <select name="state" id="nf_2_state" class="input_text input_select">
                            <option value="MI" selected>Michigan</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">

                <div class="col3">
                    <div class="signup_group">
                        <label for="municipality" class="input_label">Member Municipality</label>
                        <select name="municipality" id="nf_2_municipality" class="input_text input_select">
                            <option value="">Member Municipality</option>
                            <option value="Lyon Township">Lyon Township</option>
                            <option value="City of South Lyon">City of South Lyon</option>
                            <option value="Green Oak Township">Green Oak Township</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="zip" class="input_label">Member Zip Code</label>
                        <input type="text" class="input_text" name="zip" id="nf_2_zip" placeholder="Member Zip Code">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="home_phone" class="input_label">Member Home Phone</label>
                        <input type="text" class="input_text" name="home_phone" id="nf_2_home_phone" placeholder="Member Home Phone">
                    </div>
                </div>
            </div>


            <div class="horizontal_line"></div>

            <div class="member_button_container">
                <a href="#" class="bidzbutton devart" id="create_noform_member"><i class="fa-solid fa-user-plus"></i> Create Member</a>
                <a href="#" class="bidzbutton orange cancel_member_add">Cancel</a>
            </div>

        </form>
    </div>
</div>
<script>
    $(".datepicker").datepicker();

    var ids = ['first_name', 'last_name', 'spouse', 'first_visit_main', 'first_visit_spouse', 'address', 'city', 'state', 'municipality', 'zip', 'home_phone'];

    $(document).on("click", "#create_noform_member", function(){

        var cols = [];

        for(var i = 0; i<ids.length; i++){
            var d = "#nf_2_" + ids[i];
            var data = $(d).val();
            console.log(data, d);
            cols.push(data);
        }

        console.log(cols);

        var first_name = cols[0];
        var last_name = cols[1];

        if(first_name == ""){
            alert("Please provide a first name");
            $("#first_name").focus();
            return;
        }
        if(last_name == ""){
            alert("Please provide a last name");
            $("#last_name").focus();
            return;
        }

         $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': 'create_noform',
                'data': cols
            },
            success: function (out) {
                location.reload();
            }
        });
    });
</script>
