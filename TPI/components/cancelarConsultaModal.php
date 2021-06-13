<!-- Cancelar Consulta Modal -->
<div class="modal fade" id="cancelarConsultaModal" tabindex="-1" aria-labelledby="cancelarConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cancelarConsultaModalLabel">Cancelar Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que desea cancelar la inscripcion a <b id="datosCancelarConsulta"></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
        <button type="button" class="btn btn-danger" aria-label="Cancelar" id="cancelarConsulta">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    $( "#cancelarConsulta" ).click(function() {
        $('#cancelarConsultaModal').modal('toggle');
    });
  });

  function openCancelarConsultaModal(e){
    $('#cancelarConsultaModal').modal('show');
  }
</script>