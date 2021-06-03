<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
  
  <!-- Ejemplo template Boostrap 4 -->
  <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <title>Alta de usuario</title>
</head>
<body>
  <!-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-4 col-sm-4 col-md-4">Columna 1</div>
      <div class="col-4 col-sm-4 col-md-4">Columna 2</div>
      <div class="col-4 col-sm-4 col-md-4">Columna 3</div>
  </div> -->
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6">
        <form class="form-signin">
          <img class="mb-4 " src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
          <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
          <label for="inputEmail" class="sr-only">Email Personal</label>
          <input type="email" id="email" class="form-control" placeholder="Ingrese su email" required autofocus>
          <input type="text" id="nombre" class="form-control" placeholder="Ingrese su nombre" required >
          <input type="text" id="apellido" class="form-control" placeholder="Ingrese su apellido" required >
          <label for="t" class="sr-only">Contraseña</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Ingrese su contraseña" required>
          <input type="password" id="inputPassword" class="form-control" placeholder="Repita su contraseña" required>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="radio" value="opcion1" checked>
            <label class="form-check-label" for="radioDocente">
              Docente
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="radio" value="opcion2">
            <label class="form-check-label" for="radioAlumno">
              Alumno
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
        </form>
      </div>
    </div>
  </div>
  
  
  
  
  <!-- Optional JavaScript; choose one of the two! -->
  
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  -->
</body>
</html>
