<?php
get_header();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$errors = array(); // Khởi tạo mảng lỗi
function check_login($username, $password)
{
    // Sử dụng biến kết nối toàn cục
    global $conn;

    // Thực hiện truy vấn SQL
    $stmt = $conn->prepare("SELECT * FROM `tbl_users` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có dòng dữ liệu được trả về không
    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ kết quả truy vấn
        $user_data = $result->fetch_assoc();
        return $user_data; // Trả về dữ liệu người dùng nếu tìm thấy
    } else {
        return false;
    }

    // Đóng kết nối
    $stmt->close();
}

// Kiểm tra nếu có dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nút "Đổi mật khẩu" đã được nhấn chưa
    if (isset($_POST['change_password'])) {
        // Lấy dữ liệu từ form
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Kiểm tra các trường có được điền đầy đủ không
        if (empty($old_password)) {
            $errors['old_password'] = "Vui lòng nhập mật khẩu cũ.";
        }

        if (empty($new_password)) {
            $errors['new_password'] = "Vui lòng nhập mật khẩu mới.";
        }

        if (empty($confirm_password)) {
            $errors['confirm_password'] = "Vui lòng nhập lại mật khẩu mới.";
        }

        // Kiểm tra xác nhận mật khẩu mới
        if ($new_password !== $confirm_password) {
            $errors['confirm_password'] = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
        }

        // Nếu không có lỗi, thực hiện đổi mật khẩu
        if (empty($errors)) {
            // Mã hoá mật khẩu cũ
            $hashed_old_password = md5($old_password);

            // Kiểm tra mật khẩu cũ trong cơ sở dữ liệu
            $user = check_login($_SESSION['user_login'], $hashed_old_password);
            if ($user) {
                // Mật khẩu cũ hợp lệ, tiến hành cập nhật mật khẩu mới
                $hashed_new_password = md5($new_password);
                // Thực hiện cập nhật mật khẩu trong cơ sở dữ liệu
                $data_info = array(
                    "password" => $hashed_new_password,
                );

                // Thực hiện update dữ liệu vào bảng tbl_users
                $user_id = $_SESSION['user_id']; // Lấy user_id từ session

                $success = db_update('tbl_users', $data_info, "user_id = $user_id");

                if ($success) {
                    $success_message = "Đổi mật khẩu thành công.";
                } else {
                    $errors['change_password'] = "Đã xảy ra lỗi khi cập nhật mật khẩu.";
                }
            } else {
                // Mật khẩu cũ không đúng, hiển thị thông báo lỗi
                $errors['old_password'] = "Mật khẩu cũ không chính xác.";
            }
        }
    }
}
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
            <h2 style="text-align: center; font-weight: 600; font-size: 20px; margin-bottom: 20px;">Đổi mật khẩu</h2>
            <?php if (!empty($errors)) : ?>
                <div style="color: red;">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (isset($success_message)) : ?>
                <p style="color: green;"><?php echo $success_message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="custom-form-group">
                    <label for="old_password" class="custom-label">Mật khẩu cũ:</label>
                    <input type="password" id="old_password" class="custom-input " name="old_password" required>
                </div>
                <div class="custom-form-group">
                    <label for="new_password" class="custom-label">Mật khẩu mới:</label>
                    <input type="password" id="new_password" class="custom-input " name="new_password" required>
                </div>
                <div class="custom-form-group">
                    <label for="confirm_password" class="custom-label">Nhập lại mật khẩu mới:</label>
                    <input type="password" id="confirm_password" class="custom-input " name="confirm_password" required>
                </div>
                <button type="submit" class="custom-button" name="change_password">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>