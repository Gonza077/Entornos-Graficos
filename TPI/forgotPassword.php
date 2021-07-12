<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reestablecer Contraseña</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <link rel="icon" href="./assets/Icono.ico">
        <!-- <link rel=StyleSheet href="./css/forgotPassword.css" type="text/css"> -->

    </head>
    <body>
        <?php require('navbar.php'); ?> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <form class="form-regis" action="forgotPassword.php" method="post">
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
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary bt-lg" onclick="enviarMailContraseña()" name="generarToken">Enviar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary bt-lg" name="recuperar" disabled>Recuperar contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php require('footer.php'); ?>
        <script>
                function enviarMailContraseña(){
                var email = $('#email').val();
                $.ajax({
                    url: "ajax/generarToken.php",
                    type: "post",
                    data : email,
                    processData: false,
                    contentType: false})
                    .done(response=>{
                        openToast(response,"Carga Consulta",'success');
                    })
                    .fail(response=>{
                        openToast(response,"Carga Consulta",'error');
                    });
                }
  
        </script>
</html>