<?php 

    // Require MySQL Connection
    require('database/DBController.php');

    // Require Product Class
    require('database/Product.php');

    // DBController object
    $db = new DBController();

    // Product Object
    $product = new Product($db);

    print_r($product->getData());
    
?>

