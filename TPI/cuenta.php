<?php 

    include_once('includes/user_session.php');
    include_once('includes/user.php');

    $user_session = new UserSession();
    $user = $user_session->getCurrentUser();
?> 

<?php require('navbar.php'); ?> 



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
                <div class="col-12 col-sm-6">
                    <form class="form-contact">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Mi Cuenta</h1>
                        <hr>
                        <div class="vertical-menu justify-content-center">
                            <a href="consultas.php">Mis Consultas</a>
                            <a href="cambiarContraseña.php">Cambiar Contraseña</a>
                            <a href="#">Cambiar Correo Electrónico</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body> 

    <?php require('footer.php'); ?> 
</html>