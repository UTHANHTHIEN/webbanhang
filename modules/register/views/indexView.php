<?php
get_header();
load_model('index');
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nút "Đăng ký" đã được nhấn chưa
    if (isset($_POST['register'])) {
        // Lấy dữ liệu từ form
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['repassword']; // Đổi tên trường thành repassword để phù hợp với form HTML

        // Kiểm tra xác nhận mật khẩu
        if ($password != $confirm_password) {
            $errors['password'] = "Mật khẩu không khớp.";
        }

        // Kiểm tra các trường có được điền đầy đủ không
        if (empty($fullname)) {
            $errors['fullname'] = "Vui lòng nhập họ và tên.";
        }

        if (empty($username)) {
            $errors['username'] = "Vui lòng nhập tên người dùng.";
        }

        if (empty($email)) {
            $errors['email'] = "Vui lòng nhập địa chỉ email.";
        }

        if (empty($password)) {
            $errors['password'] = "Vui lòng nhập mật khẩu.";
        }

        if (empty($confirm_password)) {
            $errors['repassword'] = "Vui lòng nhập lại mật khẩu.";
        }

        // Kiểm tra định dạng email hợp lệ
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không hợp lệ.";
        }

        // Kiểm tra độ dài hợp lệ của mật khẩu (ít nhất 6 ký tự)
        if (strlen($password) < 6) {
            $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
        }

        // Kiểm tra xem tên người dùng có chứa ký tự đặc biệt không
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $errors['username'] = "Tên người dùng chỉ được chứa các ký tự chữ cái và số.";
        }

        // Nếu không có lỗi, thực hiện đăng ký
        if (empty($errors)) {
            // Mã hoá mật khẩu bằng MD5
            $hashed_password = md5($password);


            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['repassword']; // Đổi tên trường thành repassword để phù hợp với form HTML

            $data_product = array(
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password,
                'permission' => "guest",
            );
            register($data_product);
            // Tạm thời hiển thị thông báo đăng ký thành công
            header("Location: index.php?mod=login&controller=index&action=index");
            exit();
        }
    }
}
?>

<div id="main-content-wp" class="home-page ">
    <div class="wp-inner">
        <div style="display: flex;justify-content: center ;align-items: center; flex-direction: column; padding: 50px 0;">
            <h1 style="text-align:center;font-size: 30px; font-weight:600">Đăng ký</h1>
            <form method="POST" action="" style="max-width: 500px;width: 100%">
                <div class="" style="margin-bottom: 20px">
                    <label for="fullname">Họ và tên</label> <br>
                    <input type="text" name="fullname" id="fullname" style="  width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['fullname'])) echo "<p style='color:red'>" . $errors['fullname'] . "</p>"; ?>
                </div>
                <div class="" style="margin-bottom: 20px">
                    <label for="username">Username</label> <br>
                    <input type="text" name="username" id="username" style="  width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['username'])) echo "<p style='color:red'>" . $errors['username'] . "</p>"; ?>
                </div>
                <div class="" style="margin-bottom: 20px">
                    <label for="email">Email</label> <br>
                    <input type="text" name="email" id="email" style="  width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['email'])) echo "<p style='color:red'>" . $errors['email'] . "</p>"; ?>
                </div>
                <div class="" style="margin-bottom: 20px">
                    <label for="password">Mật khẩu</label> <br>
                    <input type="password" name="password" id="password" style=" width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['password'])) echo "<p style='color:red'>" . $errors['password'] . "</p>"; ?>
                </div>
                <div class="" style="margin-bottom: 20px">
                    <label for="repassword">Nhập lại Mật khẩu</label> <br>
                    <input type="password" name="repassword" id="repassword" style=" width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['repassword'])) echo "<p style='color:red'>" . $errors['repassword'] . "</p>"; ?>
                </div>
                <button type="submit" name="register" id="sm-reg" style="text-transform: uppercase;width: 100%; font-weight:600;background-color: #da1818; color:#fff ;border: none; padding:5px 0px">Đăng ký</button>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>