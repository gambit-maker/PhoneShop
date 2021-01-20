<?php 

    // Require MySQL Connection
    require('database/DBController.php');

    // Require Product Class
    require('database/Product.php');

    // Require Cart Class
    require('database/Cart.php');

    // Require Account Class
    require('database/Account.php');

    //require Bill Class
    require('database/Bill.php');

    // DBController object
    $db = new DBController();

    // Product Object
    $product = new Product($db);
    $product_data = $product->getData();


    $cart = new Cart($db);
    
    $account = new Account($db);

    $bill = new Bill($db);
    
    // print_r($cart->getCartId($cart->getDataFromAccountId("2")));
?>

