<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="consultas.php">Consultas</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active text-nowrap">
            <a class="nav-link" href="calendarioAcademico.php">Calendario Académico</a>
        </li>
        <?php if (isset($user)) {
                if ($user->isAdmin()) {
                  echo '<li class="nav-item active text-nowrap">
                        <a class="nav-link" href="upload.php">Subir Horarios</a>
                      </li>';
                }
                if (!$user->isDocente() && !$user->isAdmin()) {
                  echo '<li class="nav-item active text-nowrap">
                        <a class="nav-link" href="misSolicitudes.php">Mis Solicitudes</a>
                      </li>';
                }
                if ($user->isDocente()) {
                  echo '<li class="nav-item active text-nowrap">
                        <a class="nav-link" href="misConsultas.php">Mis Consultas</a>
                      </li>';
                }
        }
        ?>
      </ul>
      <ul class="nav navbar-nav flex-fill w-100 justify-content-end">
        <?php if (isset($user) && $user !=null) {
          echo '<li class="nav-item active">
                  <a class="nav-link" href="cuenta.php">Mi Cuenta</a>
                </li>';}
        ?> 
        <li>
          <div class="form-inline my-2 my-lg-0">
          <?php if (isset($user)) {$nombre = $user->getNombre();}?>
            <input class="form-control mr-sm-2" type="search" disabled value="<?php isset($nombre)? printf("%s",$nombre) : '';?>">
            <?php if (isset($user)) {
                    echo '<a class="btn btn-info" href="./includes/logout.php" role="button">Desconectarse</a>';
                  }else{echo '<a class="btn btn-info" href="login.php" role="button">Iniciar Sesion</a>';}
            ?>
          </div>
        </li>
      </ul>
</nav>

