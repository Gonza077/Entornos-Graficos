<?php

include_once 'db.php';

class User extends DB{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $docente;
    private $admin;
    private $telefono;
    private $legajo;


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


    public function getUserByEmail($email){
        
        $query = "SELECT id,nombre,apellido,email,docente,legajo,admin  FROM `persona` WHERE email = '$email'";

        $this->fetchUserFromDatabase($query);
    }


    public function getUserByLegajo($legajo,$docente){
        
        $query = "SELECT id,nombre,apellido,email,docente,legajo,admin  FROM `persona` WHERE legajo = '$legajo'";

        $this->fetchUserFromDatabase($query);
    }


    public function cambiarContrase├▒aUsuario($pass,$id)
    {   

        $passMD5=md5($pass);
        $query="UPDATE persona Set password = $passMD5 where id=$id";

        $stmt = $this->connect()->query($query);
    }


    private function fetchUserFromDatabase($query){
        $stmt = $this->connect()->query($query);

        $fila = $stmt->fetch_row();

        if (!is_null($fila)){
            $this->setUser($fila);
        }
    }

    private function setUser($userArr){
        $this->id = $userArr[0];
        $this->nombre = $userArr[1];
        $this->apellido = $userArr[2];
        $this->email = $userArr[3];
        $this->docente = $userArr[4];
        $this->legajo = $userArr[5];
        $this->admin = $userArr[6];
    }

    public function registerUser($email,$pass,$nombre,$apellido,$isDocente,$legajo){

        $passMD5=md5($pass);
        $query="INSERT INTO persona (nombre,apellido,email,password,docente,legajo) VALUES ('$nombre','$apellido','$email','$passMD5',$isDocente,'$legajo')";

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

    public function checkIfUserExistsByLegajo($legajo_check){
        $query = "SELECT legajo  FROM `persona` WHERE legajo = '$legajo_check'";

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

    public function getTelefono(){
        return $this->telefono;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getLegajo(){
        return $this->legajo;
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

    public function isAdmin()
    {
        return $this->admin;
    }
}

?>
