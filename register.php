<?php

if (!$_POST) {
    $error = "The service is currently unavailable. Please try again later.";
    header("Location: error.php?m=$error");
    die();
}

$page_title = "register php";
/**
 * Description: Will display highlighted art of the week, description of the webpage, Sign in, create account.
 */

require_once('includes/database.php');
/* Retrieve user inputs from the form.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */

$fullname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Fullname', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING)));

//set user's role
$role = 1;  //regular user


$query = "SELECT * FROM users WHERE Username = '$username'";
if ($result = mysqli_query($conn, $query)) {
    if (mysqli_num_rows($result) > 0) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['register_status'] = 1;
        header("Location: Sign_In_page.php");
    } else {
        $ErrorMessage = 0;
        //insert statement. The id field is an auto field.
        $sql = "INSERT INTO users VALUES (NULL, '$username ', '$fullname ', '$email', '$password', '$role')";

        //execut the insert query
        $query = @$conn->query($sql);

        //Handle insertion errors
        if (!$query) {
            $error = "Insertion failed: $error = $conn->error.";
            $conn->close();
            header("Location: error.php?m=$error");
            die();
        }

        $conn->close();
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //create session variables
        $_SESSION['login'] = $username;
        $_SESSION['name'] = $fullname;
        $_SESSION['role'] = 1;
        $_SESSION['login_status'] = 3;  //the user was just registered.

        //redirect the user to the loginform.php page
        header("Location: Sign_In_page.php");
    }
}
