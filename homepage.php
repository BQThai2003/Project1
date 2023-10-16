<?php
session_start();
?>

<?php include 'layouts/header.php'; ?>
    <style>
        .service {
        display: inline-block;
        width: 20%;
        text-align: center;
        margin : 30px;
        border: 1px solid transparent; /* Thêm đường viền mặc định cho phần tử */
        transition: border-color 0.3s; 
        }
        .service:hover {
        border-color: black; /* Thay đổi màu viền khi hover qua phần tử */
        }
        .service img {
        max-width: 100%;
        height: 250px;
        }
        .service a {
        text-decoration: none;
        color: black;
         }
        .service a:hover {
        text-decoration: none;
        color: black;
        }
        .service h3 {
        font-size: 15px;
        }
        h2 {
        text-align: center;
        }   
        p {
            width: 100%; /* Đặt chiều rộng của đoạn văn bản là 100% của phần tử cha */
        max-width: 1300px; /* Đặt chiều rộng tối đa của đoạn văn bản là 800px */
        margin: 0 auto; /* Căn giữa đoạn văn bản trong phần tử cha */
        padding: 10px; /* Đặt khoảng cách giữa đoạn văn bản và viền của phần tử cha */
        box-sizing: border-box; /* Đảm bảo rằng padding không làm tăng kích thước của đoạn văn bản */
        overflow-wrap: break-word;
        }
        form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin-bottom: 20px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .notification {
    display: none;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    margin-bottom: 20px;}
    </style>
        <h2>Dịch vụ chúng tôi cung cấp</h2>
        <p>Là một trong những trung tâm nha khoa thẩm mỹ uy tín hiện nay, với tỉ lệ khách hàng truyền miệng ấn tượng, và nhận được sự tin tưởng của nhiều nghệ sĩ nổi tiếng, các doanh nhân thành đạt, hoa hậu, người mẫu và ngay cả các khách hang khó tính nhất. Đội ngũ bác sĩ King Dentist luôn kỳ công lựa chọn và tư vấn những khuôn răng phù hợp nhất với vóc dáng, kiểu tóc, nước da của khách hàng, bởi cái đẹp đâu chỉ là sự ghép nối những thứ hoàn hảo riêng rẽ mà phải là sự hài hòa đến từng chi tiết trong một tổng thể.</p>
        <div class="service">
            <a href ="../project1/service1.php">
            <img src="../project1/images/service1.jpg" alt="Dịch vụ 1">
            <h3>RĂNG SỨ J-SUBLIME</h3>
        </a>
        </div>
        
        <div class="service">
        <a href ="../project1/service2.php">
            <img src="../project1/images/service2.png" alt="Dịch vụ 2">
            <h3>RĂNG SỨ SILADENT</h3>
            </a>
        </div>
        
        <div class="service">
        <a href ="../project1/service3.php">
            <img src="../project1/images/service3.jpg" alt="Dịch vụ 3">
            <h3>RĂNG SỨ HT SMILE</h3>
            </a>
        </div>
        <div class="service">
        <a href ="../project1/service4.php">
            <img src="../project1/images/service4.jpg" alt="Dịch vụ 4">
            <h3>MẶT DÁN SỨ VENEER</h3>
            </a>
        </div>
        <div class="service">
        <a href ="../project1/service5.php">
            <img src="../project1/images/service5.jpg" alt="Dịch vụ 5">
            <h3>MẶT DÁN SỨ VENEER EMAX</h3>
            </a>
        </div>
        <div class="service">
        <a href ="../project1/service6.php">
            <img src="../project1/images/service6.jpg" alt="Dịch vụ 6">
            <h3>CHỈNH NHA KHAY INVISALIGN</h3>
            </a>
        </div>
        <div class="service">
        <a href ="../project1/service7.php">
            <img src="../project1/images/service7.jpg" alt="Dịch vụ 7">
            <h3>CHỈNH NHA MẮC CÀI SỨ</h3>
            </a>
        </div>
        <div class="service">
        <a href ="../project1/service8.php">
            <img src="../project1/images/service8.jpg" alt="Dịch vụ 8">
            <h3>CHỈNH NHA CHO TRẺ EM</h3>
    </a>
        </div>
        <h2>Đăng ký nhận tư vấn dịch vụ miễn phí</h2>

<form action="process.php" method="POST" onsubmit="showNotification(event)">
  <label for="name">Họ tên:</label>
  <input type="text" id="name" name="name" required>

  <label for="phone">Số điện thoại:</label>
  <input type="text" id="phone" name="phone" required>

  <label for="content">Nội dung cần tư vấn:</label>
  <textarea id="content" name="content" required></textarea>

  <input type="submit" value="Đăng ký">
</form>

<div id="notification" class="notification"></div>

<script>
function showNotification(event) {
    event.preventDefault();

    var form = document.querySelector("form");
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var content = document.getElementById("content").value;

    // Xử lý dữ liệu ở đây, ví dụ: gửi email thông báo tới NHA KHOA QUỐC TẾ KING DENTIST

    form.reset();

    alert("Đăng ký thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.");
}

</script>
<?php include 'layouts/footer.php'; ?>