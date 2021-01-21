<?php
if (isset($_POST["submit"])) {
    $timKiemString = $_POST["timKiemString"];
    $ketQuaTimKiem = $product->timKiem($timKiemString);
}
if (isset($_POST["xoaSP"])) {
    $maDienThoai = $_POST["maDienThoai"];
    $product->xoaSanPham($maDienThoai);
}
?>

<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-phone"></i>QUẢN LÝ SẢN PHẨM</h4>
        <form action="" method="post">
            <input type="text" name="page" value="p" hidden>
            <input type="text" name="pg" value="1" hidden>
            <div class="input-group">
                <input type="text" name="timKiemString" class="form-control" placeholder="Tìm kiếm sản phẩm" value="<?php if (isset($search)) echo $search ?>">
                <div class="input-group-append">
                    <button class="btn btn-color" name="submit" type="submit">
                        <i class="fa fa-search search_icon"></i>
                    </button>
                </div>
            </div>
        </form>
        <a class="btn btn-color" href="index.php?page=pa">Thêm mới</a>
    </div>

    <table class="table table-hover">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Thương hiệu</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th colspan="2"></th>
            </tr>
            <?php
            $countSTT = 0;
            // trả về arr có từ khóa tìm kiếm
            if (isset($_POST["submit"])) {
                $arr = $ketQuaTimKiem;
            } else {
                $arr = $product->getData();
            }

            foreach ($arr as $item) :

            ?>
                <form action="" method="POST">
                    <tr style="background-color: white; color: black; text-align: center;">
                        <td><?php echo $countSTT;
                            $countSTT++; ?></td>
                        <td><img src="<?php echo "../" . $item['img'] ?>"></td>
                        <td><?php echo $item['TenDienThoai'] ?></td>
                        <td><?php print_r($product->getBrandNameV2($item['MaHang'])); ?></td>
                        <td><?php echo number_format($item['GiaTien']) ?></td>
                        <td><?php echo $item['SoLuong'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="index.php?page=pu&id='.$row['gid'].'">Cập nhật</a>
                            <input type="hidden" name="maDienThoai" value="<?php echo $item['MaDienThoai'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger" name="xoaSP">Xóa</button>
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