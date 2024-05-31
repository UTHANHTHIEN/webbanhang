<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <?php
        if (!empty($list_category)) {
        ?>
            <div class="secion-detail">
                <ul class="list-item">
                    <?php
                    foreach ($list_category as $item) {
                        if ($item['parent_id'] == 0) {
                    ?>
                            <li>
                                <a href="?mod=product&action=cat_product&cat_id=<?php echo $item['cat_id'] ?>" title="" style="text-transform: uppercase"><?php echo $item['cat_title'] ?></a>
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
                </ul>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <?php
        if (!empty($list_product)) {
        ?>
            <div class="section-detail">
                <ul class="list-item">
                    <?php
                    foreach ($list_product as $item) {
                        if ($item['product_selling'] == 1) {
                    ?>
                            <li class="clearfix">
                                <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title=" <?php echo $item['product_name']; ?>" class="thumb fl-left">
                                    <img src="admin/<?php echo $item['product_thumb'] ?>" alt="">
                                </a>
                                <div class="info fl-right">
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
                                    <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id']; ?>" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>
                    <?php }
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>