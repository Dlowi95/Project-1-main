<?php
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

if ($load_user): ?>
<div class="page-banner-section section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h1>Check Out</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Check out</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout section start-->
<div class="checkout-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form Start-->
                <form action="index.php?pg=order" method="post" class="checkout-form">
                    <div class="row row-40">
                        <div class="col-lg-7">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-10">
                                <h4><i class="fa fa-address-card"></i><b> Billing Address </b></h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Họ và tên*</label>
                                        <input type="text" name="customer_name" value="<?= htmlspecialchars($load_user['user'] ?? '') ?>" placeholder="Họ và tên" required>
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Email Address*</label>
                                        <input type="email" name="email" value="<?= htmlspecialchars($load_user['email'] ?? '') ?>" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Phone no*</label>
                                        <input type="text" name="phone" value="<?= htmlspecialchars(formatPhoneNumber($load_user['phone'] ?? '')) ?>" placeholder="Số điện thoại" required>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label>Address*</label>
                                        <input type="text" name="address" value="<?= htmlspecialchars($load_user['address'] ?? '') ?>" placeholder="Nhập địa chỉ" required>
                                    </div>
                                    <?php else: ?>
                                    <p>Không thể tải thông tin người dùng.</p>
                                    <?php endif; ?>
                                    <div class="col-12 mb-5">
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Ship to Different Address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div id="shipping-form">
                                <h4><i class="fa fa-shipping-fast"></i> <b>Shipping Address </b> </h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Họ và tên*</label>
                                        <input type="text" name="shipping_name" placeholder="Họ và tên">
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Email Address*</label>
                                        <input type="email" name="shipping_email" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 col-12 mb-5">
                                        <label>Phone no*</label>
                                        <input type="text" name="shipping_phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label>Address*</label>
                                        <input type="text" name="shipping_address" placeholder="Nhập địa chỉ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12 mb-60">
                                    <h4 class="title-checkout"><i class="fa fa-shopping-cart"></i> <b>Cart Total</b></h4>
                                    <div class="checkout-cart-total">
                                        <h4>Product <span>Total</span></h4>
                                        <ul>
                                        <?php
                                        if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                            $totalPrice = 0;
                                            foreach ($_SESSION['giohang'] as $item) {
                                                $name = htmlspecialchars($item['name']);
                                                $quantity = intval($item['soluong']);
                                                $price = number_format($item['price'], 2);
                                                $total = number_format($item['price'] * $quantity, 2);
                                                $totalPrice += $item['price'] * $quantity;
                                                echo "<li>$name x $quantity <span>$$total</span></li>";
                                            }
                                            echo "</ul>";
                                            
                                            echo "<h4>Grand Total <span>$" . number_format($totalPrice, 2) . "</span></h4>";
                                        } else {
                                            echo "<li>Giỏ hàng của bạn đang trống</li>";
                                            echo "</ul>";
                                            echo "<p>Sub Total <span>$0.00</span></p>";
                                            echo "<h4>Grand Total <span>$0.00</span></h4>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Payment Method -->
                                <div class="col-12 mb-30">
                                    <h4 class="title-checkout"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> <b>Payment Method</b></h4>
                                    <div class="checkout-payment-method">
                                        <div class="single-method">
                                            <input type="radio" id="payment_check" name="payment_method" value="Check Payment">
                                            <label for="payment_check">Check Payment</label>
                                            <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment_method" value="Direct Bank Transfer">
                                            <label for="payment_bank">Direct Bank Transfer</label>
                                            <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment_method" value="Cash on Delivery">
                                            <label for="payment_cash">Cash on Delivery</label>
                                            <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <div class="single-method">
                                            <input type="radio" id="payment_paypal" name="payment_method" value="Paypal">
                                            <label for="payment_paypal">Paypal</label>
                                            <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        <hr class="p-1 bg-white">
                                        <div class="single-method">
                                            <input type="checkbox" id="accept_terms" required>
                                            <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="place-order btn btn-lg btn-round">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Checkout Form End-->
            </div>
        </div>
    </div>
</div>
<!--Checkout section end-->
