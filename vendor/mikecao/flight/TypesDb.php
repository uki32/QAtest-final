<?php

require_once 'pdo.php';

class TypesDb {

    function getDbTypes($id = null){
        global $pdo;
        $sql = 'SELECT id, name FROM product_types';
        if ($id) {
            $sql .= ' WHERE id=:id';
        }
        $statement = $pdo->prepare($sql);
        if ($id) {
            $statement->bindParam('id', $id, PDO::PARAM_INT);
        }
        $statement->execute();
        if($id){
        return $statement->fetch(PDO::FETCH_ASSOC);
        }else{
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function updateDbType($id, $name){
        global $pdo;
        $statement = $pdo->prepare('UPDATE product_types SET name=:name WHERE id=:id');
        $statement->execute([
            'id' => $id,
            'name' => $name,
        ]);
    }

    function deleteDbType($id){
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM product_types WHERE id=:id');
        $statement->execute([
            'id' => $id,
        ]);
    }

    function createDbType($name){
        global $pdo;
        $statement = $pdo->prepare('INSERT INTO product_types (name) VALUES (:name)');
        $statement->execute([
            'name' => $name,
        ]);
    }


}