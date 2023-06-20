<?php
session_start();

$user = $_SESSION['username'];

if (!isset($user)) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$page_name = basename($_SERVER['PHP_SELF']);
?>
<?php

include "connect.php";

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="boot.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bidzbuttons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
<script src="script.js"></script>

    <style>
        .svg_icon{
            width: 30px;
        }
        a.navlin{
            display: flex;
            align-items: center;
            justify-content: left;
        }
        a.navlin .side_link{
            margin-left: 20px;
        }
        #sidebar{
            width: 350px;
        }
    </style>
    <title>CAA Admin</title>
</head>

<body>
    <header id="header">
        <div id="dashboard_nav">
            <div id="navContent">
                <ul id="navlinks">
                    <li><a href="#" class="active">Dashboard - Center For Active Adults</a></li>
                </ul>

                <ul id="accountlinks">
                    <li>
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <span class="head_link">Welcome, Jordan</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-user-times"></i>
                            <span class="head_link">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="dashboard_logo">
            <div id="logo_content">
                <img src="logo.png" alt="CAA Logo" class="logo">
                <h1>CAA Admin - Jordan Halaby</h1>
            </div>
        </div>
    </header>
    <div id="bottom">
        <div id="sidebar">

            <div id="sidebarContent">
                <ul id="navlinks2">
                    <?php if ($page_name == "index.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="index.php">
                            <i class="fas fa-home"></i>
                            <span class="side_link">Home</span>
                        </a>
                    </li>
                    <?php if ($page_name == "user_db.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="user_db.php">
                            <i class="fa-solid fa-users" style="color: #ffffff;"></i>
                            <span class="side_link">User Database</span>
                        </a>
                    </li>
                    <?php if ($page_name == "deposit.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="deposit.php">
                            <i class="fa-solid fa-money-bill-transfer" style="color: #ffffff;"></i>
                            <span class="side_link">Internal Deposit Form</span>
                        </a>
                    </li>
                    <?php if ($page_name == "membershipFees.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="membershipFees.php">
                            <i class="fa-solid fa-comments-dollar" style="color: #ffffff;"></i>
                            <span class="side_link">Membership Fees</span>
                        </a>
                    </li>
                    <?php if ($page_name == "websiteManagement.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="websiteManagement.php">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <span class="side_link">Website Management</span>
                        </a>
                    </li>
                    <?php if ($page_name == "imageUpload.php"): ?>
                    <li class="nav active">
                    <?php else: ?>
                    <li class="nav">
                    <?php endif;?>
                        <a class="navlin" href="imageUpload.php">
                            <i class="fa-regular fa-images" style="color: #ffffff;"></i>
                            <span class="side_link">Image Upload</span>
                        </a>
                    </li>
                </ul>
            </div>



        </div>
