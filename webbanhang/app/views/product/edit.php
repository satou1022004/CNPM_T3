<<<<<<< HEAD
<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4 text-primary fw-bold">Sửa sản phẩm</h1>
            <p class="text-muted lead">Cập nhật thông tin sản phẩm của bạn</p>
        </div>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger bg-danger-subtle border-0 shadow-sm">
            <h5 class="alert-heading fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Lỗi!</h5>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg border-secondary-subtle" 
                                value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Mô tả:</label>
                            <textarea id="description" name="description" class="form-control border-secondary-subtle" 
                                rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-bold">Giá:</label>
                                <div class="input-group">
                                    <input type="number" id="price" name="price" class="form-control border-secondary-subtle" step="0.01"
                                        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <span class="input-group-text bg-light">VNĐ</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="category_id" class="form-label fw-bold">Danh mục:</label>
                                <select id="category_id" name="category_id" class="form-select border-secondary-subtle" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>" 
                                            <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Hình ảnh sản phẩm:</label>
                            <div class="card mb-3 border-0 bg-light">
                                <div class="card-body text-center product-img-preview">
                                    <?php if ($product->image): ?>
                                        <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image" class="img-fluid product-preview">
                                    <?php else: ?>
                                        <div class="text-muted py-5">
                                            <i class="bi bi-image fs-1"></i>
                                            <p>Chưa có hình ảnh</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <input type="file" id="image" name="image" class="form-control border-secondary-subtle">
                            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                            <div class="form-text">Để trống nếu bạn không muốn thay đổi hình ảnh hiện tại.</div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                    <a href="/webbanhang/Product" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle me-2"></i>Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .product-img-preview {
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-preview {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
</style>

<script>
function validateForm() {
    const name = document.getElementById('name').value.trim();
    const description = document.getElementById('description').value.trim();
    const price = document.getElementById('price').value;
    
    if (name === '') {
        alert('Vui lòng nhập tên sản phẩm');
        return false;
    }
    
    if (description === '') {
        alert('Vui lòng nhập mô tả sản phẩm');
        return false;
    }
    
    if (price === '' || parseFloat(price) <= 0) {
        alert('Vui lòng nhập giá hợp lệ');
        return false;
    }
    
    return true;
}
</script>

=======
<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4 text-primary fw-bold">Sửa sản phẩm</h1>
            <p class="text-muted lead">Cập nhật thông tin sản phẩm của bạn</p>
        </div>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger bg-danger-subtle border-0 shadow-sm">
            <h5 class="alert-heading fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Lỗi!</h5>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg border-secondary-subtle" 
                                value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Mô tả:</label>
                            <textarea id="description" name="description" class="form-control border-secondary-subtle" 
                                rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-bold">Giá:</label>
                                <div class="input-group">
                                    <input type="number" id="price" name="price" class="form-control border-secondary-subtle" step="0.01"
                                        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <span class="input-group-text bg-light">VNĐ</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="category_id" class="form-label fw-bold">Danh mục:</label>
                                <select id="category_id" name="category_id" class="form-select border-secondary-subtle" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>" 
                                            <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Hình ảnh sản phẩm:</label>
                            <div class="card mb-3 border-0 bg-light">
                                <div class="card-body text-center product-img-preview">
                                    <?php if ($product->image): ?>
                                        <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image" class="img-fluid product-preview">
                                    <?php else: ?>
                                        <div class="text-muted py-5">
                                            <i class="bi bi-image fs-1"></i>
                                            <p>Chưa có hình ảnh</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <input type="file" id="image" name="image" class="form-control border-secondary-subtle">
                            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                            <div class="form-text">Để trống nếu bạn không muốn thay đổi hình ảnh hiện tại.</div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                    <a href="/webbanhang/Product" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-arrow-left me-2"></i>Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle me-2"></i>Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .product-img-preview {
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-preview {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
</style>

<script>
function validateForm() {
    const name = document.getElementById('name').value.trim();
    const description = document.getElementById('description').value.trim();
    const price = document.getElementById('price').value;
    
    if (name === '') {
        alert('Vui lòng nhập tên sản phẩm');
        return false;
    }
    
    if (description === '') {
        alert('Vui lòng nhập mô tả sản phẩm');
        return false;
    }
    
    if (price === '' || parseFloat(price) <= 0) {
        alert('Vui lòng nhập giá hợp lệ');
        return false;
    }
    
    return true;
}
</script>

>>>>>>> e934524d363402ba7a2a96d05723c302886efe1d
<?php include 'app/views/shares/footer.php'; ?>