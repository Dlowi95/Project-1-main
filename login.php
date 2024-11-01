<?php
session_start();
include "model/connect.php";
include "model/user.php";


$message = '';
if (isset($_GET['message']) && $_GET['message'] == 'please_login') {
    $message = "Bạn cần phải đăng nhập để tiếp tục mua hàng.";
}

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $kq = getuserinfo($user, $pass);

    if ($kq) {
        if ($kq['status'] == 1) {
            $role = $kq['role'];
            $_SESSION['role'] = $role;
            $_SESSION['user'] = $kq['user'];
            $_SESSION['iduser'] = $kq['id'];
            $_SESSION['email'] = $kq['email'];
            if ($role == 1) {
                header('Location: admin/index.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error = "Tài khoản chưa được kích hoạt. Vui lòng kiểm tra email để kích hoạt tài khoản!";
        }
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="view/layout/assets/css/bootstrap.css">
    <link rel="stylesheet" href="view/layout/assets/css/login.css">
</head>
<body>
<?php 
if (isset($_SESSION['success'])) { 
    echo "<p class='alert alert-success'>{$_SESSION['success']}</p>"; 
    unset($_SESSION['success']);
}
if (!empty($message)) { 
    echo "<p class='alert alert-info'>$message</p>"; 
}
if (isset($error)) { 
    echo "<p class='alert alert-danger'>$error</p>"; 
} 
?>
<section class="container">
    <div class="login-container">
        <div class="circle circle-one"></div>
        <div class="form-container">
            <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
            <h1 class="opacity">LOGIN</h1>
            <form action="login.php" method="post">
                <input name="user" type="text" placeholder="USERNAME" required/>
                <input name="pass" type="password" placeholder="PASSWORD" required/>
                <button class="opacity" name="login">ĐĂNG NHẬP</button>
            </form>
            <div class="register-forget opacity">
                <a href="register.php">SIGN UP</a>
                <a href="forgot.php">FORGOT PASSWORD</a>
            </div>
        </div>
        <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
</section>
<script src="view/layout/assets/js/login.js"></script>
</body>
</html>
