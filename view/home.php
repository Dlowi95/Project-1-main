        <!--slider section start-->
        <div id="message"></div>
        <div class="hero-section section position-relative">
            <div class="tf-element-carousel slider-nav" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1,
                "arrows": false,
                "autoplay": true
                }}
            ]'>
                <!--Hero Item start-->
                <div class="hero-item bg-image" data-bg="/Project_demo/uploads/images/hero/hero-2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!--Hero Content start-->
                                <div class="hero-content-2 color-2">
                                    <h2>view our</h2>
                                    <h1>Women's hair</h1>
                                    <h3>Products now</h3>
                                </div>
                                <!--Hero Content end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->

                <!--Hero Item start-->
                <div class="hero-item bg-image" data-bg="/Project_demo/uploads/images/hero/hero-9.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!--Hero Content start-->
                                <div class="hero-content-2 color-2">
                                    <h2>view our</h2>
                                    <h1>Women's hair</h1>
                                    <h3>Products now</h3>
                                </div>
                                <!--Hero Content end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->
            </div>
        </div>
        <!--slider section end-->

        <!-- Feature Section Start -->
        <div class="feature-section section pt-100 pt-md-75 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30">
                            <div class="icon">
                                <i class="fa-truck fa"></i>
                            </div>
                            <div class="content">
                                <h2>Free shipping worldwide</h2>
                                <p>On order over $200</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30">
                            <div class="icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="content">
                                <h2>30 days free return</h2>
                                <p>Money back guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Faeture Start -->
                        <div class="single-feature feature-style-2 mb-30 br-0">
                            <div class="icon">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="content">
                                <h2>Member safe shopping</h2>
                                <p>Safe shopping guarantee</p>
                            </div>
                        </div>
                        <!-- Single Faeture End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Section End -->

        <!--Product section start-->
        <div class="product-section section pt-70 pt-lg-45 pt-md-40 pt-sm-30 pt-xs-15">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="product-tab-menu mb-40 mb-xs-20">
                            <ul class="nav">
                                <li><a class="active" data-toggle="tab" href="#products"> Feature Products</a></li>
                                <li><a data-toggle="tab" href="#onsale"> OnSale</a></li>
                                <li><a data-toggle="tab" href="#featureproducts"> New Products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="products">
                                <div class="row tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "rows": 2,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2,
                                "arrows": false,
                                "autoplay": true
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                                    <?php
                                        foreach ($newproduct as $item) {
                                            extract($item);
                                            if($price>0){
                                                $gia='<span class="new">€'.$price.'</span>';
                                            }else{
                                                $gia='<span class="new">Đang cập nhật</span>';
                                            }
                                            if($price2>0){
                                                $giacu='<span class="old"><del>€'.$price2.'</del></span>';
                                            }else{
                                                $giacu='';
                                            }
                                            if($promotion>0){
                                                $promo='<span class="descount-sticker">-'.$promotion.'%</span>';
                                            }else{
                                                $promo='';
                                            }
                                            if($new==1){
                                                $newlabel='<span class="sticker">New</span>';
                                            }else{
                                                $newlabel='';
                                            }

                                            $linkdetail="index.php?pg=productdetail&idproduct=".$id;

                                            if($img!="") $img =PATH_IMG.$img;
                                            echo '<div class="col-12">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product mb-30">
                                                        <div class="product-img">
                                                            <a href="'.$linkdetail.'">
                                                                <img src="'.$img.'" alt="">
                                                            </a>
                                                            '.$promo.'
                                                            '.$newlabel.'
                                                            <div class="product-action d-flex justify-content-between">
                                                            <form action="index.php?pg=addcart" method="POST" class="form-submit" >
                                                                <input type="hidden" name="id" value="'.$id.'">
                                                                <input type="hidden" name="name" value="'.$name.'">
                                                                <input type="hidden" name="img" value="'.$img.'">
                                                                <input type="hidden" name="price" value="'.$price.'">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" class="btn p-1" name="btnaddcart" value="Add to cart">
                                                            </form>
                                                                <ul class="d-flex">
                                                                    <li><a href="'.$linkdetail.'"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="'.$linkdetail.'">'.$name.'</a></h3>
                                                            <h4 class="price">'.$gia.$giacu.'</h4>
                                                        </div>
                                                    </div>
                                                    <!-- Single Product End -->
                                                </div>';
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="onsale">
                                <div class="row tf-element-carousel" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "rows": 2,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }' data-slick-responsive='[
                                    {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                    }},
                                    {"breakpoint":992, "settings": {
                                    "slidesToShow": 2
                                    }},
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 2,
                                    "arrows": false,
                                    "autoplay": true
                                    }},
                                    {"breakpoint":576, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }}
                                    ]'>
                                    <?php
                                        foreach ($saleproduct as $item) {
                                            extract($item);
                                            if($price>0){
                                                $gia='<span class="new">€'.$price.'</span>';
                                            }else{
                                                $gia='<span class="new">Đang cập nhật</span>';
                                            }
                                            if($price2>0){
                                                $giacu='<span class="old"><del>€'.$price2.'</del></span>';
                                            }else{
                                                $giacu='';
                                            }
                                            if($promotion>0){
                                                $promo='<span class="descount-sticker">-'.$promotion.'%</span>';
                                            }else{
                                                $promo='';
                                            }
                                            if($new==1){
                                                $newlabel='<span class="sticker">New</span>';
                                            }else{
                                                $newlabel='';
                                            }

                                            $linkdetail="index.php?pg=productdetail&idproduct=".$id;
                                            if($img!="") $img =PATH_IMG.$img;
                                            echo '<div class="col-12">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product mb-30">
                                                        <div class="product-img">
                                                            <a href="'.$linkdetail.'">
                                                                <img src="'.$img.'" alt="">
                                                            </a>
                                                            '.$promo.'
                                                            '.$newlabel.'
                                                            <div class="product-action d-flex justify-content-between">
                                                            <form action="index.php?pg=addcart" method="POST" class="form-submit" >
                                                                <input type="hidden" name="id" value="'.$id.'">
                                                                <input type="hidden" name="name" value="'.$name.'">
                                                                <input type="hidden" name="img" value="'.$img.'">
                                                                <input type="hidden" name="price" value="'.$price.'">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" class="btn p-1" name="btnaddcart" value="Add to cart">
                                                            </form>
                                                                <ul class="d-flex">
                                                                    <li><a href="'.$linkdetail.'"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="'.$linkdetail.'">'.$name.'</a></h3>
                                                            <h4 class="price">'.$gia.$giacu.'</h4>
                                                        </div>
                                                    </div>
                                                    <!-- Single Product End -->
                                                </div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="featureproducts">
                                <div class="row tf-element-carousel" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "rows": 2,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }' data-slick-responsive='[
                                    {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                    }},
                                    {"breakpoint":992, "settings": {
                                    "slidesToShow": 2
                                    }},
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 2,
                                    "arrows": false,
                                    "autoplay": true
                                    }},
                                    {"breakpoint":576, "settings": {
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "autoplay": true
                                    }}
                                    ]'>
                                    <?php
                                        foreach ($featureproduct as $item) {
                                            extract($item);
                                            if($price>0){
                                                $gia='<span class="new">€'.$price.'</span>';
                                            }else{
                                                $gia='<span class="new">Đang cập nhật</span>';
                                            }
                                            if($price2>0){
                                                $giacu='<span class="old"><del>€'.$price2.'</del></span>';
                                            }else{
                                                $giacu='';
                                            }
                                            if($promotion>0){
                                                $promo='<span class="descount-sticker">-'.$promotion.'%</span>';
                                            }else{
                                                $promo='';
                                            }
                                            if($new==1){
                                                $newlabel='<span class="sticker">New</span>';
                                            }else{
                                                $newlabel='';
                                            }

                                            $linkdetail="index.php?pg=productdetail&idproduct=".$id;
                                            if($img!="") $img =PATH_IMG.$img;
                                            echo '<div class="col-12">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product mb-30">
                                                        <div class="product-img">
                                                            <a href="'.$linkdetail.'">
                                                                <img src="'.$img.'" alt="">
                                                            </a>
                                                            '.$promo.'
                                                            '.$newlabel.'
                                                            <div class="product-action d-flex justify-content-between">
                                                            <form action="index.php?pg=addcart" method="POST" class="form-submit" >
                                                                <input type="hidden" name="id" value="'.$id.'">
                                                                <input type="hidden" name="name" value="'.$name.'">
                                                                <input type="hidden" name="img" value="'.$img.'">
                                                                <input type="hidden" name="price" value="'.$price.'">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" class="btn p-1" name="btnaddcart" value="Add to cart">
                                                            </form>
                                                                <ul class="d-flex">
                                                                    <li><a href="'.$linkdetail.'"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3><a href="'.$linkdetail.'">'.$name.'</a></h3>
                                                            <h4 class="price">'.$gia.$giacu.'</h4>
                                                        </div>
                                                    </div>
                                                    <!-- Single Product End -->
                                                </div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Product section end-->

        <!--Banner section start-->
        <div class="banner-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="/Project_demo/uploads/images/banner/h1-banner-1.png" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="/Project_demo/uploads/images/banner/h1-banner-2.png" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="/Project_demo/uploads/images/banner/h1-banner-3.png" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Banner section end-->