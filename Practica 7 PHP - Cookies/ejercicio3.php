<?php
//Verificar si recibo datos del formulario por parte del usuario
if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    setcookie("nombre", $nombre, time() + (60 * 60 * 24 * 90));
    header("Location: ejercicio3.php");
}
if(isset($_POST['borrar'])){
    setcookie("nombre", '', time() + (60 * 60 * 24 * 90));
    header("Location: ejercicio3.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <title>Cookies en PHP</title>
    <link rel="stylesheet" type="text/css" href="bootswatch/minty-bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-12 col-sm-10">
                <form class="form-signin" action="ejercicio3.php" method="POST">
                    <?php
                        $nombre = $_COOKIE["nombre"] ?? ""; 
                        if($nombre == ''){
                            echo "<h2>No existe un nombre previamente guardado</h2>";
                        }else{
                            echo "<h2>El nombre guardado anteriormente es: $nombre</h2>";
                        }
                    ?>
                    <h1>Ingrese su nombre</h1>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Crear Cookie</button>
                        <button class="btn btn-lg btn-warning btn-block" type="submit" name="borrar">Borrar Cookie</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

