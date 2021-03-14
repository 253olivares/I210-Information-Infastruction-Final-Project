<?php
/**
 * Author: "Miguel Olivares"
 * Date: 12/9/2019
 * File: Sign_In_page.php
 * Description:
 */

$page_title = "Sign_In_Page";
/**
 * Description: Will display highlighted art of the week, description of the webpage, Sign in, create account.
 */
require_once('includes/Header.php');
require_once('includes/database.php');


?>

<div id="content">
    <div class="inside_content">
        <div class="Sign_in_content">
            <br>
            <?php
            $message = "Please enter your username and password to login.";
            $messageR ="If you are new to our site, please create an account.";

            //check the login status
            $login_status = '';
            $reg_status = 0;

            if (isset($_SESSION['login_status'])) {
                $login_status = $_SESSION['login_status'];
            }
            if (isset($_SESSION['register_status'])) {
                $reg_status = $_SESSION['register_status'];
            }
            switch ($login_status) {
                case 1:  //the user's last login attempt succeeded
                    echo "<div class='Thank_you'>";
                    echo "<p>You are logged in as " . $_SESSION['login'] . ".</p>";
                    ?>
                    <div class="account">

                    </div>
                    <?php
                    echo "<a href='logout.php'>Log out</a><br />";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    include('includes/footer.php');
                    exit();
                case 3:  //the user has just registered
                    echo "<div class='Thank_you'>";
                    echo "<p>Thank you for registering with us. Your account has been created.</p>";
                    echo "<a href='logout.php'>Log out</a><br />";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    include('includes/footer.php');
                    exit();
                case 2:  //the user's last login attempt failed
                    $message = "Username or password invalid. Please try again.";
            }
            if ($reg_status == 1){
                $messageR ="Username is already taken please try again!";
                $_SESSION['register_status'] = 0;
            } else {
                $messageR ="If you are new to our site, please create an account.";
            }


            ?>
            <h2 style="text-align: center;font-family: 'Montserrat', sans-serif; font-size: 30px;"> Login / Register
                Page</h2>
            <hr style=" border: 0; height: 2px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));width: 35%;margin: auto;position: relative;margin-bottom: 75px;">
            <div class="login">
                <div class="Login_style">
                    <form method='post' action='login.php'>
                        <p style="text-align: center;font-family: 'Montserrat', sans-serif;padding-bottom: 20px"><?php echo $message; ?></p>
                        <table class="Table1">
                            <tr>
                                <td style="  font-family: 'Montserrat', sans-serif;width: 80px; text-align: right;padding-right: 10px">Username:</td>
                                <td><input style="border: none;padding: 5px;margin-bottom: 2px" type='text'
                                           name='username' required></td>
                            </tr>
                            <tr>
                                <td style=" font-family: 'Montserrat', sans-serif;text-align: right; padding-right: 10px">Password:</td>
                                <td><input style="border: none;padding: 5px" type='password' name='password' required>
                                </td>
                            </tr>
                            <tr class="Basic">
                                <td colspan='2'>
                                    <input type='submit' value='  Login  '>
                                    <input type="button" name="Cancel" value="Cancel"
                                           onclick="window.location.href = 'Gallery.php'"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- Registration portion of the webpage -->
            <div class="registration">
                <div class="registration_style">
                    <form action="register.php" method="post">
                        <p style="text-align: center; padding-bottom: 20px;font-family: 'Montserrat', sans-serif;"><?php echo $messageR ; ?></p>
                        <table class="Table2">
                            <tr>
                                <td style=" font-family: 'Montserrat', sans-serif;text-align: right; padding-right: 10px">UserName:</td>
                                <td><input style="border: none;padding: 5px;margin-bottom: 2px" name="username"
                                           type="text" required></td>
                            </tr>
                            <tr>
                                <td style=" font-family: 'Montserrat', sans-serif;text-align: right; padding-right: 10px">Password:</td>
                                <td><input style="border: none;padding: 5px; margin-bottom: 2px" name="password"
                                           type="password" required></td>
                            </tr>
                            <tr>
                                <td style=" font-family: 'Montserrat', sans-serif;width: 85px;text-align: right; padding-right: 10px;">Fullname:</td>
                                <td><input style="border: none;padding: 5px;margin-bottom: 2px" name="Fullname"
                                           type="text" required></td>
                            </tr>
                            <tr>
                                <td style=" font-family: 'Montserrat', sans-serif;width: 85px;text-align: right; padding-right: 10px">Email:</td>
                                <td><input style="border: none;padding: 5px;margin-bottom: 2px" name="Email" type="text"
                                           required></td>
                            </tr>
                            <tr class="Basic">
                                <td colspan="2">
                                    <input type="submit" value="Register"/>
                                    <input type="button" name="Cancel" value="Cancel"
                                           onclick="window.location.href = 'Gallery.php'"/>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'includes/Footer.php';

?>
