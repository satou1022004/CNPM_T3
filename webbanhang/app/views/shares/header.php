<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phòng khách sạn</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Background mùa hè */
        body {
            background: url('https://wallpapercave.com/wp/wp13146270.jpg') no-repeat center center/cover; /* Hình nền mùa hè */
            color: white;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow-y: auto; /* Cho phép cuộn xuống */
        }

        /* Navbar với phong cách mùa hè */
        .navbar {
            background: rgba(255, 223, 0, 0.8); /* Màu vàng tươi cho navbar */
            padding: 15px;
            box-shadow: 0 0 15px rgba(255, 255, 0, 0.7); /* Bóng vàng */
        }

        .navbar-brand, .nav-link {
            color: #2e8b57 !important; /* Màu xanh lá cây */
            font-size: 1.2rem;
            font-weight: bold;
        }

        .nav-link:hover {
            text-shadow: 0 0 10px #ff6347; /* Màu cam khi hover */
        }

        /* Icon với màu sắc tươi mát */
        .ghost-icon {
            margin-right: 5px;
            color: #ff6347; /* Màu cam */
        }

        /* Container với nền nhẹ, phù hợp với mùa hè */
        .container {
            background: rgba(255, 255, 255, 0.8); /* Nền trắng nhẹ, giúp làm nổi bật nội dung */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 165, 0, 0.5); /* Bóng cam nhẹ */
        }

        /* Thẻ sản phẩm */
        .product-card {
            animation: fadeIn 0.5s ease-in;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        /* Thẻ sản phẩm khi hover */
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Container hình ảnh */
        .image-container {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            overflow: hidden;
            background-color: #f0e68c; /* Màu vàng sáng cho nền hình ảnh */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px 8px 0 0;
            position: relative;
        }

        /* Hiệu ứng hover cho hình ảnh */
        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        /* Nội dung card */
        .card-body {
            padding: 12px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.9rem;
        }

        /* Footer card */
        .card-footer {
            padding: 10px;
            background-color: #ffffff !important;
            border-top: 1px solid #f1f1f1;
        }

        /* Nút button */
        .btn-primary {
            background-color: #00bfff !important; /* Màu xanh biển */
            border-color: #00bfff !important;
        }

        .btn-primary:hover {
            background-color: #0077b3 !important; /* Màu xanh biển đậm khi hover */
        }

        .btn-success {
            background-color: #32cd32 !important; /* Màu xanh lá cây */
            border-color: #32cd32 !important;
        }

        .btn-success:hover {
            background-color: #228b22 !important; /* Màu xanh lá cây đậm */
        }

        .btn-warning {
            background-color: #ffcc00 !important; /* Màu vàng tươi */
            border-color: #ffcc00 !important;
        }

        .btn-warning:hover {
            background-color: #ff9900 !important; /* Màu vàng đậm */
        }

        .btn-danger {
            background-color: #ff4500 !important; /* Màu cam */
            border-color: #ff4500 !important;
        }

        .btn-danger:hover {
            background-color: #d43f00 !important; /* Màu cam đậm */
        }

        .btn-light {
            background-color: #fff !important; /* Nút màu sáng */
            border-color: #fff !important;
        }

        .btn-light:hover {
            background-color: #f1f1f1 !important; /* Nút sáng đậm khi hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-sun ghost-icon"></i>Quản lý phòng khách sạn</a> <!-- Icon mặt trời cho mùa hè -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/"><i class="fas fa-box ghost-icon"></i>Danh sách phòng của chúng tôi</a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/add"><i class="fas fa-plus-circle ghost-icon"></i>Thêm phòng</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php if (SessionHelper::isLoggedIn()) {
                            echo "<a class='nav-link'><i class='fas fa-user ghost-icon'></i>" . htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")</a>";
                        } else {
                            echo "<a class='nav-link' href='/webbanhang/account/login'><i class='fas fa-sign-in-alt ghost-icon'></i>Đăng nhập</a>";
                        } ?>
                    </li>
                    <li class="nav-item">
                        <?php if (SessionHelper::isLoggedIn()) {
                            echo "<a class='nav-link' href='/webbanhang/account/logout'><i class='fas fa-sign-out-alt ghost-icon'></i>Đăng xuất</a>";
                        } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Nội dung sản phẩm sẽ được hiển thị ở đây -->
    </div>
</body>
</html>
