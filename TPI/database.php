<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataBase= "consultas_db";

/*
$conn = new PDO("mysql:host=$servername;dbname=consultas_db", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully";*/
$conn = mysqli_connect($servername,$username,$password,$dataBase) or die("echo No se pudo conectar al servidor");
//$db = mysqli_select_db($conn,$dataBase) or die("echo No se pudo conectar a la base de datos");
mysqli_set_charset($conn,"utf8")
?>