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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Template Stylesheet -->
<link href="../xampp/htdocs/project1/style.css" rel="stylesheet">
<style>
.navbar-nav a {
        margin-right: 30px;
        font-size: 20px;
    }
    </style>
</head>

<body ng-app="myapp" ng-controller="myctrl">
<div class="container-fluid position-relative p-0">
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-solid fa-tooth"></i></i> King Dentist</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="../project1/homepage.php" class="{{ activeLink('/') }}">Trang chủ</a>
                    <a href="../project1/product.php" class="{{ activeLink('/products') }}">Sản phẩm</a>
                    <a href="../project1/post.php" class="{{ activeLink('/post') }}">Tin tức</a>
                    <a href="../project1/paycheck.php" class="{{ activeLink('/diseases') }}">Paycheck</a>
                    <a href="../project1/aboutus.php" class="{{ activeLink('/about') }}">Về chúng tôi</a>
                    <a href="../project1/cart.php"><i class="fas fa-shopping-cart"></i></a>
                    
                </div>
            </div>
        </nav>
    </div>
</div>
</body>
<?php
?>