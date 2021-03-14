<?php
if (session_status() == PHP_SESSION_NONE) {
    //if session not started(case above) starts one
    session_start();
}

//empty cart
$_SESSION['cart'] = array();
$page_title = "PHP Online Bookstore Checkout";
require_once 'includes/header.php';

?>
    <div id="content">
        <div class="inside_content">
            <div class="Thank_you">
                <img src="Gallery/Full_Cart.png">
                <!--    thank you message-->
                <p>We hope you enjoy your artwork, it will be sent to you soon. Thank you for your patronage!</p>
            </div>

        </div>
    </div>

<?php
require_once 'includes/footer.php'
?>