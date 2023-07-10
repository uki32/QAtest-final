<?php
require_once 'Controller.php';
require_once 'LogsDb.php';

class LogsController extends Controller {
    private LogsDb $logsDb;

    function __construct() {
        $this->logsDb = new LogsDb();
    }

    function createLog($log){
        $this->logsDb->createLogEntry($log);
    }

    function getLogs() {
        return $this->logsDb->getDbLogs();
    }
 
    
}