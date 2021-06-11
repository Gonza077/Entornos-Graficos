<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return isset($_SESSION['user']) ? $_SESSION['user'] : NULL ;
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}


?>