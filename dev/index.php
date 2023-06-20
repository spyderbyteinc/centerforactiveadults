<?php include "includes/header.php";?>
<!-- <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script> -->
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script>
<script src="img/new_scroller/endlessRiver.js"></script>
<link rel="stylesheet" href="img/new_scroller/endlessRiver.css">
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>

<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>

<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css">
<div id="spinner_holder">
    <div class="components">
        <img src="img/logo.png" alt="">
        <p class="please_wait">Please Wait...</p>
        <div id="loader" class="center"></div>
    </div>
</div>

<div class="modal_bg" id="popup_slides">
    <div class="image_container">
        <img src="slides/images/ageless_strength.png" alt="">
    </div>
</div>

<div class="modal_bg" id="popup_class">
    <div class="modal">
        <h2 class="section_heading"><span id="popup_class_name">Class Name</span></h2>

        <p class="class_details class_day" id="popup_class_day">Class Day</p>
        <p class="class_details class_time" id="popup_class_time">Class Time</p>
    </div>
</div>
<div class="modal_bg" id="archive_newsletters">
    <div class="modal">
        <h4>Archived CAA Newsletters</h4>


    <div class="table_container">
        <table id="fancy_table">
            <tr class="table_header">
                <th class="table_col">Issued Month(s)</th>
                <th class="table_col">Issued Year</th>
                <th class="table_col">Link</th>
            </tr>
            <tr>
                <td class="table_col">March, April</td>
                <td class="table_col">2023</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA March April 2023 Newsletter.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">January, February</td>
                <td class="table_col">2023</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA Newsletter  Jan Feb 2023.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">November, December</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA Newsletter Nov.Dec. 2022.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">September, October</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA Sept-Oct Newsletter 2022.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">July, August</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA July August 2022 Newsletter.pdf">Click Here</a></td>
            </tr>
            <tr>
                <td class="table_col">May, June</td>
                <td class="table_col">2022</td>
                <td class="table_col"><a target="_blank" href="http://centerforactiveadults.com/newsletters/CAA MayJune 2022.pdf">Click Here</a></td>
            </tr>
        </table>
    </div>

    <div class="close_button_container">
        <a href="#" class="bidzbutton orange close_archive">Close</a>
    </div>
    </div>
</div>
<div id="main_content">

    <div id="heading">
        <div class="heading_container">
            <div id="image_col" class="header_col">

                <img src="img/logo.png" alt="">
            </div>
            <div class="header_col" id="serving_col">
                <div class="box_container">
                    <h4 class="line1">Serving the Greater South Lyon Area</h4>
                    <h4 class="line2">"A Community Center for Ages 50 & Up"</h4>
                </div>
                <div class="contact_information">
                    <h4 class="phone_and_email">
                        <span>(248) 573-8175</span>
                        <span class="bullet">&#x2022;</span>
                        <span><a href="mailto:centerforactiveadults@slcs.us">centerforactiveadults@slcs.us</a></span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <hr class="gray_bar hr_hook">

<!--
    <ul id="scroller">
                <li> <img class="lazyload" src="img/new_scroller/birthday-min.jpg" alt="Birthday"></li>
                <li> <img class="lazyload"  src="img/new_scroller/center_entrance-min.jpg" alt="Center Entrance"></li>
                <li> <img class="lazyload"  src="img/new_scroller/chairyoga-min.jpg" alt="Chair Yoga"></li>
                <li> <img class="lazyload"  src="img/new_scroller/hat-min.jpg" alt="Hat"></li>
                <li> <img class="lazyload"  src="img/new_scroller/pickleball-min.png" alt="Pickleball"></li>
                <li> <img class="lazyload"  src="img/new_scroller/swim-min.jpg" alt="Swim"></li>
                <li> <img class="lazyload"  src="img/new_scroller/yoga-min.jpg" alt="Yoga"></li>
    </ul> -->

<ul class="scroll1" data-style="infiniteslide16855549251418f9" style="display: flex; flex-flow: row nowrap; align-items: center; animation: 24s linear 0s infinite normal none running infiniteslide16855549251418f9;">
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/birthday-min.jpg" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/center_entrance-min.jpg" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/hat-min.jpg" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/pickleball-min.png" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/swim-min.jpg" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img class="lazyload" src="img/new_scroller/yoga-min.jpg" alt=""></li>
	    <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/birthday-min.jpg" alt=""></li>
        <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/center_entrance-min.jpg" alt=""></li>
        <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/hat-min.jpg" alt=""></li>
        <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/pickleball-min.png" alt=""></li>
        <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/swim-min.jpg" alt=""></li>
        <li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone lazyload"><img src="img/new_scroller/yoga-min.jpg" alt=""></li></ul>
<!--
<ul class="scroll1" data-style="infiniteslide16855549251418f9" style="display: flex; flex-flow: row nowrap; align-items: center; animation: 24s linear 0s infinite normal none running infiniteslide16855549251418f9;">
		<li style="flex: 0 0 auto; display: block;"><img src="https://unsplash.it/400/300/?random" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img src="https://placeimg.com/400/300/people" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img src="https://placeimg.com/400/300/tech" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img src="https://placeimg.com/400/300/arch" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img src="https://placeimg.com/400/300/animals" alt=""></li>
		<li style="flex: 0 0 auto; display: block;"><img src="https://placeimg.com/400/300/arch/sepia" alt=""></li>
	<li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://unsplash.it/400/300/?random" alt=""></li><li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://placeimg.com/400/300/people" alt=""></li><li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://placeimg.com/400/300/tech" alt=""></li><li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://placeimg.com/400/300/arch" alt=""></li><li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://placeimg.com/400/300/animals" alt=""></li><li style="flex: 0 0 auto; display: block;" class="infiniteslide_clone"><img src="https://placeimg.com/400/300/arch/sepia" alt=""></li></ul> -->

    <h2 class="section_heading"><span>Newsletter</span></h2>

    <section id="newsletters" class="full">
        <div class="newsletter_col">
            <span class="newsletter current_news">
                <a type="submit" target="_blank" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" id="create_account_submit" href="http://centerforactiveadults.com/newsletters/CAA Newsletter  May June 2023.pdf"><span><i class="fa-regular fa-folder-open"></i> Current Newsletter</span></a>
            </span>

        <span class="newsletter newsarc"><a href="#" class="bidzbutton" id="archive_open"><i class="fa-solid fa-box-archive"></i> NEWSLETTER ARCHIVE</a></span>
        </div>
    </section>

    <h2 class="section_heading"><span>Membership Form</span></h2>

        <div class="membership_container">

            <a type="submit" target="_blank" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" id="membershipform" href="http://centerforactiveadults.com/membership_form.pdf"><span> Membership Form</span></a>

        </div>

    <h2 class="section_heading"><span>Staff</span></h2>

    <div id="center_staff_container">

        <div class="staff_row special_staff_row">
            <div class="staff_item">
                <img src="img/staff/carrie.jpg" alt="Staff 1" class="staff_picture">
                <p class="staff_name">Carrie Cavanaugh</p>
                <p class="staff_role">Director</p>
                <p class="staff_contact"><a href="mailto:cavanaughc@slcs.us">cavanaughc@slcs.us</a></p>
            </div>
            <div class="staff_item">
                <img src="img/staff/pat.jpeg" alt="Staff 2" class="staff_picture">
                <p class="staff_name">Pat Mengel</p>
                <p class="staff_role">Office Coordinator</p>
                <p class="staff_contact"><a href="mailto:mengelp@slcs.us">mengelp@slcs.us</a></p>
            </div>
        </div>
        <div class="staff_row special_staff_row">
            <div class="staff_item">
                <img src="img/staff/sherry.jpeg" alt="Staff 3" class="staff_picture">
                <p class="staff_name">Sherry Gjerpen</p>
                <p class="staff_role">Office Coordinator</p>
                <p class="staff_contact"><a href="gjerpens@slcs.us">gjerpens@slcs.us</a></p>
            </div>
            <div class="staff_item">
                <img src="img/staff/judy.jpg" alt="Staff 4" class="staff_picture">
                <p class="staff_name">Judy Keeling</p>
                <p class="staff_role">Office Coordinator</p>
                <p class="staff_contact"><a href="mailto:jhalaby@emich.edu">keelingj@slcs.us</a></p>
            </div>
        </div>
    </div>


    <h2 class="section_heading"><span>Calendars</span></h2>

    <img src="calendar/may2023.png" alt="May 2023" class="calendar_image">
    <img src="calendar/june23.png" alt="June 2023" class="calendar_image">

    <h2 class="section_heading"><span>Classes / Workshops</span></h2>
            <div class="class_list_holder">
                <a type="submit" target="_blank" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" id="create_account_submit" href="https://centerforactiveadults.com/classlist.pdf"><span>Class and Workshop Schedule</span></a>
            </div>
    <div id="class_section">
        <div class="class_column">
            <ul class="class_list">
                                        <?php
$col1_sql = "SELECT * FROM `class_type` WHERE `id`<> 5 ORDER BY `myorder`";
$col1_result = mysqli_query($conn, $col1_sql);
while ($col1_row = mysqli_fetch_assoc($col1_result)):

    $id = $col1_row['id'];
    $type = $col1_row['type'];
    ?>
																																																																																																																																																																																																																                                                                                                                                                    <li class="class_list_item first_list_item" id="col_1||entry_<?php echo $id; ?>">
																																																																																																																																																																																										                    <div class="hover">
																																																																																																																																																																																										                        <div class="class_name">
																																																																																																																																																																																										                            <?php echo $type; ?>
																																																																																																																																																																																										                        </div>
																																																																																																																																																																																										                        <div class="choc_bar"></div>
																																																																																																																																																																																										                    </div>
																																																																																																																																																																																										                </li>
																																																																																																																																																																																										            <?php endwhile;?>
            </ul>
        </div>
        <div class="class_column" id="sliding_column_2">

            <?php include "classes.php";?>

        </div>
    </div>


    <h2 class="section_heading"><span>Mission and Location</span></h2>

    <div id="contact_section">
        <div class="contact_left contact_module">
            <!-- <iframe src="https://snazzymaps.com/embed/482652" width="100%" height="600px" style="border:none;"></iframe> -->
            <div id="map">

            </div>
        </div>

        <div class="contact_right contact_module">
            <div class="mission">
                <p class="mission_box mission_heading">Our Mission</p>
                <p class="mission_box mission_body">"To encourage the art of living well by building a vibrant community of active individuals, 50 & up, through diverse programming and activities."</p>
            </div>
            <div class="non_dis_statement">
                <p class="statement_heading">Non-Discrimination Statement</p>
                <p class="statement_body">
                    The South Lyon Community School District does not discriminate on the basis of race, color, national origin, sex, disability, weight, religion, or marital status in its programs and activities. The following person has been designated to handle inquiries regarding the nondiscrimination policies:
                </p>
                <div class="statement_handler">
                    <h5>Brian Toth</h5>
                    <p class="handler_details">Assistant Superintendent for Administrative Services</p>
                    <p class="handler_details">South Lyon Community Schools</p>
                    <p class="handler_details">345 S. Warren, South Lyon</p>
                    <p class="handler_details">South Lyon, MI 48178</p>
                </div>
            </div>
        </div>
    </div>

    <div id="center_details">
        <div class="detail_box">
            <p class="details_heading">Website for the South Lyon Center for Active Adults</p>

            <p class="details_line">Located in SW Corner of South Lyon High School</p>
            <p class="details_line">Corner of Lafayette (Pontiac Trail) and Eleven Mile Rd.</p>
            <p class="details_line"><strong>PHONE NUMBER: 248.573.8175</strong></p>
            <p class="details_line">Office Hours: Monday - Friday, 9:00am - 3:30pm</p>
            <p class="details_line">Superintendent of Schools, Steven Archibald</p>
            <p class="details_line">Website Launched 6/1/2023</p>
        </div>
    </div>
</div>
<script src="https://www.jqueryscript.net/demo/Infinite-Scroller-Plugin-jQuery/infiniteslidev2.js"></script>
<script>
    $(document).ready(function () {

        $('#scroller').infiniteslide({
            'speed': 75
        });

    });


    $(document).on('click','.first_list_item',function(){
        var id = $(this).attr("id");

        var comps = id.split("||");
        var entry = comps[1].replace("entry_", "");

        $("#sliding_column_2").hide("slide", { direction: "left" }, 1000, function(){

            $(".class_mod").each(function(){
                $(this).css("display", "none");
            });

            $("#class_module" + entry).css("display", "block");
            $("#sliding_column_2").show("slide", { direction: "left" }, 1000);
        });
    });



    $(document).on('click','.first_col_option',function(){

        var id = $(this).attr("id");

        $("#class_module_2").hide("slide", { direction: "left" }, 1000, function(){

            $(".class_mod").each(function(){
                $(this).css("display", "none");
            });

            $("#class_module" + id).css("display", "block");
            $("#class_module_2").show("slide", { direction: "left" }, 1000);
        });
    });
function toTitleCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}
    $( "body" ).on( "click", ".close_archive", function(e) {
        e.preventDefault();
        $("#archive_newsletters").css("display", "none");
    });

    $("#archive_open").click(function(e){
        e.preventDefault();
        $("#archive_newsletters").css("display", "block");
    });
    // $(document).ready(function () {
    //     $("#image_list img").lazyload({
    //         effect : "fadeIn"

    //     });

    // });
    $("img.lazyload").lazyload();
</script>
<script>
    // Handle cable slides
    $(document).on('click','#popup_slides .image_container',function(e){
        if (e.target === e.currentTarget) {
            $("#popup_slides").css("display", "none");
        }
    });
    $(document).on('click','#popup_class',function(e){
        if (e.target === e.currentTarget) {
            $("#popup_class").css("display", "none");
        }
    });

    $(document).on('click','.show_class_pic',function(e){
        e.preventDefault();

        var id = $(this).attr("id");

        var comps = id.split("||");
        var entry = comps[1].replace("entry_", "");

        $.ajax({
            type: 'POST',
            url: "ajax.php",
            async: false,
            dataType: "json",
            data: {
                'type': "slides",
                "entry": entry
            },
            success: function (out) {
                var picture = out['picture'];
                console.log(picture);

                if(picture != ""){
                    $("#popup_slides img").attr("src", "slides/images/" + picture);
                    $("#popup_slides").css("display", "block");
                }
                else{
                    var day = out['day'];
                    var time = out['time'];
                    var class_name = out['class_name'];

                    $("#popup_class_name").text(class_name);
                    $("#popup_class_day").text("Day(s): " +  day);
                    $("#popup_class_time").text("Time: " + time);
                    $("#popup_class").css("display", "block");
                }
            }
        });
    });


    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
            "body").style.visibility = "hidden";
            document.querySelector(
            "#loader").style.visibility = "visible";
            $("html").css("overflow-y", "hidden");

            $("body").css("overflow", 'hidden');

            $("#spinner_holder").css("visibility", "visible");
        } else {
            document.querySelector(
            "#loader").style.display = "none";
            $("#spinner_holder").css("visibility", "hidden");
            $("body").css("visibility", "visible");
            $("body").css("overflow-y", "visible");
            $("body").css("overflow", "visible");
            $("html").css("overflow-y", "visible");
        }
    };

    $(document).ready(function () {
        $('.scroll1').infiniteslide({
                'speed': 75
            });
    });

    mapboxgl.accessToken = "pk.eyJ1IjoiamhhbGFieSIsImEiOiJjbGkyYmxnZ2IwZHN5M2VvZGE1aGprY3I1In0.hjSlbn2SEa5LplPI6m-ytA";

    var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/jhalaby/clif2810700dl01p757dvc67h",
        scrollZoom: false,
        center: [-83.65079838201551, 42.47262897374189],
        zoom: 17,
        // interactive: false,
    });

    const bounds = new mapboxgl.LngLatBounds();

    // lat, long
    // 42.47262897374189, -83.65079838201551

    // long, lat
    // -83.65079838201551, 42.47262897374189

    // create marker
    const el = document.createElement('div');
    el.className = 'marker';

    // add marker
    new mapboxgl.Marker({
        element: el,
        anchor: "bottom"
    })
        .setLngLat([-83.65079838201551, 42.47262897374189])
        .addTo(map);

    /// add popup
    new mapboxgl.Popup({
        offset: 30,
    })
    .setLngLat([-83.65079838201551, 42.47262897374189])
    .setHTML("<p style='background-color: #06acdc; font-weight: bold;' >Center for Active Adults")
    .addTo(map);

    // Extend map bounds to include location
    bounds.extend([-83.65079838201551, 42.47262897374189]);

    // map.fitBounds(bounds, {
    //     padding: {
    //         top: 200,
    //         bottom: 150,
    //         left: 100,
    //         right: 100,
    //     },
    // });

</script>
<?php include "includes/footer.php";?>