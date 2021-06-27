<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL=StyleSheet HREF="./css/micuenta.css" TYPE="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    </head>
    <body>
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form class="form-contact">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Mi Cuenta</h1>
                        <hr>
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav navbar-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="home.php">Inicio</a>
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
                            <div class="col-md-6">
                                <?php $nombre = $user->getNombre();?>
                                <label for="nombre">Nombre</label>
                                <input readonly id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>" class="form-control">
                            </div>
                            <br>
                            <div class="col-md-6">
                                <label for="nombre">Apellido</label>
                                <?php $apellido= $user->getApellido();?>
                                <input readonly id="nombre" name="nombre" type="text" value="<?php echo $apellido ?>" class="form-control">
                            </div>
                            <br>
                            <div class="col-md-6">
                                <?php $email = $user->getEmail();?>
                                <label for="email">Correo Electrónico</label>
                                <input readonly id="email" name="email" type="text" value="<?php echo $email ?>" class="form-control">
                            </div>
                            <br>
                            <div class="col-md-6">
                                <?php $legajo = $user->getLegajo();?>
                                <label for="legajo">Legajo</label>
                                <input readonly id="legajo" name="legajo" type="text" value="<?php echo $legajo ?>" class="form-control">
                            </div>
                            <!-- <div class="col-md-12">
                            <?php $telefono = $user->getTelefono();?>
                                <label for="telefono">Teléfono</label>
                                <input readonly id="telefono" name="telefono" type="tel" value="<?php echo $telefono ?>" class="form-control">
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>









    </body> 

    <?php require('footer.php'); ?> 
</html>
