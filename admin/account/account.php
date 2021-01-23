<?php
if (isset($_POST["submit"])) {
    $timKiemString = $_POST["timKiemString"];
    $ketQuaTimKiem = $account->timKiemAcc($timKiemString);
}
if (isset($_POST["xoaACC"])) {
    $maTaiKhoan = $_POST["maTaiKhoan"];
    $account->xoaAccount($maTaiKhoan);
}
?>

<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-phone"></i>QUẢN LÝ TÀI KHOẢN</h4>
        <form action="" method="post">
            
            <div class="input-group">
                <input type="text" name="timKiemString" class="form-control" placeholder="Tìm kiếm" value="<?php if (isset($search)) echo $search ?>">
                <div class="input-group-append">
                    <button class="btn btn-color" name="submit" type="submit">
                        <i class="fa fa-search search_icon"></i>
                    </button>
                </div>
            </div>
        </form>        
    </div>

    <table class="table table-hover" style="text-align: center;">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th colspan="2"></th>
            </tr>
            <?php
            $countSTT = 1;
            // trả về arr có từ khóa tìm kiếm
            if (isset($_POST["submit"])) {
                $arr = $ketQuaTimKiem;
            } else {
                $arr = $product->getData('taikhoan');
            }

            foreach ($arr as $item) :

            ?>
                <form action="" method="POST">
                    <tr style="background-color: white; color: black; text-align: center;">
                        <td><?php echo $countSTT;
                            $countSTT++; ?></td>                        
                        <td><?php echo $item['TenDangNhap']; ?></td>
                        <td><?php echo $item['MatKhau']; ?></td>
                        <td><?php echo $item['DienThoai']; ?></td>
                        <td><?php echo $item['DiaChi']; ?></td>
                        <td><?php if ($item['Admin'] == 1) {
                            echo "Admin";
                        }else{
                            echo "Khách hàng";
                        } ?></td>
                        <td>
                            <input type="hidden" name="maTaiKhoan" value="<?php echo $item['MaTaiKhoan'] ?>">
                            <a class="btn btn-sm btn-secondary" href="<?php echo "index.php?page=au&id=".$item['MaTaiKhoan'] ?>">Cập nhật</a>                            

                            
                            <!-- <?php 
                                if ($item['Admin'] != 1) {
                                    echo '<button type="submit" class="btn btn-sm btn-danger" name="xoaACC">Xóa</button>';
                                }
                            ?> -->

                            <button type="submit" class="btn btn-sm btn-danger" name="xoaACC">Xóa</button>
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