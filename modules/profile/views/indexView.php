<?php
get_header();
?>
<style>
    .custom-container {
        max-width: 680px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .custom-form-group {
        margin-bottom: 20px;
    }

    .custom-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .custom-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .custom-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #0056b3;
    }
</style>
<div id="main-content-wp" class="cart-page">
    <div class="wp-inner">
        <div class="custom-container">
            <h2 style="text-align: center; font-weight: 600; font-size: 20px; margin-bottom: 20px;">Cập nhật thông tin người dùng </h2>
            <form action="?mod=profile&controller=index&action=update" method="post">
                <div class="custom-form-group">
                    <label for="fullname" class="custom-label">Họ và tên</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $data['fullname']; ?>" class="custom-input" required placeholder="Nhập họ và tên">
                </div>
                <div class="custom-form-group">
                    <label for="username" class="custom-label">Tên người dùng</label>
                    <input type="text" id="username" readonly class="custom-input " disabled value="<?php echo $data['username']; ?>" placeholder="Nhập tên người dùng">
                </div>
                <div class="custom-form-group">
                    <label for="email" class="custom-label">Địa chỉ Email</label>
                    <input type="email" id="email" readonly class="custom-input" disabled value="<?php echo $data['email']; ?>" placeholder="Nhập địa chỉ email">
                </div>
                <button type="submit" class="custom-button">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>