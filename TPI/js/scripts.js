var estadoSelected = profesorSelected = materiaSelected = horarioSelected = consulta = null;

function openInscripcionConsultaModal(e){
  $('#inscripcionConsultaModal').modal('show');
}

function openCancelarConsultaModal(e){
  $('#cancelarConsultaModal').modal('show');
}

function openBloquearConsultaModal(consultaId){
  getConsulta(consultaId).done( response => {
    consuta = "";
    consulta = response;
    $('#idBloquearConsulta').val(consulta.id);
    $('#datosBloquearConsulta').html(consulta.horario + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
    $('#bloquearConsultaModal').modal('show');
  }
  );

}

function openCrearConsultaModal(){
  $('#crearConsultaModal').modal('show');
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
      buscar();
    });


    $( "#bloquearConsulta" ).click(function() {
      $('#bloquearConsultaModal').modal('toggle');
      var consultaId =  $('#idBloquearConsulta').val();
      var motivo =  $('#motivoBloqueo').val();
      console.log(consultaId,motivo);
      bloquearConsulta(consultaId,motivo);
    });

    $('#motivoBloqueo').keyup(function() {
      if($(this).val() != '') {
         $('#bloquearConsulta').prop('disabled', false);
      } else {
        $('#bloquearConsulta').prop('disabled', true);
      }
   });

    $( "#cancelarConsulta" ).click(function() {
      $('#cancelarConsultaModal').modal('toggle');
    });

    $( "#inscribirConsulta" ).click(function() {
      $('#inscribirConsultaModal').modal('toggle');
    });

    $( "#crearConsulta" ).click(function() {
      $('#crearConsultaModal').modal('toggle');
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

function bloquearConsulta(consultaId,motivo) {
  $.ajax({
      url:"./ajax/bloquearConsulta.php",
      type: "post",
      dataType: 'json',
      data: {consultaId: consultaId, descripcionBaja: motivo},
      success:function(response){
        openToast(response,"Bloquear Consulta",'success');
      },
      error:function(response){
        openToast(response,"Bloquear Consulta",'error');
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