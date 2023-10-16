<?php
session_start();

include 'layouts/header.php';

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'project1');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Xử lý khi người dùng ấn nút thanh toán
if (isset($_POST['checkout'])) {
    // Lấy thông tin khách hàng từ form
    $userName = $_POST['userName'];
    $paymentMethod = $_POST['paymentMethod'];

    // Lưu hóa đơn vào cơ sở dữ liệu
    $insertQuery = "INSERT INTO paychecks (user_name, payment_method) VALUES ('$userName', '$paymentMethod')";
    mysqli_query($conn, $insertQuery);

    // Xóa giỏ hàng sau khi thanh toán
    unset($_SESSION['cart']);

    // Hiển thị thông báo thành công
    echo "<h1>Thank you for your purchase, $userName!</h1>";
    echo "<p>Your payment method: $paymentMethod</p>";
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);

include 'layouts/footer.php';
?>