
<?php 
    if (isset($_POST["submitDuyet"])) {
        $maDonhang = $_POST["maDonhang"];
        
        $bill->duyetDonHang($maDonhang);
        
    }
    if (isset($_POST["submitHuyDuyet"])) {
        $maDonhang = $_POST["maDonhang"];
        $bill->duyetDonHang($maDonhang,'0');
    }

    if (isset($_POST["xoaDonHang"])) {
        $maDonhang = $_POST["maDonhang"];
        $bill->xoaDonHang($maDonhang);
    }
        
?>

<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-phone"></i>QUẢN LÝ ĐƠN HÀNG</h4>
        <form action="" method="post">            
            <input type="submit" name="daDuyet" value="Đã Duyệt">
            <input type="submit" name="chuaDuyet" value="Chưa Duyệt">
        </form>
    </div>

    <table class="table table-hover" style="text-align: center;">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                <th>Ngày đặt</th>
                <th>Khách hàng</th>
                <th>Tông tiền</th>
                <th>Trạng thái</th>
                
                <th colspan="2"></th>
            </tr>
            <?php
            $countSTT = 1;
            // trả về arr có từ khóa tìm kiếm
            if (isset($_POST["daDuyet"])) {        
                $ketQuaTimKiem = $bill->timHoaDonDuyet("1");  
                $arr = $ketQuaTimKiem;                          
            }
            else if (isset($_POST["chuaDuyet"])) {
                $ketQuaTimKiem = $bill->timHoaDonDuyet("0");            
                $arr = $ketQuaTimKiem;
            } else {
                $arr = $product->getData('donhang');
            }

            foreach ($arr as $item) :

            ?>
                <form action="" method="POST">
                    <tr style="background-color: white; color: black; text-align: center;">
                        <td><?php echo $countSTT;
                            $countSTT++; ?></td>
                        
                        <td><?php echo $item['NgayDat'] ?></td>
                        <td><?php $khachhang = $account->getAccountOnlly($item['MaKhachHang']);
                                echo $khachhang['TenDangNhap'];
                        ?></td>
                        <td><?php echo number_format($item['TongTien']) ?></td>
                        <?php if ($item['TrangThai'] == 1) {
                            echo'<td class="text-success">Đã duyệt</td>';
                        } else{
                            echo '<td class="text-danger">Chưa duyệt</td>';
                        } ?>
                        <td>
                            <input type="hidden" name="maDonhang" value="<?php echo $item['MaDonHang'] ?>">

                            <a class="btn btn-sm btn-secondary" href="<?php echo "index.php?page=od&id=".$item['MaDonhang'] ?>">Xem</a>                            
                            <?php 
                                if ($item['TrangThai'] == 0) {
                                    echo '<button type="submit" class="btn btn-sm btn-color ml-1" name="submitDuyet">Duyệt</button>';
                                }
                                else{
                                    echo '<button type="submit" class="btn btn-sm btn-dark ml-1" name="submitHuyDuyet">Hủy duyệt</button>';
                                }
                            ?>
                            
                            <button type="submit" class="btn btn-sm btn-danger" name="xoaDonHang">Xóa</button>
                        </td>
                    </tr>
                </form>

            <?php
            endforeach;
            ?>
        </thead>
        <tbody>

        </tbody>
    </table>



</div>