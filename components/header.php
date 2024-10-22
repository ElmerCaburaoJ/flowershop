<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php require_once("../backend/connection.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="./styles/body.css">
    <link rel="icon" type="img/png" href="./images/lugo.png">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <title>Document</title>
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
                <a href="
                <?php
                    if(isset($_SESSION["acc_id"])){
                        echo "./cart.php";
                    }else{
                        echo "./login.php";
                    }
                ?>
                " class="a-js">
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
                            <a href='./profile.php' class='a-js'>
                                <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                            </a>
                            <i class='fa-solid fa-caret-down fa-xl drop-down' style='color: rgb(96, 96, 96);'></i>
                            <div class='profile-div'>
                                <a href='./profile.php' class='profile'><div>Profile</div></a>
                                <a href='../backend/logout.php' class='logOut'><div>Log out</div></a>
                            </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <a href='./login.php' class='a-js profile-logIn'>
                            <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                        </a>
                        ";
                    }
                ?>
            </div>
    </div>
</header>

    <script src="../scripts/header.js"></script>
</body>
</html>