<?php
$page_title = "Search_Results";
/**
 * Description: Displays submissions of artworks based on search terms
 */
include 'includes/header.php';
require_once('includes/database.php');

//displays message if there was no search results
if (!filter_has_var(INPUT_GET, 'terms')) {
    echo "<div id='content'>";
    echo "<div class=\"inside_content\">";
    echo "<div class=\"Thank_you\" >";
    echo "Error: id was not found";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    require_once 'includes/footer.php';
    exit();
}

//this gets the search term
$Physical = filter_input(INPUT_GET, "Physical", FILTER_SANITIZE_STRING);
$Digital = filter_input(INPUT_GET, "Digital", FILTER_SANITIZE_STRING);
$term_string = filter_input(INPUT_GET, "terms", FILTER_SANITIZE_STRING);
$FilterArry = [$Physical,$Digital];
$Filter = "test";


$terms = explode(" ", $term_string);

//this gets the information from the database and searches to see if the items in the database have something to do with the search term
//removes the extra AND from the search
$sql = "SELECT * FROM submissions WHERE ";

foreach($FilterArry as $trash) {
    if($trash != "") {
        $Filter = $trash;
        foreach ($terms as $term) {
            $sql .= "category = '$trash' AND title LIKE '%$term%' OR ";
        }
    }
}
if($FilterArry == ["",""]){
    foreach($terms as $term){
        $sql .= "title LIKE '%$term%' OR ";
    }
}
$sql = rtrim($sql, " OR ");

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
                if ($query->num_rows == 0) { ?>
                   <p style=" font-family: 'Montserrat', sans-serif; margin: auto; margin-top: 30px"> Your search "<?= $term_string ?>" did not match any images in our inventory with the filter "<?= $Filter ?>".</p>
                            <?php
                    echo "
                   <script>
                   function ChangeBackgroundSize(){
                       document.getElementById(\"wrapper\").style.height = \"100vh\";
                   }
                   ChangeBackgroundSize()
                   
                    </script>
                   ";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    require_once 'includes/footer.php';
                    exit();
                }
                while ($row = $query->fetch_assoc()) {
                    echo "<div class='holder'>";
                    echo "<div><img src='", $row['image'], "'></div>";
                    echo "<div class='overlay-info'><a href='information.php?id=", $row['Submission_id'], "'>", $row['title'], "</a></div>";
                    echo "<div class='Gallery_price'> $", $row['price'], " </div>";
                    if ($role == 1 || 2) {
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