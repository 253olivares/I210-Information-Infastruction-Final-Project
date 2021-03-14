<?php
$page_title = "Update Art Info";

require_once('includes/Header.php');
require_once('includes/database.php');

//retrieve and sanitize all fields from the form
$title = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING)));
$link = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING)));
$id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(filter_input(INPUT_GET, 'category', FILTER_DEFAULT));


//Define MySQL update statement
$sql = "UPDATE submissions SET
    title ='$title',
    image = '$link',
    description ='$description',
    price ='$price',
    category = '$category'
    WHERE Submission_id='$id'";

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "<div id='content'>";
    echo "<div class=\"inside_content\">";
    echo "<div class=\"Thank_you\" >";
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require 'includes/footer.php';
    exit;
}
echo "<div id='content'>";
echo "<div class=\"inside_content\">";
echo "<div class=\"Thank_you\" >";
echo "Submission has been updated!";
echo "</div>";
echo "</div>";
echo "</div>";

// close the connection.
$conn->close();

include('includes/footer.php');