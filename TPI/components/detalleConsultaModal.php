
<!-- Inscripcion Consulta Modal -->
<div class="modal fade" id="detalleConsultaModal" tabindex="-1" aria-labelledby="detalleConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <input type="text" name="idDetalleConsultaModal" id="idDetalleConsultaModal" hidden aria-hidden="true">
        <h5 class="modal-title" id="detalleConsultaModalLabel">Detalle consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
             <b>Materia:</b> <div id="detalleMateria"></div>
            </div>
            <div class="col-6">
              <b>Fecha y Hora:</b> <div id="detalleFecha"></div>
            </div>
        </div>
        <br>
        <div id="detalleBaja" hidden>
          <div class="row">
              <div class="col-6">
              <b>Estado:</b> <span class="badge badge-danger">BLOQUEADA</span>
              </div>
              <div class="col-6">
                <b>Fecha y Hora de bloqueo:</b> <div id="detalleFechaBaja"></div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
              <b>Motivo:</b>
              <textarea name="detalleMotivo" id="detalleMotivo" cols="60" rows="5" style="resize: none;"  disabled></textarea>
              </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-12 text-center">
            <b>Inscriptos a la consulta</b>
          </div>
        </div>
        <div class="row">
              <div class="col-12">
                <table class="table table-hover" id="alumnosTable">
                  
                  <thead>
                    <tr>
                      <th scope="col">Alumno</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
      </div>
    </div>
  </div>
</div>
