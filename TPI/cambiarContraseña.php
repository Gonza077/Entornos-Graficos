<?php 
    include ('./includes/db.php');
    include_once('includes/user_session.php');
    include_once('includes/user.php');

    $user_session = new UserSession();
    $user = new User();
    $user = $user_session->getCurrentUser();
    $error = "";
    $id = $user->getId();

    if (isset($_POST['password1']))

    {   
        $contraseñaActual  = $_POST['password1'];
        $db= new DB();
        $passMD5=md5($contraseñaActual);
        $query = "SELECT id  FROM `persona` WHERE id = $id AND password = '$passMD5'";
        $stmt = $db->connect()->query($query);
        $fila = $stmt->fetch_row();

        if (!is_null($fila))
        {
            if (isset($_POST['password2']) && isset($_POST['password3']))
            {   
                $clave2 = $_POST['password2'];
                $clave3 = $_POST['password3'];

                if ($clave2 == $clave3)
                    {
                        // $user->cambiarContraseñaUsuario($clave1,$id);
                        $db= new DB();
                        $passMD5=md5($clave2);
                        $query="UPDATE persona Set password = '$passMD5' where id=$id";
                        $stmt = $db-> connect() ->query($query);
                        $error= 'La contraseña ha sido modificada exitosamente.';
                    }
                else
                {
                    $error= 'Las nuevas contraseñas deben ser iguales, inténtelo nuevamente.';
                }
            }
        }
        else
        $error= 'La contraseña actual es incorrecta.';
            
    }
    

?> 


  
<!DOCTYPE html>
<html lang="en">
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
                    <form class="form-contact" action="cambiarContraseña.php" method="POST">
                        <div class="form-group">
                            <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
                            <h2 class="d-flex justify-content-center">Cambiar Contraseña</h2>
                            <label for="inputPassword1">Contraseña Actual</label>
                            <input type="password" id="inputPassword1" name="password1" class="form-control" pattern="[A-Za-z0-​9]{6,20}" title="Ingrese su contraseña actual" required>
                            <br>
                            <label for="inputPassword2">Nueva Contraseña</label>
                            <input type="password" id="inputPassword2" name="password2" class="form-control" pattern="[A-Za-z0-​9]{6,20}" title="Ingrese una contraseña de letras y/o números de 6 a 12 dígitos" required>
                            <br>
                            <label for="inputPassword3">Repetir Nueva Contraseña</label>
                            <input type="password" id="inputPassword3" name="password3" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-lg btn-primary btn-block" style="background-color:green" type="submit">Cambiar</button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button class="btn btn-lg btn-primary btn-block" onclick="window.location.href='cuenta.php'">Atrás</button>
                                </div>
                            </div>
                        </div>
                        <?php echo $error; ?>
                    </form>   
                </div>
            </div>
        </div>

    </body>
    <?php require('footer.php'); ?>

</html>