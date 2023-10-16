<?php
include 'layouts/header.php';

session_start();
$_SESSION['Role'] = 'guest';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý yêu cầu đăng bài viết mới
if (isset($_POST['submit'])) {
    $namePost = $_POST['namePost'];
    $userName = $_POST['userName'];
    $content = $_POST['content'];

    // Xử lý ảnh
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = '../project1/images/' . $_FILES['image']['name'];
        move_uploaded_file($imageTmpName, $imagePath);
    }

    // Truy vấn INSERT để thêm bài viết mới vào bảng "posts"
    $sql = "INSERT INTO posts (namePost, userName, Content, image_path, timestamp) VALUES ('$namePost', '$userName', '$content', '$imagePath', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được đăng thành công!";
    } else {
        echo "Đăng bài viết thất bại: " . $conn->error;
    }
}

// Xử lý yêu cầu xóa bài viết
if (isset($_GET['delete'])) {
    $postId = $_GET['delete'];

    // Truy vấn DELETE để xóa bài viết theo id
    $sql = "DELETE FROM posts WHERE id = '$postId'";
    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được xóa thành công!";
    } else {
        echo "Xóa bài viết thất bại: " . $conn->error;
    }
}


// Truy vấn SELECT để lấy dữ liệu từ bảng "posts"
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<h2>' . $row["namePost"] . '</h2>';
        echo '<p>Người đăng: ' . $row["userName"] . '</p>';
        echo '<p>Nội dung: ' . $row["Content"] . '</p>';
        
        // Hiển thị thời gian đăng bài viết
        $timestamp = strtotime($row["timestamp"]);
        $formattedTimestamp = date("d/m/Y H:i", $timestamp);
        echo '<p>Thời gian đăng: ' . $formattedTimestamp . '</p>';
        
        if (!empty($row["image_path"])) {
            echo '<img src="' . $row["image_path"] . '"/>';
        }
        echo '<a href="#" class="read-more">Xem thêm</a>';
        echo '</div>';
    }
}

$conn->close();
?>
<style>
    .post {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .post h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .post p {
        margin-bottom: 10px;
    }

    .post img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
    .read-more {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<!-- Form để đăng bài viết mới -->
<form method="POST" action="" enctype="multipart/form-data">
    <label for="namePost">Tên bài viết:</label>
    <input type="text" name="namePost" id="namePost" required><br>

    <label for="userName">Người đăng:</label>
    <input type="text" name="userName" id="userName" required><br>

    <label for="content">Nội dung:</label>
    <textarea name="content" id="content" required></textarea><br>

    <label for="image">Ảnh:</label>
    <input type="file" name="image" id="image" required><br>

    <input type="submit" name="submit" value="Đăng bài">
</form>

<?php include 'layouts/footer.php'; ?>