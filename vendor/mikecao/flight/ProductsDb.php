<?php

require_once 'pdo.php';

class ProductsDb {
    function getDbProducts($productId = null){
        global $pdo;
        $sql = 'SELECT product_id, name, price, type FROM products';
        if ($productId) {
            $sql .= ' WHERE product_id=:id';
        }
        $statement = $pdo->prepare($sql);
        if ($productId) {
            $statement->bindParam('id', $productId, PDO::PARAM_INT);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateDbProduct($id, $type, $name, $price){
        global $pdo;
        $statement = $pdo->prepare('UPDATE products SET type=:type, name=:name, price=:price WHERE product_id=:id');
        $statement->execute([
            'id' => $id,
            'type' => $type,
            'name' => $name,
            'price' => $price,
        ]);
    }

    function deleteDbProduct($id){
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM products WHERE product_id=:id');
        $statement->execute([
            'id' => $id,
        ]);
    }

    function createDbProduct($name, $price, $type){
        global $pdo;
        $statement = $pdo->prepare('INSERT INTO products (name, price, type) VALUES (:name, :price, :type)');
        $statement->execute([
            'name' => $name,
            'price' => $price,
            'type' => $type,
        ]);
    }

   

}