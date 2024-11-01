<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Xử lý đặt lại mật khẩu
require_once 'model/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    
    // Kiểm tra token
    $userInfo = getUserByResetToken($token);
    if ($userInfo) {
        // Cập nhật mật khẩu mới
        $updateResult = updateUserPassword($userInfo['email'], $newPassword);
        
        if ($updateResult) {
            $_SESSION['success'] = "Thay đổi mật khẩu thành công."; // Đặt session để thông báo reset thành công
            // Chuyển hướng đến trang đăng nhập
            header('Location: login.php');
            exit; // Đảm bảo dừng việc thực thi kịch bản sau khi chuyển hướng
        } else {
            $_SESSION['danger'] = 'Failed to reset password. Please try again later.';
        }
    } else {
        echo 'Invalid token.';
    }
}
?>
