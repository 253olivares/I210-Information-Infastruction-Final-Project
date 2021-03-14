<?php
$page_title = "HomePage";
/**
 * Description: Will display highlighted art of the week, description of the webpage, Sign in, create account.
 */
include 'includes/Header.php';
?>
    <!--this would be the content that changes -->
    <div id="content">
        <div id="Top_part">

            <img src="Gallery/icon.png">
            <h1 align="center"> Welcome to <span>Art</span> Market</h1>
        </div>
        <hr class="hr_style">
        <div class="inside_content">

            <div id="Slogan_Stament">
                <!-- left half of the main page that has mission statement and out slogan -->
                <div id="left">
                    <h3>Mission Statment</h3>
                    <p>
                        We know it's hard for artists to get exposed, so we want to help. We created this platform as
                        a wat for artists in Indiana to get exposed by allowing them to upload their art for people to
                        see and allow people to buy if they wish to support the artist. Here are some art pieces
                        submitted to us by artists on the site already.
                    </p>
                    <br>
                    <h3>Slogan</h3>
                    <p>Anyone can create and earn using their talent with a little bit of help.</p>
                </div>
                <!-- right half of the main page-->
                <div id="right">
                    <h3>Featured Highlights</h3>
                    <!-- Sideshow container - Source code from w3school-->
                    <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="Gallery/Rakan.png" style="width:500px; height: 300px; background-color: black;
    object-fit: contain;">
                            <div class="text">
                                <pre>By: Justin Rice      Date Published:11/22/19</pre>
                            </div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="Gallery/Rakan_Xya.png" style="width:500px; height: 300px; background-color: black;
    object-fit: contain;">
                            <div class="text">
                                <pre>By: Gecko     Date Published:11/12/19</pre>
                            </div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="Gallery/Neeko.png" style="width:500px; height: 300px; background-color: black;
    object-fit: contain;">
                            <div class="text">
                                <pre>By: Carlos Banuelos       Date Published:11/10/19</pre>
                            </div>
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>
                    <script>

                        var slideIndex = 1;
                        showSlides(slideIndex);

                        // Next/previous controls
                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        // Thumbnail image controls
                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = slides.length
                            }
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " active";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'includes/footer.php';

?>