<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moblie Shopee</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl- carousei CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <!-- SweetAlert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php
    // Require MySQlL Connection in functions.php
    require('functions.php');
    ?>
</head>


<body>
    <!-- Start header -->
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <?php


            ?>
            <p class="font-rale font-size-12 text-black-50 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent sit amet condimentum neque. Phasellus laoreet viverra odio, id tristique magna euismod vitae.
                Pellentesque sed feugiat mauris</p>
            <div class="font-rale font-size-14">
                <?php
                $accountID = "";
                if (isset($_GET["accountID"])) {
                    $accountID = $_GET["accountID"];
                    $account = $product->getData("TaiKhoan");

                    foreach ($account as $item) {
                        if ($accountID == $item['MaTaiKhoan']) {
                            echo "<a class='px-3 border-right border-left text-dark'>Account: " . $item['TenDangNhap'] . "</a>";
                            echo "<a href='index.php' class='px-3 border-right border-left text-dark'>LogOut</a>";
                        }
                    }
                } else {
                    echo "<a href='login.php' class='px-3 border-right border-left text-dark'>Login</a>";
                }            ?>
                <a href="#" class="px-3 border-right text-dark">WishList</a>
            </div>
        </div>

        <!-- Primary Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <?php
            if ($accountID == null) {
                echo '<a class="navbar-brand" href="index.php">Moblie Shop</a>';
            } else {
                echo '<a class="navbar-brand" href="index.php?accountID=' . $accountID . '">Moblie Shop</a>';
            }
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if ($accountID != null) {
                                echo '<a class="nav-link" href="sreach.php?accountID='.$accountID.'">Sreach</a>';
                            }else{
                                echo '<a class="nav-link" href="sreach.php">Sreach</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item">

                        <?php
                        if ($accountID != null) {
                            echo '<a class="nav-link" href="trackingOrder.php?accountID=' . $accountID . '">Tracking Order</a>';
                        }
                        ?>
                        <?php
                        if ($accountID == null) :
                        ?>
                            <a onclick="swal('You must login to use this feature !', ' ', 'error')" class="nav-link">Tracking Order</a>
                            <?php
                        endif;
                            ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>

                <form class="font-size-14 font-rale">
                    <?php
                    if ($accountID != null) {
                        echo '<a href = "cart.php?accountID=' . $accountID . '" class="py-2 rounded-pill color-primary-bg">';
                    }
                    ?>
                    <?php
                    if ($accountID == null) :
                    ?>
                        <a onclick="swal('You must login to use this feature !', ' ', 'error')" class="py-2 rounded-pill color-primary-bg">
                        <?php
                    endif;
                        ?>

                        <span class="font-size-16 px-2 text-white">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">
                            <?php
                            if ($accountID != null) {
                                echo $cart->sumOfProduct($accountID);
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        </a>
                </form>
            </div>
        </nav>
        <!-- !Primary Navigation -->

    </header>
    <!-- !Start header -->

    <!-- Start main-site-->
    <main id="main-site">