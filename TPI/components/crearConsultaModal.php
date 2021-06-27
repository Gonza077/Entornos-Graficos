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
                  <option value="" selected>Seleccione Docente</option>
                </select>
              </div>
            </div>
            <div class="col-6" id="materiaCreateFilterCol">
              <label for="materiaCreateFilter">Materia</label>
              <select class="custom-select" id="materiaCreateFilter">
                <option value="" selected>Seleccione Materia</option>
              </select>
            </div>
          </div>
          <br>
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
  

</script>