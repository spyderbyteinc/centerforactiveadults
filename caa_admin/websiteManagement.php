<?php
include "header.php";
include "connect.php";
?>
<main id="content">

    <h1 class="page_heading">Website Management</h1>

    <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="scrolling_images" class="nav_link">Scrolling Images</a></li>
            <li class="nav_item"><a href="#" id="module2" name="newsletters" class="nav_link">Newsletters</a></li>
            <li class="nav_item"><a href="#" id="module3" name="staff_information" class="nav_link">Staff Information</a></li>
            <li class="nav_item"><a href="#" id="module4" name="calendar" class="nav_link">Calendar</a></li>
            <li class="nav_item"><a href="#" id="module5" name="class_events" class="nav_link">Classes / Events</a></li>
        </ul>

    <?php include "website_management/scrolling_images.php";?>
</main>
<script src="script.js"></script>
<script>
 $(document).on("click",".remove_picture",function() {
     $(this).parent().remove();
});
</script>