<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>Pagina Principal</title>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container-fluid">
    <br>
    <div class="row"></div>
    <div class="row">
      <div class="col-2">
          <label for="estadoFilter">Estado</label>
          <select class="custom-select" id="estadoFilter">
            <option value="" label="Seleccione Estado"></option>
            <option value="1" selected>CONFIRMADA</option>
            <option value="2">BLOQUEADA</option>
          </select>
      </div>
      <div class="col-2">
        <label for="fechaDesdeFilter">Fecha Desde</label>
        <input class="custom-select" type="text" name="fechaDesdeFilter" id="fechaDesdeFilter">
      </div>
      <div class="col-2">
        <label for="fechaHastaFilter">Fecha Hasta</label>
        <input class="custom-select" type="text" name="fechaHastaFilter" id="fechaHastaFilter">
      </div>
      <div class="col-2">
        <label for="profesorFilter">Docente</label>
        <select class="custom-select" id="profesorFilter">
          <option value="" label="Seleccione Docente" selected></option>
        </select>
      </div>
      <div class="col-2">
        <label for="materiaFilter">Materia</label>
        <select class="custom-select" id="materiaFilter">
          <option value="" label="Seleccione Materia" selected></option>
        </select>
      </div>
      <div class="col-2">
        <label for="horarioFilter">Horario</label>
        <select class="custom-select" id="horarioFilter">
          <option value="" label="Seleccione Horario" selected></option>
        </select>
      </div>
    </div>
    <br>
    <div class="row justify-content-end">
      <div class="col-4"></div>
      <div class="col-4">
        <div class="row justify-content-end">
          <button type="button" class="btn btn-info" id="clear">Limpiar Filtros</button>
          <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
          <?php echo ($user != null && ($user->isDocente() ||$user->isAdmin()) ? '<button type="button" class="btn btn-success" id="creaConsulta" onclick="openCrearConsultaModal()">Crear Consulta</button>' :NULL) ?>
          <div class="col-2"></div>
        </div>
      </div>
    </div>
    <br>
    <table class="table table-hover" id="consultasTable" style="margin-bottom: 50px;"> 
      <thead>
        <tr>
          <th scope="col">Estado</th>
          <th scope="col">Materia</th>
          <th scope="col">Docente</th>
          <th scope="col">Horario</th>
          <th scope="col">Cupo</th>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

<!-- Inscripcion Consulta Modal -->
<div class="modal fade" id="inscripcionConsultaModal" tabindex="-1" aria-labelledby="inscripcionConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <input type="text" name="idInscripcionConsulta" id="idInscripcionConsulta" hidden>
        <h5 class="modal-title" id="inscripcionConsultaModalLabel">Inscripcion a consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que desea inscribirse a la consulta de:
        <br> 
        <b id="datosInscripcionConsulta"></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
        <button type="button" class="btn btn-success" aria-label="Inscribir" id="inscribirConsulta">Inscribir</button>
      </div>
    </div>
  </div>
</div>
<!-- Cancelar Consulta Modal -->
<div class="modal fade" id="cancelarConsultaModal" tabindex="-1" aria-labelledby="cancelarConsultaModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <input type="text" name="idCancelarConsulta" id="idCancelarConsulta" hidden>
        <h5 class="modal-title" id="cancelarConsultaModalLabel">Cancelar Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que desea cancelar la inscripcion a 
        <br>
        <b id="datosCancelarConsulta"></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
        <button type="button" class="btn btn-danger" aria-label="Cancelar" id="cancelarConsulta">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<?php $user != null && ($user->isDocente() ||$user->isAdmin()) ? include('components/bloquearConsultaModal.php'):"";?>
<?php $user != null && ($user->isDocente() ||$user->isAdmin()) ? include('components/crearConsultaModal.php'):"";?>
</body>
<?php include('footer.php');?>
<script src="js/scripts.js"> </script>
  <?php if ($user != null && $user->isDocente()){
    $userId= $user->getId();
    echo "<script>var profesorId = $userId;</script>";
  } else {
    echo "<script>var profesorId = undefined;</script>";
  } ?>
<?php include('components/toast.php');?>
</html>

