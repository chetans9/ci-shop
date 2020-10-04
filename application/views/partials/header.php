<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/themify/themify-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/elegant-font/html-css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/animsition/css/animsition.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/libs/slick/slick.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/select2/select2.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/libs/select2/select2.min.js') ?>"></script>

    <!--===============================================================================================-->
</head>
<body class="animsition">
<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
<!--        <div class="topbar">-->
<!--            <div class="topbar-social">-->
<!--                <a href="#" class="topbar-social-item fa fa-facebook"></a>-->
<!--                <a href="#" class="topbar-social-item fa fa-instagram"></a>-->
<!--                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>-->
<!--                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>-->
<!--                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>-->
<!--            </div>-->
<!---->
<!--            <span class="topbar-child1">-->
<!--					Free shipping for standard order over RS 1000-->
<!--				</span>-->
<!---->
<!--            <div class="topbar-child2">-->
<!--					<span class="topbar-email">-->
<!--						y@example.com-->
<!--					</span>-->
<!---->
<!--                <div class="topbar-language rs1-select2">-->
<!--                    <select class="selection-1" name="time">-->
<!--                        <option>INR</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?php echo base_url() ?>" class="logo">
                <img src="<?php echo base_url('images/icons/logo.png')?>" alt="CI_Shop">
            </a>
            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="<?php echo base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/shop') ?>">Shop</a>
                        </li>

						<li>
							<a href="<?php echo base_url('index.php/contact-us') ?>">Contact Us</a>
						</li>
                        <li>
                            <a href="<?php echo base_url('index.php/about') ?>"">About</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <?php if($this->session->userdata('logged_in')) :?>
                <a href="<?php echo base_url('index.php/profile') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url() ?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>
                <span class="linedivide1"></span>
                <?php endif; ?>
                <div class="header-wrapicon2">
                    <img src="<?php echo base_url('images/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"><?php echo $this->cart->total_items() ?></span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php foreach ($this->cart->contents() as $header_cart) : ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">


                                    <img src="<?php echo (isset($header_cart['options']['product_image'])) ? product_images($header_cart['options']['product_image']) : "";  ?>" alt="IMG">
<!--									--><?php //print_r($header_cart); exit(); ?>
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url()."index.php/product/".$header_cart['id'] ?>" class="header-cart-item-name">
                                        <?php echo $header_cart['name'] ?>
                                    </a>

                                    <span class="header-cart-item-info">
											<?php echo $header_cart['qty']."x".$header_cart['price'] ?>
                                    </span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="header-cart-total">
                            Total: Rs. <?php echo number_format($this->cart->total()); ?>
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('index.php/cart') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('index.php/cart/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.html" class="logo-mobile">
            <img src="<?php echo base_url('images/icons/logo.png')?>" alt="CI_Shop">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url() ?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="<?php echo base_url('images/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti"><?php echo $this->cart->total_items() ?></span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php foreach ($this->cart->contents() as $header_cart) : ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo (isset($header_cart['options']['product_image'])) ? base_url() .thumbImage($header_cart['options']['product_image']): "";  ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url()."index.php/product/".$header_cart['id'] ?>" class="header-cart-item-name">
                                        <?php echo $header_cart['name'] ?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo   $header_cart['qty']."x".$header_cart['price'] ?>
										</span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="header-cart-total">
                            Total: Rs <?php echo $this->cart->total(); ?>
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('index.php/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>INR</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Homepage V1</a></li>
                        <li><a href="home-02.html">Homepage V2</a></li>
                        <li><a href="home-03.html">Homepage V3</a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="product.html">Shop</a>
                </li>





                <li class="item-menu-mobile">
                    <a href="about.html">About</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
