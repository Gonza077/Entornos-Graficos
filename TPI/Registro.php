<?php require('navbar.php'); ?> 
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
            <div class="col-12 col-sm-12 text-center">
              <img class="mb-4 " src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
            </div>
            <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
            <label for="inputEmail" class="sr-only">Email Personal</label>
            <input type="email" id="email" class="form-control" placeholder="Ingrese su email" required autofocus>
            <input type="text" id="nombre" class="form-control" placeholder="Ingrese su nombre" required >
            <input type="text" id="apellido" class="form-control" placeholder="Ingrese su apellido" required >
            <label for="t" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Ingrese su contraseña" required>
            <input type="password" id="inputPassword" class="form-control" placeholder="Repita su contraseña"  required>
            <div class="row justify-content-center">
              <div class="col-6 col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio" id="radio" value="opcion1" checked>
                  <label class="form-check-label" for="radioDocente">
                    Docente
                  </label>
                </div>
              </div>
              <div class="col-6 col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio" id="radio" value="opcion2">
                  <label class="form-check-label" for="radioAlumno">
                    Alumno
                  </label>
                </div>
              </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
          </form>
        </div>
      </div>
    </div>
<?php require('footer.php'); ?>
</html>
