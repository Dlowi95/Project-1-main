<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Khôi phục mật khẩu
require_once 'model/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Kiểm tra token
    $userInfo = getUserByResetToken($token);
    if ($userInfo) {
        // Hiển thị form đặt lại mật khẩu
        echo '<form action="process_reset_password.php" method="post">
                  <input type="hidden" name="token" value="' . $token . '">
                  <input type="password" name="new_password" placeholder="New Password" required>
                  <button type="submit" name="submit">Reset Password</button>
              </form>';
    } else {
        echo 'Invalid token.';
    }
}
?>
