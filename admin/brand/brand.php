<?php
if (isset($_POST["submit"])) {
    $timKiemString = $_POST["timKiemString"];
    $ketQuaTimKiem = $product->timKiemHang($timKiemString);
    
}
if (isset($_POST["xoaHang"])) {
    $maHang = $_POST["maHang"];
    $product->xoaHang($maHang);
}
?>

<div class="container detail">
    <div class="top">
        <h4 class="text-color"><i class="fas fa-phone"></i>QUẢN LÝ HÃNG</h4>
        <form action="" method="post">
            <input type="text" name="page" value="p" hidden>
            <input type="text" name="pg" value="1" hidden>
            <div class="input-group">
                <input type="text" name="timKiemString" class="form-control" placeholder="Tìm kiếm hãng" value="<?php if (isset($search)) echo $search ?>">
                <div class="input-group-append">
                    <button class="btn btn-color" name="submit" type="submit">
                        <i class="fa fa-search search_icon"></i>
                    </button>
                </div>
            </div>
        </form>
        <a class="btn btn-color" href="index.php?page=ba">Thêm mới</a>
    </div>

    <table class="table table-hover" style="text-align: center;">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                
                <th>Tên hãng</th>
                
                <th colspan="2"></th>
            </tr>
            <?php
            $countSTT = 1;
            // trả về arr có từ khóa tìm kiếm
            if (isset($_POST["submit"])) {
                $arr = $ketQuaTimKiem;                
            } else {
                $arr = $product->getData('hang');
            }

            foreach ($arr as $item) :

            ?>
                <form action="" method="POST">
                    <tr style="background-color: white; color: black; text-align: center;">
                        <td><?php echo $countSTT;
                            $countSTT++; ?></td>
                        
                        <td><?php echo $item['TenHang'] ?></td>
                                                
                        <td>
                            <input type="hidden" name="maHang" value="<?php echo $item['MaHang'] ?>">
                            <a class="btn btn-sm btn-secondary" href="<?php echo "index.php?page=bu&id=".$item['MaHang'] ?>">Cập nhật</a>                            
                            <button type="submit" class="btn btn-sm btn-danger" name="xoaHang">Xóa</button>
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