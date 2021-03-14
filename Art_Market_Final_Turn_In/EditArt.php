<?php
$page_title = "EditArtDetails";
/**
 * Description: Displays information about the image like who uploaded it, date, Price for the images which are being sold as prints.
 */
require_once('includes/Header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $conn->close();
    require_once('includes/Footer.php');
    die("Your request cannot be processed since there was a problem retrieving the artwork information");
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM submissions,users WHERE Submission_id = $id  AND submissions.id=users.id";

//execute the query
$query = @$conn->query($sql);

//Handle errors
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
if (!$row = $query->fetch_assoc()) {
    $conn->close();
    echo("Artwork not found.");
    require 'includes/Footer.php';
    die();
}
?>
    <div id="content">
        <div class="inside_content">
            <div class="Info">
                <h1 class="Information_header">Information about the art piece</h1>
                <hr id="hr_style2">
            </div>
            <form action="UpdateArtInfo.php" method="get">
                <div class="artdetails">
                    <!--                //This should call the image location based on what is saved on the database-->
                    <div class="cover">
                        <img src="<?php echo $row['image'] ?>">
                    </div>
                    <!--                //edit this and take out any unneeded information ex: take out any unneeded rows-->
                    <div id="content2">
                        <div class="label">
                            <div>Title:</div>
                            <div>Link:</div>
                            <div>Artist:</div>
                            <div>Email:</div>
                            <div>Upload Date:</div>
                            <div>Category:</div>
                            <div>Price:</div>
                            <div>Description:</div>

                        </div>

                        <div class="content">
                            <div><input name="title" size="50" value="<?php echo $row['title'] ?>" required></div>
                            <div><input name="image" size="50" value="<?php echo $row['image'] ?>" required></div>
                            <div><?php echo $row['Username'] ?></div>
                            <div><?php echo $row['Email'] ?></div>
                            <div><?php echo $row['Upload_date'] ?></div>
                            <div><select name="category">
                                    <option value="Physical" <?= $row['category'] == 'Physical' ? 'selected' : ''; ?>>Physical</option>
                                    <option value="Digital" <?= $row['category'] == 'Digital' ? 'selected' : ''; ?>>Digital</option>
                                </select>

                            </div>
                            <div><input name="price" type="number" step="0.01" value="<?php echo $row['price'] ?>"
                                        required></div>
                            <div><textarea name="description" rows="5"
                                           cols="50"><?php echo $row['description'] ?></textarea></div>
                        </div>
                    </div>
                    <div id="Under_Info3">
                        <br>
                        <br>
                        <div class="Delete_update">
                            <form>
                                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                                <input type="submit" value="Update"
                                       onclick="return confirm('Are you sure you want to change the information?')" ;>&nbsp;&nbsp;
                                <input type="button"
                                       onclick="window.location.href='information.php?id=<?php echo $row['Submission_id'] ?>'"
                                       value="Cancel">
                            </form>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
<?php
require_once 'includes/Footer.php';

?>