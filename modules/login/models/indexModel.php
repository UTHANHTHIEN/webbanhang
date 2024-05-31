<?php
function check_login($username, $password)
{
    // Sử dụng biến kết nối toàn cục
    global $conn;
    // Thực hiện truy vấn SQL
    // chưa bảo mật sql injection
    $stmt = $conn->prepare("SELECT * FROM `tbl_users` WHERE `username` = '".$username."' AND `password` = '".$password. "'");
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
