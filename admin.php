<?php
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header('Location: product.php');
    exit();
}

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'dental_products');

// Xử lý yêu cầu thêm sản phẩm
if (isset($_POST['add_product'])) {
    $productName = $_POST['productName'];
    $productPicture = $_POST['productPicture'];
    $productDescription = $_POST['productDescription'];
    $price = $_POST['price'];

    $query = "INSERT INTO products (productName, productPicture, productDescription, price) VALUES ('$productName', '$productPicture', '$productDescription', '$price')";
    mysqli_query($conn, $query);
}

// Xử lý yêu cầu xóa sản phẩm
if (isset($_GET['delete_product'])) {
    $productID = $_GET['delete_product'];

    $query = "DELETE FROM products WHERE productID = $productID";
    mysqli_query($conn, $query);
}

// Lấy danh sách sản phẩm
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Dental Products</title>
</head>
<body>
    <h1>Admin - Dental Products</h1>

    <h2>Add Product</h2>
    <form method="POST" action="">
        <input type="text" name="productName" placeholder="Product Name" required><br>
        <input type="text" name="productPicture" placeholder="Product Picture" required><br>
        <textarea name="productDescription" placeholder="Product Description" required></textarea><br>
        <input type="number" name="price" placeholder="Price" step="0.01" required><br>
        <input type="submit" name="add_product" value="Add Product">
    </form>

    <h2>Product List</h2>
    <?php
    // Hiển thị danh sách sản phẩm
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h3>" . $row['productName'] . "</h3>";
        echo "<img src='" . $row['productPicture'] . "' alt='Product Image'>";
        echo "<p>" . $row['productDescription'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<a href='admin.php?delete_product=" . $row['productID'] . "'>Delete</a>";
        echo "<hr>";
    }
    ?>

    <br>
    <a href="product.php">Back to Home</a>
</body>
</html>