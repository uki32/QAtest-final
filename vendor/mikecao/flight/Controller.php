<?php

abstract class Controller {
    function isLogged() {
        return isset($_SESSION['logged-id']);
    }
    function isUser() {
        return $this->isLogged() && $_SESSION['logged-role'] === 'user';
    }


    function isAdmin() {
        return $this->isLogged() && $_SESSION['logged-role'] === 'admin';
    }
    
    function isMod() {
        return $this->isLogged() && $_SESSION['logged-role'] === 'mod' ;
    }

}

