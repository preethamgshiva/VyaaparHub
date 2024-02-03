<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - VyaaparHub</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="home.html"><img class="logo" src="images/logo.png"></a>
    <header id="header">
        <div>
            <ul id="navbar">
                <li><input type="text" placeholder="Search 'Potato'" class="search"></li>
                <li><a class="active" href="home.html">Home</a></li>
                <li><a href="products.html">Products</a></li>                                                                                                 
                <li><a href="about.html">About</a></li>
                <li><a href="#scroll">Contact</a></li>
                <li><a href="login.html">Login</i></a></li>
                <li><a href="cart.html"><i class='bx bxs-cart'></i></a></li>
            </ul>
        </div>
    </header>
    <h2>Shop Categories</h2>
    <section id="products1" class="section-p1">
        <div class="pro-container">
            <div class="pro">
                <a href="#grocery">
                <img src="images/grocery.jpg" alt="Grocery">
                <div class="des">
                    <h4>Grocery</h4></div></a>
                </div>
            </div>
        </div>
        <div class="pro-container">
            <div class="pro">
                <a href="#oils">
                <img src="images/edibleOils-ghee.jpeg" alt="Edible Oils and Ghee">
                <div class="des">
                    <h4>Edible Oils and Ghee</h4></div></a>
                </div>
            </div>
        </div>
        <div class="pro-container">
            <div class="pro">
                <a href="#dairy">
                <img src="images/diaryBakery.jpg" alt="Dairy and Bakery">
                <div class="des">
                    <h4>Dairy and Bakery</h4></div></a>
                </div>
            </div>
        </div>
        <div class="pro-container">
            <div class="pro">
                <a href="#hygiene">
                <img src="images/personalHygiene.jpg" alt="Health and Hygiene">
                <div class="des">
                    <h4>Health and Hygiene</h4></div></a>
                </div>
            </div>
        </div>
        <div class="pro-container">
            <div class="pro">
                <a href="#cattle">
                <img src="images/cattleFeeds.png" alt="Cattle Feeds">
                <div class="des">
                    <h4>Cattle Feeds</h4></div></a>
                </div>
            </div>
        </div>
    </section>
    <footer class="section-p1" id="scroll">
        <div class="col">
            <img class="logo-f" src="images/logo-f.png" alt="VyaaparHub">
            <h4>Contact</h4>
            <p><strong>Address : </strong>Global Academy of Technology, Ideal Homes, RR Nagar, Bengaluru-560085.</p>
            <p><strong>Contact : </strong>+91 9035499812, +91 7795091510</p>
            <p><strong>Timings : </strong>10:00 - 18:00(Mon - Sat)</p>
        </div>
        <div class="col">
            <h4>Github</h4>
            <a href="github.com/keerthankacharya">github.com/keerthankacharya</a>
            <a href="github.com/preethamgshiva">github.com/preethamgshiva</a>
            <a href="github.com/vikasjgowda">github.com/vikasjgowda</a>
            <a href="github.com/rakeshjayana">github.com/rakeshjayana</a>
        </div>
        <div class="credits">
            <p>© 2024 Team Void</p>
            <p>Handcrafted with <i class='bx bxs-heart'></i></p>
            <p>Made in INDIA</p>
        </div>
    </footer>
</body>
</html>
