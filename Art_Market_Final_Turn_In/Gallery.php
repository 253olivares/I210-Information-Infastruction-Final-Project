<?php
$page_title = "Gallery";
/**
 * Description: Will display all images available to view, Stuff people have uploaded
 */
include 'includes/header.php';
require_once('includes/database.php');

//select statement
$sql = "select * from submissions";
//exit($sql);

//execute the query
$query = $conn->query($sql);

//handles errors
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
?>
    <div id="content">
        <div class="inside_content">
            <div class="Top">
                <div class="Look_at_art">
                    <h2>Check out our current gallery submitted by other users!</h2>
                    <hr class="hr_style">
                </div>
                <div class="Find_art">
                    <h2>Search for painting by name</h2>
                    <p>Enter one or more words of name.</p>
                    <form action="Search_Page.php" method="get">
                        <input type = "checkbox" name="Physical" value= "Physical"/> Physical
                        <input type = "checkbox" name="Digital" value= "Digital"/> Digital <br>
                        <input type="text" name="terms" size="15" required/><input type="submit" name="Submit"
                                                                                   id="Submit" value="Search Art"/>
                    </form>
                </div>
            </div>
            <!--                this area here is where u guys are gonna add php code-->
            <!--                make this area a loop that will make a div that you can click on-->
            <!--                when you clock on the div it should tak to information page about the art that lists the author,
                                date published, prices, and maybe a small description-->
            <!--                I added display flex and flex direction for the art gallery class of the div-->
            <!--                Have the code create a row and then put images in that row until it reaches 4 images and then tall
                                   the code to make another row and then repeat until all the images submitted for the data base is displayed-->
            <div class="Art_Gallery">
                <?php
                while ($row = $query->fetch_assoc()) {
                    echo "<div class='holder'>";
                    echo "<div><img src='", $row['image'], "'></div>";
                    echo "<div class='overlay-info'><a href='information.php?id=", $row['Submission_id'], "'>", $row['title'], "</a></div>";
                    echo "<div class='Gallery_price'> $", $row['price'], " </div>";

                    if ($role == 0) {
                    } else {
                        echo "<div class='Add2cart'><a  href=\"AddToCart.php?id=", $row['Submission_id'], "\"><img src='Gallery/Add2Cart.png'> </a> </div>";
                    }

                    echo "</div>";
                }
                ?>
            </div>

        </div>
    </div>
<?php
require_once 'includes/footer.php';

?>