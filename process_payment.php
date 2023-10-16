<?php
   // Kết nối tới cơ sở dữ liệu
   $conn = new mysqli("localhost", "root", "", "project1");
   
   // Lấy giá trị payID từ form
   $payID = $_POST["payID"];
   
   // Thực hiện xử lý thanh toán, ví dụ: cập nhật trạng thái thanh toán thành đã thanh toán
   $query = "UPDATE paycheck SET status = 'Paid' WHERE payID = $payID";
   $conn->query($query);
   if ($payment_success) {
    echo "Thanh toán thành công!";
    } else {
    echo "Thanh toán thất bại!";
    }
   
   // Đóng kết nối cơ sở dữ liệu
   $conn->close();
   
   // Chuyển hướng người dùng đến trang thành công hoặc trang khác tùy ý
   header("Location: paycheck.php");
   exit();
?>