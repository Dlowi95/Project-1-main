<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "model/connect.php";
include "model/user.php";
include "model/send_mail.php";

if (isset($_POST['register'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Validate input
    if (strlen($user) < 5 || strlen($pass) < 5) {
        $error = "Tên người dùng và mật khẩu phải có ít nhất 5 ký tự!";
    } else {
        $kq = createUser($user, $email, $pass);
        if ($kq) {
            // Generate activation link
            $activationLink = "http://localhost/Project_demo/activate.php?email=" . urlencode($email);

            // Send registration email
            $subject = "Đăng ký tài khoản thành công";
            $body = "Xin chào $user,<br><br>Bạn đã đăng ký tài khoản thành công. Vui lòng <a href='$activationLink'>kích hoạt tài khoản</a> để sử dụng dịch vụ của chúng tôi.<br><br>Trân trọng,<br>Cửa hàng mỹ phẩm";
            if (sendRegistrationEmail($email, $user, $subject, $body)) {
                $_SESSION['success'] = "Đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản!";
            } else {
                $_SESSION['success'] = "Đăng ký thành công. Nhưng không thể gửi email kích hoạt!";
            }
            header('Location: login.php');
            exit();
        } else {
            $error = "Đăng ký thất bại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="view/layout/assets/css/bootstrap.css">
    <link rel="stylesheet" href="view/layout/assets/css/login.css">
</head>
<body>
<?php if (isset($error)) { echo "<p class='alert alert-danger'>$error</p>"; } ?>
<section class="container">
    <div class="login-container">
        <div class="circle circle-one"></div>
        <div class="form-container">
            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/girl-doing-selfie-with-smartphone-10278613-8470252.png" alt="illustration" class="illustration" />
            <h1 class="opacity">SIGN UP</h1>
            <form action="register.php" method="post" onsubmit="return validateForm()">
                <input name="user" id="user" type="text" placeholder="USERNAME" required/>
                <input name="email" type="email" placeholder="EMAIL" />
                <input name="pass" id="pass" type="password" placeholder="PASSWORD" required/>
                <button class="opacity" name="register">ĐĂNG KÝ</button>
            </form>
            <div class="register-forget opacity">
                <a href="login.php">LOGIN</a>
                <a href="forgot.php">FORGOT PASSWORD</a>
            </div>
        </div>
        <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
</section>
<script src="view/layout/assets/js/login.js"></script>
<script>
function validateForm() {
    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;

    if (user.length < 5 || pass.length < 5) {
        alert('Tên người dùng và mật khẩu phải có ít nhất 5 ký tự!');
        return false;
    }
    return true;
}
</script>
</body>
</html>
