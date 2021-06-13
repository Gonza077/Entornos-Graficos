<?php
  include_once 'includes/user.php';
  include_once 'includes/user_session.php';
  $errorLogin = "";
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
          $errorLogin = "Nombre de usuario y/o password incorrecto";
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
  </head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 col-sm-6">
        <form class="form-signin" action="login.php" method="POST">
          <div class="form-group">
            <h1 class="d-flex justify-content-center">Iniciar sesion</h1>
            <label for="inputEmail" class="sr-only">Direccion de email</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Direccion de email" required autofocus>
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Recordarme
                </label>
              </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
          <br>
          <a href="./home.php" class="d-flex justify-content-center">¿Olvidaste tu contraseña?</a>
          <hr>
          <a href="./registro.php" class="btn btn-primary btn-lg btn-block">Registrarme</a>
          <?php echo $errorLogin; ?>
        </form>   
      </div>
    </div>
  </div>
</body>
<?php require('footer.php'); ?>


</html>
