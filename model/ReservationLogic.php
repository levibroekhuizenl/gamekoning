<?php


    require_once '../model/DataHandler.php';
    require_once '../model/outputdata.php';

    //class om Products te handlen
    class ReservationLogic {
        //properties

        //methods
          public function __construct(){
                $this->DataHandler = new DataHandler("localhost", "mysql" ,"gameplayparty" ,"root" ,"");
            }

        function createReservation() {
            try { 
                $sql = "INSERT INTO products (product_name, product_price , other_product_details) VALUES ('$product_name', '$price', '$desc')";
                $res = $this->DataHandler->createData($sql);
                // $results = $res->fetchAll();
                // return$results;
            } catch (Exception $e) { throw $e; }
        }

        function readProduct($id) {
            try { 
                $sql = 'SELECT * FROM products WHERE product_id="$id" ';
                $res = $this->DataHandler->readsData($sql);
                $results = $res->fetchAll();
                $outputdata = new OutputData();
         return $outputdata->createTable2($results);
                // return$results;
            } catch (Exception $e) { throw $e; }
        }

        public function readAllReservations(){ 
            try { 
                $sql = 'SELECT * FROM reservations';
                $res = $this->DataHandler->readsData($sql);
                $results = $res->fetchAll();
                $outputdata = new OutputData();
         return $outputdata->createTable($results);
                // return$results;
            } catch (Exception $e) { throw $e; }
    }

        public function deleteProduct($id){ 
            try { 
                $sql = "DELETE FROM products WHERE product_id='$id' ";
                $res = $this->DataHandler->deleteData($sql);
                return "verwijderd";
                // return$results;
            } catch (Exception $e) { throw $e; }
    }

        function updateProduct($id, $product_name, $price, $desc) {
            try { 
                $sql = "UPDATE products SET product_name='$product_name',product_price='$price',other_product_details='$desc' WHERE product_id='$id'";
                $res = $this->DataHandler->updateData($sql);
                $answer = "Product " . $product_name . " was updated || " . $res . " rows updated <br><br>";
                $answer .= '<a id="button" href="../index.php">Overview</a>';
                return $answer;
            } catch (Exception $e) { throw $e; }
        }

        function __destruct() {
            $this->conn = null;
        }
    }
?>

