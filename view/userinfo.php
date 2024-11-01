<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function formatPhoneNumber($phone) {
    // Nếu số điện thoại không bắt đầu bằng +84 và không bắt đầu bằng 0
    if (substr($phone, 0, 2) !== '84' && substr($phone, 0, 1) !== '0') {
        // Thêm mã quốc gia +84
        return '0' . $phone;
    }
    return $phone;
}

function savePhoneNumber($phone) {
    // Nếu số điện thoại bắt đầu bằng 0 thì bỏ 0 và thêm mã quốc gia +84
    if (substr($phone, 0, 1) === '0') {
        return '0' . substr($phone, 1);
    }
    return $phone;
}

if (isset($_POST['userinfo'])) {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';

    // Gọi hàm savePhoneNumber để định dạng số điện thoại trước khi lưu vào cơ sở dữ liệu
    $phone = savePhoneNumber($phone);

    if (isset($_SESSION['iduser'])) {
        $id_user = $_SESSION['iduser'];

        $sql = "UPDATE user SET user = :full_name, email = :email, phone = :phone, address = :address WHERE id = :id_user";
        $params = [
            ':full_name' => $full_name,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':id_user' => $id_user
        ];

        $result = update($sql, $params);

        if ($result) {
            $_SESSION['success'] = "Thông tin người dùng đã được cập nhật thành công.";
        } else {
            $_SESSION['error'] = "Cập nhật thông tin người dùng thất bại.";
        }
    } else {
        $_SESSION['error'] = "Không tìm thấy người dùng.";
    }
}

$load_user = load_user_infor($_SESSION['iduser']);
?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if ($load_user): ?>
<section>
    <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        <div class="col-lg-3 col-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                    Details</a>

                                <a href="index.php?pg=viewcart"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                                <a href="index.php?pg=contact"><i class="fa fa-map-marker"></i>
                                    address</a>

                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">

                                    <form action="" class="checkout-form" method="POST">
                                        <div class="row row-40">

                                            <div class="col-lg-7">

                                                <!-- Billing Address -->
                                                <div id="billing-form" class="mb-10">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12 mb-5">
                                                            <label>Full Name*</label>
                                                            <input type="text" name="full_name" value="<?= htmlspecialchars($load_user['user'] ?? '') ?>" placeholder="Họ và tên">
                                                        </div>
                                                        <div class="col-md-12 col-12 mb-5">
                                                            <label>Email Address*</label>
                                                            <input type="email" name="email" value="<?= htmlspecialchars($load_user['email'] ?? '') ?>" placeholder="Email">
                                                        </div>
                                                        <div class="col-md-12 col-12 mb-5">
                                                            <label>Phone*</label>
                                                            <input type="text" name="phone" value="<?= htmlspecialchars(formatPhoneNumber($load_user['phone'] ?? '')) ?>" placeholder="Số điện thoại">
                                                        </div>
                                                        <div class="col-12 mb-5">
                                                            <label>Address*</label>
                                                            <input type="text" name="address" value="<?= htmlspecialchars($load_user['address'] ?? '') ?>" placeholder="Nhập địa chỉ">
                                                        </div>
                                                        <div class="col-12 mb-5">
                                                            <button type="submit" name="userinfo" class="btn btn-lg btn-round">Lưu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
</section>
<?php else: ?>
<p>Không thể tải thông tin người dùng.</p>
<?php endif; ?>
