<?php 

include ('includes/mail.php');
include_once('includes/user.php');
include_once('includes/recuperarContraseña.php');
$user = new User();
$msgExito = "";
$msgError="";

if(isset($_POST['email'])) 
{
    $email = $_POST['email'];
    $user->getUserByEmail($email);
    $persona_id = $user->getId();
    // $token = generarToken($persona_id); 

    if (isset($persona_id) && !is_null($persona_id))
    {   
        $token=setearNuevaContraseña($persona_id);
        enviarMail($email,'Recuperacion de Password',setearCuerpoHtml($token));
        $msgExito = "El mail de recuperación de contraseña fue enviado a su correo electronico.";
    }
    else 
        $msgError="No existe usuario con el correo electronico ingresado.";
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reestablecer Contraseña</title>
        <link rel="stylesheet" href="./css/footerRelativo.css">
        <link rel="icon" href="./assets/Icono.ico">
        <!-- <link rel=StyleSheet href="./css/forgotPassword.css" type="text/css"> -->

    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <form class="form-regis" action="olvideContraseña.php" method="post">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Recuperar Contraseña</h1>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email">Ingrese su email:</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Ej: miemail@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Escribir email en minúsculas" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">

                                <div class="col-md-6 text-rig">
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Enviar</button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button class="btn btn-lg btn-primary btn-block" onclick="window.location.href='consultas.php'">Ir a Inicio</button>
                                </div>
                            </div> 
                        </div>
                        <p style="color:green;"><?php echo $msgExito; ?></p>
                        <p style="color:red;"><?php echo $msgError; ?></p>
                    </form>
                </div>
            </div>
        </div>
        <?php require('footer.php'); ?>
    </body>
</html>