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
        <title>Contacto</title>
        <link rel="icon" href="./assets/Icono.ico">
        <link rel="stylesheet" href="./css/footerRelativo.css">
    </head>
    <body>
    <?php require('navbar.php'); ?> 
        <div class="container-fluid">
            <div class="row justify-content-center form-group">
                <div class="col-12 col-sm-6">
                    <form class="form-contact" action="contacto.php" method="post" style="margin-top: 20px;">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Contacto</h1>
                        <hr>
                        <div class="user-info form-group">
                            <div class="col-md-12">
                                <label for="nombre">Nombre y Apellido</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Ej: Juan Perez" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ-\s]{3,25}" title="Escriba nombre y apellido separados por un espacio. Ej: Juan Perez" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" type="text" placeholder="Ej: juanperez@hotmail.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Escribir en minisculas" required>
                            </div>                         
                            <div class="col-md-12 form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" name="telefono" type="tel" placeholder="Ej: 3411112223" class="form-control" pattern="[0-9]{10}" title="Debe tener 10 digitos" required>
                            </div>
                        </div>
                        <div class="mensaje-info form-group">
                            <div class="col-md-12">
                                <label for="asunto">Asunto</label>
                                <input id="asunto" name="asunto" type="text" placeholder="Ej: Consulta AyED" class="form-control" pattern="[A-Za-z0-​9-\s]{3,35}" title="Escriba un asunto de minimo 3 letras" required>
                                </div>
                                <br>
                            <div class="col-md-12 form-group">
                                <label for="mensaje">Mensaje</label>
                                <textarea class="form-control" style="min-height: 90px; max-height: 150px;" id="mensaje" name="mensaje" placeholder="Escriba su mensaje aquí." rows="7" required></textarea>
                            </div>
                            <br>
                            <div class="col-md-12 text-right form-group">
                                <button type="submit" class="btn btn-primary bt-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>          
        </div>
        <?php require('footer.php'); ?>
    </body>
</html>


<?php   

include ('includes/mail.php');

    if($_POST) 
    {
        $u_nombre = "";
        $u_email = "";
        $u_telefono = "";
        $u_asunto ="";
        $u_mensaje = "";

        if(isset($_POST['nombre'])) {
        $u_nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        }

        if(isset($_POST['email'])) {
        $u_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $u_email = filter_var($u_email, FILTER_VALIDATE_EMAIL);
        }

        if(isset($_POST['asunto'])) {
        $u_asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
        }

        if(isset($_POST['telefono'])) {
        $u_telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        }

        if(isset($_POST['mensaje'])) {
        $u_mensaje = htmlspecialchars($_POST['mensaje']);
        }
        


        //Preparamos el mail y usamos la funcion del include mail.php
        $cuerpo_html='<html> 
        
        <body> 
        <h1>Correo enviado desde el Sistema de Consultas</h1>
        <h2>Mensaje enviado por el usuario de la web:</h2>
        <p>Nombre: '.$u_nombre.'</p>
        <p>Email: '.$u_email.'</p>
        <p>Telefono: '.$u_telefono.'</p>
        <p>Mensaje: '.$u_mensaje.'</p>
        </body>
        </html>
        <br />';
        enviarMail('moduloconsultas@gmail.com',$u_asunto,$cuerpo_html);
    } 
?>   