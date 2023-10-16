<?php
session_start();

include 'layouts/header.php';

?>

<style>
    h1 {
        text-align: center;
    }
</style>

<body>
    <h1>Dental Products</h1>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'project1');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row['productName'] . "</h2>";
        echo "<img src='images/" . $row['productPicture'] . "' alt='Product Image'>";
        echo "<p>" . $row['productDescription'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<form action='cart.php' method='post' onsubmit='redirectToCart()'>";
        echo "<input type='hidden' name='productID' value='" . $row['productID'] . "'>";
        echo "<input type='submit' name='addToCart' value='Add to Cart'>";
        echo "</form>";
        echo "<hr>";
    }

    mysqli_close($conn);
    ?>

    <script>
        function redirectToCart() {
            window.location.href = "cart.php";
        }
    </script>
</body>

</html>

<?php include 'layouts/footer.php'; ?>