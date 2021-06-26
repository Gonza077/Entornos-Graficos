<?php
//Verificar si recibo datos del formulario por parte del usuario
if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    setcookie("nombre", $nombre, time() + (60 * 60 * 24 * 90));
    header("Location: http://localhost/Entornos-Graficos(Viejo)/Practica%207%20PHP%20-%20Cookies/ejercicio3.php");
}
if(isset($_POST['borrar'])){
    setcookie("nombre", '', time() + (60 * 60 * 24 * 90));
    header("Location: http://localhost/Entornos-Graficos(Viejo)/Practica%207%20PHP%20-%20Cookies/ejercicio3.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <title>Cookies en PHP</title>
    <link rel="stylesheet" type="text/css" href="../bootswatch/minty-bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-12 col-sm-10">
                <form class="form-signin" action="crearSesion.php" method="POST">
                    <h1>Ingrese sus datos</h1>
                    <hr>
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre de usuario:</label>
                        <input type="nombreUsuario" class="form-control" name="nombreUsuario" id="nombreUsuario" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="" required>
                    </div>
                    
                    <div class="form-group">
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Guardar mis datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

