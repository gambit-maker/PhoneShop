<!-- Top Sale -->
<?php
$product_data = $product->getData();
shuffle($product_data);

if (isset($_POST["top_sale_submit"])) {
    // call add to cart method    

    if (isset($_GET["accountID"])) {
        $cart->addToCart($_POST['account_id'], $_POST['item_id']);
        // echo '<script type="text/javascript">swal("product insert to cart.", " ", "success");</script>';
        echo("<script>location.href = '".$_SERVER['PHP_SELF']."?accountID=$accountID';</script>");
//         echo '<script>
//             swal({
//                 title: "Product has been inserted.",
//                 text: " ",
//                 icon: "success"
//             });
// </script>';
    } else {
        echo '<script type="text/javascript">swal("You must login to use this feature !", " ", "error");</script>';
    }
}
?>

<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">

            <?php foreach ($product_data as $item) { ?>
                <div class="item py-2">
                    <div class="product font-rale">
                        <?php
                        if ($accountID != null) : ?>
                            <a href="<?php printf("%s?accountID=%s&MaDienThoai=%s", "product.php", $accountID, $item['MaDienThoai']) ?>"><img src="<?php echo $item['img'] ?? "./assets/products/1.png" ?>" alt="Product1" class="img-fluid"></a>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($accountID == null) : ?>
                            <a href="<?php printf("%s?MaDienThoai=%s", "product.php", $item['MaDienThoai']) ?>"><img src="<?php echo $item['img'] ?? "./assets/products/1.png" ?>" alt="Product1" class="img-fluid"></a>
                        <?php
                        endif;
                        ?>
                        <div class="text-center">
                            <h6><?php echo $item['TenDienThoai'] ?? "Unknown" ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span><?php echo $item["GiaTien"] . " VND" ?? "0" ?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['MaDienThoai'] ?>">
                                <input type="hidden" name="account_id" value="<?php echo $accountID; ?>">
                                <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } //close php foreach loop 
            ?>

        </div>

        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->