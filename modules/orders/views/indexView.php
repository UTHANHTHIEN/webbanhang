<?php
get_header();
?>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
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
                <div class="card-body">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá trị</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_orders)) {
                                $temp = 0;
                                foreach ($list_orders as $item) {
                                    $temp++;
                            ?>
                                    <tr>
                                        <td scope="row"><?php echo $temp ?></td>
                                        <td><?php echo $item['order_code'] ?></td>

                                        <td><?php echo '0' . $item['phone_number'] ?></td>
                                        <td><?php echo $item['num_order']; ?></td>
                                        <td><?php echo currency_format($item['total_price']); ?></td>
                                        <td>
                                            <?php if ($item['status'] == 0) {
                                                echo  "<span class='badge badge-warning'> Đang xử lý</span>"; ?>
                                            <?php } else if ($item['status'] == 1) {
                                                echo  "<span class='badge badge-warning'> Đang vận chuyển</span>"; ?>
                                            <?php } else if ($item['status'] == 2) {
                                                echo  "<span class='badge badge-success'> Thành công</span>"; ?>
                                            <?php } else
                                                echo  "<span class='badge badge-danger'> Đã huỷ</span>"; ?>
                                        <td><?php echo date('d/m/Y', $item['created_at']) ?></td>
                                        <td>
                                            <a href="?mod=orders&action=detail&order_id=<?php echo $item['order_id']; ?>">Xem chi tiết</a>
                                        </td>
                                    </tr>
                        </tbody>
                <?php }
                            }
                ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>