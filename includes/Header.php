<?php

if(session_status() == PHP_SESSION_NONE) {
    //if session not started(case above) starts one
    session_start();
}
$count = 0;
//retrieve the shopping cart content
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    if($cart){
        $count = array_sum($cart);
    }
}
//variables to store user's login, name, and role
$log = '';
$name = '';
$role = 0;

//if the user has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])) {
    $log = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}
//php code for the header login in part

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <!-- end of cache code-->
    <!-- link to borrow font from google-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- link to css sheets that are used-->
    <link type="text/css" rel="stylesheet" href="www/css/main.css"/>
    <!-- This link is for awesome font which is a css coding source that helps put icons on a webpage like face book instagram or snapchat icons-->
    <link type="text/css" rel="stylesheet" href="www\css\fontawesome\css\all.css">
    <!-- Jss script file for the slide show and sign in button which is temp till we actually add a sign in.-->
    <title><?php echo $page_title; ?></title>
</head>

<body background="Background.jpg" id="OOF">
<div id="page-container">
    <div class="Background_color"></div>
    <div id="content-wrap">
        <div class="header">
            <div class="inner-header">
                <!-- art market logo -->
                <div class="logo">
                    <img class="logo_image " src="Gallery/icon.png">
                    <h1><span>Art</span> Market </h1>
                </div>
                <!-- this is the navigation bar -->
                <ul class="navigation">
                    <a id="DisplayProp" href="index.php" style="display:table">
                        <li>Home</li>
                    </a>
                    <a id="DisplayProp" href="Gallery.php" style="display:table">
                        <li>Gallery</li>
                    </a>
                    <?php
                    if ($role == 0) {
                        ?>
                        <a id="DisplayPropTemp" href="Sign_in_page.php" style="display:table ">
                            <li>Sign In</li>
                        </a>
                        <?php
                    }else{
                    ?>
                    <a id="DisplayPropAfter" href="Sign_in_page.php" style="display:table ">
                        <li>Account</li>
                    </a>
                    <a id="DisplayPropAfter2" href="SubmitArt.php" style="display: table">
                        <li>Submit Work</li>
                    </a>
                    <a id="DisplayPropAfter3" href="ShowArtCart.php" style="display: table">
                        <li>Cart</li>
                    </a>
                        <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
        <!--end of header-->