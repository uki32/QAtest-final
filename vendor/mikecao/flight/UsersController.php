<?php
require_once 'Controller.php';
require 'UsersDb.php';

class UsersController extends Controller {
    private UsersDb $usersDb;
    public 

    function __construct()
    {
        $this->usersDb = new UsersDb();
    }

    function getUsers()
    {
        return $this->usersDb->getDbUsers();
    }

    function getUser($id)
    {
        return $this->usersDb->getDbUsers($id)[0];
    }

    function updateUser($id, $password, $role)
    {
        $this->usersDb->updateDbUser($id, sha1($password), $role);
    }

    function deleteUser($id){ 
        try {
            $loggedId = $_SESSION['logged-id'];
            if($id != $loggedId){      
            $this->usersDb->deleteUser($id);
            } else {
                die("You cannot delete yourself.");
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'Cannot delete or update a parent row') !== false) {
                die('Error: You cannot delete a user who has made an order.');
            } else {
                die('Error: ' . $e->getMessage());
            }
            
    }
}

    function createUser($username, $password, $role) {
        if (empty($username) || empty($password) || empty($role)) {
            die("Please fill in all the required fields.");
        }elseif(strlen($username) < 2 || strlen($password) < 2){
            die("Username and password must have at least 2 characters");
        }
        $this->usersDb->createUser($username, sha1($password), $role);   
    }

    function loginUser($username, $password) {
        if (isset($username) && isset($password)
            && $user = $this->usersDb->getDbUser($username, sha1($password))){
            $_SESSION['logged-id'] = $user['id'];
            $_SESSION['logged-role'] = $user['role'];
            header('Location: index.php');
        } else {
            header('Location: login.php');
        }
    }
}
