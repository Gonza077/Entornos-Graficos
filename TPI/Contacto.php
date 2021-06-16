<?php require('navbar.php'); ?> 



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    </head>
    <body>
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <form class="form-contact" action="contacto.php" method="post">
                        <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                        <h1 class="d-flex justify-content-center">Contacto</h1>
                        <hr>
                        <div class="user-info">
                            <div class="col-md-12">
                                <label for="nombre">Nombre y Apellido</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Ej: Juan Perez" class="form-control" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})+([\s]{1})+([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})" title="Escriba nombre y apellido separado de espacios. Ej: Juan Perez" required>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" type="text" placeholder="Ej: juanperez@hotmail.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Escribir en minisculas" required>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" name="telefono" type="tel" placeholder="Ej: 3411112223" class="form-control" pattern="[0-9]{10}" title="Debe tener 10 digitos" required>
                            </div>
                        </div>
                        <hr>

                        <div class="mensaje-info">
                            <div class="col-md-12">
                                <label for="asunto">Asunto</label>
                                <input id="asunto" name="asunto" type="text" placeholder="Ej: Consulta AyED" class="form-control" pattern="[A-Za-z0-​9-\s]{3,35}" title="Escriba un asunto con mas de 3 letras" required>
                                </div>
                                <br>
                            <div class="col-md-12">
                                <label for="mensaje">Mensaje</label>
                                <textarea class="form-control" style="min-height: 90px; max-height: 150px;" id="mensaje" name="mensaje" placeholder="Escriba su mensaje aquí." rows="7" required></textarea>
                            </div>
                            <br>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary bt-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php   
 
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

                require 'phpmailer/Exception.php';
                require 'phpmailer/PHPMailer.php';
                require 'phpmailer/SMTP.php';
    
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
                
                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Config del server
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'jpdok98@gmail.com';                     //SMTP username
                    $mail->Password   = 'flawless90210';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Emisor y Receptor
                    $mail->setFrom('jpdok98@gmail.com', 'Juan Pablo'); //Emisor
                    $mail->addAddress($u_email);     //Receptor

                    //Archivos adjuntos
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Contenido del mail
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $u_asunto;
                    $mail->Body    = '<html> 

                    <body> 
    
                    <h1>Correo enviado desde el formulario de Contacto</h1>
    
                    <h2>Información enviada por el usuario de la web:</h2>
    
                    <p>Nombre: '.$u_nombre.'</p>
    
                    <p>Email: '.$u_email.'</p>
    
                    <p>Telefono: '.$u_telefono.'</p>

                    <p>Mensaje: '.$u_mensaje.'</p>
                    
                    </body>
    
                    </html>
    
                    <br />';
                    $mail->AltBody = 'Este texto es para clientes que no soportan Html';

                    $mail->send();
                    echo 'El mensaje ha sido enviado exitosamente';
                    } catch (Exception $e) {
                    echo 'El mensaje no pudo ser enviado', $mail->ErrorInfo;
                    }
            } 
            else 
            {
            }

        ?>
        
        <?php require('footer.php'); ?>

    </body>
</html>
