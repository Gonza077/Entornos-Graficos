<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="consultas.php">Consultas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload.php">Subir Horarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Iniciar Sesión</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <?php if (isset($user)){
                $nombre = $user->getNombre();
              }
          ?>
        <input class="form-control mr-sm-2" type="search" disabled value="<?php isset($nombre)? printf("%s",$nombre) : '';?> " placeholder="Search" aria-label="Search">
        <a class="btn btn-info" href="./includes/logout.php" role="button">Desconectarse</a>
      </form>
    </div>
</nav>

