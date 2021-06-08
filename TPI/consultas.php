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
        </select>
    </div>
    <div class="col-3">
      <label for="profesorFilter">Profesor</label>
      <select class="custom-select" id="profesorFilter">
        <option selected></option>
      </select>
    </div>
    <div class="col-3">
      <label for="materiaFilter">Materia</label>
      <select class="custom-select" id="materiaFilter">
        <option selected></option>
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
  <table class="table table-hover" id="consultasTable"> 
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
        buscar();
      });

      $.ajax({
          url:"estadoQuery.php",    //the page containing php script
          type: "get",    //request type,
          dataType: 'json',
          success:function(response){
              var optionHTML = '';
              $.each(response, function (i, item) {
                  optionHTML += '<option value="'+ item.id +'">'+item.codigo+'</option>';
              });
              $("#estadoFilter").append(optionHTML);
          }
      });

      $.ajax({
          url:"profesorQuery.php",    //the page containing php script
          type: "get",    //request type,
          dataType: 'json',
          success:function(response){
              var optionHTML = '';
              $.each(response, function (i, item) {
                  optionHTML += '<option value="'+ item.id +'">' + item.apellido + ", " + item.nombre + '</option>';
              });
              $("#profesorFilter").append(optionHTML);
          }
      });

      $.ajax({
          url:"materiaQuery.php",    //the page containing php script
          type: "get",    //request type,
          dataType: 'json',
          success:function(response){
              var optionHTML = '';
              $.each(response, function (i, item) {
                  optionHTML += '<option value="'+ item.id +'">' + item.nombre + '</option>';
              });
              console.log(optionHTML)
              $("#materiaFilter").append(optionHTML);
          }
      });


  });
  function buscar () {
      $.ajax({
          url:"consultaQuery.php",    //the page containing php script
          type: "get",    //request type,
          dataType: 'json',
          data: {estadoSelected: estadoSelected, profesorSelected: profesorSelected, materiaSelected: materiaSelected,horarioSelected: horarioSelected},
          success:function(response){
              var trHTML = '';
              $.each(response, function (i, item) {
                  trHTML += '<tr><td>' + item.estado + '</td><td>' + item.materia + '</td><td>' + item.docente + '</td>' + '</td><td>' + item.horario + '</td></tr>';
                  console.log(item)
              });
              $("table#consultasTable tbody").html("");
              $("table#consultasTable tbody").html(trHTML);
          }
      });
  }
</script>