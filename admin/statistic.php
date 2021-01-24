<?php
if (isset($_POST["submit"])) {
    $monthAndYear = $_POST["monthAndYear"];
    // echo " ".$monthAndYear;

    $fromDate = $_POST["fromDate"];
    $toDate = $_POST["toDate"];


    // echo " ".$fromDate;
    // echo " ".$toDate;
}
?>
<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-chart-bar"></i></i>THỐNG KÊ DOANH THU</h4>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Từ ngày</td>
                    <td><input type="date" name="fromDate"></td>
                    <td>Đến ngày</td>
                    <td><input type="date" name="toDate"></td>
                </tr>
                <tr>
                    <td>Theo tháng năm </td>
                    <td><input type="month" name="monthAndYear"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="mt-2" type="submit" name="submit" value="Thống kê"></td>
                </tr>
            </table>
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
            $tongTien = 0;

            if (isset($_POST["submit"])) {                
                if ($fromDate != null && $toDate != null) {
                    $arr = $bill->thongKeTheoKhoangThoiGian($fromDate, $toDate);
                }else if($monthAndYear != null){
                    $arr = $bill->thongKeTheoNamThang($monthAndYear);                    
                }else{
                    $arr = $bill->timHoaDonDuyet("3");    
                }
            } else {
                $arr = $bill->timHoaDonDuyet("3");
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
                        <td><?php echo number_format($item['TongTien']);
                            $tongTien += $item['TongTien']; ?></td>
                        <?php
                        echo '<td class="text-primary">Đã nhận tiền</td>';
                        ?>
                        <td>
                            <input type="hidden" name="maDonhang" value="<?php echo $item['MaDonHang'] ?>">
                            <a class="btn btn-sm btn-secondary" href="<?php echo "index.php?page=od&id=" . $item['MaDonHang']; ?>">Xem</a>
                            <?php
                            if ($item['TrangThai'] == 0) {
                                echo '<button type="submit" class="btn btn-sm btn-color ml-1" name="submitDuyet">Duyệt</button>';
                            } else if ($item['TrangThai'] == 1) {
                                echo '<button type="submit" class="btn btn-sm btn-dark ml-1" name="submitHuyDuyet">Hủy duyệt</button>';
                                echo '<button type="submit" class="btn btn-sm btn-primary ml-1" name="submitNhanTien">Đã nhận tiền</button>';
                            } else {
                                echo '';
                            }
                            ?>


                        </td>
                    </tr>
                </form>

            <?php
            endforeach;
            ?>
        </thead>
        <tbody>
            <?php
            if (isset($_POST["submit"])) :


            ?>
                <tr class="text-color">
                    <td colspan="5" align="right">

                        <h4>Tổng cộng:</h1>
                    </td>
                    <td colspan="">
                        <h4><?php
                            echo number_format($tongTien);
                            ?> VND</h4>
                    </td>
                </tr>
            <?php
            endif;
            ?>
        </tbody>
    </table>



</div>