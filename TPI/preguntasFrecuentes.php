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
        <title>Preguntas Frecuentes</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <link rel="icon" href="./assets/Icono.ico">
        <link rel="stylesheet" href="./css/footerRelativo.css">
    </head>
    <body>
    <?php require('navbar.php'); ?> 
        <div class="container-fluid">
            <div class="row justify-content-center form-group">
                <div class="col-12 col-sm-6">
                    <form class="form-contact" action="contacto.php" method="post" style="margin-bottom: 100px;">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Preguntas Frecuentes</h1>
                        <hr>
                        <ul>
                            <li><h4>¿Cómo me registro en el sitio?</h4>
                            <p>Para registrarte en el sitio ya sea como alumno o docente deberás hacer click en "Iniciar Sesión", a dicha funcionalidad la encontrarás en la parte superior derecha del sitio.</p>
                            </li>
                            <li><h4>Si soy Alumno, ¿Cómo me inscribo a una consulta?</h4>
                            <p>Para inscribirte a una consulta primero tenes que inicar sesión en la sección "Iniciar Sesión" ubicada en la parte superior derecha del sitio. Luego deberás ir a la seccion "Consultas" ubicada en la parte superior izquierda del sitio y estando allí seleccionar la operación de Inscripción.</p>
                            </li>
                            <li><h4>¿Como me puedo contactar con la administración?</h4>
                            <p>Para mandarnos un mensaje deberás ir a la seccion de "Contacto" que se encuentra en la parte superior izquierda del sitio y rellenar el formulario.</p>
                            </li>
                            <li><h4>Si soy docente, ¿Cómo hago para bloquear una consulta?</h4>
                            <p>En este caso, tendrás que iniciar sesión y luego en la sección "Consultas", seleccionar "bloquear consulta" en la parte de Operaciones. Recordá que tendrás que indicar el motivo de bloqueo e ingresar los datos de la consulta alternativa.</p>
                            </li>
                            <li ><h4>¿Cómo hago para cambiar mi contraseña?</h4>
                            <p>Para cambiar tu contraseña deberás inicar sesión primeramente y luego ir a la sección "Mi Cuenta" que se encuentra en la parte supeior derecha del sitio.</p>
                            </li>
                        </ul>
                    </form> 
                </div>
            </div>
        </div>
        <?php require('footer.php'); ?> 
    </body>
</html>
