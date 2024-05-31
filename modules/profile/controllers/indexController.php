<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function construct()
{
    load_model('index');
}

function indexAction()
{
    $data = [
        "fullname" => $_SESSION['fullname'],
        "username" => $_SESSION['user_login'],
        "email" => $_SESSION['user_email'],
    ];
    load_view('index', $data);
}


function updateAction()
{
    $message = ""; // Khởi tạo thông báo rỗng

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu từ form cập nhật
        $fullname = $_POST['fullname'];

        // Thực hiện kết nối đến cơ sở dữ liệu và cập nhật thông tin người dùng
        // Cập nhật thành công
        $data_info = array(
            "fullname" => $fullname,
        );

        // Thực hiện update dữ liệu vào bảng tbl_users
        $user_id = $_SESSION['user_id']; // Lấy user_id từ session

        $update_result = db_update('tbl_users', $data_info, "user_id = $user_id");

        if ($update_result) {
            // Nếu cập nhật thành công, cập nhật lại thông tin trong session
            $_SESSION['fullname'] = $fullname;
            $message = "Cập nhật thông tin người dùng thành công";
        } else {
            // Nếu cập nhật thất bại, hiển thị thông báo lỗi
            $message = "Có lỗi xảy ra trong quá trình cập nhật thông tin người dùng";
        }
    }

    // Truyền thông báo vào view
    $data = [
        "fullname" => $_SESSION['fullname'],
        "username" => $_SESSION['user_login'],
        "email" => $_SESSION['user_email'],
        "message" => $message // Truyền thông báo vào view
    ];
    load_view('index', $data);
}
