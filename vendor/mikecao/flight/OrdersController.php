<?php
require_once 'Controller.php';
require_once 'OrdersDb.php';

class OrdersController extends Controller {
    private DbOrders $ordersDb;

    function __construct() {
        $this->ordersDb = new DbOrders();
    }

    function getProducts() {
        return $this->ordersDb->getProducts();
    }

    function addProduct($productId) {
        if (!isset($_COOKIE['order'])) {
            $order = [];
        } else {
            $order = unserialize($_COOKIE['order']);
        }
        if (!isset($order[$productId])) {
            $order[$productId] = 1;
        } else {
            $order[$productId]++;
        }
        setcookie('order', serialize($order), time() + 86400);
    }

    function removeProduct($productId) {
        if (!isset($_COOKIE['order'])) {
            $order = [];
        } else {
            $order = unserialize($_COOKIE['order']);
        }
        if (isset($order[$productId])) {
            $order[$productId]--;
            if ($order[$productId] === 0) {
                unset($order[$productId]);
            }
        }
        setcookie('order', serialize($order), time() + 86400);
    }

    function getCartItems() {
        $items = isset($_COOKIE['order']) ? unserialize($_COOKIE['order']) : [];
        $products = $this->getProducts();
        $itemsData = [];
        foreach($items as $productId => $quantity) {
            foreach ($products as $product) {
                if ($product['product_id'] == $productId) {
                    $itemsData[$productId] = [
                        'name' => $product['name'],
                        'quantity' => $quantity,
                    ];
                    break;
                }
            }
        }
        return $itemsData;
    }

    function completeOrder() {
        if ($this->isLogged()) {
            $this->ordersDb->addOrder(
                unserialize($_COOKIE['order']),
                $_SESSION['logged-id']
            );
        }
        setcookie('order', serialize([]));
    }
}