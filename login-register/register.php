<?php
session_start();

// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Get the form data
if (!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['date']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['phoneNumber'])) {
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $birthdate = $_POST['date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phoneNumber = $_POST['phoneNumber'];

    // Prepare the insert statement
    $sql = "INSERT INTO users (userName, password, birthdate, gender, email,role, phoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Bind parameters to the statement
        $stmt->bind_param("sssssss", $username, $hashedPassword, $birthdate, $gender, $email, $role, $phoneNumber);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['userName'] = $username;
            echo 'Đăng ký thành công!';
            header('Location: ../homepage.php');
            exit();
        } else {
            echo 'Đăng ký không thành công!';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 'Đăng ký không thành công!';
    }
} else {
    echo "Vui lòng điền vào tên người dùng, mật khẩu, ngày sinh, giới tính, email, role và số điện thoại.";
}

// Close the connection
$conn->close();
?>