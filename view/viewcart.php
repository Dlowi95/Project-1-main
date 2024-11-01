<?php
// Kiểm tra xem session đã được khởi tạo chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Xử lý dữ liệu POST (nếu có)
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $quantity = isset($_POST['soluong']) ? $_POST['soluong'] : 1;

    // Thêm sản phẩm vào giỏ hàng trong session
    $_SESSION['giohang'][] = [
        'id' => $id,
        'name' => $name,
        'img' => $img,
        'price' => $price,
        'soluong' => $quantity,
    ];
    // Thêm thông báo thành công vào session
    $_SESSION['message'] = "Sản phẩm đã được thêm vào giỏ hàng thành công!";
}

// Hiển thị thông báo
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
?>

<div class="page-banner-section section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Shopping Cart</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bắt đầu phần giỏ hàng -->
<div class="cart-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bảng giỏ hàng -->
                <div class="cart-table table-responsive mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Hình ảnh</th>
                                <th class="pro-title">Sản phẩm</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-quantity">Số lượng</th>
                                <th class="pro-subtotal">Tổng</th>
                                <th class="pro-status">Trạng thái</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $isCartEmpty = true;
                            if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                $totalPrice = 0;
                                $i = 0;
                                $isCartEmpty = false;
                                foreach ($_SESSION['giohang'] as $item) {
                                    $img = htmlspecialchars($item['img']);
                                    $name = htmlspecialchars($item['name']);
                                    $price = number_format($item['price'], 2);
                                    $quantity = intval($item['soluong']);
                                    $total = number_format($item['price'] * $quantity, 2);
                                    $totalPrice += $item['price'] * $quantity;
                                    $linkdel = "index.php?pg=delcart&ind=" . $i;

                                    $status = isset($item['status']) && $item['status'] == 1 ? 'Đã đặt hàng' : 'Chưa đặt hàng';

                                    echo "<tr>
                                        <td class=\"pro-thumbnail\"><a href=\"#\"><img src=\"$img\" alt=\"Product\"></a></td>
                                        <td class=\"pro-title\"><a href=\"#\">$name</a></td>
                                        <td class=\"pro-price\"><span>$$price</span></td>
                                        <td class=\"pro-quantity\">
                                            <div class=\"pro-qty\"><input type=\"number\" value=\"$quantity\"></div>
                                        </td>
                                        <td class=\"pro-subtotal\"><span>$$total</span></td>
                                        <td class=\"pro-status\"><span>$status</span></td>
                                        <td class=\"pro-remove\"><a href=\"$linkdel\"><i class=\"fa fa-trash-o\"></i></a></td>
                                    </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr>
                                    <td colspan=\"7\" class=\"text-center\">Giỏ hàng của bạn đang trống</td>
                                </tr>";
                            }
                        ?>
                        </tbody>
                        
                        <?php if (!$isCartEmpty): ?>   
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <h4 style="line-height: 45px;">Tổng:</h4>
                                    </td>
                                    <td class="text-center">
                                        <h4 style="line-height: 45px;">$<?php echo isset($totalPrice) ? number_format($totalPrice, 2) : '0.00'; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <div class="cart-summary-button">
                                            <a style="color: #fff;" class="btn" href="index.php?pg=checkout">Thanh toán</a>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart-summary-button">
            <a style="color: #fff;" class="btn" href="index.php">Tiếp tục mua hàng</a>
        </div>
    </div>
</div>
<!-- Kết thúc phần giỏ hàng -->
