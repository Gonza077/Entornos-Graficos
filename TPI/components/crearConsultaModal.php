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
              <input class="custom-select" type="text" name="datepickerCreate" id="datepickerCreate" onchange="setCrearConsultaDisabledState()" required>
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
              <div class="col-3" id="cupoCreateFilterCol">
                <label for="cupoCreate">Cupo</label>
                <input class="custom-select" type="number" min="1" name="cupoCreate" id="cupoCreate" onchange="setCrearConsultaDisabledState()" required>
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