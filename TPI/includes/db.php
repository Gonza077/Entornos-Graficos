<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $conn;

    public function __construct(){

        //MySQL Worbech
        /*
        $this->host     = 'localhost';
        $this->db       = 'consultas_db';
        $this->user     = 'admin';
        $this->password = "admin";
        $this->charset  = 'utf8mb4';*/

        //PHPMyAdmin
        $this-> host     = 'localhost';
        $this-> db       = 'consultas_db';
        $this-> user     = 'root';
        $this-> password = "";
        $this-> charset  = 'utf8mb4';
        $this ->    conn;
    }

    function connect(){
    
        $this -> conn = new mysqli($this->host,$this->user,$this->password,$this->db);
        $this -> conn ->set_charset($this->charset);

        if ($this -> conn ->connect_error) {
            die('Error de Conexión (' . $this -> conn->connect_errno . ') '
                    . $this -> conn -> connect_error);
        }
        return $this -> conn;
    }

    function disconnect(){
        $this -> conn -> close();
    }
}



?>