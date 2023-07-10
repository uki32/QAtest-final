<?php

require_once 'pdo.php';

class UsersDb {
    function getDbUsers($userId = null){
        global $pdo;
        $sql = 'SELECT id, username, password, role FROM users';
        if ($userId) {
            $sql .= ' WHERE id=:id';
        }
        $statement = $pdo->prepare($sql);
        if ($userId) {
            $statement->bindParam('id', $userId, PDO::PARAM_INT);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateDbUser($id, $password, $role){
        global $pdo;
        $statement = $pdo->prepare('UPDATE users SET password=:password, role=:role WHERE id=:id');
        $statement->execute([
            'id' => $id,
            'password' => $password,
            'role' => $role,
        ]);
    }

    function deleteUser($userId){
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM users WHERE id=:id');
        $statement->execute([
            'id' => $userId,
        ]);
    }

    function createUser($username, $password, $role){
        global $pdo;
        $statement = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
        $statement->execute([
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ]);
    }

    function getDbUser($username, $password) {
        global $pdo;
        $sql = 'SELECT * FROM users WHERE username=:username AND password=:password';
        $statement = $pdo->prepare($sql);
        $statement->execute([
            'username' => $username,
            'password' => $password,
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}