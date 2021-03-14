<?php
//check to see if session is active
if (session_status() == PHP_SESSION_NONE) {
    //if session not started(case above) starts one
    session_start();
}

//will either pull the array from the session or create a new empty array
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//retrieve book id from a querystring variable and sanitize
$id = "";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$CartQty = filter_input(INPUT_GET, 'CartQty', FILTER_SANITIZE_NUMBER_INT);

//check to see id is valid
if (!$id) {
    require_once('includes/Header.php');
    require_once('includes/database.php');
    echo "<div id=\"content\">";
    echo "<div class=\"inside_content\"> ";
    echo "<div class=\"ShoppingCart_empty\">";
    echo "Something seems to be wrong! We cant find a ID or ID is invalid?";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    include('includes/footer.php');
    exit;
}

//does the art id already exist in the cart?
if (array_key_exists($id, $cart)) {
    $cart[$id] = $CartQty;
} else {//a new book
    $cart[$id] = 1;
}
//store the cart in session
$_SESSION['cart'] = $cart;
//debugging purpose to show cart
print_r($cart);
header("location:ShowArtCart.php");