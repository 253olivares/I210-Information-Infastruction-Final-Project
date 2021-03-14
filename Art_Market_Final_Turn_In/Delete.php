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

//check to see id is valid
if (!$id) {
    $error = "invalid id detected";
    header("location: error.php?m=$error");
    exit;
}

//does the art id already exist in the cart?
if (array_key_exists($id, $cart)) {
    unset($cart[$id]);
} else {//a new book
    $cart[$id] = 1;
}
//store the cart in session
$_SESSION['cart'] = $cart;
//debugging purpose to show cart
print_r($cart);
header("location:ShowArtCart.php");