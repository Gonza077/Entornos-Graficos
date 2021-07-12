<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sitemap.css">
    <title>Mapa del sitio</title>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <div class="offset-2">
            <h1>Mapa del sitio</h1>
            <div class="row">
                <div class="col-lg-2">
                    <ul>
                        <li>
                            <a href="consultas.php">Consultas</a>
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
<!-- /container -->
    <?php include('footer.php'); ?>
</body>
</html>