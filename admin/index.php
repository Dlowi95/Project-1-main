<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    ob_start();
    if(!isset($_SESSION['admin'])){
        header('location: login.php');
    }else{
        $user_admin=$_SESSION['user'];
        $email_admin=$_SESSION['email'];
    }

    require_once('../view/global.php');
    require_once('../model/connect.php');
    require_once('../model/product.php');
    require_once('../model/catalog.php');
    require_once('public/head.php');
    require_once('public/nav.php');
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                require_once('public/home.php');
                break;
                // Danh mục
            case 'categories':
                $tb = "";
                $cataloglist = get_catalog();
                require_once('public/categories.php');
                break;
            case 'deletedm':
                if(isset($_GET['id']) && ($_GET['id']) > 0 ){
                    $id = $_GET['id'];
                    $tb = delete_catalog($id);
                }else{
                    $tb = "";
                }
                $cataloglist = get_catalog();
                require_once('public/categories.php');
                break;
            case 'addcatalog':
                $error = "";
                $tb = "";
                if(!empty($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST['name_catalogy'];
                    insert_catalog($tenloai);
                    $tb = "Thêm thành công danh mục";
                }else{
                    $error = 'Tên danh mục không được để trống';
                }
                $cataloglist = get_catalog();
                require_once('public/categories.php');
                break;    
            case 'updatedm':
                if(isset($_GET['id']) && isset($_GET['id'])>0){
                    $id = $_GET['id'];
                    $catalogone = get_catalog_one($id);
                    require_once('public/updatedm.php');
                }else{
                    require_once('public/404.php');
                }
                break;
            case 'update_catalog':
                if(isset($_POST['btnupdate']) &&$_POST['btnupdate']){
                $id = $_POST['id'];
                $name = $_POST['name'];
                set_catalog($id,$name);
                $cataloglist = get_catalog();
                require_once('public/categories.php');
            }
                break;  
                
            // Sản phẩm
            case 'products':
                $cataloglist = get_catalog();
                $list_product = getnewproduct();
                require_once('public/products.php');
            break;  
            case 'update_product_form':
                if(isset($_GET['id']) && isset($_GET['id'])>0){
                    $cataloglist = get_catalog();
                    $id = $_GET['id'];
                    $product_one = get_product_detail($id);
                    require_once('public/update_product_form.php');
                }else{
                    require_once('public/404.php');
                } 
            break;
            case 'update_product':
                // Lấy dữ liệu từ Form
                if (isset($_POST['btnupdate'])) {
                    $id = $_POST['id'];
                    $id_catalog = $_POST['id_catalog'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $promotion = $_POST['promotion'];
                    $mota = $_POST['mota'];
                    // Lấy hình
                    $img_name = $_FILES['img']['name'];
                    if ($img_name != "") {
                        // Upload lên host
                        $target_file = "../" . PATH_IMG . basename($_FILES["img"]["name"]);
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                            // Xóa hình cũ
                            $old_img = "../" . PATH_IMG . $_POST['img_old'];
                            if (file_exists($old_img)) {
                                unlink($old_img);
                            }
                        }
                    } else {
                        $img_name = basename($_POST['img_old']);
                    }
                    update_product($id, $id_catalog, $name, $price, $img_name, $mota, $promotion);
                    $list_product = getnewproduct();
                    header("location: index.php?page=products");
                }
        
                $list_product = getnewproduct();
                require_once('public/products.php');
                break;
            case 'delete_product':
                if(isset($_GET['id']) && $_GET['id']>0){
                    $id = $_GET['id'];
                    // Kiểm tra xem sản phẩm có hình hay không? Có hình thì Xóa
                    $img_name ="../" .PATH_IMG.get_img_name($id);
                    if(file_exists($img_name)){
                        unlink($img_name);
                    }
                    // xóa trong db:
                    delete_product($id);
                    $list_product = getnewproduct();
                }
                $list_product = getnewproduct();
                header("location: index.php?page=products");
            break;  
            case 'add_product':
                // Lấy dữ liệu từ Form
                if (isset($_POST['btnadd'])) {
                    $id_catalog = $_POST['id_catalog'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $mota = $_POST['mota'];
                    $promotion = $_POST['promotion'];
                    $img_name = $_FILES['img']['name'];
                    if ($img_name != "") {
                        // Upload lên host
                        $target_file = "../" . PATH_IMG . basename($_FILES["img"]["name"]);
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    }
                    insert_product($id_catalog, $name, $price, $img_name, $mota, $promotion);
                }
                $list_product = getnewproduct();
                header("location: index.php?page=products");
                break;
            case 'users':
                require_once('public/users.php');
                break;
            default:
                require_once('public/404.php');
        }
    }else{
        require_once('public/home.php');
    }
 
    require_once('public/footer.php');
?>