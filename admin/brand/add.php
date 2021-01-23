<?php 
    if (isset($_POST["submit"])) {
        $tenHang = $_POST["tenHang"];
        $product->themHang($tenHang);
        
    }
?>

<div class="mt-4">
    <h3 class=" text-center mb-4">- Thêm Hãng -</h3>
    <form action="" method="post" enctype="multipart/form-data" style="width:50%;margin-left:20%">

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tên hãng: </label>
            <input required type="text" name="tenHang" class="form-control col-sm-8">
        </div>                                    

        <div class="form-group row">
            <p class="col-sm-4"></p>
            <div class="col-sm-8 pl-0 pt-3">
                <input required class="btn btn-color" type="submit" name="submit" value="Thêm">                
                <a href="index.php?page=b" class="btn btn-danger">Trở Về</a>
            </div>
        </div>

    </form>

</div>