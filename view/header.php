<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/layout/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/layout/assets/css/iconfont.min.css">
    <link rel="stylesheet" href="view/layout/assets/css/plugins.css">
    <link rel="stylesheet" href="view/layout/assets/css/helper.css">
    <link rel="stylesheet" href="view/layout/assets/css/style.css">
    <script src="view/layout/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <?php
    // Kiểm tra nếu một phiên đã được bắt đầu trước khi gọi session_start()
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <!--Header section start-->
    <div id="main-wrapper">
        <header class="header header-transparent header-sticky">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-8 d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center">
                            <!--Links start-->
                            <div class="header-top-links">
                                <ul>
                                    <li><a href=""><i class="fa fa-phone"></i>(08) 123 456 7890</a></li>
                                    <li><a href="https://mail.google.com"><i class="fa fa-envelope-open-o"></i>yourmail@domain.com</a></li>
                                </ul>
                            </div>
                            <!--Links end-->
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="ht-right d-flex justify-content-lg-end justify-content-center">
                                <ul class="ht-us-menu d-flex">
                                    <?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])): ?>
                                    <li><a href="login.php"><i class="fa fa-user-circle-o"></i>Login</a>
                                    <ul class="ht-dropdown right">
                                            <li><a href="register.php">Sign In</a></li>
                                        </ul>
                                    <?php else: ?>
                                        <li><a href="index.php">Xin chào, <b><?php echo htmlspecialchars($_SESSION['user']); ?></b></a>
                                        <ul class="ht-dropdown right">
                                            <li><a href="index.php?pg=userinfo">My Account</a></li>
                                            <li><a href="index.php?pg=logout">Exit</a></li>
                                        </ul>    
                                    <?php endif; ?>    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="header-bottom menu-right">
                <div class="container">
                    <div class="row align-items-center">

                        <!--Logo start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-1 order-md-1 order-1">
                            <div class="logo">
                                <a href="index.php"><img style="width: 150px;" src="/Project_demo/uploads/images/1.jpg" alt="Dlow2"></a>
                            </div>
                        </div>
                        <!--Logo end-->

                        <!--Menu start-->
                        <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-3 d-flex justify-content-center">
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="index.php">Home</a>
                                    </li>
                                    <li><a href="index.php?pg=product">Product</a>
                                    </li>
                                    <li><a href="index.php?pg=blog">Blog</a>
                                    </li>
                                    <li><a href="index.php?pg=about">About Us</a></li>
                                    <li><a href="index.php?pg=contact">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <!--Search Cart Start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-3 order-md-3 order-2 d-flex justify-content-end">
                            <div class="header-search">
                                <button class="header-search-toggle"><i class="fa fa-search"></i></button>
                                <div class="header-search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Type and hit enter">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-cart">
                                <a href="index.php?pg=viewcart"><i class="fa fa-shopping-basket"></i></a>
                            </div>
                            <div class="header-cart">
                                <a href="index.php?pg=truck"><i class="fa fa-truck"></i></a>
                            </div>
                            
                        </div>
                        <!--Search Cart End-->
                    </div>

                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->
                </div>
            </div>
        </header>
    </div>
