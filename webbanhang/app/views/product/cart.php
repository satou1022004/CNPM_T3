<<<<<<< HEAD
<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold animate__animated animate__fadeIn">Giỏ Hàng Của Bạn</h1>

    <?php if (!empty($cart)): ?>
        <div class="card shadow-sm animate__animated animate__fadeInUp">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalQuantity = 0;
                            $totalPrice = 0;
                            foreach ($cart as $id => $item): 
                                $itemTotal = $item['price'] * $item['quantity'];
                                $totalQuantity += $item['quantity'];
                                $totalPrice += $itemTotal;
                            ?>
                                <tr class="animate__animated animate__fadeInUp" style="animation-delay: <?php echo (0.1 * array_search($id, array_keys($cart))); ?>s;">
                                    <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php if ($item['image']): ?>
                                            <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" class="img-fluid rounded" style="max-width: 80px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                                    <td>
                                        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" min="1" class="form-control form-control-sm quantity-input" style="width: 80px;" data-price="<?php echo $item['price']; ?>" data-id="<?php echo $id; ?>">
                                    </td>
                                    <td class="item-total fw-bold" data-id="<?php echo $id; ?>"><?php echo number_format($itemTotal, 0, ',', '.'); ?>đ</td>
                                    <td>
                                        <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-light">
                                <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                                <td class="fw-bold" id="total-quantity"><?php echo $totalQuantity; ?></td>
                                <td class="fw-bold" id="total-price"><?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4 animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
            <a href="/webbanhang/Product" class="btn btn-outline-secondary btn-lg px-4">
                <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
            </a>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary btn-lg px-4">
                Thanh Toán <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="card shadow-sm text-center p-5 animate__animated animate__fadeIn">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h5 class="card-title">Giỏ hàng của bạn đang trống</h5>
                <p class="card-text text-muted">Hãy thêm sản phẩm để tiếp tục mua sắm!</p>
                <a href="/webbanhang/Product" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-shopping-bag"></i> Tiếp tục mua sắm
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Tùy chỉnh phông chữ Arial và hiệu ứng động */
    body {
        font-family: 'Arial', sans-serif;
        font-size: 1rem;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .table th {
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table td {
        font-size: 1rem;
        font-weight: 400;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        transition: all 0.3s ease;
    }

    .quantity-input {
        border-radius: 5px;
        text-align: center;
        transition: all 0.3s ease;
        font-family: 'Arial', sans-serif;
    }

    .quantity-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-lg {
        font-size: 1.1rem;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        font-family: 'Arial', sans-serif;
        font-weight: 500;
    }

    .btn-lg:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .table-dark th {
        background-color: #343a40;
        color: white;
    }

    .table-light {
        background-color: #e9ecef;
    }

    /* Hiệu ứng cho tổng tiền */
    #total-price, #total-quantity {
        transition: all 0.3s ease;
        font-weight: 700;
    }
</style>

<!-- Thêm Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totalQuantityElement = document.getElementById('total-quantity');
        const totalPriceElement = document.getElementById('total-price');

        quantityInputs.forEach(input => {
            input.addEventListener('input', function() {
                const price = parseFloat(this.getAttribute('data-price'));
                const quantity = parseInt(this.value) || 1; // Đảm bảo không nhỏ hơn 1
                const itemId = this.getAttribute('data-id');
                const itemTotalElement = document.querySelector(`.item-total[data-id="${itemId}"]`);

                // Cập nhật thành tiền của sản phẩm
                const itemTotal = price * quantity;
                itemTotalElement.textContent = itemTotal.toLocaleString('vi-VN') + 'đ';

                // Cập nhật tổng số lượng và tổng tiền
                let totalQuantity = 0;
                let totalPrice = 0;
                quantityInputs.forEach(input => {
                    const price = parseFloat(input.getAttribute('data-price'));
                    const quantity = parseInt(input.value) || 1;
                    totalQuantity += quantity;
                    totalPrice += price * quantity;
                });

                // Thêm hiệu ứng khi tổng tiền thay đổi
                totalQuantityElement.textContent = totalQuantity;
                totalPriceElement.textContent = totalPrice.toLocaleString('vi-VN') + 'đ';
                totalPriceElement.classList.add('animate__animated', 'animate__pulse');
                totalQuantityElement.classList.add('animate__animated', 'animate__pulse');

                // Xóa hiệu ứng sau khi hoàn thành
                setTimeout(() => {
                    totalPriceElement.classList.remove('animate__animated', 'animate__pulse');
                    totalQuantityElement.classList.remove('animate__animated', 'animate__pulse');
                }, 500);
            });
        });
    });
</script>

=======
<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold animate__animated animate__fadeIn">Phòng Bạn đã chọn </h1>

    <?php if (!empty($cart)): ?>
        <div class="card shadow-sm animate__animated animate__fadeInUp">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalQuantity = 0;
                            $totalPrice = 0;
                            foreach ($cart as $id => $item): 
                                $itemTotal = $item['price'] * $item['quantity'];
                                $totalQuantity += $item['quantity'];
                                $totalPrice += $itemTotal;
                            ?>
                                <tr class="animate__animated animate__fadeInUp" style="animation-delay: <?php echo (0.1 * array_search($id, array_keys($cart))); ?>s;">
                                    <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php if ($item['image']): ?>
                                            <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" class="img-fluid rounded" style="max-width: 80px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                                    <td>
                                        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" min="1" class="form-control form-control-sm quantity-input" style="width: 80px;" data-price="<?php echo $item['price']; ?>" data-id="<?php echo $id; ?>">
                                    </td>
                                    <td class="item-total fw-bold" data-id="<?php echo $id; ?>"><?php echo number_format($itemTotal, 0, ',', '.'); ?>đ</td>
                                    <td>
                                        <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-light">
                                <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                                <td class="fw-bold" id="total-quantity"><?php echo $totalQuantity; ?></td>
                                <td class="fw-bold" id="total-price"><?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4 animate__animated animate__fadeInUp" style="animation-delay: 0.5s;">
            <a href="/webbanhang/Product" class="btn btn-outline-secondary btn-lg px-4">
                <i class="fas fa-arrow-left"></i> Tiếp tục đặt phòng 
            </a>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary btn-lg px-4">
                Thanh Toán <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="card shadow-sm text-center p-5 animate__animated animate__fadeIn">
            <div class="card-body">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h5 class="card-title">Giỏ hàng của bạn đang trống</h5>
                <p class="card-text text-muted">Hãy lựa chọn phong mà bạn yêu thích !</p>
                <a href="/webbanhang/Product" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-shopping-bag"></i> Tiếp tục đặt phòng
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Tùy chỉnh phông chữ Arial và hiệu ứng động */
    body {
        font-family: 'Arial', sans-serif;
        font-size: 1rem;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .table th {
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table td {
        font-size: 1rem;
        font-weight: 400;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        transition: all 0.3s ease;
    }

    .quantity-input {
        border-radius: 5px;
        text-align: center;
        transition: all 0.3s ease;
        font-family: 'Arial', sans-serif;
    }

    .quantity-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-lg {
        font-size: 1.1rem;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        font-family: 'Arial', sans-serif;
        font-weight: 500;
    }

    .btn-lg:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .table-dark th {
        background-color: #343a40;
        color: white;
    }

    .table-light {
        background-color: #e9ecef;
    }

    /* Hiệu ứng cho tổng tiền */
    #total-price, #total-quantity {
        transition: all 0.3s ease;
        font-weight: 700;
    }
</style>

<!-- Thêm Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const totalQuantityElement = document.getElementById('total-quantity');
        const totalPriceElement = document.getElementById('total-price');

        quantityInputs.forEach(input => {
            input.addEventListener('input', function() {
                const price = parseFloat(this.getAttribute('data-price'));
                const quantity = parseInt(this.value) || 1; // Đảm bảo không nhỏ hơn 1
                const itemId = this.getAttribute('data-id');
                const itemTotalElement = document.querySelector(`.item-total[data-id="${itemId}"]`);

                // Cập nhật thành tiền của sản phẩm
                const itemTotal = price * quantity;
                itemTotalElement.textContent = itemTotal.toLocaleString('vi-VN') + 'đ';

                // Cập nhật tổng số lượng và tổng tiền
                let totalQuantity = 0;
                let totalPrice = 0;
                quantityInputs.forEach(input => {
                    const price = parseFloat(input.getAttribute('data-price'));
                    const quantity = parseInt(input.value) || 1;
                    totalQuantity += quantity;
                    totalPrice += price * quantity;
                });

                // Thêm hiệu ứng khi tổng tiền thay đổi
                totalQuantityElement.textContent = totalQuantity;
                totalPriceElement.textContent = totalPrice.toLocaleString('vi-VN') + 'đ';
                totalPriceElement.classList.add('animate__animated', 'animate__pulse');
                totalQuantityElement.classList.add('animate__animated', 'animate__pulse');

                // Xóa hiệu ứng sau khi hoàn thành
                setTimeout(() => {
                    totalPriceElement.classList.remove('animate__animated', 'animate__pulse');
                    totalQuantityElement.classList.remove('animate__animated', 'animate__pulse');
                }, 500);
            });
        });
    });
</script>

>>>>>>> e934524d363402ba7a2a96d05723c302886efe1d
<?php include 'app/views/shares/footer.php'; ?>