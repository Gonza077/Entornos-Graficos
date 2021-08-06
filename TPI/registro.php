<?php
  include_once 'includes/user.php';
  include_once 'includes/user_session.php';
  $errorRegistro = "";
  $exitoRegistro ="";
  $userSession = new UserSession();
  $user = new User();
  if(isset($_SESSION['user'])){
    header("Location: ./consultas.php");
    die();
  } elseif (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordRepeat']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['legajo'])){
      $emailForm = $_POST['email'];
      $legajoForm = $_POST['legajo'];
      $passForm = $_POST['password'];
      $passRepeatForm = $_POST['passwordRepeat'];
      $nombreForm = $_POST['nombre'];
      $apellidoForm = $_POST['apellido'];
      $isDocenteForm = isset($_POST['isDocente']) ? 1 : 0;
      if($user->checkIfUserExists($emailForm) || $user->checkIfUserExistsByLegajo($legajoForm)){
          $errorRegistro = "Usuario existente con mail o legajo ingresado. Inténtelo nuevamente o contacte a la administración.";
      }
      else{
        if($passForm == $passRepeatForm){
          $user->registerUser($emailForm,$passForm,$nombreForm,$apellidoForm,$isDocenteForm,$legajoForm);
          
          $exitoRegistro = "El registro se ha realizado exitosamente!";
        }else{
          $errorRegistro = "Las contraseñas no coinciden.";
        }
      }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link rel="icon" href="./assets/Icono.ico">
    <link rel="stylesheet" href="./css/footerRelativo.css" >
</head>
<body>
  <div class="container">
    <div class="row justify-content-center" >
      <div class="col-12 col-sm-6">
        <form class="form-signin" method="POST">
          <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
          <h1 class="d-flex justify-content-center">Formulario de registro</h1>
          <hr>
          <h1>Ingrese sus datos</h1>
            
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <label for="nombre" class="sr-only">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="" required>
            </div>
            
            <div class="form-group">
              <label for="apellido">Apellido:</label>
              <label for="apellido" class="sr-only">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="apellido" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="legajo">Legajo:</label>
              <label for="legajo" class="sr-only">Legajo</label>
              <input type="number" class="form-control" name="legajo" id="legajo" min="1" aria-describedby="legajo" placeholder="" required>
            </div>
            
            <hr>
            
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" name="isDocente" id="isDocente">
                <label class="form-check-label" for="isDocente" >Docente</label>
                <label class="sr-only" for="isDocente" >Docente</label>
              </div>
            </div>
            <hr>  
            <div class="form-group">
              <label for="email">Email Personal:</label>
              <label for="email" class="sr-only">Email Personal</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="email" required placeholder="EjemploEmail@email.com">
            </div>
            <div class="form-group">
            <label for="password">Contraseña</label>
              <label for="password" class="sr-only">Contraseña</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="passwordRepeat">Repita su Contraseña</label>
              <label for="passwordRepeat" class="sr-only">Repita su Contraseña</label>
              <input type="password" name="passwordRepeat" class="form-control" id="passwordRepeat" placeholder="" required>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-right">
                      <button class="btn btn-lg btn-success btn-block" type="submit">Registrarme</button>
                    </div>
                    <div class="col-md-6 text-left">
                      <button class="btn btn-lg btn-primary btn-block" onclick="window.location.href='consultas.php'">Ir a Inicio</button>
                    </div>
                </div>
            </div>          
            <p class="bg-success"><?php echo $exitoRegistro; ?></p>
            <p class="bg-danger"><strong><?php echo $errorRegistro; ?></strong></p>
          </form>
        </div>
      </div>
    </div>   
    <?php require_once('footer.php'); ?>
  </body>
</html>
  
