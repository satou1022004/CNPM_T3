<?php include 'app/views/shares/header.php'; ?>

<style>
    /* CSS giữ nguyên như trước */
    .product-card {
        animation: fadeIn 0.5s ease-in;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px; /* Đổi bo góc cho card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ánh sáng nhẹ xung quanh card */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Đảm bảo card có chiều cao đầy đủ */
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Điều chỉnh độ cao và chiều rộng cho ảnh vuông, không bị vỡ hình */
    .image-container {
        width: 100%; /* Đảm bảo chiều rộng bằng 100% của card */
        height: 0;
        padding-bottom: 100%; /* Tạo khung vuông */
        overflow: hidden;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px 8px 0 0; /* Bo góc trên cho ảnh */
        position: relative;
    }

    .card-img-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Đảm bảo ảnh phủ đầy khung mà không bị vỡ hình */
        object-position: center; /* Đảm bảo ảnh được căn giữa trong khung */
        transition: transform 0.3s ease;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }

    /* Giảm padding cho nội dung */
    .card-body {
        padding: 12px; /* Giảm padding bên trong card */
    }

    /* Điều chỉnh font và khoảng cách cho tiêu đề và mô tả */
    .card-title {
        font-size: 1.1rem; /* Giảm kích thước font của tiêu đề */
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem; /* Giảm kích thước font cho mô tả */
    }

    /* Giảm khoảng cách và padding cho nút */
    .card-footer {
        padding: 10px;
        background-color: #fff;
        border-top: 1px solid #f1f1f1;
    }

    .btn-group .btn {
        padding: 8px; /* Giảm padding của các nút */
        font-size: 0.85rem; /* Giảm kích thước font cho các nút */
        border-radius: 5px; /* Bo góc các nút */
    }

    .badge {
        transition: transform 0.2s ease;
    }

    .btn-light:hover .badge {
        transform: scale(1.2);
    }
</style>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Danh Sách phòng</h1>
            <div>
                <a href="/webbanhang/Cart" class="btn btn-light me-2 position-relative">
                    <i class="fas fa-shopping-cart"></i> Phòng bạn chọn
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo count($_SESSION['cart']); ?>
                        </span>
                    <?php endif; ?>
                </a>
                <a href="/webbanhang/Product/add" class="btn btn-success">
                    <i class="fas fa-plus"></i> Thêm phòng
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm product-card">
                            <?php if ($product->image): ?>
                                <div class="image-container">
                                    <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                         class="card-img-top"
                                         alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>"
                                       class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                                <p class="card-text text-success">
                                    Giá: <strong><?php echo number_format($product->price, 0, ',', '.'); ?>đ</strong>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                                    </small>
                                </p>
                            </div>

                            <div class="card-footer bg-white border-0">
                                <div class="mt-4">
                                    <div class="d-flex gap-2 flex-wrap">
                                        <?php if (SessionHelper::isAdmin()): ?>
                                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>"
                                               class="btn btn-warning btn-sm w-100 fw-bold text-white rounded-pill transition-all hover-btn">
                                                <i class="fas fa-edit me-1"></i> Sửa
                                            </a>
                                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                                               class="btn btn-danger btn-sm w-100 fw-bold rounded-pill transition-all hover-btn delete-btn">
                                                <i class="fas fa-trash me-1"></i> Xóa
                                            </a>
                                        <?php endif; ?>
                                        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>"
                                           class="btn btn-primary btn-sm w-100 fw-bold rounded-pill transition-all hover-btn">
                                            <i class="fas fa-cart-plus me-1"></i> Đặt phòng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
