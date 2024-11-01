<?php
include "model/connect.php";
include "model/user.php";

if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
    $kq = activateUser($email);
    if ($kq) {
        echo "Tài khoản của bạn đã được kích hoạt thành công. Vui lòng <a href='http://localhost/Project_demo/login.php'>đăng nhập</a>.";
    } else {
        echo "Kích hoạt tài khoản thất bại. Vui lòng thử lại.";
    }
}
?>
