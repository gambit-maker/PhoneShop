<?php
$brand_name = $product->getData("hang");
$brand = array_map(function ($pro) {
    return $pro['TenHang'];
}, $brand_name);
$product_data = $product->getData();
sort($brand);
shuffle($product_data);

if (isset($_POST["submit"])) {
    $from = $_POST["moneyFrom"];
    $to = $_POST["moneyTo"];
    $searchString = $_POST["searchString"];
    if ($from != null && $to != null) {
        if ($to <= $from) {
            echo '<script>
            swal({
                title: "Nhập số thứ 2 lớn hơn thứ 1",
                text: "",
                icon: "error"
            }).then(function() {
                window.location = "";
            });
            </script>';
        }
        $product_data = $product->timSanPhamVoiGiaTien($from, $to);
    } else if($searchString != null){
        $product_data = $product->timSanPhamVoiTen($searchString);
    } else {
        $product_data = $product->getData();
    }
}

if (isset($_POST["special_price_submit"])) {
    // call add to cart method    

    if (isset($_GET["accountID"])) {
        $cart->addToCart($_POST['account_id'], $_POST['item_id']);
        // echo '<script type="text/javascript">swal("product insert to cart.", " ", "success")? "":location.reload();</script>';
        echo ("<script>location.href = '" . $_SERVER['PHP_SELF'] . "?accountID=$accountID';</script>");
    } else {
        echo '<script type="text/javascript">swal("You must login to use this feature !", " ", "error");</script>';
    }
}
?>


<section id="special-price">
    <div class="container py-5">
        <h4>Tìm kiếm </h4>
        <form action="" method="post">

            <table align="center" class="font-baloo font-size-20">
                <tr>
                    <td>Từ: </td>
                    <td><input type="number" name="moneyFrom"></td>
                    <td>Đến: </td>
                    <td><input type="number" name="moneyTo"></td>
                    
                </tr>
                <tr>
                    <td >Tên sản phẩm :</td>
                    <td colspan="3" ><input type="text" name="searchString" class="mt-2"></td>
                </tr>
                <tr>
                <td><td><input type="submit" name="submit" class="btn btn-primary mt-2" value="Tìm"></td></td>
                    
                </tr>

            </table>
        </form>


        <!-- <h4 class="font-rubik font-size-20">Kết quả tìm kiếm</h4> -->
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
            array_map(function ($name) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $name, $name);
            }, $brand);
            ?>

        </div>

        <div class="grid">
            <?php foreach ($product_data as $item) { ?>
                <div class="grid-item border <?php foreach ($brand_name as $name) {
                                                    if ($item['MaHang'] == $name['MaHang']) {
                                                        echo $name['TenHang'];
                                                    }
                                                } ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-rale">
                            <?php
                            if ($accountID != null) : ?>
                                <a href="<?php printf("%s?accountID=%s&MaDienThoai=%s", "product.php", $accountID, $item['MaDienThoai']) ?>"><img src="<?php echo $item['img'] ?? "./assets/products/1.png" ?>" alt="Product1" class="img-fluid"></a>
                            <?php
                            endif;
                            ?>
                            <?php
                            if ($accountID == null) : ?>
                                <a href="<?php printf("%s?MaDienThoai=%s", "product.php", $item['MaDienThoai']) ?>">
                                    <img src="<?php echo $item['img'] ?? "./assets/products/1.png" ?>" alt="Product1" height="200px">
                                </a>
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
                                        echo '<button type="submit" disabled name="special_price_submit" class="btn btn-info font-size-12">Hết Hàng</button>';
                                    } else {
                                        echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add To Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } //close php foreach loop 
            ?>


        </div>


    </div>
</section>