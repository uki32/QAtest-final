<?php
require_once 'Controller.php';
require_once 'TablesDb.php';

class TablesController extends Controller {
    private TablesDb $tablesDb;

    function __construct() {
        $this->tablesDb = new TablesDb();
    }

    function getOrdersData() {
        return $this->tablesDb->getDbOrdersData();
    }
 
    function getUsersData() {
        return $this->tablesDb->getDbUsersData();
    }

    function getTypesData() {
        return $this->tablesDb->getDbTypesData();
    }

    function getProductsData() {
        return $this->tablesDb->getDbProductsData();
    }
    
}