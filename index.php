<!DOCTYPE html>
<?php session_start(); ?>
<?php require_once("./backend/connection.php"); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./styles/header.css">
        <link rel="stylesheet" href="./styles/body.css">
        <link rel="stylesheet" href="./styles/index.css">
        <link rel="stylesheet" href="./styles/footer.css">
        <link rel="icon" type="img/png" href="./images/lugo.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Home page</title>
    </head>

<body>
<header>
    <div class="con">
        <div class="left-row">
            <!-- Logo -->
            <a href="../index.php" class="a-js">
                <h1 style="font-family: 'Dancing Script', cursive; font-size: 40px; font-weight: bold; color: #FC819E; letter-spacing: 1px;">Maris Flower Shop</h1>
            </a>
            <!-- Search Bar -->
            <form action="search_results.php" method="GET" class="search-bar">
                <input type="text" name="query" placeholder="Search flowers..." required>
                <button type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>

        <div class="right-row">
                <a href="<?php
                    if(isset($_SESSION["acc_id"])){
                        echo "./components/cart.php";
                    }else{
                        echo "./components/login.php";
                    }
                ?>" class="a-js">
                    <div class="relative">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: rgb(96, 96, 96);"></i>
                        <div class="count">
                            <?php
                                if(isset($_SESSION["acc_id"]))
                                {
                                    $acc_id = $_SESSION["acc_id"];
                                    $query = "SELECT * FROM tbl_cart WHERE acc_id = ?";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("i", $acc_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    echo $result->num_rows;
                                }else{
                                    echo "0";
                                }
                            ?>
                        </div>
                    </div>
                </a>
                <?php
                    if(isset($_SESSION["acc_id"]))
                    {
                        echo "
                        <div class='profile-logIn'>
                            <a href='./components/profile.php' class='a-js'>
                                <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                            </a>
                            <i class='fa-solid fa-caret-down fa-xl drop-down' style='color: rgb(96, 96, 96);'></i>
                            <div class='profile-div'>
                                <a href='./components/profile.php' class='profile'><div>Profile</div></a>
                                <a href='./backend/logout.php' class='logOut'><div>Log out</div></a>
                            </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <a href='./components/login.php' class='a-js profile-logIn'>
                            <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                        </a>
                        ";
                    }
                ?>
            </div>
    </div>
</header>



    <div class="bg-head">
        <img src="./images/banner1.jpg" alt="">
            <div class="absolute">
                <h2 style="font-family: serif; font-weight: bold; ">
                    We arrange flowers for all occasions.
                </h2>
                <a href="./components/store.php"><button class="shop-now-btn">Shop Now <i class="fa-solid fa-arrow-right"></i></button></a>
            </div>
    </div>


    <main>
    <div class="featured-div">
        <h1 style="font-family: serif; font-weight: bold; margin-bottom:20px">
            We arrange flowers for all occasions since 1996.
        </h1>
        <div class="des">
            <div>
                Since 1996, delivering elegance and beauty through every bouquet.
                <br>Originally established as Badette's Flower Shop, our journey began with a passion for floral artistry
                <br> and a commitment to providing exceptional service.
            </div>
            <div>
                <a href="./components/store.php" style="font-weight:bold; font-size:20px;">ORDER NOW!</a>
            </div>
        </div>

        <div class="subtitle">
            <h2 style="font-family: serif;" onclick="showFeatured()">Featured Items</h2>
            <h2 style="font-family: serif;" onclick="showBestSellers()">Best Seller Items</h2>
        </div>

        <!-- Featured Products -->
        <div class="flex" id="featured-items">
            <div class="con"><a href="./components/store.php"><img src="./products/paradise.png" alt=""></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/devotion.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/Lovely.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/Epiphany.png" alt=""></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/Brave.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/Phenomenal.png"></a></div>
        </div>

        <!-- Best Seller Products -->
        <div class="flex" id="best-seller-items" style="display: none;">
            <div class="con"><a href="./components/store.php"><img src="./products/adore.png" alt=""></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/brilliance.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/rejoice.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/grace.png" alt=""></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/respect.png"></a></div>
            <div class="con"><a href="./components/store.php"><img src="./products/charm.png"></a></div>
        </div>
    </div>


        <div class="aboutshop">
    <img src="images/lugo.png" alt="Flower shop feature image" class="shop-image">
    <div class="text-content">
        <h1 style="font-family: serif; font-weight: bold; margin-bottom: 20px;">MARI'S FLOWER SHOP</h1>
        <div class="description">
            <div><p>Established in 1996, our shop has grown into one of the most trusted names in floral artistry. 
                Over the years, we've built a reputation for quality, attention to detail, and outstanding customer service. 
                Our passion for flowers and commitment to customer satisfaction has only strengthened with time. <br><br>
                For over two decades, we have specialized in crafting stunning floral arrangements that bring beauty and joy to every occasion.
                rom intimate celebrations to grand events, we create bouquets and arrangements tailored to suit your needs
                whether it’s for birthdays, weddings, anniversaries, corporate events, or simple gestures of love and appreciation</p>
            </div>
        </div>
    </div>
</div>


<div class="bg-bot">
            <img src="./images/banner3.jpg" alt="">
            <div class="flex">
                <div>
                    <div class="des">BASE ON YOUR CHOICE</div>
                    <h2>We arrange flowers for all occassions.</h2>
                </div>
                <div>
                    <a href="./components/store.php"><button>Shop Now <i class="fa-solid fa-arrow-right" style="color: #fff;"></i></button></a>
                </div>
            </div>
        </div>

        <div class="bg-bot">
            <img src="./images/banner2.jpg" alt="">
            <div class="flex">
                <div>
                    <div class="des">SINCE 1996.</div>
                    <h2>Trusted by our customers for over 2 decades</h2>
                </div>
                <div>
                    <a href="./components/store.php"><button>Shop Now <i class="fa-solid fa-arrow-right" style="color: #fff;"></i></button></a>
                </div>
            </div>
        </div>


            <div class="ig-account">
                <h3>Follow us on Instagram</h3>
                <h1 style="font-family: serif; font-weight: bold; margin-bottom:20px">@marisflowershop</h1>

                <div class="igflex">
                    <div class="igcon">
                    <a href="https://www.instagram.com/p/CkNhKCWSPR7/">
                    <img src="images/igpic1.png" alt=""></a>
                    </div>

                    <div class="igcon">
                    <a href="https://www.instagram.com/p/C6168QdKRDH/">
                    <img src="images/igpic2.png"></a>
                    </div>

                    <div class="igcon">
                    <a href="https://www.instagram.com/p/Ct-2Iuby_G1/">
                    <img src="images/igpic3.png"></a>
                    </div>

                    <div class="igcon">
                    <a href="https://www.instagram.com/p/CkH2RloS-RM/">
                    <img src="images/igpic4.png" alt=""></a>
                    </div>
                </div>
                
            </div>

    </main> 
            <footer class="footer">
                <div class="footer-container">
                    <div class="footer-row">
                        <div class="footer-col">
                            <h4>Contact us</h4>
                            <ul>
                                <li><p>ADRESS:</p></li>
                                <li><p>315-P. Dela Cruz St.</p></li>
                                <li><p>San Bartolome</p></li>
                                <li><p>Novaliches</p></li>
                                <li><p>Quezon City</p></li>
                                <li><p>San Bartolome</p></li>
                                <li><p>MOBILE:</p></li>
                                <li><p>0919-206-6568</p></li>
                                <li><p>TELEPHONE:</p></li>
                                <li><p>8514-06-31</p></li>
                            </ul>
                        </div>

                        <div class="footer-col">
                            <h4>Get Help</h4>
                            <ul>
                                <li><a href="components/about.php">About Us</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Terms & Conditions</a></li>
                                <li><a href="">Payment Terms / Payment Instructions</a></li>
                            </ul>
                        </div>

                        <div class="footer-col">
                            <h4>Customer Service</h4>
                            <ul>
                                <li><a href="">FAQ</a></li>
                            </ul>
                        </div>

                        <div class="footer-col">
                        <h4>Follow us on social media</h4>
                            <ul class="social-media-icons">
                                <a href="./components/item6.php"><img src="images/lugo.png" alt=""></a>
                               <ul style="list-style: none; display: flex; justify-content: center; align-items: center; padding: 0;">
                               <a href="https://www.instagram.com/marisflowershop/"><li style="margin-right: 15px;"><i class="fa-brands fa-square-instagram" style="font-size: 24px; color: #333;"></i></li></a>
                                <a href="https://www.facebook.com/marisflowershop"><li><i class="fa-brands fa-square-facebook" style="font-size: 24px; color: #333;"></i></li></a>
                                </ul>
                            </ul>
                        </div>
                       
                    </div>

            <!------A white line seperates the footer and the rights reserved------>
                    <hr>
                    <p class = "copyright" style="color:black">Designed and Developed by Tri-Tech<br>©2024 </p>
                </div>
            </footer>

    <script src="./scripts/tab.js"></script>
    <script src="./scripts/addToCartIndex.js"></script>
    <script src="./scripts/header.js"></script>
</body>
</html>