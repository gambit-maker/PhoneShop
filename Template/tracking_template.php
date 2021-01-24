<?php
$accountId = $_GET["accountID"];

if (isset($_POST["huyDonhang"])) {
    $maDonHang = $_POST["maDonHang"];
    $bill->xoaDonHang($maDonHang);
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
    if ($bill->hienThiDonHangV2($accountId, "0") != null) :

    ?>
        <form action="" method="post">
            <h4 style="text-align: center;" class="py-5">Đơn hàng đang được xác nhận</h4>
            <table align="center" width="100%" border="1 solid black" class="mb-5" style="text-align: center;">

                <thead>
                    <tr style="height: 100px; background-color: #203864; color: white;" class="font-baloo font-size-16">
                        <th>Mã Đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th colspan="2"></th>

                    </tr>
                    <?php

                    $chiTietDonHang = $bill->hienThiDonHangV2($accountId, "0");
                    foreach ($chiTietDonHang as $item) :

                    ?>
                        <tr style="height: 50px;">

                            <td><?php echo $item['MaDonHang'] ?></td>
                            <?php

                            ?>
                            <td>
                                <?php echo $item['NgayDat']; ?>
                            </td>
                            <td>
                                <?php
                                echo number_format($item['TongTien']);;
                                ?>
                            </td>

                            <td>
                                <a href="xemChiTietDonHang.php?MaDonHang=<?php echo $item['MaDonHang']; ?>">Xem chi tiết</a>
                            </td>
                            <td>
                                <input type="hidden" name="maDonHang" value="<?php echo $item['MaDonHang']; ?>">
                                <input type="submit" name="huyDonhang" class="btn btn-danger" value="Hủy">
                            </td>




                        </tr>
                    <?php
                    endforeach;
                    ?>
                </thead>

            </table>

        </form>
    <?php
    endif;
    ?>
    <!-- <?php
            if ($bill->hienThiDonHangV2($accountId, "0") == null) {
                echo '<h4 style="text-align: center;" class="py-5">Hiện không có mặt hàng nào trong giỏ</h4>';
            }
            ?> -->
</div>