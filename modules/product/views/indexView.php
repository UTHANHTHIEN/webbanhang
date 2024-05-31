<?php
get_header();
?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <?php if (!empty($list_product)) { ?>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_product as $item) {
                                if ($item['cat_id'] == 5 || $item['parent_id'] == 1) {
                            ?>
                                    <li>
                                        <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="thumb">
                                            <img style="max-height:auto" src="admin/<?php echo $item['product_thumb']; ?>">
                                        </a>
                                        <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                                        <div class="price">
                                            <span class="new">
                                                <?php if (empty($item['price_sale'])) {
                                                    echo currency_format($item['original_price']);
                                                } else {
                                                    echo currency_format($item['price_sale']);
                                                }
                                                ?>
                                            </span>
                                            <span class="old"><?php echo currency_format($item['original_price']); ?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&action=add&product_id=<?php echo $item['product_id']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>

            <?php
            foreach ($listProductByCategory as $category) {
            ?>
                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title"><?php echo $category['name']; ?></h3>
                    </div>
                    <?php
                    if (!empty($category['data'])) {
                    ?>
                        <div class="section-detail">
                            <ul class="list-item clearfix">
                                <?php
                                foreach ($category['data'] as $item) {
                                ?>
                                    <li>
                                        <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="thumb">
                                            <img style="max-height:auto" src="admin/<?php echo $item['product_thumb']; ?>">
                                        </a>
                                        <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                                        <div class="price">
                                            <span class="new">
                                                <?php if (empty($item['price_sale'])) {
                                                    echo currency_format($item['original_price']);
                                                } else {
                                                    echo currency_format($item['price_sale']);
                                                }
                                                ?>
                                            </span>
                                            <span class="old"><?php echo currency_format($item['original_price']); ?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&action=add&product_id=<?php echo $item['product_id']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php  } ?>
                </div>
            <?php
            }
            ?>
        </div>
        <?php get_sidebar('product'); ?>
    </div>
</div>
<?php
get_footer();
?>