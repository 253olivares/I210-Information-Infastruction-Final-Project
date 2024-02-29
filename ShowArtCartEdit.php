<?php
$page_title = "Art_Shopping_Cart";
/**
 * Description: Displays information about the image like who uploaded it, date, Price for the images which are being sold as prints.
 */
require_once('includes/header.php');
require_once('includes/database.php');
/*area for css where you will put query code*/
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "<div id=\"content\">";
    echo "<div class=\"inside_content\"> ";
    echo "<div class=\"ShoppingCart_empty\">";
    echo "<img src='Gallery/Empty_Cart.png'>";
    echo "<p>Uhh Ohh your shopping cart is empty! Visit our gallery and buy some art!</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    include('includes/footer.php');
    exit();
}
$CheckEdit = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>


    <div id="content">
        <div class="inside_content">
            <div id="ShoppingCart">
                <div class="ShoppingCartTitle">
                    <h2>Your Shopping Cart</h2>
                    <hr class="hr4ShoppingCart">
                </div>
                <div class="artlist">
                    <div class="rowSAC headerSAC">
                        <div class="col1SAC"><p class="HeaderP">ArtPiece</p></div>
                        <div class="col2SAC"><p class="HeaderP">Price</p></div>
                        <div class="col3SAC"><p class="HeaderP">Quantity</p></div>
                        <div class="col5SAC"><p class="HeaderP">add / remove</p></div>
                        <div class="col4SAC"><p class="HeaderP">Subtotal</p></div>
                    </div>
                    <?php

                    //insert code to display the shopping cart content
                    $completeTotal = 0;
                    $sql = "SELECT * FROM submissions WHERE 0 ";
                    foreach (array_keys($cart) as $id) {
                        $sql .= " OR Submission_id=$id";
                    }
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        $id = $row['Submission_id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $qty = $cart[$id];
                        $total = $qty * $price;
                        $completeTotal = $completeTotal + $total;
                        $editSubmission = $id;
                        if ($CheckEdit == $id) {
                            echo "<div class=\"rowSAC last\">";
                            echo "<div class=\"col1SAC\"><a href='Information.php?id=$id'>$title</a></div>";
                            echo "<div class=\"col2SAC\">$$price</div>";
                            echo "<form style='width: 366px; display: flex;' action=\"UpdateCart.php\" method=\"get\" >";
                            echo "<input type='hidden' name='id' value='$id'>";
                            echo "<div class=\"col3SAC\"><input name=\"CartQty\" size=\"5\" value='$qty'> </div>";

                            echo "<div class=\"col5SAC\"> <button class='press' style='padding: 5px; border: none;transition: background-color  1s ease;'>Update</button> <input type='button' class='press' style='border: none;margin: auto;padding: 5px; transition: background-color  1s ease;' onclick=\"window.location.href='ShowArtCart.php' \" value=\"Cancel\"> </div>";

                            echo "</form>";
                            echo "<div class=\"col4SAC\">$$total</div>";
                            echo "</div>";

                        } else {
                            echo "<div class=\"rowSAC last\">";
                            echo "<div class=\"col1SAC\"><a href='Information.php?id=$id'>$title</a></div>";
                            echo "<div class=\"col2SAC\">$$price</div>";
                            echo "<div class=\"col3SAC\">$qty</div>";
                            echo "<div class=\"col5SAC\"><button onclick=\"window.location.href='ShowArtCartEdit.php?id=$editSubmission' \" class='press' style='padding: 5px; border: none;transition: background-color  1s ease;'>Edit</button><button onclick=\"window.location.href='Delete.php?id=$editSubmission' \" class='press' style='border: none;margin: auto;padding: 5px; transition: background-color  1s ease;'>remove</button> </div>";
                            echo "<div class=\"col4SAC\">$$total</div>";
                            echo "</div>";
                        }


                    }
                    echo "<div class=\"rowSACLast\">";
                    echo "<div class=\"col1SACLast\"> </div>";
                    echo "<div class=\"col2SACLast\"> </div>";
                    echo "<div class=\"col5SACLast\"> </div>";
                    echo "<div class=\"col3SACLast\"> <p>CompleteTotal:</p></div>";
                    echo "<div class=\"col4SACLast\"> $$completeTotal </div>";
                    echo "</div>";
                    ?>

                    <div class="Artstore-button">
                        <input type="button" value="Checkout"
                               onclick="window.location.href = 'checkout.php'; return confirm('Do you want to confirm checkout?')"/>
                        <input type="button" value="Buy More" onclick="window.location.href = 'Gallery.php'"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'includes/footer.php';

?>