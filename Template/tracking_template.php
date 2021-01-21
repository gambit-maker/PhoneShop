<?php
$accountId = $_GET["accountID"];
if (isset($_POST["huyGiaoDich"])) {
    $bill->huyDonHang($accountId);
    echo '<script>
            swal({
                title: "Đơn hàng đã bị hủy",
                text: " ",
                icon: "success"
            });
</script>';
}
?>



<div class="container">

    <?php
    if ($bill->hienThiChiTietDonHang($accountId) != null) :


    ?>
        <form action="" method="post">
            <h4 style="text-align: center;" class="py-5">Mặt hàng đã đặt</h4>
            <table align="center" width="100%" border="1 solid black" class="mb-5" style="text-align: center;">

                <thead>
                    <tr style="height: 100px; background-color: #203864; color: white;" class="font-baloo font-size-16">
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Tên điện thoại</th>
                        <th>Tên hãng</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>

                    </tr>
                    <?php

                    $count = 0;
                    $chiTietDonHang = $bill->hienThiChiTietDonHang($accountId);
                    foreach ($chiTietDonHang as $item) :
                    ?>
                        <tr>

                            <td><?php echo $count;
                                $count++; ?></td>
                            <?php

                            ?>
                            <td>
                                <a href=""><img src="<?php echo $product->layDienThoai($item['MaDienThoai'], 'img'); ?>" height="100px"></a>
                            </td>
                            <td>
                                <?php
                                echo $product->layDienThoai($item['MaDienThoai'], 'TenDienThoai');
                                ?>
                            </td>
                            <td>
                                <?php
                                $maHang = $product->layDienThoai($item['MaDienThoai'], 'MaHang');
                                echo $product->getBrandNameV2($maHang);
                                ?>
                            </td>

                            <td>
                                <?php
                                echo $item['SoLuong'];
                                ?>
                            </td>

                            <td>
                                <?php
                                echo $item['DonGia'];
                                ?>
                            </td>


                        </tr>
                    <?php
                    endforeach;
                    ?>
                </thead>

            </table>
            <button type="submit" name="huyGiaoDich" style="width: 150px;" class="btn btn-danger mb-5">Hủy đặt hàng</button>
        </form>
    <?php
    endif;
    ?>

    <?php
    if ($bill->hienThiChiTietDonHang($accountId) == null) {
        echo '<h4 style="text-align: center;" class="py-5">Hiện không có mặt hàng nào trong giỏ</h4>';
    }
    ?>

</div>