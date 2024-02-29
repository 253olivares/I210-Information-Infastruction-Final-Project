<?php

/**
 * Author: "Miguel Olivares"
 * Date: 12/9/2019
 * File: Sign_In_page.php
 * Description:
 */

$page_title = "loginPhp";
/**
 * Description: Will display highlighted art of the week, description of the webpage, Sign in, create account.
 */
require_once('includes/Header.php');
require_once('includes/database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
//initialize variables for username and password
$username = $passcode = "";

//retrieve user name and password from the form in the registerform.php
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database
//select statement
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

//execute the query
$query = @$conn->query($sql);

//fetch results
if ($query->num_rows) {
    //It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['Full_name'];

    //update the login status
    $_SESSION['login_status'] = 1;
}

//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: Sign_In_page.php");