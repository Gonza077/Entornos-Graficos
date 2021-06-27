<?php
session_start();
?>
<html>
<head>
    <title>Problema</title>
</head>
<body>
    <?php
    include ("conexion.inc");
    //Captura datos desde el Form anterior
    $mail= $_POST['mail'];
    //Arma la instrucción SQL y luego la ejecuta
    $vSql = "select * FROM alumnos WHERE mail ='$mail' ";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
    $fila = mysqli_fetch_array($vResultado);
    if(mysqli_num_rows($vResultado) == 0) {
        echo ("Usuario Inexistente...!!! <br>");
    }
    else{
        $_SESSION['usuario']= $fila['nombre'];
    }
    ?>
    <a href="pagina3.php">Ingresar a pagina principal</a>;
</body>
</html>
