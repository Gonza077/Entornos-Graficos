<?php require('navbar.php'); ?>
    <head>
 
        
 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        .container
        {
            background-color:#e3ece8; 
        
        }
        .header {
            color: #36A0FF;
            font-size: 27px;
            padding: 10px;
        }
        </style>
    </head>
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" action="Contacto.php" method="post">
                        <fieldset>
                            <legend class="text-center header">Contacto</legend>
    
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                <div class="col-md-8">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" placeholder="Ej: Juan Perez" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{3,30}+[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{3,30}" title="Escriba nombre y apellido separado de espacios. Ej: Juan Perez" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                <div class="col-md-8">
                                    <label for="nombre">Correo Electrónico</label>
                                    <input id="email" name="email" type="text" placeholder="Ej: juanperez@hotmail.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Escribir en minisculas" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                <div class="col-md-8">
                                    <label for="nombre">Teléfono</label>
                                    <input id="telefono" name="telefono" type="tel" placeholder="Ej: 3411112223" class="form-control" pattern="[0-9]{10}" title="Debe tener 10 digitos" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                <div class="col-md-8">
                                    <label for="nombre">Asunto</label>
                                    <input id="asunto" name="asunto" type="text" placeholder="Ej: Consulta AyED" class="form-control" pattern="[A-Za-z0-​9]{3,20}" title="Escriba un asunto con mas de 3 letras" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                <div class="col-md-8">
                                    <label for="nombre">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba su mensaje aquí." rows="7" required></textarea>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

<?php

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


                $headers  = 'From: ' . $u_email . "\r\n";

                $receptor = ' ';

                if(mail($receptor, $u_asunto, $u_mensaje, $headers)) {
                    echo "<p>Gracias por contactarnos, $u_nombre. Responderemos lo mas rápido posible.</p>";
                } else {
                    echo '<p>Lo sentimos, el correo no fue recibido.</p>';
                }     
            } 
        else 
        {
        }
        
?>

<?php require('footer.php'); ?>
</html>