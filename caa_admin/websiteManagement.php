<?php
include "header.php";
include "connect.php";
?>
<script>
    $(document).ready(function(){
        var url = window.location.href;

        var comps = url.split("#");
        var slug = comps[1];

        hideall();

        var mod;

        if(slug == "scrolling"){
           $("#scrolling_image_container").css("display", "block");
           mod = 1;
        }
        else if(slug == "newsletters"){
            $("#newsletter_management_container").css("display", "block");
           mod = 2;
        }
        else if(slug == "staff"){
            $("#staff_information_container").css("display", "block");
           mod = 3;
        }
        else if(slug == "calendar"){
            $("#calendar_container").css("display", "block");
           mod = 4;
        }
        else if(slug == "events"){
            $("#event_management_container").css("display", "block");
           mod = 5;
        }
        else{
           $("#scrolling_image_container").css("display", "block");
           mod = 1;
        }

        $("#module" + mod).parent().addClass("active");
    });
</script>
<main id="content">

    <h1 class="page_heading">Website Management</h1>

    <ul id="nav_tabs">
            <li class="nav_item management_item active"><a href="#scrolling" id="module1" name="scrolling_images" class="nav_link">Scrolling Images</a></li>
            <li class="nav_item management_item "><a href="#newsletters" id="module2" name="newsletters" class="nav_link">Newsletters</a></li>
            <li class="nav_item management_item "><a href="#staff" id="module3" name="staff_information" class="nav_link">Staff Information</a></li>
            <li class="nav_item management_item "><a href="#calendar" id="module4" name="calendar" class="nav_link">Calendar</a></li>
            <li class="nav_item management_item "><a href="#events" id="module5" name="class_events" class="nav_link">Classes / Events</a></li>
        </ul>
    <?php include "website_management/scrolling_images.php";?>
    <?php include "website_management/newsletters.php";?>
    <?php include "website_management/staff_information.php";?>
    <?php include "website_management/calendar.php";?>
    <?php include "website_management/eventManagement.php";?>
</main>
<script src="script.js"></script>
<script>
    $(document).on('click', '.management_item', function(){
        var a = $(this).find("a").attr("id");
        var id = a.replace("module", "");

        hideall();

        $(this).addClass("active");

        if(id == 1){
           $("#scrolling_image_container").css("display", "block");
        }
        else if(id == 2){
            $("#newsletter_management_container").css("display", "block");
        }
        else if(id == 3){
            $("#staff_information_container").css("display", "block");
        }
        else if(id == 4){
            $("#calendar_container").css("display", "block");
        }
        else if(id == 5){
            $("#event_management_container").css("display", "block");
        }
    });
    function hideall(){
        $("li.management_item").each(function(){
            $(this).removeClass("active");
        })
        $("#scrolling_image_container").css("display", "none");
        $("#newsletter_management_container").css("display", "none");
        $("#calendar_container").css("display", "none");
        $("#staff_information_container").css("display", "none");
        $("#event_management_container").css("display", "none");
    }
 $(document).on("click",".remove_picture",function() {
     $(this).parent().remove();
});
</script>