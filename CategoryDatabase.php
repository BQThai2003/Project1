<?php
require_once 'Connection.php';



// Hàm thực thi truy vấn SQL
function execute_query($query)
{
    // Kết nối đến CSDL
    $conn = connect();

    // Thực thi truy vấn SQL và lấy kết quả
    $result = mysqli_query($conn, $query);

    // Đóng kết nối tới CSDL
    mysqli_close($conn);

    return $result;
}

function database_getAllCategory()
{
    // Tạo truy vấn SQL
    $sql = "select * from category";

    


    // Thực thi truy vấn SQL và lấy kết quả
    $result = execute_query($sql);

    // Kiểm tra kết quả truy vấn
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        // Hiển thị dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
        
    } else {
        echo "<script>console.log('Không tìm thấy danh muc')</script>";
        
    }
    return $data;
}

function database_getProductByCategoryId($id)
{
    // Tạo truy vấn SQL
    $sql = "SELECT products.name , products.picture , products.price,products.id 
    FROM products 
    JOIN category_products ON products.id = category_products.product_id
    JOIN categories ON category_products.category_id = categories.id
    where categories.id = " . $id . "
    LIMIT 3
    ;

    ";

    // Thực thi truy vấn SQL và lấy kết quả
    $result = execute_query($sql);

    // Kiểm tra kết quả truy vấn
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        // Hiển thị dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
        
    } else {
        echo "<script>console.log('Không tìm thấy sản phẩm nào thuoc id ".$id."')</script>";
        
    }
    return $data;
}