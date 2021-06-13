<?php

include_once 'db.php';

class User extends DB{
    private $id;
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
        
        $query = "SELECT id,nombre,apellido,email,docente  FROM `persona` WHERE email = '$email'";

        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();

        if (!is_null($fila)){
            $this->id = $fila[0];
            $this->nombre = $fila[1];
            $this->apellido = $fila[2];
            $this->email = $fila[3];
            $this->docente = $fila[4];
        }

    }

    public function registerUser($email,$pass,$nombre,$apellido,$isDocente){

        $passMD5=md5($pass);
        $query="INSERT INTO persona (nombre,apellido,email,password,docente) VALUES ('$nombre','$apellido','$email','$passMD5',$isDocente)";

        $stmt = $this->connect()->query($query);
    }

    public function checkIfUserExists($email_check){
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

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function isDocente(){
        return $this->docente;
    }
}

?>
