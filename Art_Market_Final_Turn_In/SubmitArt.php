<?php
$page_title = "Submit_Art";
/**
 * Description: Will display highlighted art of the week, description of the webpage, Sign in, create account.
 */
include 'includes/Header.php';
require_once('includes/database.php');

$sql = "SELECT * FROM users WHERE Username ='$log'";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once('includes/footer.php');
    exit;
}
?>

<div id="content">
    <div class="inside_content">
        <div class="submission_page">
            <div class="SubmissionTitle">
                <h2>Enter your new masterpiece!</h2>
                <hr class="SubTitle">
            </div>
            <div class="SubmissionTable">
                <form action="InsertArt.php" method="post">
                    <!-- This area of code is to input information for the new book-->
                    <table class="TableInfo">
                        <input type="hidden" name='id' value="<?= $row['id'] ?><">
                        <tr class="spaceing">
                            <td class="cat">Art Name:</td>
                            <td><input name="title" type="text" size="70" required/></td>
                        </tr>
                        <tr class="spaceing">
                            <td class="cat">Image Link:</td>
                            <td><input name="image" type="text" size="70" required/></td>
                        </tr>
                        <tr class="spaceing">
                            <td class="cat">Price:</td>
                            <td><input name="price" type="number" step="0.01" required/></td>
                        </tr>
                        <tr class="spaceing">
                            <td class="cat">Category:</td>
                            <td>
                                <select name="category">
                                    <option value="Physical">Physical</option>
                                    <option value="Digital">Digital</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceing">
                            <td class="cat">Date:</td>
                            <td>
                                <input name="publish_date" type="date" value="<?= date("Y-m-d") ?>" required/>
                            </td>
                        </tr>
                        <tr class="spaceing">
                            <td class="cat" style="vertical-align: top">Description:</td>
                            <td><textarea name="description" rows="6" cols="65"></textarea></td>
                        </tr>

                    </table>
            </div>
            <div class="bookstore-button">
                <div class="mar">
                    <input type="submit" value="Add Art"/> &nbsp; &nbsp;
                    <input type="button" value="Cancel" onclick="window.location.href='Gallery.php'"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once 'includes/footer.php';

?>
