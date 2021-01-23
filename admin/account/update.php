<?php
if (isset($_GET["id"])) {
    $accountID = $_GET["id"];
    $accountItem = $account->getAccountOnlly($accountID);  
    if (isset($_POST["updateAccount"])) {
        $tenDangNhap = $_POST["tenDangNhap"];
        $matKhau = $_POST["matKhau"];
        $dienThoai = $_POST["dienThoai"];
        $diaChi = $_POST["diaChi"];
        $chucVu = $_POST["chucVu"];

        
        // echo $tenDangNhap." ".$matKhau." ".$dienThoai." ".$diaChi." ".$chucVu;


        $account->updateAccount($accountID,$tenDangNhap,$matKhau,$chucVu,$dienThoai,$diaChi);

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
    <h3 class=" text-center mb-4">- CẬP NHẬP TÀI KHOẢN -</h3>
    <form action="" method="post" enctype="multipart/form-data" style="width:50%;margin-left:20%">

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tên đăng nhập: </label>
            <input required type="text" name="tenDangNhap" class="form-control col-sm-8" value="<?php echo $accountItem['TenDangNhap']; ?>">
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Mật khẩu: </label>
            <input required type="text" name="matKhau" class="form-control col-sm-8" value="<?php echo $accountItem['MatKhau']; ?>">
        </div>


        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Điện thoại: </label>
            <input required type="text" name="dienThoai" class="form-control col-sm-8" value="<?php echo $accountItem['DienThoai']; ?>">
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Địa chỉ: </label>
            <input required type="text" name="diaChi" class="form-control col-sm-8" value="<?php echo $accountItem['DiaChi']; ?>">
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Chức vụ: </label>
            <select name="chucVu" class="col-sm-8 form-control" required>
                <option value="" disabled>Chọn chức vụ</option>

                <option value="1" <?php if ($accountItem['Admin'] == 1) {
                    echo 'selected';
                } ?>>Admin</option>
                <option value="0" <?php if ($accountItem['Admin'] == 0) {
                    echo 'selected';
                } ?>>Khách hàng</option>


            </select>

        </div>


        

        <div class="form-group row">
            <p class="col-sm-4"></p>
            <div class="col-sm-8 pl-0 pt-3">
                <input required class="btn btn-color" type="submit" name="updateAccount" value="Cập nhập">
                <button class="btn btn-secondary" type="reset">Đặt lại</button>
                <a href="index.php?page=a" class="btn btn-danger">Trở Về</a>
            </div>
        </div>

    </form>

</div>