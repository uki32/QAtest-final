<?php

require_once 'pdo.php';

class LogsDb {
    function createLogEntry($logMessage) {
        global $pdo;
        $statement = $pdo->prepare('INSERT INTO logs (log) VALUES (:log)');
        $statement->execute([
          'log' => $logMessage
        ]);
      }

      function getDbLogs(){
        global $pdo;
        $statement = $pdo->prepare('SELECT * from logs');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
      }

}