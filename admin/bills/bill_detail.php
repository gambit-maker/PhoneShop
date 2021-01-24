<?php
    $maDonHang = $_GET["id"];    
?>

<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-phone"></i>CHI TIẾT ĐƠN HÀNG</h4>                
    </div>

    <table class="table table-hover" style="text-align: center;">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Mã Sản phẩm</th>
                <th>Tên điện thoại</th>
                <th>Tên hãng</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                
                
            </tr>
            <?php
            $countSTT = 1;
            
            $arr = $bill->hienThiChiTietDonHangDungMaDonHang($maDonHang);

            foreach ($arr as $item) :

            ?>
                <form action="" method="POST">
                    <tr style="background-color: white; color: black; text-align: center;">
                        <td><?php echo $countSTT;
                            $countSTT++; ?></td>
                        <td><img src="<?php echo "../" . $product->layDienThoai($item['MaDienThoai'],'img') ?>"></td>
                        <td><?php echo $item['MaDienThoai'] ?></td>
                        <td><?php echo $product->layDienThoai($item['MaDienThoai'],'TenDienThoai') ?></td>

                        <td><?php $maHang =  $product->layDienThoai($item['MaDienThoai'],'MaHang');
                            echo $product->getBrandNameV2($maHang);  ?></td>
                        
                        <td><?php echo $item['SoLuong'] ?></td>
                        <td><?php echo number_format($product->layDienThoai($item['MaDienThoai'],'GiaTien')); ?></td>                        
                    </tr>
                </form>                
            <?php
            endforeach;
            ?>
        </thead>
        <tr class="text-color">
            <td colspan="5" align="right">
                
                <h4>Tổng cộng:</h1>
            </td>
            <td colspan="">
                <h4><?php 
                    echo number_format($bill->layDuLieuDonHang($maDonHang));
                ?> VND</h4>
            </td>
        </tr>
    </table>            
    <a href="javascript:history.go(-1)" class="btn btn-danger float-right mr-5">Quay lại</a>



</div>