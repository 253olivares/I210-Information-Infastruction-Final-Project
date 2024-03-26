<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 11/23/2019
 * File: database.php
 * Description:
 */

$host = 'localhost';
$login = 'root';
$password = '';
$database = 'final_db';

//connection to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

if($conn -> connect_errno) {
    $errno = $conn->connect_errno;
    $error = $conn->connect_error;

    exit("Connection to database failed: ($errno) $error");
}