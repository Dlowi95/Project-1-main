<?php
   extract($detail);
   if($price>0){
    $gia='<span class="price new-price">€'.$price.'</span>';
    }else{
        $gia='<span class="price new-price">Đang cập nhật</span>';
    }
    if($price2>0){
        $giacu='<span class="regular-price"><del>€'.$price2.'</del></span>';
    }else{
        $giacu='';
    }

?>
<div class="page-banner-section section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-banner text-center">
                            <h1 style="margin: 0 !important;">Sản Phẩm</h1>
                            <ul class="page-breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="index.php?pg=product">Sản phẩm</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Section Start -->
        <div class="single-product-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-lg-image-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "asNavFor": ".slider-thumbs-1",
                                "arrows": false,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }'>
                                <div class="lg-image">
                                    <img src="/Project_demo/uploads/images/product/<?=$img?>" alt="">
                                    <a href="/Project_demo/uploads/images/product/<?=$img?>" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1 tf-element-carousel" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "focusOnSelect": true,
                                "asNavFor": ".slider-lg-image-1",
                                "arrows": false,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":767, "settings": {
                                    "slidesToShow": 4
                                }},
                                {"breakpoint":479, "settings": {
                                    "slidesToShow": 2
                                }}
                            ]'>
                            </div>
                        </div>
                        <!--Product Details Left -->
                    </div>
                    <div class="col-md-7">
                        <!--Product Details Content Start-->
                        <div class="product-details-content">
                            <h2><?=$name?></h2>
                            <div class="single-product-reviews">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <a class="review-link" href="#">(1 customer review)</a>
                            </div>
                            <div class="single-product-price">
                                <?=$gia ?> <?$giacu?>
                            </div>
                            <div class="product-description">
                                <p><?=$mota?></p>
                            </div>
                            <div class="single-product-quantity">
                                <form class="add-quantity" action="#">
                                    <div class="product-quantity">
                                        <input value="1" type="number">
                                    </div>
                                    <div class="add-to-link">
                                        <button class="product-add-btn" data-text="add to cart">add to cart</button>
                                    </div>
                                </form>
                            </div>
                            <div class="wishlist-compare-btn">
                                <a href="#" class="wishlist-btn">Add to Wishlist</a>
                            </div>
                            
                            <div class="single-product-sharing">
                                <h3>Share this product</h3>
                                <ul>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Product Details Content End-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Section End -->

        <!--Product Description Review Section Start-->
        <div class="product-description-review-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-review-tab">
                            <!--Review And Description Tab Menu Start-->
                            <ul class="nav dec-and-review-menu">
                                <li>
                                    <a class="active" data-toggle="tab" href="#description">Description</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>
                            <!--Review And Description Tab Menu End-->
                            <!--Review And Description Tab Content Start-->
                            <div class="tab-content product-review-content-tab" id="myTabContent-4">
                                <div class="tab-pane fade active show" id="description">
                                    <div class="single-product-description">
                                        <p><?=$chitiet?></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews">
                                    <div class="review-page-comment">
                                        <h2>1 review for Sit voluptatem</h2>
                                        <ul>
                                            <li>
                                                <div class="product-comment">
                                                    <img src="/Project_demo/uploads/images/icons/author.jpg" alt="">
                                                    <div class="product-comment-content">
                                                        <div class="product-reviews">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <p class="meta">
                                                            <strong>admin</strong> - <span>November 22, 2018</span>
                                                        <div class="description">
                                                            <p>Good Product</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="review-form-wrapper">
                                            <div class="review-form">
                                                <span class="comment-reply-title">Add a review </span>
                                                <form action="#">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">Your email address will not be published.</span>
                                                        Required fields are marked
                                                        <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <label>Your rating</label>
                                                        <div class="rating">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="input-element">
                                                        <div class="comment-form-comment">
                                                            <label>Comment</label>
                                                            <textarea name="message" cols="40" rows="8"></textarea>
                                                        </div>
                                                        <div class="comment-submit">
                                                            <button type="submit" class="form-button">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Review And Description Tab Content End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>