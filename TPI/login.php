<?php require('navbar.php'); ?>
      <div class="container">
       <div class="row justify-content-center">
          <div class="col-6 col-sm-6">
            <form class="form-signin">
              <h1 class="d-flex justify-content-center">Iniciar sesion</h1>
              <label for="inputEmail" class="sr-only">Direccion de email</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Direccion de email" required autofocus>
              <label for="inputPassword" class="sr-only">Contraseña</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Recordarme
                  </label>
                </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>   
          </div>
        </div>
      </div>
    </body>




    <?php require('footer.php'); ?>

</html>
