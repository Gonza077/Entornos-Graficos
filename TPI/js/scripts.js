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

    $.ajax({
      url:"horarioQuery.php",    //the page containing php script
      type: "get",    //request type,
      dataType: 'html',
      success:function(response){
          $("#horarioFilter").append(response);
      }
  });
});

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

$(document).ready(function(){
  $( "#inscribirConsulta" ).click(function() {
  $('#inscripcionConsultaModal').modal('toggle');
  var consultaId =  $('#idInscripcionConsulta').val();
  inscripcionConsulta(consultaId);
  });
});

function openInscripcionConsultaModal(consultaId){
getConsulta(consultaId).done( response => {
  consuta = "";
  consulta = response.consulta;
  $('#idInscripcionConsulta').val(consulta.id);
  $('#datosInscripcionConsulta').html(consulta.horario + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
  $('#inscripcionConsultaModal').modal('show');
});
}


function inscripcionConsulta(consultaId){
$.ajax({
  url:"../ajax/inscripcionConsulta.php",
  type: "post",
  dataType: 'json',
  data: {consultaId: consultaId}
  }).done(response=>{
      openToast(response,"Inscripcion Consulta",'success');
    })
    .fail(response=>{
      openToast(response,"Inscripcion Consulta",'error');
    })
    .always(r=>{buscar();});
}


$(document).ready(function(){
  $( "#crearConsulta" ).click(function() {
      $('#crearConsultaModal').modal('toggle');
  });
  docenteQueryCreateConsulta();
});

function openCrearConsultaModal(){
  $('#crearConsultaModal').modal('show');
}

function docenteQueryCreateConsulta(docente){
response = '';
$.ajax({
  url:"profesorQuery.php",
  type: "get",
  dataType: 'html',
  data:{docente:docente},
  success:function(response){
    $("#profesorCreateFilter").append(response);
  }
});  
}

function materiaQueryCreateConsulta(){
response = '';
var docente = $('#profesorCreateFilter').children("option:selected").val();
console.log()
if (docente != undefined || docente != ''){
  $('#materiaCreateFilter').prop("disabled", false);
  $("#materiaCreateFilter").html(response);
  $.ajax({
    url:"materiaQuery.php",
    type: "get",
    dataType: 'html',
    data:{docente:docente},
    success:function(response){
      $("#materiaCreateFilter").append(response);
    }
  });
  } else {
    $('#materiaCreateFilter').prop("disabled", true);
  }
}


$(document).ready(function(){
  $( "#cancelarConsulta" ).click(function() {
  $('#cancelarConsultaModal').modal('toggle');
  var consultaId =  $('#idCancelarConsulta').val();
  cancelarConsulta(consultaId);
  });
});

function openCancelarConsultaModal(consultaId){   
getConsulta(consultaId).done( response => {
  consuta = "";
  consulta = response.consulta;
  $('#idCancelarConsulta').val(consulta.id);
  $('#datosCancelarConsulta').html(consulta.horario + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
  $('#cancelarConsultaModal').modal('show');
});
}

function cancelarConsulta(consultaId){
$.ajax({
  url:"../ajax/cancelarInscripcionConsulta.php",
  type: "post",
  dataType: 'json',
  data: {consultaId: consultaId}
}).done(response=>{
  console.log("done");
  openToast(response,"Cancelar Consulta",'success');
})
.fail(response=>{
  console.log(response);
  openToast(response,"Cancelar Consulta",'error');
})
.always(r=>{buscar();});
}


$(document).ready(function(){

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
});



function openBloquearConsultaModal(consultaId){
getConsulta(consultaId).done( response => {
  consuta = "";
  consulta = response.consulta;
  $('#idBloquearConsulta').val(consulta.id);
  $('#datosBloquearConsulta').html(consulta.horario + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
  $('#bloquearConsultaModal').modal('show');
}
);}


function bloquearConsulta(consultaId,motivo) {
$.ajax({
    url:"../ajax/bloquearConsulta.php",
    type: "post",
    dataType: 'json',
    data: {consultaId: consultaId, descripcionBaja: motivo}})
    .done(response=>{
      openToast(response,"Bloquear Consulta",'success');
    })
    .fail(response=>{
      openToast(response,"Bloquear Consulta",'error');
    })
    .always(r=>{buscar();});
}