var estadoSelected = profesorSelected = materiaSelected = horarioSelected = null;

function openToast(msg){
  $(".toast").toast({ delay: 3000 });
  $('.toast').toast('show');
  $('.toast-body').html(msg);
}

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
      $('.toast').toast('show')
      buscar();
    });


    $( "#bloquearConsulta" ).click(function() {
      $('#bloquearConsultaModal').modal('toggle');
      openToast("bloqueada");
    });

    $( "#cancelarConsulta" ).click(function() {
      $('#cancelarConsultaModal').modal('toggle');
      openToast("cancelada");
    });

    $( "#inscribirConsulta" ).click(function() {
      $('#inscribirConsultaModal').modal('toggle');
      openToast("inscripto");
    });


    buscar();


    $.ajax({
        url:"estadoQuery.php",    //the page containing php script
        type: "get",    //request type,
        dataType: 'html',
        success:function(response){
            $("#estadoFilter").append(response);
        }
    });

    $.ajax({
        url:"profesorQuery.php",    //the page containing php script
        type: "get",    //request type,
        dataType: 'html',
        success:function(response){
            $("#profesorFilter").append(response);
        }
    });

    $.ajax({
        url:"materiaQuery.php",    //the page containing php script
        type: "get",    //request type,
        dataType: 'html',
        success:function(response){
            $("#materiaFilter").append(response);
        }
    });
});

function buscar () {
    $.ajax({
        url:"consultaQuery.php",    //the page containing php script
        type: "get",    //request type,
        dataType: 'html',
        data: {estadoSelected: estadoSelected, profesorSelected: profesorSelected, materiaSelected: materiaSelected,horarioSelected: horarioSelected},
        success:function(response){
            $("table#consultasTable tbody").html(response);
        }
    });
}