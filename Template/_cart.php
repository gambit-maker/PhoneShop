<?php

$accountID = $_GET["accountID"];
if (isset($_POST["deleteItem"])) {
    $maDienThoai = $_POST["maDienThoai"];
    $cart->deleteItemInCart($maDienThoai);
    echo("<script>location.href = '".$_SERVER['PHP_SELF']."?accountID=$accountID';</script>");
}
if (isset($_POST["them1"])) {
    $maDienThoai = $_POST["maDienThoai"];
    $cart->addToCart($accountID, $maDienThoai);
    echo("<script>location.href = '".$_SERVER['PHP_SELF']."?accountID=$accountID';</script>");
}
if (isset($_POST["giam1"])) {
    $maDienThoai = $_POST["maDienThoai"];
    $cart->giamMotSanPham($accountID, $maDienThoai);
    echo("<script>location.href = '".$_SERVER['PHP_SELF']."?accountID=$accountID';</script>");
}

if (isset($_POST["proccedBuy"])) {
    $tongTien = $cart->getTongTienTrongGio($accountID);
    
    if ($cart->getDataFromAccountId($accountID) != null) {
        $bill->themDonHang($accountID,$tongTien);    
        echo '<script>
            swal({
                title: "Cảm ơn bạn đã mua hàng.",
                text: "Đơn hàng đang được cập nhập và phê duyệt.",
                icon: "success"
            }).then(function() {
                window.location = "";
            });
            </script>';
            $bill->xoaGioHangKhiThemVaoDon($accountID);
    }
    else{
        echo '<script>
            swal({
                title: "Không có sản phẩm nào trong giỏ hàng.",
                text: " ",
                icon: "error"
            }).then(function() {
                window.location = "";
            });
            </script>';
    }
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

                foreach ($cart->getDataFromAccountIdDistinct($accountID) as $item) :

                    $cart1 = $product->getProduct($item['MaSanPham']);

                    // test count khong duplicate
                    // $count = array_count_values($cart->getCartId($cart->getDataFromAccountId($_GET["accountID"])));
                    // echo $count[$item['MaSanPham']];
                    // if ($count[$item['MaSanPham']] > 1) {
                    //     echo "true";
                    // } else {
                    //     echo "false";
                    // }

                    $tongTien[] = array_map(function ($item) {
                        $db = new DBController();
                        $cart = new Cart($db);
                        // print_r($cart->getCartId($cart->getDataFromAccountId($_GET["accountID"])));
                        $count = array_count_values($cart->getCartId($cart->getDataFromAccountId($_GET["accountID"])));
                        // print_r($count);

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
                                    <form action="" method="post">
                                        <div class="d-flex font-rale w-25">                                            
                                            <button class="border bg-light" name="them1">
                                                <i class="fas fa-angle-up"></i>
                                            </button>
                                            <input type="text" readonly style="width: 50px; text-align: center;" min="1" value="<?php echo $count[$item['MaDienThoai']]; ?>" name="qty">
                                            <button class="border bg-light" name="giam1">
                                                <i class="fas fa-angle-down"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="maDienThoai" value="<?php echo $item['MaDienThoai']; ?>">
                                        <button type="submit" name="deleteItem" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                        <button type="submit" class="btn font-baloo text-danger px-3 border-right">Save for later</button>
                                    </form>

                                    

                                </div>
                                <!-- !Product Qty -->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20  text-danger font-baloo">
                                    <span class="product_price" data-id="<?php echo $item['MaDienThoai'] ?? "0"; ?>">
                                        <?php echo $item['GiaTien'] * $count[$item['MaDienThoai']];  ?>
                                    </span>VND
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
                            <span class="text-danger" id="deal-price"><?php echo $cart->getTongTienTrongGio($accountID)."VND" ?></span>
                        </h5>
                        <form action="" method="post">
                            <button type="submit" name="proccedBuy" class="btn btn-warning mt-3">Procced to buy</button>                            
                        </form>


                    </div>
                </div>
            </div>
            <!-- !Subtotal section -->
        </div>
        <!-- !Shopping cart item -->


    </div>
</section>

<!-- !Shopping cart section -->