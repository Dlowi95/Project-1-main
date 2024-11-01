<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'model/user.php'; // Import file user.php để sử dụng các hàm xử lý người dùng
require_once 'model/send_mail.php'; // Import file send_mail.php để sử dụng hàm gửi email

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    
    // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu hay không
    $userInfo = getUserByEmail($email);
    if ($userInfo) {
        // Tạo token reset password
        $token = generateRandomString(); // Hàm này bạn cần tự triển khai để tạo chuỗi ngẫu nhiên cho token
        
        // Lưu token vào cơ sở dữ liệu
        $tokenSaved = savePasswordResetToken($userInfo['email'], $token);
        
        if ($tokenSaved) {
            // Gửi email chứa đường link reset password
            $resetLink = getBaseUrl() . '/reset_password.php?token=' . $token;
            $subject = 'Reset Password';
            $body = 'Click the link below to reset your password: <a href="' . $resetLink . '">' . $resetLink . '</a>';
            
            $sendEmailResult = sendRegistrationEmail($userInfo['email'], $userInfo['user'], $subject, $body);
            
            if ($sendEmailResult) {
                $_SESSION['success'] = "Bạn vui lòng kiểm tra email để thay đổi mật khẩu nha";
            } else {
                $_SESSION['success'] = "Hệ thống đang gặp sự cố";
            }
        } else {
            $_SESSION['danger'] = 'Failed to save password reset token.';
        }
    } else {
        $_SESSION['danger'] = 'Email not found. Please enter a valid email address.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="view/layout/assets/css/bootstrap.css">
    <link rel="stylesheet" href="view/layout/assets/css/login.css">
</head>
<body>
<?php 
if (isset($_SESSION['success'])) { 
    echo "<p class='alert alert-success'>{$_SESSION['success']}</p>"; 
    unset($_SESSION['success']);
}
if (isset($_SESSION['danger'])) { 
    echo "<p class='alert alert-danger'>{$_SESSION['danger']}</p>"; 
    unset($_SESSION['danger']);
} 
?>
<section class="container">
    <div class="login-container">
        <div class="circle circle-one"></div>
        <div class="form-container">
            <img src="https://cdn.shopify.com/s/files/1/0560/6775/2133/t/11/assets/boy-7k-x-7k-resolution-1644780928928.png?v=1644780934" alt="illustration" class="illustration" />
            <h1 class="opacity">FORGOT PASSWORD</h1>
            <form action="forgot.php" method="post">
                <input name="email" type="text" placeholder="EMAIL" required/>
                <button class="opacity" name="submit">SUBMIT</button>
            </form>
            <div class="register-forget opacity">
            <a href="login.php">LOGIN</a>
            <a href="register.php">SIGN UP</a>
            </div>
        </div>
        <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
</section>
<script src="view/layout/assets/js/login.js"></script>
</body>
</html>
