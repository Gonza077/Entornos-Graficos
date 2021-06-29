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
    <div class="row">
    </div>
    <div class="row">
      <div class="col-3">
      <label for="estadoFilter">Estado</label>
          <select class="custom-select" id="estadoFilter">
            <option value="" selected></option>
          </select>
      </div>
      <div class="col-3">
        <label for="profesorFilter">Docente</label>
        <select class="custom-select" id="profesorFilter">
          <option value="" selected></option>
        </select>
      </div>
      <div class="col-3">
        <label for="materiaFilter">Materia</label>
        <select class="custom-select" id="materiaFilter">
          <option value="" selected></option>
        </select>
      </div>
      <div class="col-3">
      <label for="horarioFilter">Horario</label>
        <select class="custom-select" id="horarioFilter">
          <option value="" selected></option>
        </select>
        </div>
      </div>
    </div>
    <br>
    <button type="button" class="btn btn-success" id="" onclick="openCrearConsultaModal()">Crear Consulta</button>
    <div class="row justify-content-end">
      <div class="col-4">
      </div>
      <div class="col-4">
        <div class="row justify-content-end">
          <button type="button" class="btn btn-info" id="clear">Limpiar Filtros</button>
          <button type="button" class="btn btn-primary" onclick="buscar()">Buscar</button>
          <div class="col-2"></div>
        </div>
      </div>
    </div>
    <table class="table table-hover" id="consultasTable"> 
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
  <!-- Bloquear Consulta Modal -->
<div class="modal fade" id="bloquearConsultaModal" tabindex="-1" aria-labelledby="bloquearConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form>
      <input type="text" name="idBloquearConsulta" id="idBloquearConsulta" hidden aria-hidden="true">
        <div class="modal-header">
          <h5 class="modal-title" id="bloquearConsultaModalLabel">Bloquear Consulta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Esta seguro que desea bloquear la consulta :
          <br>
          <b id="datosBloquearConsulta"></b>
          <br>
          <span><b>Indique motivo</b></span>
          <textarea name="motivoBloqueo" id="motivoBloqueo" cols="60" rows="5" style="resize: none;" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
          <button type="button" class="btn btn-danger" aria-label="Bloquear" id="bloquearConsulta" disabled>Bloquear</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Inscripcion Consulta Modal -->
<div class="modal fade" id="inscripcionConsultaModal" tabindex="-1" aria-labelledby="inscripcionConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <input type="text" name="idInscripcionConsulta" id="idInscripcionConsulta" hidden aria-hidden="true">
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
<div class="modal fade" id="cancelarConsultaModal" tabindex="-1" aria-labelledby="cancelarConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <input type="text" name="idCancelarConsulta" id="idCancelarConsulta" hidden aria-hidden="true">
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
<!-- Crear Consulta Modal -->
<div class="modal fade" id="crearConsultaModal" tabindex="-1" aria-labelledby="crearConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="crearConsultaModalLabel">Crear Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="profesorCreateFilter">Docente</label>
                <select class="custom-select" id="profesorCreateFilter" name="profesorCreateFilter" onchange="materiaQueryCreateConsulta()" required>
                  <option value="" selected disabled hidden>Seleccione Docente</option>
                </select>
              </div>
            </div>
            <div class="col-6" id="materiaCreateFilterCol">
              <label for="materiaCreateFilter">Materia</label>
              <select class="custom-select" id="materiaCreateFilter" onchange="setCrearConsultaDisabledState()" required>
                <option value="" selected disabled hidden>Seleccione Materia</option>
              </select>
            </div>
            <div class="col-6" id="fechaCreateFilterCol">
              <label for="datepickerCreate">Fecha</label>
              <input class="custom-select" type="text" name="datepickerCreate" id="datepickerCreate" onchange="setCrearConsultaDisabledState()" required></p>
            </div>
              <div class="col-3" id="fechaCreateFilterCol">
                <label for="horaCreate">Hora</label>
                <select class="custom-select" name="horaCreate" id="horaCreate" onchange="setCrearConsultaDisabledState()" required>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                </select>
              </div>
              <div class="col-3" id="fechaCreateFilterCol">
                <label for="minutoCreate">Minutos</label>
                <select class="custom-select" name="minutoCreate" id="minutoCreate" onchange="setCrearConsultaDisabledState()" required>
                    <option value="00">00</option>
                    <option value="05">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
              </div>
            </div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver" onclick="resetCrearConsulta()">Volver</button>
        <button type="button" class="btn btn-success" aria-label="Crear" id="crearConsulta" disabled>Crear</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <?php include('components/toast.php');?>
  <?php include('footer.php');?>

  <script src="js/scripts.js"> </script>
</body>
</html>

