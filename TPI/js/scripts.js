var estadoSelected = profesorSelected = materiaSelected = horarioSelected = consulta = null;

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
    docenteQueryCreateConsulta(1)
});


function materiaQueryCreateConsulta(a){
  response = '';
  $.ajax({
    url:"materiaQuery.php",    //the page containing php script
    type: "get",    //request type,
    dataType: 'html',
    data:{docente:docente},
    success:function(response){
      $("#materiaCreateFilter").append(response);
    }
  });
  $('#materiaCreateFilter').removeAttr('hidden');
}

function docenteQueryCreateConsulta(docente){
  response = '';
  $.ajax({
    url:"profesorQuery.php",    //the page containing php script
    type: "get",    //request type,
    dataType: 'html',
    data:{docente:docente},
    success:function(response){
      $("#profesorCreateFilter").append(response);
    }
  });
   
}

function buscar () {
  $("table#consultasTable tbody").html("");
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

function getConsulta(consultaId){
    return $.ajax({
      url:"./ajax/getConsulta.php",
      type: "get",
      dataType: 'json',
      data: {consultaId: consultaId},
      done:function(response){
        return response;
      },
      fail:function(response){
        openToast(response,"No Encontrada",'error');
      }
  });
}
