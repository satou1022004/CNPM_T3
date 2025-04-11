<?php include 'app/views/shares/header.php'; ?>

<!-- CSS bổ sung cho form sang trọng -->
<style>
    .luxury-form {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 30px 0;
    }

    .form-card {
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        border-radius: 12px;
        overflow: hidden;
    }

    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(50, 50, 93, 0.15), 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        padding: 20px 25px;
        border-bottom: none;
    }

    .card-title {
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .card-body {
        padding: 30px;
        background-color: #fff;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .input-group {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        border-radius: 7px;
        overflow: hidden;
    }

    .input-group:focus-within {
        box-shadow: 0 3px 8px rgba(78, 115, 223, 0.25);
    }

    .input-group-text {
        background-color: #4e73df;
        color: #fff;
        border: none;
        min-width: 45px;
        display: flex;
        justify-content: center;
    }

    .form-control,
    .form-select {
        border: none;
        padding: 12px 15px;
        font-size: 14px;
        height: auto;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        border-color: transparent;
    }

    textarea.form-control {
        min-height: 120px;
    }

    .btn {
        padding: 12px 25px;
        font-weight: 500;
        letter-spacing: 0.5px;
        border-radius: 7px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #224abe 0%, #0d326a 100%);
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(78, 115, 223, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border: none;
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, #495057 0%, #343a40 100%);
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(108, 117, 125, 0.4);
    }

    .custom-file-upload {
        position: relative;
        overflow: hidden;
        border-radius: 7px;
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .custom-file-upload:hover {
        border-color: #4e73df;
        background-color: #f1f3f9;
    }

    .file-preview {
        margin-top: 15px;
        max-height: 150px;
        overflow: hidden;
        border-radius: 7px;
        display: none;
    }

    .file-preview img {
        max-width: 100%;
        height: auto;
    }

    .section-divider {
        position: relative;
        margin: 30px 0;
        height: 1px;
        background: #e9ecef;
    }

    .section-divider:before {
        content: attr(data-content);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 0 15px;
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .alert-danger {
        background-color: #fff1f2;
        color: #e63757;
        border-left: 4px solid #e63757;
        border-radius: 7px;
    }

    .invalid-feedback {
        font-size: 12px;
        margin-top: 5px;
        margin-left: 5px;
    }

    .form-text {
        font-size: 12px;
        margin-top: 7px;
        margin-left: 5px;
    }

    .animate-in {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container-fluid luxury-form">
    <div class="row justify-content-center">
        <div class="col-lg-9 animate-in">
            <!-- Tiêu đề trang -->
            <div class="text-center mb-4">
                <h2 class="fw-bold text-dark mb-0">Quản lý sản phẩm</h2>
                <div class="d-inline-block bg-primary mt-1" style="height: 4px; width: 50px;"></div>
                <p class="text-muted mt-3">Thêm sản phẩm mới vào cửa hàng của bạn</p>
            </div>

            <!-- Form Card -->
            <div class="form-card">
                <div class="card-header">
                    <h4 class="card-title text-white mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Thêm sản phẩm mới
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Thông báo lỗi nếu có -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger animate-in" role="alert">
                            <div class="d-flex">
                                <div>
                                    <i class="fas fa-exclamation-circle fa-lg me-3 mt-1"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Đã xảy ra lỗi</h6>
                                    <ul class="mb-0 ps-3">
                                        <?php foreach ($errors as $error): ?>
                                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data"
                        onsubmit="return validateForm();" class="needs-validation" novalidate>

                        <!-- Thông tin cơ bản -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-tag me-1 text-primary"></i>Tên sản phẩm
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label">
                                    <i class="fas fa-dollar-sign me-1 text-primary"></i>Giá sản phẩm
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" id="price" name="price" class="form-control"
                                        step="0.01" min="0" placeholder="VD: 150000" required>
                                    <span class="input-group-text bg-light">VNĐ</span>
                                </div>
                                <div class="invalid-feedback">Vui lòng nhập giá hợp lệ</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label">
                                    <i class="fas fa-list me-1 text-primary"></i>Danh mục
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                                    <select id="category_id" name="category_id" class="form-select" required>
                                        <option value="" selected disabled>-- Chọn danh mục sản phẩm --</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="invalid-feedback">Vui lòng chọn danh mục sản phẩm</div>
                            </div>
                        </div>

                        <div class="section-divider" data-content="Thông tin chi tiết"></div>

                        <div class="mb-4">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-1 text-primary"></i>Mô tả sản phẩm
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                <textarea id="description" name="description" class="form-control"
                                    placeholder="Mô tả chi tiết về sản phẩm..." rows="5" required></textarea>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập mô tả sản phẩm</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="fas fa-image me-1 text-primary"></i>Hình ảnh sản phẩm
                            </label>
                            <div class="custom-file-upload" id="dropZone">
                                <input type="file" id="image" name="image" class="d-none" accept="image/*" onchange="previewImage(this);">
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                    <h6>Kéo thả hình ảnh vào đây hoặc</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="document.getElementById('image').click();">Chọn từ thiết bị</button>
                                    <p class="small text-muted mt-2 mb-0">Hỗ trợ: JPG, JPEG, PNG, GIF (Tối đa 5MB)</p>
                                </div>
                                <div class="file-preview" id="imagePreview">
                                    <img id="preview" src="#" alt="Preview">
                                </div>
                            </div>
                        </div>

                        <div class="section-divider" data-content="Hoàn tất"></div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/webbanhang/Product" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Lưu sản phẩm
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Gợi ý và trợ giúp -->
            <div class="card mt-4 form-card bg-light">
                <div class="card-body p-3">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="fas fa-lightbulb text-warning fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Gợi ý</h6>
                            <p class="small text-muted mb-0">Thêm hình ảnh chất lượng cao và mô tả chi tiết để tăng khả năng bán hàng. Đảm bảo thông tin sản phẩm rõ ràng và chính xác.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Form validation
    function validateForm() {
        let isValid = true;
        const name = document.getElementById('name').value.trim();
        const description = document.getElementById('description').value.trim();
        const price = parseFloat(document.getElementById('price').value);
        const category = document.getElementById('category_id').value;

        // Reset validation
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        // Validate name
        if (!name) {
            document.getElementById('name').classList.add('is-invalid');
            isValid = false;
        }

        // Validate description
        if (!description) {
            document.getElementById('description').classList.add('is-invalid');
            isValid = false;
        }

        // Validate price
        if (isNaN(price) || price <= 0) {
            document.getElementById('price').classList.add('is-invalid');
            isValid = false;
        }

        // Validate category
        if (!category) {
            document.getElementById('category_id').classList.add('is-invalid');
            isValid = false;
        }

        if (!isValid) {
            // Hiệu ứng rung khi có lỗi
            document.querySelector('.form-card').classList.add('animate__animated', 'animate__shakeX');
            setTimeout(() => {
                document.querySelector('.form-card').classList.remove('animate__animated', 'animate__shakeX');
            }, 1000);
        }

        return isValid;
    }

    // Bootstrap form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    // Image preview functionality
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
                document.querySelector('.upload-content').style.display = 'none';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Drag and drop functionality
    const dropZone = document.getElementById('dropZone');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropZone.classList.add('bg-light');
    }

    function unhighlight() {
        dropZone.classList.remove('bg-light');
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length) {
            document.getElementById('image').files = files;
            previewImage(document.getElementById('image'));
        }
    }

    // Animation on load
    document.addEventListener('DOMContentLoaded', function() {
        // Áp dụng animation cho các phần tử khi trang tải
        const elements = document.querySelectorAll('.form-card, .section-divider');
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('animate-in');
            }, index * 100);
        });
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>