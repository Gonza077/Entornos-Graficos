<?php
//Veo si recibo datos del formulario por parte del usuario
if(isset($_POST["estilo"])){
    //Estoy recibiendo un estilo nuevo, lo capturo con $_POST
    $estilo = $_POST["nombre"];
    // Lo agrego a la cookie
    setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
}else{
    //No he recibido el estilo que desea el usuario, miro si hay una cookie anteriormente creada
    if (isset($_COOKIE["estilo"])){
        // Asigno al estilo la información guardada en la cookie
        $estilo = $_COOKIE["estilo"];
    }
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
                <h1>
                    Ejemplo de uso de cookies en PHP para almacenar la hoja de estilos css que queremos
                    utilizar para definir el aspecto de la página.
                </h1>
                
                <form class="form-signin" action="ejercicio3.php" method="POST">
                    
                    <h1>Ingrese su nombre</h1>
                    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <label for="nombre" class="sr-only">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="" required>
                    </div>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar nombre</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

