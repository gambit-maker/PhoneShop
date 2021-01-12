<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css">
    <?php
    // Require MySQlL Connection in functions.php
    require('functions.php');
    ?>
</head>
<?php
if (isset($_POST["signIn"])) {
    $taiKhoan = $_POST["taiKhoan"];
    $matKhau = $_POST["matKhau"];

    $foundAccount = false;
    $checkPassword = false;

    $thongTinTaiKhoan = $product->getData("taikhoan");
    foreach ($thongTinTaiKhoan as $item) {
        if ($taiKhoan == $item['TenDangNhap']) {
            $foundAccount = true;
            if ($matKhau == $item['MatKhau']) {
                $checkPassword = true;
                echo "Great ";                
                if ($item['Admin'] == 1) {
                    echo "Admin";
                } else {
                    echo "guest";
                }
            }
        }
    }
}
?>

<body>
    <form action="" method="post">
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="taiKhoan" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="matKhau" type="password" class="input" data-type="password">
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
                            if (!$foundAccount) :
                        ?>
                                <div class="group">
                                    <h4 style="text-align: center; color: #df4759;">Account Not Found</h4>
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
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" name="signUp" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>