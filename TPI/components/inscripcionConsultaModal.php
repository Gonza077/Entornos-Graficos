
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
