<?php

require_once 'pdo.php';

class TablesDb {

      function getDbOrdersData() {
        global $pdo;
        $sql = 'SELECT u.username, o.id, o.created_at, SUM(oi.quantity * p.price) as order_price 
        FROM users u
        JOIN orders o 
        ON u.id = o.user_id
        JOIN order_items oi
        ON o.id = oi.order_id
        JOIN products p
        ON oi.product_id = p.product_id
        GROUP BY o.id;';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getDbUsersData() {
      global $pdo;
      $sql = 'SELECT u.id, SUM(oi.quantity * p.price) as order_price 
      FROM users u
      JOIN orders o 
      ON u.id = o.user_id
      JOIN order_items oi
      ON o.id = oi.order_id
      JOIN products p
      ON oi.product_id = p.product_id
      GROUP BY u.id;';
      $statement = $pdo->prepare($sql);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getDbTypesData() {
      global $pdo;
      $sql = 'SELECT t.name, SUM(oi.quantity * p.price) as order_price 
      FROM users u
      JOIN orders o 
      ON u.id = o.user_id
      JOIN order_items oi
      ON o.id = oi.order_id
      JOIN products p
      ON oi.product_id = p.product_id
      JOIN product_types t
      ON p.type = t.name
      GROUP BY t.name;';
      $statement = $pdo->prepare($sql);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getDbProductsData() {
      global $pdo;
      $sql = 'SELECT p.name, SUM(oi.quantity * p.price) as order_price 
      FROM users u
      JOIN orders o 
      ON u.id = o.user_id
      JOIN order_items oi
      ON o.id = oi.order_id
      JOIN products p
      ON oi.product_id = p.product_id
      GROUP BY p.name;';
      $statement = $pdo->prepare($sql);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}