 <!-- New phone -->
 <?php
 $product_data = $product->getData();
    shuffle($product_data);

    if (isset($_POST["new_phone_submit"])) {
        // call add to cart method    

        if ($accountID != null) {
            $cart->addToCart($_POST['account_id'], $_POST['item_id']);
            // echo '<script type="text/javascript">swal("product insert to cart.", " ", "success")? "":location.reload();</script>';
            echo("<script>location.href = '".$_SERVER['PHP_SELF']."?accountID=$accountID';</script>");
        } else {
            echo '<script type="text/javascript">swal("You must login to use this feature !", " ", "error");</script>';
        }
    }
    ?>
 <section id="new-phones">
     <div class="container">
         <h4 class="font-rubik font-size-20">New Phones</h4>
         <hr>
         <!-- owl carousel -->
         <div class="owl-carousel owl-theme">
             <?php foreach ($product_data as $item) { ?>
                 <div class="item py-2 bg-light">
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
                                 <span><?php echo number_format($item["GiaTien"]) . " VND" ?? "0" ?></span>
                             </div>
                             <form method="POST">
                                 <input type="hidden" name="item_id" value="<?php echo $item['MaDienThoai'] ?>">
                                 <input type="hidden" name="account_id" value="<?php echo $accountID; ?>">
                                 
                                 <?php 
                                    if ($item['SoLuong'] <= 0) {
                                        echo '<button type="submit" disabled name="new_phone_submit" class="btn btn-info font-size-12">Hết Hàng</button>';
                                    }else{
                                        echo '<button type="submit" name="new_phone_submit" class="btn btn-warning font-size-12">Add To Cart</button>';
                                    }
                                ?>
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
 <!-- !New phone -->