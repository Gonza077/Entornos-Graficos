<?php 
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
        <title>¿Quienes somos?</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <link rel="icon" href="./assets/Icono.ico">
        <link rel="stylesheet" href="./css/footerRelativo.css">
    </head>
    <body>
    <?php require_once('navbar.php'); ?> 
        <div class="container-fluid" style="min-height: 800px;">
            <div class="row justify-content-center form-group">
                <div class="col-12 col-sm-6">
                    <form class="form-contact" action="contacto.php" method="post" style="margin-bottom: 100px;">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">¿Quienes somos?</h1>
                        <hr>
                        <ul>
                        <p>
                            Somos el Grupo N°4 de la materia de <b>Entornos Graficos </b>de la UTN dictada durante el año 2021, primer cuatrimestre. 
                            <br><h4>Integrantes:</h4> 
                        </p>
                        <p> 
                            <ul>
                                <li>Castillo, Gonzalo<br></li>
                                <li>Diez, Juan Pablo<br></li>
                                <li>Pinacca, Franco <br></li>
                                <li>Ulla, David<br></li>
                                <li>Mateucci, Nicolas<br></li>
                            </ul>
                        </p>
                            </div>
                        </ul>
                    </form> 
                </div>
            </div>
        </div>
        <?php require_once('footer.php'); ?> 
    </body>
</html>
