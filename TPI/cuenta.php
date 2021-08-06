<?php
use Psr\Http\Message\RequestInterface;
include_once('includes/user_session.php');
include_once('includes/user.php');
$user_session = new UserSession();
$user = $user_session->getCurrentUser();
?> 
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link REL=stylesheet HREF="./css/micuenta.css" TYPE="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="./css/toast.css">
        <link rel="stylesheet" href="./css/footerRelativo.css">
        <title>Mi Cuenta</title>
        <link rel="icon" href="./assets/Icono.ico">
    </head>
    <body>
        <?php  require_once './navbar.php' ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form class="form-contact">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Mi Cuenta</h1>
                        <hr>
                        <nav class="navbar navbar-expand-lg ">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav navbar-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="consultas.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cambiarContraseña.php">Cambiar Contraseña</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <hr>
                        <div class="user-info">
                            <h3 class="d-flex justify-content-left">Datos Personales</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $legajo = $user->getLegajo();?>
                                    <label for="legajo">Legajo</label>
                                    <input readonly id="legajo" name="legajo" type="text" value="<?php echo $legajo ?>" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $nombre = $user->getNombre();?>
                                    <label for="nombre">Nombre</label>
                                    <input readonly id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre">Apellido</label>
                                    <?php $apellido= $user->getApellido();?>
                                    <input readonly id="nombre" name="nombre" type="text" value="<?php echo $apellido ?>" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $email = $user->getEmail();?>
                                    <label for="email">Correo Electrónico</label>
                                    <input readonly id="email" name="email" type="text" value="<?php echo $email ?>" class="form-control">
                                </div>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once('footer.php'); ?> 
    </body>   
</html>
