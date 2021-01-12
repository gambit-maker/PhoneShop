<?php 

    // Require MySQL Connection
    require('database/DBController.php');

    // Require Product Class
    require('database/Product.php');

    // Require Cart Class
    require('database/Cart.php');

    // DBController object
    $db = new DBController();

    // Product Object
    $product = new Product($db);


    $cart = new Cart($db);
    

    
?>

