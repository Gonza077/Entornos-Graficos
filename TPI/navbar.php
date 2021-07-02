<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="consultas.php">Consultas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="contacto.php">Contacto<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menú</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="https://gradienteutn.files.wordpress.com/2021/01/calendario-academico-2021-2022-a3.pdf">Calendario Académico</a>
            <a class="dropdown-item" href="#">Información Importante</a>
          </div>
        </li>
        <?php if (isset($user)) {
                $esAdmin = $user->isAdmin();
                if ($esAdmin)
                {
                  echo '<li class="nav-item active">
                        <a class="nav-link" href="upload.php"><small>Subir Horarios</small></a>
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
    </div>
</nav>

