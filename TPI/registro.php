<?php require('navbar.php'); ?>  

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6">
        <form class="form-signin">
          <img class="mb-4 d-block mx-auto" src="img/LogoUTN.png" alt="Logo de la Universidad Tecnológica Nacional" width="100" height="100">
          <h1 class="d-flex justify-content-center">Formulario de registro</h1>
          <hr>
          <h2 >Ingrese sus datos</h1>
            
            <div class="form-group">
              <label for="nombre">Ingrese su nombre:</label>
              <label for="nombre" class="sr-only">Ingrese su nombre</label>
              <input type="text" class="form-control" id="nombre" aria-describedby="ayudaNombre" placeholder="">
            </div>
            
            <div class="form-group">
              <label for="apellido">Ingrese su apellido:</label>
              <label for="apellido" class="sr-only">Ingrese su apellido</label>
              <input type="text" class="form-control" id="apellido" aria-describedby="ayudaApellido" placeholder="">
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
              <input type="email" class="form-control" id="email" aria-describedby="ayudaEmail" placeholder="">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="password">Ingrese su contraseña:</label>
              <label for="password" class="sr-only">Ingrese su contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="">
            </div>
            <div class="form-group">
              <label for="repitaPassword">Repita su contraseña:</label>
              <label for="repitaPassword" class="sr-only">Repita su contraseña</label>
              <input type="password" class="form-control" id="repitaPassword" placeholder="">
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
  