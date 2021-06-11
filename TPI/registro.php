<?php
  include_once 'includes/user.php';
  include_once 'includes/user_session.php';
  $errorRegistro = "";
  $userSession = new UserSession();
  $user = new User();
  if(isset($_SESSION['user'])){
    header("Location: http://localhost/home.php");
    die();
  } elseif (isset($_POST['email']) && isset($_POST['password'])){
      
      $userForm = $_POST['email'];
      $passForm = $_POST['password'];

      if($user->userExists($userForm, $passForm)){
          //echo "Existe el usuario";
          echo "existe";
          $user->setUser($userForm);
          $userSession->setCurrentUser($user);
          header("Location: http://localhost/home.php");
      }else{
          $errorRegistro = "Usuario ya existente.";
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
    <div class="row justify-content-center" action="registro.php" method="POST">
      <div class="col-12 col-sm-6">
        <form class="form-signin">
          <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
          <h1 class="d-flex justify-content-center">Formulario de registro</h1>
          <hr>
          <h2 >Ingrese sus datos</h1>
            
            <div class="form-group">
              <label for="nombre">Ingrese su nombre:</label>
              <label for="nombre" class="sr-only">Ingrese su nombre</label>
              <input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="">
            </div>
            
            <div class="form-group">
              <label for="apellido">Ingrese su apellido:</label>
              <label for="apellido" class="sr-only">Ingrese su apellido</label>
              <input type="text" class="form-control" id="apellido" aria-describedby="apellido" placeholder="">
            </div>
            
            <hr>
            
            <div class="form-group">
              <label for="tipoUsuario">Es alumno o docente ?</label>
              <label for="tipoUsuario" class="sr-only">Es alumno o docente ?</label>
              <div class="form-check">
                <input type="radio" class="radio" name="tipoUsuario" id="docente" checked>
                <label class="form-check-label" for="exampleCheck1" >Docente</label>
              </div>
              <div class="form-check">
                <input type="radio" class="radio" name="tipoUsuario" id="alumno">
                <label class="form-check-label" for="exampleCheck1">Alumno</label>
              </div>
            </div>
            
            <hr>
            
            
            <div class="form-group">
              <label for="email">Ingrese su email:</label>
              <label for="email" class="sr-only">Email Personal</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="ayudaEmail" placeholder="">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="password">Ingrese su contraseña:</label>
              <label for="password" class="sr-only">Ingrese su contraseña</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="">
            </div>
            <div class="form-group">
              <label for="repitaPassword">Repita su contraseña:</label>
              <label for="repitaPassword" class="sr-only">Repita su contraseña</label>
              <input type="password" name="repeatPassword" class="form-control" id="repitaPassword" placeholder="">
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
            <br>
          </form>
        </div>
      </div>
    </div>
    
    <?php require('footer.php'); ?>
  </body>
  </html>
  