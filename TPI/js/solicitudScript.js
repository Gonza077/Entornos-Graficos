var estadoSelected = profesorSelected = materiaSelected = horarioSelected = consulta = fechaDesdeSelected = fechaHastaSelected = null;


// CANCELAR CONSULTA
$(document).ready(function(){
  buscar();
  $( "#cancelarConsulta" ).click(function() {
  $('#cancelarConsultaModal').modal('toggle');
  var consultaId =  $('#idCancelarConsulta').val();
  cancelarConsulta(consultaId);
  });
});

function buscar(){
  $("table#solicitudesTable tbody").html("");
  $.ajax({
      url:"../ajax/solicitudQuery.php",    //the page containing php script
      type: "get",    //request type,
      dataType: 'html',
      success:function(response){
          $("table#solicitudesTable tbody").html(response);
      }
  });
}

function openCancelarConsultaModal(consultaId){   
getConsulta(consultaId).done( response => {
  consuta = "";
  consulta = response.consulta;
  $('#idCancelarConsulta').val(consulta.id);
  $('#datosCancelarConsulta').html(consulta.fecha + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
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
    openToast(response,"Cancelar Consulta",'success');
  })
  .fail(response=>{
    openToast(response,"Cancelar Consulta",'error');
  })
  .always(r=>{buscar();});
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

