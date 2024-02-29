<?php
$page_title = "Delete Artwork";
require_once 'includes/header.php';
require_once('includes/database.php');

//ending script if id cannot be found
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Artwork id cannot be found, can't delete.";
    include('includes/footer.php');
    exit;
}

//retrieve id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//SQL statement for deletion
$sql = "DELETE FROM submissions WHERE Submission_id=$id";

//query statement
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    echo "Deletion failed: ($errno) $error.";
    $conn->close();
    include('includes/footer.php');
    exit;
}

//success message
echo "<div id='content'>";
echo "<div class=\"inside_content\">";
echo "<div class=\"Thank_you\" >";
echo "Delete Successful! So sad to see a lovely art piece go....";
echo "</div>";
echo "</div>";
echo "</div>";
$conn->close();
require_once 'includes/footer.php';