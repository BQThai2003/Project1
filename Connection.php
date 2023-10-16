<?php
function connect(){
    $host = "localhost";
    $username = "thai";
    $password = "123";
    $dbname = "project1";

    // Kết nối đến CSDL
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    return $conn;

}

?>
