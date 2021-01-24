<!-- product -->
<?php
$item_id = $_GET["MaDienThoai"];        
if (isset($_GET["accountID"])) {
    $accountId = $_GET["accountID"];
    if (isset($_POST["productSubmit"])) {
        $cart->addToCart($accountId,$item_id);
        echo '<script>
            swal({
                title: "Sản phẩm đã được thêm vào giỏ hàng.",
                text: "",
                icon: "success"
            }).then(function() {
                window.location = "";
            });
            </script>';
    }
}else{
    if (isset($_POST["productSubmit"])) {
        echo '<script>
            swal({
                title: "Bạn phải đăng nhập để sử dụng chức năng này.",
                text: "",
                icon: "error"
            }).then(function() {
                window.location = "";
            });
            </script>';
    }
}
$theProduct;
foreach ($product->getData() as $item) {
    if ($item['MaDienThoai'] == $item_id) {
        $theProduct = $item;
    }
}

// get brand name in DB table hang
$theProductName;
foreach ($product->getData("hang") as $item) {
    if ($item['MaHang'] == $theProduct['MaHang']) {
        $theProductName = $item;
    }
}


?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $theProduct['img']; ?>" alt="product" class="img-fluid" style="width: 450px !important; height: 450px !important;">
                <div class="form-row pt-4 font-size-16 font-baloo">

                    <form action="" method="post">
                        <div class="col">
                            <?php if ($theProduct['SoLuong'] > 0) {
                                echo '<button type="submit" style="width: 400%;" name="productSubmit" class="btn btn-warning form-control mb-2">Add to Cart</button>';
                            } else {
                                echo '<button type="submit"   style="width: 600%;" disabled name="productSubmit"  class="btn btn-info font-size-12">Hết Hàng</button>';
                            } ?>
                        </div>
                        <div class="col">
                            <?php
                            if ($theProduct['SoLuong'] > 0) {
                                echo '<button type="submit" style="width: 400%;" class="btn btn-danger form-control">Proceed Buy</button>';
                            }
                            ?>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h6><?php echo $theProduct['TenDienThoai'] ?? "Unknown" ?></h6>
                <span>by <?php echo $theProductName['TenHang'] ?? "Brand" ?></span>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale">123 ratings | 18 answers question</a>
                </div>
                <hr class="m-0">

                <!-- Product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-16">
                        <td>M.R.P </td>
                        <td><strike>1520000 VND</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal price</td>
                        <td class="font-size-16 text-danger">
                            <span>by <?php echo $theProduct['GiaTien'] . " VND" ?? "Brand" ?></span>
                            <small class="text-dark font-size-12">&nbsp;&nbsp;include of all taxes</small>
                        </td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save</td>
                        <td>
                            <span class="font-size-16 text-danger">1000000 VND</span>
                        </td>
                    </tr>
                </table>
                <!-- !Product price -->

                <!-- Policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Daily Tuition <br> Deliverd</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year <br> Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- !Policy -->
                <hr>

                <!-- Order Detail -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by: Mar 29 - Apr 1</small>
                    <small>Sold by <a href="#">Daily Electronics</a> (4.5 out of 5 | 19.782 ratings)</small>
                    <small><i class="fas fa-map-marked-alt color-primary"></i>&nbsp;&nbsp;Deliver to - 2300 Customer</small>
                </div>
                <!-- !Order Detail -->

                <div class="row">
                    <div class="col-6">
                        <!-- color -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color: </h6>
                                <div class="p-2 color-yellow-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-primary-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-second-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                            </div>
                        </div>
                        <!-- !color -->
                    </div>
                    <div class="col-6">
                        <!-- Product Qty Section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty: </h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                                <input type="text" class="qty_input border px-2 w-50 bg-light" data-id="pro1" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="pro1">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                        <!-- !Product Qty Section -->
                    </div>
                </div>


                <!-- Ram size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size: </h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- !Ram size -->
            </div>
            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p><?php echo $theProduct['MoTa']; ?></p>
            </div>
        </div>
    </div>
</section>
<!-- !product -->