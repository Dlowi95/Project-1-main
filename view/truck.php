<?php
if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];
} else {
    echo "<p class='alert alert-danger text-center'> Vui lòng đăng nhập để xem giỏ hàng.</p>";
    exit();
}

$sql = "SELECT * FROM cart WHERE email = :email";
$params = ['email' => $user_email];
$load_cart = get_all($sql, $params);
?>

<div class="page-banner-section section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Cart Orders</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($load_cart): ?>
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
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $totalPrice = 0;
                                $i = 0;
                                foreach ($load_cart as $item) {
                                    $img = htmlspecialchars($item['img']);
                                    $name = htmlspecialchars($item['name']);
                                    $price = number_format($item['price'], 2);
                                    $quantity = intval($item['soluong']);
                                    $total = number_format($item['price'] * $quantity, 2);
                                    $totalPrice += $item['price'] * $quantity;

                                    $status = isset($item['status']) && $item['status'] == 1 ? 'Đã đặt hàng' : 'Chưa đặt hàng';

                                    echo "<tr>
                                        <td class=\"pro-thumbnail\"><a href=\"#\"><img src=\"$img\" alt=\"Product\"></a></td>
                                        <td class=\"pro-title\"><a href=\"#\">$name</a></td>
                                        <td class=\"pro-price\"><span>$$price</span></td>
                                        <td class=\"pro-quantity\"><span>$quantity</span></td>
                                        <td class=\"pro-subtotal\"><span>$$total</span></td>
                                        <td class=\"pro-status\"><span>$status</span></td>
                                    </tr>";
                                    $i++;
                                }
                        ?>
                        </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <h4 style="line-height: 45px;">Tổng:</h4>
                                    </td>
                                    <td class="text-center">
                                        <h4 style="line-height: 45px;">$<?php echo isset($totalPrice) ? number_format($totalPrice, 2) : '0.00'; ?></h4>
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kết thúc phần giỏ hàng -->
<?php else: ?>
    <div class="container">
        <h3 class="text-center alert alert-danger">Không có sản phẩm nào trong giỏ hàng.</h3>
    </div>
<?php endif; ?>

