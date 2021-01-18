<?php

$accountID = $_GET["accountID"];
if (isset($_POST["deleteItem"])) {
    $maDienThoai = $_POST["maDienThoai"];
    $cart->deleteItemInCart($maDienThoai);
}
?>

<!-- Shopping cart section -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping cart</h5>

        <!-- Shopping cart item -->
        <div class="row">
            <!-- Cart item -->
            <div class="col-sm-9">

                <?php
                $tongTien = array();
                // $result = $product ->getProduct(2);
                // print_r($result);
                foreach ($cart->getDataFromAccountId($accountID) as $item) :
                    $cart1 = $product->getProduct($item['MaSanPham']);
                    $tongTien[] = array_map(function ($item) {


                ?>

                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['img'] ?>" alt="cart" class="img-fluid" style="height: 120px;">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['TenDienThoai'] ?></h5>
                                <small>By SamSung</small>
                                <!-- Product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="font-rale px-2 font-size-14">122 Rating</a>
                                </div>
                                <!-- !Product rating -->


                                <!-- Product Qty -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-rale w-25">
                                        <button class="qty-up border bg-light" data-id="pro1">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="pro1">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="maDienThoai" value="<?php echo $item['MaDienThoai']; ?>">
                                        <button type="submit" name="deleteItem" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                    </form>

                                    <button type="submit" class="btn font-baloo text-danger px-3 border-right">Save for

                                        later</button>
                                </div>
                                <!-- !Product Qty -->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20  text-danger font-baloo">
                                    <span class="product_pirce"><?php echo $item['GiaTien'] ?></span>VND
                                </div>

                            </div>
                        </div>

                <?php
                
                return $item['GiaTien'];
                    }, $cart1); // closing maparry
                endforeach;
                
                
                ?>


            </div>
            <!-- !Cart item -->

            <!-- Subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total text-center mt-2 border">
                    <h6 class="font-rale font-size-12 text-success py-3"><i class="fas fa-check"></i>Your order
                        is ready to procced</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal(<?php echo count($tongTien); ?> items):&nbsp;
                            <span class="text-danger" id="deal-price"><?php echo isset($tongTien) ? $cart->sumItemInCart($tongTien) : 0; ?></span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">Procced to buy</button>
                    </div>
                </div>
            </div>
            <!-- !Subtotal section -->
        </div>
        <!-- !Shopping cart item -->
    </div>
</section>

<!-- !Shopping cart section -->