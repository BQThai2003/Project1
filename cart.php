<?php
session_start();

include 'layouts/header.php';

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'project1');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['addToCart'])) {
    $productID = $_POST['productID'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
    $isProductExist = false;

    foreach ($_SESSION['cart'] as $product) {
        if ($product['productID'] == $productID) {
            $isProductExist = true;
            break;
        }
    }

    if (!$isProductExist) {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $query = "SELECT * FROM products WHERE productID = $productID";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);

        // Thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][] = $product;

        // Thêm sản phẩm vào cơ sở dữ liệu
        $insertQuery = "INSERT INTO cart_items (product_id, product_name, product_price, product_quantity) VALUES ({$product['productID']}, '{$product['productName']}', {$product['price']}, 1)";
        mysqli_query($conn, $insertQuery);
    }
}

// Hiển thị giỏ hàng
echo "<h1>Cart</h1>";

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $product) {
        echo "<h2>" . $product['productName'] . "</h2>";
        echo "<img src='images/" . $product['productPicture'] . "' alt='Product Image' class='product-image'>";
        echo "<p>" . $product['productDescription'] . "</p>";
        echo "<p>Giá: $" . $product['price'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>Your cart is empty.</p>";
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);

?>

<form action="paycheck.php" method="post">
    <input type="text" name="userName" placeholder="Your Name" required>
    <select name="paymentMethod" required>
        <option value="cash">Cash</option>
        <option value="card">Card/ATM</option>
    </select>
    <input type="submit" name="checkout" value="Checkout">
</form>

<a href="product.php">Quay lại Sản phẩm</a>
</body>

</html>

<?php include 'layouts/footer.php'; ?>