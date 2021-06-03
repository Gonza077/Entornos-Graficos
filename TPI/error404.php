<?php require('navbar.php'); ?>
    <head>
        <link rel="stylesheet" href="./error404.css">
    </head>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="plantilla-error">
                        <h1>Oops!</h1>
                        <h2>404- Page not Found </h2>
                        <div class="detalles-error">
                            <strong>Disculpa, un error ha ocurrido, la pagina solicitada no se ha encontrado!</strong>
                        </div>
                        <div class="botones">
                            <!-- Aca irian los href del Home y el contacto-->
                            <a href="./Home" class="btn btn-primary btn-lg">Home</a>
                            <a href="./Contacto" class="btn btn-info btn-lg">Contactar al soporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php require('footer.php'); ?>
</html>
