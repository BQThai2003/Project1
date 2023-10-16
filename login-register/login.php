<?php
//require_once 'Connection.php';
session_start();

// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "thai";
$password = "123";
$dbname = "project1";
$conn = new mysqli($servername, $username, $password, $dbname);

//Kiểm tra kết nối
if ($conn->connect_error) {
     die("Kết nối thất bại: " . $conn->connect_error);
 }

// Lấy thông tin đăng nhập
if (isset($_POST['userName']) && isset($_POST['password'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Thực hiện xử lý đăng nhập ở đây
    // ...
} else {
    echo "Vui lòng điền vào tên người dùng và mật khẩu.";
}

// Kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM users WHERE userName = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['userName'] = $username;
    header('Location: ../homepage.php'); // Chuyển hướng sang trang chủ
    exit();
} else {
    echo 'Thông tin đăng nhập không hợp lệ!';
}

$conn->close();
?>