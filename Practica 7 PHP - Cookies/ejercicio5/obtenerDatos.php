<?php
    session_start();

    $nombre = $_SESSION["nombreUsuario"];
    $password = $_SESSION["password"];

    echo "<h2>Ingreso el nombre de usuario: $nombre y la contraseña $password</h2>";
?>