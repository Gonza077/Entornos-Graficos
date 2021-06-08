<?php

$email=$_POST['email'];
$contraseña=$_POST['contraseña'];

include ('database.php');

$query="SELECT * FROM persona WHERE email='$email' and password='$contraseña'";

$resultado= $conn -> query($query);

$filas = mysqli_num_rows($resultado);

if($filas){  
    //ACA TENDRIAMOS QUE GUARDAR EL USUARIO QUE SE LOGEO
    session_start(); 
    $_SESSION['email']=$email;
    $_SESSION['contraseña']=$contraseña;
    header("location:home.php");  
}
else{
    include ("login.php");    
    echo "<h1>ESTAS DROGRADO? CONTRASEÑA INCORRECTA</h1>";
}

$conn -> close();

?>