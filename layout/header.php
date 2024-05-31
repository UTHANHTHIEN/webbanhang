<!DOCTYPE html>
<html>

<head>
    <title>LENNINLABS</title>
    <!-- <base href="http://https://ismart-php.herokuapp.com/" /> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?mod=product" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=post" title="">Blog</a>
                                </li>

                                <li>
                                    <a href="?mod=page&page_id=1" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="?mod=page" title="">Liên hệ</a>
                                </li>

                                <?php
                                // Kiểm tra xem người dùng đã đăng nhập chưa
                                if (isset($_SESSION['user_login'])) {
                                    // Nếu đã đăng nhập, hiển thị tên người dùng và nút đăng xuất
                                    echo '
                                      <li>
                                    <div class="dropdown-menu-app">
                                        <span>Tài khoản:  ' . $_SESSION['user_login'] . '</span>
                                        <div class="dropdown-content">
                                            <a href="?mod=profile&controller=index">Thông tin</a>
                                            <a href="?mod=orders">Đơn hàng đã đặt</a>
                                            <a href="?mod=change-pw">Đổi mật khẩu</a>
                                            <a href="?mod=logout&controller=index&action=logout" title="">Đăng xuất</a>
                                        </div>
                                    </div>
                                </li>';
                                } else {
                                    // Nếu chưa đăng nhập, hiển thị nút đăng nhập và đăng ký
                                    echo '<li><a href="?mod=login" title="">Đăng nhập</a></li>';
                                    echo '<li><a href="?mod=register&controller=index&action=index" title="">Đăng ký</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="?" title="" id="logo" class="fl-left"><img src="public/images/logo02.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="GET" action="">
                                <input type="hidden" name="mod" value="product">
                                <input type="hidden" name="action" value="search">
                                <input type="text" name="q" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <input type="submit" value="Tìm kiếm" id="sm-s" name="btn_search">
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <a href="tel:0345.488.608" title="" id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0345.488.608</span>
                            </a>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?mod=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num"><?php if (!empty($_SESSION['cart']['info'])) echo $_SESSION['cart']['info']['num_order'] ?></span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">

                                    <a href="?mod=cart" class=""> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    <span id="num">
                                        <?php
                                        if (!empty($_SESSION['cart']['info']))
                                            echo $_SESSION['cart']['info']['num_order'];
                                        else
                                            echo 0;
                                        ?>
                                    </span>
                                </div>
                                <?php
                                if (!empty($_SESSION['cart']['buy'])) {
                                ?>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php if (!empty($_SESSION['cart']['info']))  echo $_SESSION['cart']['info']['num_order']; ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php
                                            foreach ($_SESSION['cart']['buy'] as $item) {
                                            ?>
                                                <li class="clearfix">
                                                    <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="thumb fl-left">
                                                        <img src="admin/<?php echo $item['product_thumb']; ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                                                        <p class="price"><?php echo currency_format($item['original_price']) ?></p>
                                                        <p class="qty">Số lượng: <span><?php if (!empty($_SESSION['cart']['buy'])) echo $_SESSION['cart']['buy'][$item['product_id']]['qty']; ?></span></p>
                                                    </div>
                                                </li>
                                            <?php
                                            }

                                            ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php if (!empty($_SESSION['cart']['info'])) echo currency_format($_SESSION['cart']['info']['total']); ?></p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="?mod=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>