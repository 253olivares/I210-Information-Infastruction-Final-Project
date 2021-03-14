<?php
$page_title = "Add new book";

require_once('includes/Header.php');
require_once('includes/database.php');
if (!filter_has_var(INPUT_POST, 'title') ||
    !filter_has_var(INPUT_POST, 'publish_date') ||
    !filter_has_var(INPUT_POST, 'price') ||
    !filter_has_var(INPUT_POST, 'image') ||
    !filter_has_var(INPUT_POST, 'description')) {
    echo "<div id='content'>";
    echo "<div class=\"inside_content\">";
    echo "<div class=\"Thank_you\" >";
    echo "There were problems retrieving art details. New art cannot be added.";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$id = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT)));
$publish_date = $conn->real_escape_string(filter_input(INPUT_POST, 'publish_date', FILTER_DEFAULT));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));

// code to inseart art submission
// this is a temp id
//this id will submit current submissions as anonymous
$sql = "INSERT INTO submissions VALUES (NULL, '$title', '$publish_date', '$id',' $image', '$description','$price','$category')";

//execute the query
$query = @$conn->query($sql);

$Submission_id = $conn->insert_id;
// close the database connection.
$conn->close();

//display a confirmation message and a link to display details of the new book
echo "<div id='content'>";
echo "<div class=\"inside_content\">";
echo "<div class=\"Thank_you\" >";
echo "You have successfully inserted a new submission into the database.";
echo "<p><a href='information.php?id=$Submission_id'>Submission Details</a></p>";
echo "</div>";
echo "</div>";
echo "</div>";

include('includes/footer.php');
