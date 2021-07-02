  <!-- Bloquear Consulta Modal -->
  <div class="modal fade" id="bloquearConsultaModal" tabindex="-1" aria-labelledby="bloquearConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form>
      <input type="text" name="idBloquearConsulta" id="idBloquearConsulta" hidden>
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
        <div class="modal-footer" id="modalFooterOpenAlternativoBloquearConsulta">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
          <button type="button" class="btn btn-danger" aria-label="Bloquear" id="bloquearConsultaOpenAlternativo" disabled>Bloquear</button>
        </div>
        <br>
        <div class="modal-body" id="modalBodyBloquearConsulta" hidden>
          <hr> 
          <span><b>Debe proporcionar una consulta que reemplaze la bloqueada.</b></span>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="alternativoProfesorCreateFilter">Docente</label>
                <select class="custom-select" id="alternativoProfesorCreateFilter" name="alternativoProfesorCreateFilter" onchange="materiaQueryAlternativoCreateConsulta()" required>
                  <option value="" selected disabled hidden>Seleccione Docente</option>
                </select>
              </div>
            </div>
            <div class="col-6" id="materiaCreateFilterCol">
              <label for="alternativoMateriaCreateFilter">Materia</label>
              <select class="custom-select" id="alternativoMateriaCreateFilter" onchange="setAlternativoCrearConsultaDisabledState()" required>
                <option value="" selected disabled hidden>Seleccione Materia</option>
              </select>
            </div>
            <div class="col-6" id="fechaCreateFilterCol">
              <label for="alternativoDatepickerCreate">Fecha</label>
              <input class="custom-select" type="text" name="alternativoDatepickerCreate" id="alternativoDatepickerCreate" onchange="setAlternativoCrearConsultaDisabledState()" required>
            </div>
              <div class="col-3" id="fechaCreateFilterCol">
                <label for="alternativoHoraCreate">Hora</label>
                <select class="custom-select" name="alternativoHoraCreate" id="alternativoHoraCreate" onchange="setAlternativoCrearConsultaDisabledState()" required>
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
                <label for="alternativoMinutoCreate">Minutos</label>
                <select class="custom-select" name="alternativoMinutoCreate" id="alternativoMinutoCreate" onchange="setAlternativoCrearConsultaDisabledState()" required>
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
              <div class="col-3" id="cupoCreateFilterCol">
                <label for="alternativoCupoCreate">Cupo</label>
                <input class="custom-select" type="number" min="1" name="alternativoCupoCreate" id="alternativoCupoCreate" onchange="setAlternativoCrearConsultaDisabledState()" required>
              </div>
            </div>
          <br>
      </div>
        <div class="modal-footer" id="modalFooterBloquearConsulta" hidden>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
          <button type="button" class="btn btn-success" aria-label="Bloquear" id="bloquearConsulta" disabled>Crear Consulta</button>
        </div>
      </form>
    </div>
  </div>
</div>