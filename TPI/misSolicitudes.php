<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
  if(isset($user)){
    if($user->isDocente()){
      header("Location: http://localhost/consultas.php");
    }
  }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/Icono.ico">
    <link rel="stylesheet" href="./css/footerFixed.css">
    <title>Mis Solicitudes</title>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container-fluid">
    <br>
    <br>
    <table class="table table-hover" id="solicitudesTable" style="margin-bottom: 15em;"> 
      <thead>
        <tr>
          <th scope="col">Estado</th>
          <th scope="col">Materia</th>
          <th scope="col">Docente</th>
          <th scope="col">Horario</th>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
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
</body>
<?php include('footer.php');?>
<script src="js/solicitudScript.js"></script>
<?php include('components/toast.php');?>
</html>
