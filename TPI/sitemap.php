
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sitemap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="./css/toast.css">
    <link rel="stylesheet" href="./css/footerRelativo.css">
    <title>Mapa del sitio</title>
</head>
<body>
    <?php require_once 'navbar.php'?>
    <div class="container-fluid" style="min-height:800px">
        <div class="offset-2">
            <h1>Mapa del sitio</h1>
            <div class="row">
                <div class="col-lg-2">
                    <ul>
                        <li>
                            <a href="consultas.php">Consultas</a>
                            <ul>
                                <li>
                                    <a href="./misSolicitudes.php">Mis Solicitudes</a>
                                </li>
                                <li>
                                    <a href="./misConsultas.php">Mis Consultas</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="registro.php">Registro</a>
                        </li>
                        <li>
                            <a href="Contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
</body>
</html>