<!-- Top Sale -->
<?php
$product_data = $product->getData();
shuffle($product_data);
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
                            <a href="<?php printf("%s?MaDienThoai=%s","product.php",$item['MaDienThoai']) ?>"><img src="<?php echo $item['img'] ?? "./assets/products/1.png" ?>" alt="Product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['TenDienThoai'] ?? "Unknown"?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $item["GiaTien"]." VND" ?? "0"?></span>
                                </div>
                                <button type="submit" class="btn btn-warning font-size-12">Add To Cart</button>
                            </div>
                        </div>
                    </div>
            <?php } //close php foreach loop ?> 

        </div>

        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->