<?php
require_once 'pdo.php';

class DbOrders {
    function getProducts() {
        global $pdo;
        $sql = 'SELECT * FROM products';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function addOrder(array $orderData, int $userId) {
        global $pdo;
        try {
            $pdo->beginTransaction();
            $statement = $pdo->prepare('INSERT INTO orders (user_id) VALUES (:user_id)');
            $statement->execute([
                'user_id' => $userId,
            ]);
            $orderId = $pdo->lastInsertId();
    
            $statement = $pdo->prepare('INSERT INTO order_items(order_id, product_id, quantity)
                                        VALUES (:order_id, :product_id, :quantity)');
            foreach($orderData as $productId => $quantity) {
                $statement->execute([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
            $pdo->commit();
        } catch (\PDOException $e) {
            $pdo->rollBack();
            die($e->getMessage());
        }
    }
}