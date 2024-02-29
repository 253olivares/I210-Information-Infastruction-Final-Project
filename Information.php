<?php
$page_title = "Image_Info";
/**
 * Description: Displays information about the image like who uploaded it, date, Price for the images which are being sold as prints.
 */
require_once('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $conn->close();
    require_once('Error.php');
    require_once('includes/footer.php');
    exit();
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
    $error = $conn->error;
    $conn->close();
    echo "<div id='content'>";
    echo "<div class=\"inside_content\">";
    echo "<div class=\"Thank_you\" >";
    echo("Selection failed: ($errno) $error.");
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require 'includes/footer.php';
    die();
}
if (!$row = $query->fetch_assoc()) {
    $conn->close();
    echo "<div id='content'>";
    echo "<div class=\"inside_content\">";
    echo "<div class=\"Thank_you\" >";
    echo(" <p>Artwork not found.</p>");
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require 'includes/footer.php';
    die();
}
?>
    <div id="content">
        <div class="inside_content">
            <div class="Info">
                <h1 class="Information_header">Information about the art piece</h1>
                <hr id="hr_style2">
            </div>

            <div class="artdetails">
                <!--                //This should call the image location based on what is saved on the database-->
                <div class="cover">
                    <img src="<?php echo $row['image'] ?>">
                </div>
                <!--                //edit this and take out any unneeded information ex: take out any unneeded rows-->

                <div id="content2">
                    <div class="label">
                        <div>Title:</div>
                        <div>Artist:</div>
                        <div>Email:</div>
                        <div>Upload Date:</div>
                        <div><Categ></Categ>ory:</div>
                        <div>Description:</div>

                    </div>
                    <!-- edit this so that its only information needed about the art-->
                    <div class="content">
                        <div><?php echo $row['title'] ?></div>
                        <div><?php echo $row['Username'] ?></div>
                        <div><?php echo $row['Email'] ?></div>
                        <div><?php echo $row['Upload_date'] ?></div>
                        <div><?php echo $row['category'] ?></div>
                        <div><?php echo $row['description'] ?></div>

                    </div>
                </div>

                <?php
                if ($role == 0) {
                    ?>
                    <div id="Under_Info2">
                        <br>
                        <br>
                        <h3>Please sign in to purchase this product or update/delete this submission. </h3>
                    </div>
                <?php } ?>
                <?php
                if ($log == $row['Username']) {
                    ?>
                    <div id="Under_Info">
                        <br>
                        <br>
                        <!-- This is the div with information about adding the art to the cart-->
                        <div class="add_to_cart">
                            <!-- put php code to display price. Prices will already be added-->
                            <h3>Buy this as a physical print for: $<?php echo $row['price'] ?></h3>
                            <a href="AddToCart.php?id=<?= $id ?>">
                                <img src="Gallery/Add2Cart.png"
                                     style="width: 75px; margin-top: 10px; margin-left: 10px">
                            </a>
                        </div>
                        <hr style="width: 100%; color: black; background-color: black">
                        <!-- These are the buttons to take you tot he edit art page and dele90-te art page-->
                        <div class="Delete_update">
                            <button onclick="window.location.href='EditArt.php?id=<?php echo $row['Submission_id']; ?>//'">
                                Edit
                            </button>
                            <button onclick="window.location.href='DeleteArt.php?id=<?php echo $row['Submission_id']; ?>//'; return confirm('Are you sure you want to delete the art?');  ">
                                Delete
                            </button>
                            <!--      <form action="UpdateArtInfo.php" method="get">
                                      <input class="But" type="submit" value="Update"
                                             onclick="return confirm('Are you sure you want to edit the arts information?')">
                                      <input type="hidden" name='id' value="">
                                  </form>
                                  -->
                            <!--     <form action="DeleteArt.php" method="get">
                                     <input class="But" type="submit" value="Delete"
                                            onclick="return confirm('Are you sure you want to delete the art?')">
                                     <input type="hidden" name='id' value="">
                                 </form>
                                 -->
                            <input class="cancel" type="button" value="Go Back"
                                   onclick="window.location.href='Gallery.php'">
                        </div>
                    </div>
                <?php } elseif ($role == 1) { ?>
                    <div id="Under_Info">
                        <br>
                        <br>
                        <!-- This is the div with information about adding the art to the cart-->
                        <div class="add_to_cart">
                            <!-- put php code to display price. Prices will already be added-->
                            <h3>Buy this as a physical print for: $<?php echo $row['price'] ?></h3>
                            <a href="AddToCart.php?id=<?= $id ?>">
                                <img src="Gallery/Add2Cart.png"
                                     style="width: 75px; margin-top: 10px; margin-left: 10px">
                            </a>
                        </div>
                    </div>
                <?php } elseif ($role == 2) { ?>
                    <div id="Under_Info">
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- This is the div with information about adding the art to the cart-->
                        <div class="add_to_cart">
                            <!-- put php code to display price. Prices will already be added-->
                            <h3>Buy this as a physical print for: $<?php echo $row['price'] ?></h3>
                            <a href="AddToCart.php?id=<?= $id ?>">
                                <img src="Gallery/Add2Cart.png"
                                     style="width: 75px; margin-top: 10px; margin-left: 10px">
                            </a>
                        </div>
                        <hr style="width: 100%; color: black; background-color: black">
                        <!-- These are the buttons to take you tot he edit art page and delete art page-->
                        <div class="Delete_update">
                            <button onclick="window.location.href='EditArt.php?id=<?php echo $row['Submission_id']; ?>//'">
                                Edit
                            </button>
                            <button onclick="window.location.href='DeleteArt.php?id=<?php echo $row['Submission_id']; ?>//'; return confirm('Are you sure you want to delete the art?');  ">
                                Delete
                            </button>
                            <!--      <form action="UpdateArtInfo.php" method="get">
                                      <input class="But" type="submit" value="Update"
                                             onclick="return confirm('Are you sure you want to edit the arts information?')">
                                      <input type="hidden" name='id' value="">
                                  </form>
                                  -->
                            <!--     <form action="DeleteArt.php" method="get">
                                     <input class="But" type="submit" value="Delete"
                                            onclick="return confirm('Are you sure you want to delete the art?')">
                                     <input type="hidden" name='id' value="">
                                 </form>
                                 -->
                            <input class="cancel" type="button" value="Go Back"
                                   onclick="window.location.href='Gallery.php'">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
require_once 'includes/footer.php';

?>