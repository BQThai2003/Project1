<?php
?>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="../xampp/htdocs/project1/cssbootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


<!-- Template Stylesheet -->
<link href="../xampp/htdocs/project1/style.css" rel="stylesheet">
</head>

<body ng-app="myapp" ng-controller="myctrl">
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">King Dentist</h4>
                    <a class="btn btn-link" href="../project1/homepage.php">Trang chủ</a>
                    <a class="btn btn-link" href="../project1/product.php">Sản phẩm</a>
                    <a class="btn btn-link" href="../project1/post.php">Tin tức</a>
                    <a class="btn btn-link" href="../project1/paycheck.php">Paycheck</a>
                    <a class="btn btn-link" href="../project1/aboutus.php">Về chúng tôi</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Liên hệ</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> 285 Đội Cấn,Ba Đình,Hà Nội</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> 1900 5678 </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i> kingdentist2023@gmai.com </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/king.dentist"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Thời gian làm việc</h4>
                    <h5 class="text-light fw-normal">Từ thứ 2 đến thứ 7</h5>
                    <p>9 giờ Sáng đến 9 giờ tối</p>
                    <h5 class="text-light fw-normal">Chủ nhật</h5>
                    <p>10 giờ Sáng đến 8 giờ Tối</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Châm ngôn</h4>
                    <p>Tạo nụ cười rạng rỡ cho lối sống lành mạnh!</p>
                </div>
            </div>
        </div>
        <p>© 2023 King Dentist. All rights reserved.</p>
    </div>
</body>


</html>
<?php
?>