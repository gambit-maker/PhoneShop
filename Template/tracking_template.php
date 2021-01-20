<?php
$accountId = $_GET["accountID"];
if (isset($_POST["huyGiaoDich"])) {
    # code...
}
?>



<div class="container">

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
                    <th></th>
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
                            <a href=""><img src="<?php echo $product->layDienThoai($item['MaDienThoai'], 'img'); ?>" height="200px"></a>
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

                        <td>
                            <button type="submit" name="huyGiaoDich" class="btn btn-danger">Hủy</button>
                        </td>

                    </tr>
                <?php
                endforeach;
                ?>
            </thead>
        </table>
    </form>
</div>