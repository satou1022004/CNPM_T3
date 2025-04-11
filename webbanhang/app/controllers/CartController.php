<<<<<<< HEAD
<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');

class CartController
{
    private $db;
    private $productModel;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function index()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }
}
=======
<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');

class CartController
{
    private $db;
    private $productModel;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function index()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }
}
>>>>>>> e934524d363402ba7a2a96d05723c302886efe1d
?>