<?php

include_once 'db.php';

class User extends DB{

    private $nombre;
    private $apellido;
    private $email;
    private $docente;

    public function userExists($email_check, $pass_check){
        $md5pass_check = md5($pass_check);

        $query = "SELECT email,password  FROM `persona` WHERE email = '$email_check' AND password = '$md5pass_check'";

        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();

        if (!is_null($fila)){
            return true;
        }
        return false;  
    }

    public function setUser($email){
        $query = "SELECT nombre,apellido,email,docente  FROM `persona` WHERE email = '$email'";

        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();

        if (!is_null($fila)){
            $this->nombre = $fila[0];
            $this->apellido = $fila[1];
            $this->email = $fila[2];
            $this->docente = $fila[3];
        }

    }

    public function userExists($email_check){
        $query = "SELECT email  FROM `persona` WHERE email = '$email_check'";

        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();

        if (!is_null($fila)){
            return true;
        }
        return false;  
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>