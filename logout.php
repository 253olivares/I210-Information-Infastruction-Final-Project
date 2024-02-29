<?php
//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset all the session variables
$_SESSION = array();

//delete the session cookie
setcookie(session_name(), "", time() - 3600);

//destroy the session
session_destroy();

$page_title = "PHP Online Bookstore Logout";

include('includes/header.php');
?>
    <div id="content">
        <div class="inside_content">
            <div class="Thank_you2">
                <h2>Logged out</h2>
                <hr style=" border: 0; height: 2px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));width: 30%;margin: auto;position: relative;">
                <br>
                <br>

                <p>Thank you for your visit. You are now logged out. Hope to see you again!</p>
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
