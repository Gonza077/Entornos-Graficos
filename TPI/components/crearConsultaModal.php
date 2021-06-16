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
        <form role="form">  
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="profesorCreateFilter">Docente</label>
                <select class="custom-select" id="profesorCreateFilter" onchange="materiaQueryCreateConsulta(this)" required>
                  <option selected></option>
                </select>
              </div>
            </div>
            <div class="col-6" id="materiaCreateFilterCol" hidden>
              <label for="materiaCreateFilter">Materia</label>
              <select class="custom-select" id="materiaCreateFilter" required>
                <option selected></option>
              </select>
            </div>
          </div>
          <br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
        <button type="submit" class="btn btn-success" aria-label="Crear" id="crearConsulta">Crear</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $( "#crearConsulta" ).click(function() {
            $('#crearConsultaModal').modal('toggle');
        });
    });
    function openCrearConsultaModal(){
        $('#crearConsultaModal').modal('show');
    }
</script>