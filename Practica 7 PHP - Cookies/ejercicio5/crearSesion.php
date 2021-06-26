<?php
 
    $nombre = $_POST["nombreUsuario"];
    $password = $_POST["password"];

    session_start();
    $_SESSION["nombreUsuario"] = $nombre;
    $_SESSION["password"] = $password;

    header("Refresh:1; url=obtenerDatos.php");
    echo "Redirección automatica a la página obtenerDatos.php en 1 segundos";
    
?>