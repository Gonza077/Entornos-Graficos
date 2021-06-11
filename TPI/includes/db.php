<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'consultas_db';
        $this->user     = 'admin';
        $this->password = "admin";
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        $conn = new mysqli($this->host,$this->user,$this->password,$this->db);
        $conn->set_charset($this->charset);

        if ($conn->connect_error) {
            die('Error de Conexión (' . $conn->connect_errno . ') '
                    . $conn->connect_error);
        }
        return $conn;
    }
}



?>