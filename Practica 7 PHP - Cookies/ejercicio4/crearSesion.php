<?php
    echo "<h1>Redirección automatica a la página obtenerDatos.php en 5 segundos</h1>";
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    session_start();
    $_SESSION["nombre"] = $nombre;
    $_SESSION["password"] = $password;

    sleep(5);
    header("Location: obtenerDatos.php");
?>