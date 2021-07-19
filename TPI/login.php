<?php
  include_once 'includes/user.php';
  include_once 'includes/user_session.php';
  $errorLogin = "";
  $userSession = new UserSession();
  $user = new User();
  if(isset($_SESSION['user'])){
    header("Location: /consultas.php");
    die();
  } elseif (isset($_POST['email']) && isset($_POST['password'])){
      
      $userForm = $_POST['email'];
      $passForm = $_POST['password'];

      if($user->userExists($userForm, $passForm)){
          $user->getUserByEmail($userForm);
          $userSession->setCurrentUser($user);
          header("Location: /consultas.php");
          
      }else{
          $errorLogin = "Nombre de usuario y/o password incorrecto";
      }
  }?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <link rel="icon" href="./assets/Icono.ico">
  </head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 col-sm-6">
        <form class="form-signin" action="login.php" method="POST">
          <div class="form-group">
            <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
            <h1 class="d-flex justify-content-center">Iniciar Sesión</h1>
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Direccion de email</label>
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Direccion de email" required autofocus>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="sr-only">Contraseña</label>
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required> 
            </div>
            <a href="olvideContraseña.php">Olvidó su contraseña?</a>
          </div>
          <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-md-6 text-left">
                  <input class="btn btn-lg btn-primary btn-block" type="button" value="Atrás" onClick="history.go(-1);">
                </div>
                <div class="col-md-6 text-right">
                  <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
                </div>
            </div>
          </div>
          <br>
          <hr>
          <a href="/registro.php" class="btn btn-primary btn-lg btn-block">Registrarme</a>
          <?php echo $errorLogin; ?>
        </form>   
      </div>
    </div>
  </div>
  <?php require('footer.php'); ?>
</body>
</html>
