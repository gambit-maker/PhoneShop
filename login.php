<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css">
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?php
    // Require MySQlL Connection in functions.php



    require('functions.php');
    ?>


</head>

<?php



$maTaiKhoan = "";
$checkLogin = false;
$role = "";
if (isset($_POST["signIn"])) {
    $taiKhoan = $_POST["taiKhoan"];
    $matKhau = $_POST["matKhau"];



    $thongTinTaiKhoan = $product->getData("taikhoan");


    foreach ($thongTinTaiKhoan as $item) {
        if ($taiKhoan == $item['TenDangNhap']) {
            if ($matKhau == $item['MatKhau']) {
                $checkLogin = true;
                $maTaiKhoan = $item['MaTaiKhoan'];

                echo "Great ";
                if ($item['Admin'] == 1) {
                    echo "Admin";
                    $role = "admin";
                    header("location: admin.php ");
                } else {
                    echo "guest";
                    header("location: index.php?accountID=" . $maTaiKhoan);
                    $role = "guest";
                }
            }
        }
    }

    echo $maTaiKhoan;
} else if (isset($_POST["signUp"])) {
    $taiKhoan = $_POST["taiKhoan"];
    $matKhau = $_POST["matKhau"];
    $dienThoai = $_POST["dienThoai"];
    $diaChi = $_POST["diaChi"];

    $checkTen = true;
    foreach ($product->getData('taikhoan') as $item) {
        if ($taiKhoan == $item['TenDangNhap']) {
            $checkTen = false;
        }
    }
    if ($checkTen) {
        $account->insertAccount($taiKhoan, $matKhau, $dienThoai, $diaChi);
    }
}

?>


<body>
    <?php
    if (isset($_POST["signUp"])) {
        if ($checkTen == false) {
            echo '<script type="text/javascript">swal("User name has been used", " ", "error");</script>';
        } else {
            echo '<script>
            swal({
                title: "Account Created.",
                text: " ",
                icon: "success"
            }).then(function() {
                window.location = "login.php";
            });
</script>';
        }
    }
    ?>



    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

            <div class="login-form">
                <form action="" method="POST">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="taiKhoan" required type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="matKhau" required type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check">
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" name="signIn" class="button" value="Sign In">
                        </div>
                        <?php
                        if (isset($_POST["signIn"])) :
                            if (!$checkLogin) :
                        ?>
                                <div class="group">
                                    <!-- <h4 style="text-align: center; color: #df4759;">UserName or Password is Wrong</h4> -->
                                    <?php 
                                    echo '<script>
                                    swal({
                                        title: "Account not Valid.",
                                        text: " ",
                                        icon: "error"
                                    });
                        </script>';?>
                                </div>
                        <?php
                            endif;
                        endif;
                        ?>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Forgot Password?</a>
                        </div>
                    </div>
                </form>

                <form action="" method="POST">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="taiKhoan" type="text" required class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="matKhau" type="password" required class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Phone Number</label>
                            <input id="pass" name="dienThoai" type="text" required class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Address</label>
                            <input id="pass" name="diaChi" type="text" required class="input">
                        </div>
                        <div class="group">
                            <input type="submit" name="signUp" class="button" value="Sign Up">
                        </div>



                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

</body>

</html>