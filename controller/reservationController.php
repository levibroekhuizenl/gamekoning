<?php
require_once '../model/ReservationLogic.php';
// require_once '../model/outputdata.php';
class ProductsController {
        //properties

        //methods
        function __construct() {
            $this->ReservationLogic = new ReservationLogic();
        }

        function handleRequest() {
            try {

                $todo = isset($_REQUEST['todo']) ? $todo = $_REQUEST['todo'] : $todo = 'read';

                switch ($todo) {
                    case 'createform':
                        include '../view/createReservation.php';
                        break;
                    case 'create':
                        $product_name = $_REQUEST['product_name'];
                        $price = $_REQUEST['price'];
                        $desc = $_REQUEST['desc'];
                        $this->collectCreateProduct($product_name, $price, $desc);
                        echo '<h1> aangemaakt </h1>';
                        break;
                    case 'read':
                        $this->collectreadAllProducts();
                        break;
                    case 'update':
                        $product_name = $_REQUEST['product_name'];
                        $price = $_REQUEST['price'];
                        $desc = $_REQUEST['desc'];
                        $id = $_REQUEST['product_id'];
                        $this->collectUpdateProduct($id, $product_name, $price, $desc);
                        break;
                    case 'reads':
                        $this->collectreadAllProducts();
                        break;
                    case 'search':
                        echo 'test';
                        $res = $_REQUEST['search'];
                        $this->collectSearchProduct($res);
                        break;
                    case 'updateform':
                        $id = $_REQUEST['id'];
                        $this->collectReadProduct($id);
                        include '../view/update.php';
                        break;
                    case 'delete':
                        echo 'test';
                        $this->collectDeleteProduct($_REQUEST['id']);
                        header("Location: ../index.php");
                        echo 'verwijderd';
                        break;
                    default:
                        $this->collectreadAllProducts();
                }

            }catch (Exeption $e){
                throw $e;
            }
        }

        function collectCreateProduct($product_name, $price, $desc) {
            $products = $this->ProductsLogic->createProduct($product_name, $price, $desc);
            // include '../view/Products.php';
        }

         public function collectReadProduct($id) {
            $products = $this->ProductsLogic->readProduct($id);
            include '../view/read.php';
        }

        function collectreadAllProducts() {
            $products = $this->ReservationLogic->readAllReservations();
            include '../view/read.php';
        }

        function collectUpdateProduct($id, $product_name, $price, $desc) {
           $products = $this->ProductsLogic->updateProduct($id, $product_name, $price, $desc);
            include '../view/read.php';
        }

        function collectDeleteProduct($id) {
            $products = $this->ProductsLogic->deleteProduct($id);
        }

        function __destruct() {
            $this->conn = null;
        }
    }

$new = new ProductsController();
$new->handleRequest();

    // echo $database->collectReadProduct();

?>