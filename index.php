<?php
// index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
include_once "view/global.php";
include_once "model/connect.php";
include_once "model/catalog.php";
include_once "model/product.php";
include_once "model/user.php";
include_once "model/cart.php";
include_once "view/header.php";

if (isset($_SESSION['iduser'])) {
    $id_user = $_SESSION['iduser'];
} else {
    $id_user = 0;
}

if(isset($_GET['pg']) && $_GET['pg'] != ""){
    switch ($_GET['pg']) {
        case 'product':
            if(isset($_GET['idcatalog']) && $_GET['idcatalog'] > 0){
                $idcatalog = $_GET['idcatalog'];
            } else {
                $idcatalog = 0;
            }
            $productlist = getnewproduct($idcatalog);
            $catalog_list = get_catalog();
            include_once "view/product.php";
            break;
        case 'productdetail':
            if(isset($_GET['idproduct']) && $_GET['idproduct'] > 0){
                $idproduct = $_GET['idproduct'];
                $idcatalog = get_idcatalog($idproduct);
                $detail = get_product_detail($idproduct);
                $related = get_related_product($idcatalog, $idproduct);
                include_once "view/productdetail.php";
            }
            break;
        case 'blog':
            include_once "view/blog.php";
            break;
        case 'viewcart':
            include_once "view/viewcart.php";
            break;   
        case 'delcart':
            if (isset($_GET['ind'])) {
                $index = $_GET['ind'];

                if (isset($_SESSION['giohang'][$index])) {
                    $id = $_SESSION['giohang'][$index]['id'];
                    $email = $_SESSION['email'];

                    array_splice($_SESSION['giohang'], $index, 1);

                    $sql = "DELETE FROM cart WHERE id = :id AND email = :email";
                    $params = ['id' => $id, 'email' => $email];

                    $result = update($sql, $params);

                    if ($result) {
                        echo json_encode(['success' => true, 'message' => 'Product removed from cart successfully']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to remove product from cart']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Product not found in cart']);
                }

                exit();
            }
            break;
        case 'addcart':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $soluong = 1;
                $price = $_POST['price'];

                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                } else {
                    echo json_encode(['success' => false, 'message' => 'Please login to add products to the cart']);
                    exit();
                }

                $sp = [
                    "id" => $id,
                    "img" => $img,
                    "name" => $name,
                    "price" => $price,
                    "soluong" => $soluong,
                    "status" => 0
                ];

                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = [];
                }

                $found = false;
                foreach ($_SESSION['giohang'] as &$item) {
                    if ($item['id'] == $id) {
                        $item['soluong'] += 1;
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $_SESSION['giohang'][] = $sp;
                }

                if ($found) {
                    $sql = "UPDATE cart SET soluong = soluong + 1 WHERE id = :id AND email = :email";
                    $params = [
                        'id' => $id,
                        'email' => $email
                    ];
                } else {
                    $sql = "INSERT INTO cart (id, name, img, soluong, price, email, status) VALUES (:id, :name, :img, :soluong, :price, :email, :status)";
                    $params = [
                        'id' => $id,
                        'name' => $name,
                        'img' => $img,
                        'soluong' => 1,
                        'price' => $price,
                        'email' => $email,
                        'status' => 0
                    ];
                }

                $result = update($sql, $params);

                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Product added to cart successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to add product to cart']);
                }

                exit();
            }
            break;
        case 'order':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $customer_name = $_POST['customer_name'];
                $order_date = date('Y-m-d');
                $payment_method = $_POST['payment_method'];
                $total_price = 0;

                
                foreach ($_SESSION['giohang'] as $item) {
                    $total_price += $item['price'] * $item['soluong'];
                }

                // Chèn thông tin đơn hàng vào bảng orders
                $sql = "INSERT INTO orders (customer_name, order_date, payment_method, total_price) VALUES (:customer_name, :order_date, :payment_method, :total_price)";
                $params = [
                    'customer_name' => $customer_name,
                    'order_date' => $order_date,
                    'payment_method' => $payment_method,
                    'total_price' => $total_price
                ];

                $order_id = insert($sql, $params);

                // Chèn chi tiết đơn hàng vào bảng order_details
                foreach ($_SESSION['giohang'] as $item) {
                    $sql = "INSERT INTO order_details (order_id, product_id, product_name, quantity, price) VALUES (:order_id, :product_id, :product_name, :quantity, :price)";
                    $params = [
                        'order_id' => $order_id,
                        'product_id' => $item['id'],
                        'product_name' => $item['name'],
                        'quantity' => $item['soluong'],
                        'price' => $item['price']
                    ];
                    insert($sql, $params);
                }

                // Cập nhật trạng thái giỏ hàng
                $email = $_SESSION['email'];
                $sql = "UPDATE cart SET status = 1 WHERE email = :email AND status = 0";
                $params = ['email' => $email];
                update($sql, $params);

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['giohang']);

                echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
                exit();
            }
            break;       
        case 'contact':
            include_once "view/contact.php";
            break;
        case 'about':
            include_once "view/about.php";
            break;
        case 'userinfo':
            $load_user = load_user_infor($id_user);
            include 'view/userinfo.php';
            break;
        case 'checkout':
            $load_user = load_user_infor($id_user);
            include 'view/checkout.php';
            break;   
        case 'truck':
           
            include 'view/truck.php';
            break;     
        case 'logout':
            session_destroy();
            header('Location: index.php');
            break;   
        default:
            $newproduct = getnewproduct();
            $saleproduct = getsaleproduct();
            $featureproduct = getfeatureproduct();
            $viewproduct = getviewproduct();
            include_once "view/home.php";
            break;
    }
} else {
    $newproduct = getnewproduct();
    $saleproduct = getsaleproduct();
    $featureproduct = getfeatureproduct();
    $viewproduct = getviewproduct();
    include_once "view/home.php";
}

include_once "view/footer.php";
?>
