<?php
if (isset($_GET["id"])) {
    $hangDienThoai = $product->getData('hang');
    $maDienThoai = $_GET["id"];
    $dienThoai = $product->getProductOnly($maDienThoai);

    // lấy ảnh

    if (isset($_FILES['img'])) {
        $img = $_FILES['img']['name'];
        $target_dir = "../assets/products/";
        $target_file = $target_dir . basename($img);
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
    }

    if (isset($_POST["updateDienThoai"])) {
        $tenDienThoai = $_POST["tenSanPham"];
        $maHang = $_POST["hang"];


        //chuyển đổi đường dẫn ảnh phù hợp DB
        $imgPath = "./assets/products/" . $img;
        


        $donGia = $_POST["donGia"];
        $moTa = $_POST["moTa"];
        $soLuong = $_POST["soLuong"];

        $product->updateDienThoai($maDienThoai, $tenDienThoai, $maHang, $imgPath, $donGia, $moTa, $soLuong);

        echo '<script>
            swal({
                title: "Cập nhập thành công",
                text: " ",
                icon: "success"
            }).then(function() {
                window.location = "";
            });
            </script>';
    }
}
?>

<div class="mt-4">
    <h3 class=" text-center mb-4">- Thêm sản phẩm -</h3>
    <form action="" method="post" enctype="multipart/form-data" style="width:50%;margin-left:20%">

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tên sản phẩm: </label>
            <input required type="text" name="tenSanPham" class="form-control col-sm-8" value="<?php echo $dienThoai['TenDienThoai']; ?>">
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Hãng: </label>
            <select name="hang" class="col-sm-8 form-control" required>
                <option value="" disabled>Chọn hãng</option>

                <?php
                foreach ($hangDienThoai as $item) :


                ?>
                    <option value="<?php echo $item['MaHang']; ?>" <?php if ($item['MaHang'] == $dienThoai['MaHang']) {
                                                                        echo "selected";
                                                                    } ?>><?php echo $item['TenHang']; ?></option>
                <?php
                endforeach;
                ?>


            </select>
        </div>


        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Đơn giá: </label>
            <input required type="number" name="donGia" class="form-control col-sm-7" value="<?php echo $dienThoai['GiaTien']; ?>">
            <label class="col-sm-1 col-form-label"> VND</label>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Số lượng: </label>
            <input required type="number" name="soLuong" class="form-control col-sm-7" value="<?php echo $dienThoai['SoLuong']; ?>">
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Mô tả: </label>
            <textarea required name="moTa" id="" cols="30" rows="10" class="form-control col-sm-7"><?php echo $dienThoai['MoTa']; ?></textarea>
        </div>



        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Ảnh sản phẩm: </label>
            <div class="custom-file col-sm-8">
                <input required type="file" class="custom-file-input" name="img" id="img" accept="image/*" onchange="showPreview(event);">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo $dienThoai['img']; ?></label>
            </div>
            <!--script de hien thi ten anh-->
            <script>
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>

        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8"><img id="img_prv" <?php if (isset($dienThoai['img'])) {
                                                        echo 'src=../' . $dienThoai['img'];
                                                    } ?>></div>
        </div>

        <div class="form-group row">
            <p class="col-sm-4"></p>
            <div class="col-sm-8 pl-0 pt-3">
                <input required class="btn btn-color" type="submit" name="updateDienThoai" value="Cập nhập">
                <button class="btn btn-secondary" type="reset">Đặt lại</button>
                <a href="index.php?page=p&pg=1" class="btn btn-danger">Trở Về</a>
            </div>
        </div>

    </form>

</div>