<?php
require_once 'Controller.php';
require 'typesDb.php';

class TypesController extends Controller {
    private TypesDb $typesDb;

    function __construct()
    {
        $this->typesDb = new typesDb();
    }

    function getTypes()
    {
        return $this->typesDb->getDbTypes();
    }
    
    function getTypeById($id=null)
    {
        return $this->typesDb->getDbTypes($id);
    }

    function updateType($id, $name)
    {
        $this->typesDb->updateDbType($id, $name);
    }

    function deleteType($id)
    {
        $this->typesDb->deleteDbType($id);
    }

    function createType($name)
    {
        $this->typesDb->createDbType($name);
    }


}