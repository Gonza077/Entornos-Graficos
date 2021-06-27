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
