<?php
get_header();
?>
<style>
    .section-custom {
        width: 100%;
        max-width: 1200px;
        margin: auto;

    }

    #customers {
        border-collapse: collapse;
        width: 100%;
        max-width: 1200px;
        margin: auto;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #312af1;
        color: white;
    }
</style>
<div id="main-content-wp" class="cart-page">
    <div id="wp-content">
        <div class="container-fluid py-5">
            <div class="card">

                <table id="customers">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thông tin vân chuyển</th>
                            <th scope="col">Giá trị của sản phẩm</th>
                            <!-- <th scope="col">Trạng thái</th> -->
                            <th scope="col">Địa chỉ nhận hàng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($order_detail)) {
                            $temp = 0;
                            foreach ($order_detail as $item) {
                                $temp++;
                        ?>
                                <tr>
                                    <td scope="row"><?php echo $temp ?></td>
                                    <td><?php echo $order_info['order_code']; ?></td>
                                    <td>
                                        <img class="img-fluid" src="admin/<?php echo $item['product_thumb']; ?>" width="80" height="80" alt="">
                                    </td>
                                    <td><?php echo $item['product_name']; ?></td>
                                    <td><?php echo $item['qty_product']; ?></td>
                                    <td>
                                        <?php
                                        if ($order_info['payment_method'] == 0) {
                                            echo "Thanh toán tại nhà";
                                        } else {
                                            echo "Thanh toán tại cửa hàng";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo currency_format($item['price']); ?></td>


                                    <td> <?php echo $order_info['address'] ?> </td>

                                    <td> <?php echo currency_format($item['sub_total']) ?></td>
                                </tr>
                    </tbody>
            <?php }
                        }
            ?>
                </table><br><br>

                <?php if ($order_info['note']) { ?>
                    <div class="section-custom">
                        <p>Ghi chú của khách hàng: <strong> <?php echo $order_info['note'] ?> </Strong></h6>
                    </div>
                <?php  } ?>
                <div class="section-custom">
                    <h5 class="section-title">Giá trị đơn hàng</h5>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li class="page-item">
                                <span class="total-fee">Tổng số lượng :</span>
                                <span class=""><?php echo $order_info['num_order']; ?> sản phẩm</span>
                            </li>
                            <li class="page-item">

                                <span class="total">Tổng đơn hàng :</span>
                                <span class="text-danger"><?php echo currency_format($order_info['total_price']); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>