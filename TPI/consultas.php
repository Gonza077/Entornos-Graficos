<?php require('navbar.php'); ?>
<div class="container-fluid">
<br>
  <div class="row">
  </div>
  <div class="row">
    <div class="col-3">
    <label for="estadoFilter">Estado</label>
        <select class="custom-select" id="estadoFilter">
          <option selected></option>
          <option value="1">PENDIENTE</option>
          <option value="2">CONFIRMADA</option>
          <option value="3">BLOQUEADA</option>
          <option value="4">FINALIZADA</option>
        </select>
    </div>
    <div class="col-3">
      <label for="profesorFilter">Profesor</label>
      <select class="custom-select" id="profesorFilter">
        <option selected></option>
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
      </select>
    </div>
    <div class="col-3">
      <label for="materiaFilter">Materia</label>
      <select class="custom-select" id="materiaFilter">
        <option selected></option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="col-3">
    <label for="horarioFilter">Horario</label>
      <select class="custom-select" id="horarioFilter">
        <option selected></option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      </div>
    </div>
  </div>

  <br>

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
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Estado</th>
        <th scope="col">Materia</th>
        <th scope="col">Profesor</th>
        <th scope="col">Horario</th>
        <th scope="col">Cupo</th>
        <th scope="col">Operaciones</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-primary">
        <th>PENDIENTE</th>
        <td>Entornos</td>
        <td>Profesor A</td>
        <td>16:00</td>
        <td>0/3</td>
        <td></td>
      </tr>
      <tr>
        <th>PENDIENTE</th>
        <td>Entornos</td>
        <td>Profesor A</td>
        <td>16:00</td>
        <td>0/3</td>
        <td></td>
      </tr>
      <tr>
        <th>PENDIENTE</th>
        <td>Entornos</td>
        <td>Profesor A</td>
        <td>16:00</td>
        <td>0/3</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<?php require('footer.php'); ?>
<script>
  var estadoSelected = profesorSelected = materiaSelected = horarioSelected = null;
  $(document).ready(function(){
      $("select#estadoFilter").change(function(){
        estadoSelected = $(this).children("option:selected").val();
        });
      $("select#profesorFilter").change(function(){
        profesorSelected = $(this).children("option:selected").val();
      });
      $("select#materiaFilter").change(function(){
        materiaSelected = $(this).children("option:selected").val();
      });
      $("select#horarioFilter").change(function(){
        horarioSelected = $(this).children("option:selected").val();
      });
      $( "#clear" ).click(function() {
        estadoSelected = profesorSelected = materiaSelected = horarioSelected = null;
        $("select#estadoFilter")[0].selectedIndex = 0;
        $("select#profesorFilter")[0].selectedIndex = 0;
        $("select#materiaFilter")[0].selectedIndex = 0;
        $("select#horarioFilter")[0].selectedIndex = 0;
      });
  });
  function buscar () {
      $.ajax({
          url:"consultaQuery.php",    //the page containing php script
          type: "get",    //request type,
          dataType: 'json',
          data: {estadoSelected: estadoSelected, profesorSelected: profesorSelected, materiaSelected: materiaSelected,horarioSelected: horarioSelected},
          success:function(result){
              console.log(result);
          }
      });
  }
</script>