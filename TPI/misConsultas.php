<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
  if(!isset($user)|| !$user->isDocente()){
      header("Location: http://localhost/consultas.php");
  }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/Icono.ico">
    <link rel="stylesheet" href="./css/footerRelativo.css">
    <title>Mis Consultas</title>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container-fluid" style="min-height:800px">
    <div class="row form-group" style="margin-top: 10px;" >
      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
        <label for="profesorFilter">Docente</label>
        <select class="custom-select" id="profesorFilter" disabled>
          <option value="" label="Seleccione Docente" selected></option>
        </select>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
          <label for="estadoFilter">Estado</label>
          <select class="custom-select" id="estadoFilter">
            <option value="" label="Seleccione Estado"></option>
            <option value="1" selected>CONFIRMADA</option>
            <option value="2">BLOQUEADA</option>
          </select>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
        <label for="fechaDesdeFilter">Fecha Desde</label>
        <input class="custom-select" type="text" name="fechaDesdeFilter" id="fechaDesdeFilter">
      </div>
      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
        <label for="fechaHastaFilter">Fecha Hasta</label>
        <input class="custom-select" type="text" name="fechaHastaFilter" id="fechaHastaFilter">
      </div>

      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
        <label for="materiaFilter">Materia</label>
        <select class="custom-select" id="materiaFilter">
          <option value="" label="Seleccione Materia" selected></option>
        </select>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-8 col-xs-12">
        <label for="horarioFilter">Horario</label>
        <select class="custom-select" id="horarioFilter">
          <option value="" label="Seleccione Horario" selected></option>
        </select>
      </div>
    </div>
    <br>
    <div class="row form-group justify-content-end">
      <button type="button" class="btn btn-info" id="clear">Limpiar Filtros</button>
      <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
      <?php echo ($user != null && ($user->isDocente() ||$user->isAdmin()) ? '<button type="button" class="btn btn-success" id="creaConsulta" onclick="openCrearConsultaModal()">Crear Consulta</button>' :NULL) ?>
    </div>
    <table class="table table-hover" id="consultasTable"> 
      <thead>
        <tr>
          <th scope="col">Estado</th>
          <th scope="col">Materia</th>
          <th scope="col">Docente</th>
          <th scope="col">Fecha</th>
          <th scope="col">Horario</th>
          <th scope="col">Cupo</th>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
<?php $user != null && $user->isDocente() ? include('components/bloquearConsultaModal.php'):"";?>
<?php $user != null && $user->isDocente() ? include('components/crearConsultaModal.php'):"";?>
<?php $user != null && $user->isDocente() ? include('components/detalleConsultaModal.php'):"";?>
<?php include('footer.php');?>
<script src="js/miConsultaScripts.js"> </script>
  <?php if ($user != null && $user->isDocente()){
    $userId= $user->getId();
    echo "<script>var profesorId = '$userId';</script>";
  } else {
    echo "<script>var profesorId = undefined;</script>";
  } ?>
<?php include('components/toast.php');?>
</body>
</html>

