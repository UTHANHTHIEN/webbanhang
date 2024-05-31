<?php
get_header();
load_model('index');
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nút "Đăng nhập" đã được nhấn chưa
    if (isset($_POST['login'])) {
        // Lấy dữ liệu từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra các trường có được điền đầy đủ không
        if (empty($username)) {
            $errors['username'] = "Vui lòng nhập tên người dùng.";
        }

        if (empty($password)) {
            $errors['password'] = "Vui lòng nhập mật khẩu.";
        }
        // Nếu không có lỗi, thực hiện đăng nhập
        if (empty($errors)) {
            // Mã hoá mật khẩu bằng MD5
            $hashed_password = md5($password);

            // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu

            // chưa bảo mật brute force
            $user = check_login($username, $hashed_password);
            if ($user) {
                // Đăng nhập thành công, chuyển hướng đến trang chính
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_login'] = $username;
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['user_permission'] = $user['permission'];
                if (isset($_POST['remember_me'])) {
                    setcookie('is_login', true, time() + 36000);
                    setcookie('user_login', $username, time() + 36000);
                }
                if ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '' === 'XMLHttpRequest') {
                    echo 'success';
                    die();
                }
                header("Location: index.php");
                exit();
            } else {
                if ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '' === 'XMLHttpRequest') {
                    echo 'failed';
                    die();
                }
                $errors['login'] = "Tên người dùng hoặc mật khẩu không chính xác.";
            }
        }
    }
}
?>

<div id="main-content-wp" class="home-page ">
    <div class="wp-inner">

        <div style="display: flex;justify-content: center ;align-items: center; flex-direction: column; padding: 50px 0;">
            <h1 style="text-align:center;font-size: 30px; font-weight:600">Đăng nhập</h1>
            <form method="POST" action="" style="max-width: 500px;width: 100%">
                <div class="" style="margin-bottom: 20px">
                    <label for="username">Username</label> <br>
                    <input type="text" name="username" id="username" style="  width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['username'])) echo "<p style='color:red'>" . $errors['username'] . "</p>"; ?>
                </div>
                <div class="" style="margin-bottom: 20px">
                    <label for="password">Mật khẩu</label> <br>
                    <input type="password" name="password" id="password" style=" width: 100%;
                            padding: 6px 12px;
                            border: 1px solid #cccccc;">
                    <?php if (isset($errors['password'])) echo "<p style='color:red'>" . $errors['password'] . "</p>"; ?>
                </div>
                <?php if (isset($errors['login'])) echo "<p style='color:red'>" . $errors['login'] . "</p>"; ?>
                <button type="submit" name="login" id="sm-reg" style="text-transform: uppercase;width: 100%; font-weight:600;background-color: #da1818; color:#fff ;border: none; padding:5px 0px">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>

<?php
get_footer();
?>