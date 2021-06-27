<?php
$servername = "localhost";
$username = "root";
$password = "";

$link = mysqli_connect($servername, $username, $password) or die("Problemas de conexión a la base de datos");

mysqli_select_db($link, "BaseAlumnos");
?>
