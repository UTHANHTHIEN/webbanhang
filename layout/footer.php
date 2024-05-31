<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">LENNINLABS</h3>
                <p class="desc">LENNINLABS luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p>12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành phố Hồ Chí Minh </p>
                    </li>
                    <li>
                        <p>0345488608-</p>
                    </li>
                    <li>
                        <p>uthanhthien2611@gmail.com</p>
                        <p>tranthanhtuyen15092002@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách mua hàng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Quy định - chính sách</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách bảo hành - đổi trả</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách hội viện</a>
                    </li>
                    <li>
                        <a href="" title="">Giao hàng - lắp đặt</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© U THANH THIỆN  | 20081811  </p>
            <p id="copyright">© TRẦN THỊ THANH TUYỀN  | 20116741 </p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    <a href="?page=home" title="" class="logo">Lenninlab</a>
    <div id="menu-respon-wp">
        <ul class="" id="main-menu-respon">
            <li>
                <a href="?" title>Trang chủ</a>
            </li>
            <?php
                    foreach ($list_category as $item) {
                        if ($item['parent_id'] == 0) {
                    ?>
                <li>
                    <a href="?mod=product&action=cat_product&cat_id=<?php echo $item['cat_id'] ?>" title=""><?php echo $item['cat_title'] ?></a>
                    <?php
                    if ($item['is_child'] == 1) {
                    ?>
                        <ul class="sub-menu">
                            <?php
                            foreach ($list_category as $item2) {
                                if ($item2['parent_id'] == $item['cat_id']) {
                            ?>
                                    <li>
                                        <a href="?mod=product&action=cat_product&cat_id=<?php echo $item2['cat_id']; ?>" title=""><?php echo $item2['cat_title'] ?></a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </li>
            <?php
            }
        }
            ?>
            
            <li>
                <a href="?mod=post" title>Blog</a>
            </li>
            <li>
                <a href="?mod=page&page_id=1" title>Giới thiệu</a>
            </li>
            <li>
                <a href="?mod=page&page_id=4" title>Liên hệ</a>
            </li>
        </ul>
    </div>
</div>
<div id="btn-top"><img src="public/images/icon-to-top.png" alt="" /></div>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>