<?php

$servername = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'QA-test';


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Conn Failed' . $e->getMessage();
}