<?php
  include_once 'includes/user.php';
  include_once 'includes/user_session.php';
  $errorRegistro = "";
  $userSession = new UserSession();
  $user = new User();
  if(isset($_SESSION['user'])){
    header("Location: http://localhost/home.php");
    die();
  } elseif (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordRepeat']) && isset($_POST['nombre']) && isset($_POST['apellido'])){
      $emailForm = $_POST['email'];
      $passForm = $_POST['password'];
      $passRepeatForm = $_POST['passwordRepeat'];
      $nombreForm = $_POST['nombre'];
      $apellidoForm = $_POST['apellido'];
      $isDocenteForm = isset($_POST['isDocente']) ? 1 : 0;
      echo $isDocenteForm;
      if($user->checkIfUserExists($emailForm)){
          $errorRegistro = "Usuario ya existente.";
      }else{
        if($passForm == $passRepeatForm){
          $user->registerUser($emailForm,$passForm,$nombreForm,$apellidoForm,$isDocenteForm);
          header("Location: http://localhost/login.php");
        }else{
          $errorRegistro = "Las contraseñas no coinciden.";
        }
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>Pagina Principal</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center" >
      <div class="col-12 col-sm-6">
        <form class="form-signin" action="" method="POST">
          <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
          <h1 class="d-flex justify-content-center">Formulario de registro</h1>
          <hr>
          <h2 >Ingrese sus datos</h1>
            
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
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
            <br>
            <small style="color:red;"><?php echo $errorRegistro; ?></small>
          </form>
        </div>
      </div>
    </div>
    
    <?php require('footer.php'); ?>
  </body>
  </html>
  