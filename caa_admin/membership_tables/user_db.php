<?php
include "header.php";
?>

<?php

include "../connect.php";

?>
<style>
    body{
        overflow-y: hidden;
    }
    #noform, #members{
        display: none;
    }
</style>
<div id="spinner_holder">
    <div id="loader" class="center"></div>
</div>
<main id="content">

    <h1 class="page_heading">User Database</h1>

    <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="all_members" class="nav_link">All Members / Incomplete</a></li>
            <li class="nav_item"><a href="#" id="module2" name="just_members" class="nav_link">Just Members</a></li>
            <li class="nav_item"><a href="#" id="module3" name="just_incomplete" class="nav_link">Just Incomplete</a></li>
        </ul>

        <?php include 'membership_tables/all.php';?>
        <?php include 'membership_tables/members.php';?>
        <?php include 'membership_tables/noform.php';?>
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