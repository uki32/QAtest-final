<?php
require_once 'Controller.php';
require 'ProductsDb.php';
// require 'LogsController.php';


class ProductsController extends Controller {
    
    private ProductsDb $productsDb; 


    function __construct()
    {
        $this->productsDb = new ProductsDb();
    }

    function getProducts()
    {
        return $this->productsDb->getDbProducts();
    }
    
    function getProduct($id)
    {
        return $this->productsDb->getDbProducts($id)[0];
    }

    function updateProduct($id, $type, $name, $price)
    {
        $this->productsDb->updateDbProduct($id, $type, $name, $price);

        $logMessage = $_SESSION['logged-role'] . " updated product with id $id with name $name and price $price." ;
        $logsController = new LogsController();
        $logsController->createLog($logMessage);
    }

    function deleteProduct($id)
    {
        $this->productsDb->deleteDbProduct($id);

        $logMessage = $_SESSION['logged-role'] . " deleted product with id $id." ;
        $logsController = new LogsController();
        $logsController->createLog($logMessage);
    }

    function createProduct($name, $price, $type)
    {
        $this->productsDb->createDbProduct($name, $price, $type);

        $logMessage = $_SESSION['logged-role'] . " created new product with name $name, price $price and type of $type." ;
        $logsController = new LogsController();
        $logsController->createLog($logMessage);
    }

   


}