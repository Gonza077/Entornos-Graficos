var estadoSelected = profesorSelected = materiaSelected = horarioSelected = consulta = fechaDesdeSelected = fechaHastaSelected = null;

$(document).ready(function(){

    $('#fechaDesdeFilter').datepicker(
      { 
        dateFormat:"dd/mm/yy",
        minDate:new Date(),
      }
    ).datepicker('setDate',new Date());
    fechaDesdeSelected = new Date().toLocaleDateString('es-ES', {  year: 'numeric', month: 'numeric', day: 'numeric' });
    
    const date = new Date();
    date.setDate(date.getDate() + 7);
    $('#fechaHastaFilter').datepicker(
      {
        dateFormat:"dd/mm/yy",
        minDate:new Date(),
        
        onSelect: function(d,i){
          if(d !== i.lastVal){
              $(this).change();
          }
        }
      }
    ).datepicker('setDate',date);
    fechaHastaSelected = date.toLocaleDateString('es-ES', {  year: 'numeric', month: 'numeric', day: 'numeric' });
    estadoSelected = 1;

    $("select#estadoFilter").change(function(){
      estadoSelected = $(this).children("option:selected").val();
      });

    $("select#profesorFilter").change(function(){
      profesorSelected = $(this).children("option:selected").val();
      materiaQuery(profesorSelected);
      
    });

    $("select#materiaFilter").change(function(){
      materiaSelected = $(this).children("option:selected").val();
      profesorQuery(materiaSelected);
    });

    $("select#horarioFilter").change(function(){
      horarioSelected = $(this).children("option:selected").val();
    });

    $("#fechaHastaFilter").change(function(){
      fechaHastaSelected = $(this).datepicker('getDate').toLocaleDateString('es-ES', {  year: 'numeric', month: 'numeric', day: 'numeric' });
    });
    $("#fechaDesdeFilter").change(function(){
      fechaDesdeSelected = $(this).datepicker('getDate').toLocaleDateString('es-ES', {  year: 'numeric', month: 'numeric', day: 'numeric' });
    });
    
    $( "#clear" ).click(function() {
      estadoSelected = profesorSelected = materiaSelected = horarioSelected =  null;
      $("select#estadoFilter")[0].selectedIndex = 0;
      $("select#profesorFilter")[0].selectedIndex = 0;
      profesorQuery();
      materiaQuery();
      $("select#horarioFilter")[0].selectedIndex = 0;   
      $("#fechaHastaFilter").datepicker('setDate', date);
      $("#fechaDesdeFilter").datepicker('setDate',new Date());
      fechaDesdeSelected = $("#fechaDesdeFilter").val();
      fechaHastaSelected = $("#fechaHastaFilter").val();
      buscar();
    });

    profesorSelected=profesorId;
    profesorQuery();
    materiaQuery(profesorSelected);

    $.ajax({
      url:"horarioQuery.php",    //the page containing php script
      type: "get",    //request type,
      dataType: 'html',
      success:function(response){
          $("#horarioFilter").append(response);
      }
  });
  buscar();
});

function buscar () {
  $("table#consultasTable tbody").html("");
    $.ajax({
        url:"consultaQuery.php",    //the page containing php script
        type: "get",    //request type,
        dataType: 'html',
        data: {
          estadoSelected: estadoSelected,
          profesorSelected: profesorSelected,
          materiaSelected: materiaSelected,
          horarioSelected: horarioSelected,
          fechaDesdeSelected: fechaDesdeSelected,
          fechaHastaSelected: fechaHastaSelected
        },
        success:function(response){
            $("table#consultasTable tbody").html(response);
        }
    });
}

function profesorQuery(materiaSelected = undefined) {
  var materiaSelected = materiaSelected == "" ||  materiaSelected == undefined ? undefined:materiaSelected;
  $.ajax({
    url:"profesorQuery.php",    //the page containing php script
    type: "get",    //request type,
    dataType: 'html',
    data: {materiaSelected: materiaSelected},
  }).
    done(function(response){
        $("#profesorFilter").html("<option value='' label='Seleccione Docente' selected></option>)");
        $("#profesorFilter").append(response);
        $("select#profesorFilter").val(profesorSelected);
    });
}

function materiaQuery(profesorSelected = undefined) {
  var profesorSelected = profesorSelected == "" || profesorSelected == undefined ? undefined:profesorSelected;
  $.ajax({
    url:"materiaQuery.php",    //the page containing php script
    type: "get",    //request type,
    dataType: 'html',
    data: {profesorSelected: profesorSelected}
  }).
  done(function(response){
    $("#materiaFilter").html("<option value='' label='Seleccione Materia' selected></option>")
    $("#materiaFilter").append(response);
    if (materiaSelected !=null ||materiaSelected !=undefined){
      $("select#materiaFilter").val(materiaSelected);
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
// INSCRIPCION CONSULTA
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
  $('#datosInscripcionConsulta').html(consulta.fecha + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
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
// INSCRIPCION CONSULTA
// CREAR CONSULTA
$(document).ready(function(){
  $('#datepickerCreate').datepicker({minDate: 0,dateFormat:"dd/mm/yy"});
  $( "#crearConsulta" ).click(function() {
      $('#crearConsultaModal').modal('toggle');
      var docenteId = $('#profesorCreateFilter').children("option:selected").val();
      var materiaId = $('#materiaCreateFilter').children("option:selected").val();
      var fecha = $('#datepickerCreate').val();
      var horarioHora = $('#horaCreate').children("option:selected").val();
      var horarioMinutos = $('#minutoCreate').children("option:selected").val();
      var cupo = $('#cupoCreate').val();
      crearConsulta(docenteId,materiaId,fecha,horarioHora,horarioMinutos,cupo,null);
      //resetCrearConsulta();
  });
  docenteQueryCreateConsulta();
});

// function resetCrearConsulta(){
//   $('#profesorCreateFilter').val(undefined);
//   $('#materiaCreateFilter').val(undefined);
//   $('#datepickerCreate').val(undefined);
//   $('#horaCreate').val(undefined);
//   $('#minutoCreate').val(undefined);
//   $('#crearConsulta').prop("disabled", true);
//   $('#materiaCreateFilter').prop("disabled", true);
// }

$('#crearConsultaModal').on('hidden.bs.modal', function (e) {
  $('#profesorCreateFilter').val(undefined);
  $('#materiaCreateFilter').val(undefined);
  $('#datepickerCreate').val(undefined);
  $('#horaCreate').val(undefined);
  $('#minutoCreate').val(undefined);
  $('#crearConsulta').prop("disabled", true);
  $('#materiaCreateFilter').prop("disabled", true);
})


function crearConsulta(consultaId,materiaId,fecha,horarioHora,horarioMinutos,cupo,idConsultaBloqueada){
  $.ajax({
    url:"../ajax/crearConsulta.php",
    type: "post",
    dataType: 'json',
    data: {
      docenteId:consultaId,
      materiaId:materiaId,
      fecha:fecha,
      horarioHora:horarioHora,
      horarioMinutos:horarioMinutos,
      cupo:cupo,
      idConsultaBloqueada:idConsultaBloqueada
    }
    }).done(response=>{
        openToast(response,"Creacion de Consulta",'success');
      })
      .fail(response=>{
        openToast(response,"Creacion de Consulta",'error');
      })
      .always(r=>{buscar();});
  }

function openCrearConsultaModal(){
  $('#crearConsultaModal').modal('show');
}

function docenteQueryCreateConsulta(docente){
  response = '';
  $.ajax({
    url:"consultaProfesorQuery.php",
    type: "get",
    dataType: 'html',
    data:{docente:docente},
    success:function(response){
      $("#profesorCreateFilter").append(response);
      $("#alternativoProfesorCreateFilter").append(response);
    }
  });  
}

function materiaQueryCreateConsulta(){
  setCrearConsultaDisabledState();
  response = '';
  var docente = $('#profesorCreateFilter').children("option:selected").val();
  if (docente != undefined || docente != ''){
    $('#materiaCreateFilter').prop("disabled", false);
    $("#materiaCreateFilter").html("<option value='' selected disabled hidden>Seleccione Materia</option>");
    $.ajax({
      url:"consultaMateriaQuery.php",
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
    setCrearConsultaDisabledState();
}

function materiaQueryAlternativoCreateConsulta(){
  setAlternativoCrearConsultaDisabledState();
  response = '';
  var docente = $('#alternativoProfesorCreateFilter').children("option:selected").val();
  if (docente != undefined || docente != ''){
    $('#alternativoMateriaCreateFilter').prop("disabled", false);
    $("#alternativoMateriaCreateFilter").html("<option value='' selected disabled hidden>Seleccione Materia</option>");
    $.ajax({
      url:"consultaMateriaQuery.php",
      type: "get",
      dataType: 'html',
      data:{docente:docente},
      success:function(response){
        $("#alternativoMateriaCreateFilter").append(response);
      }
    });
    } else {
      $('#alternativoMateriaCreateFilter').prop("disabled", true);
    }
    setAlternativoCrearConsultaDisabledState();
}


function setCrearConsultaDisabledState(){
  var docente = $('#profesorCreateFilter').children("option:selected").val();
  var materia = $('#materiaCreateFilter').children("option:selected").val();
  var fecha = $('#datepickerCreate').val();
  var cupo = $('#cupoCreate').val();
  if (docente == '' || docente == undefined || materia == '' || materia == undefined || fecha == ''|| fecha== undefined || cupo == ''){
    $('#crearConsulta').prop("disabled", true);
  } else {
    $('#crearConsulta').prop("disabled", false);
  }

}


function setAlternativoCrearConsultaDisabledState(){
  var docente = $('#alternativoProfesorCreateFilter').children("option:selected").val();
  var materia = $('#alternativoMateriaCreateFilter').children("option:selected").val();
  var fecha = $('#alternativoDatepickerCreate').val();
  var cupo = $('#alternativoCupoCreate').val();
  if (docente == '' || docente == undefined || materia == '' || materia == undefined || fecha == ''|| fecha== undefined || cupo == ''){
    $('#bloquearConsulta').prop("disabled", true);
  } else {
    $('#bloquearConsulta').prop("disabled", false);
  }

}

// CREAR CONSULTA
// CANCELAR CONSULTA
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
// CANCELAR CONSULTA
// BLOQUEAR CONSULTA
$(document).ready(function(){
  $('#alternativoDatepickerCreate').datepicker({minDate: 0,dateFormat:"dd/mm/yy"});

  $('#bloquearConsultaModal').on('hidden.bs.modal', function (e) {
    $('#modalFooterBloquearConsulta').prop('hidden', true);
    $('#modalBodyBloquearConsulta').prop('hidden', true);
    $('#bloquearConsultaOpenAlternativo').prop('disabled', true);
    $('#modalFooterOpenAlternativoBloquearConsulta').prop('hidden', false);
    $('#motivoBloqueo').prop('disabled',false);
    $('#motivoBloqueo').val("");
    $('#alternativoCupoCreate').val(undefined);
    $('#motivoBloqueo').val(undefined);
    $('#alternativoProfesorCreateFilter').val(undefined);
    $('#alternativoMateriaCreateFilter').val(undefined);
    $('#alternativoDatepickerCreate').val(undefined);
  })

  $( "#bloquearConsultaOpenAlternativo" ).click(function() {
    $('#modalFooterOpenAlternativoBloquearConsulta').prop('hidden', true);
    $('#modalFooterBloquearConsulta').prop('hidden', false);
    $('#modalBodyBloquearConsulta').prop('hidden', false);
    $('#motivoBloqueo').prop('disabled',true);
  });

  $( "#bloquearConsulta" ).click(function() {
    $('#bloquearConsultaModal').modal('toggle');
    var consultaIdBloqueada =  $('#idBloquearConsulta').val();
    var cupo = $('#alternativoCupoCreate').val();
    var motivo =  $('#motivoBloqueo').val();
    var docenteId = $('#alternativoProfesorCreateFilter').children("option:selected").val();
    var materiaId = $('#alternativoMateriaCreateFilter').children("option:selected").val();
    var fecha = $('#alternativoDatepickerCreate').val();
    var horarioHora = $('#alternativoHoraCreate').children("option:selected").val();
    var horarioMinutos = $('#alternativoMinutoCreate').children("option:selected").val();

    $.ajax({
      url:"../ajax/bloquearConsulta.php",
      type: "post",
      dataType: 'json',
      data: {consultaId: consultaIdBloqueada, descripcionBaja: motivo}})
      .done(response=>{
        //openToast(response,"Bloquear Consulta",'success');

      })
      .fail(response=>{
        openToast(response,"Bloquear Consulta",'error');
      })
      .always(r=>{
        crearConsulta(docenteId,materiaId,fecha,horarioHora,horarioMinutos,cupo,consultaIdBloqueada)
        buscar()});
  });

  $('#motivoBloqueo').keyup(function() {
    if($(this).val() != '') {
       $('#bloquearConsultaOpenAlternativo').prop('disabled', false);
    } else {
      $('#bloquearConsultaOpenAlternativo').prop('disabled', true);
    }
 });
});



function openBloquearConsultaModal(consultaId){
  getConsulta(consultaId).done( response => {
    consuta = "";
    consulta = response.consulta;
    $('#idBloquearConsulta').val(consulta.id);
    $('#datosBloquearConsulta').html(consulta.fecha + " - " + consulta.materia_nombre + " - " + consulta.docente_nombre + " - " + consulta.docente_apellido);
    $('#bloquearConsultaModal').modal('show');
  }
);}


// BLOQUEAR CONSULTA
// VER DETALLE CONSULTA
function openDetalleConsultaModal(consultaId){
  getConsulta(consultaId).done( response => {
    consuta = "";
    consulta = response.consulta;
    $('#idDetalleConsultaModal').val(consulta.id);
    $('#detalleFecha').html(consulta.fecha);
    $('#detalleFechaBaja').html(consulta.fecha_baja);
    $('#detalleMateria').html(consulta.materia_nombre);
    $('#detalleMotivo').html(consulta.descripcion_baja);
    if (consulta.fecha_baja != null){
      $('#detalleBaja').prop('hidden', false);
    }
      $.ajax({
        url:"../ajax/getInscripcionesConsulta.php",
        type: "get",
        dataType: 'json',
        data: {consultaId: consultaId}
      })
        .done(response=>{
          $("table#alumnosTable tbody").html("");
          response.suscripciones.forEach(suscripcion => {
            var row = "<tr>"+"<td>"+suscripcion.apellido+", "+suscripcion.nombre+"</td>"+"<td><a href='mailto:suscripcion.email'>"+suscripcion.email+"</a></td></tr>";
            $("table#alumnosTable tbody").append(row);
          });
        })
        .fail(response=>{
          openToast(response,"",'error');
        })
        .always(r=>{
          buscar()});
    $('#detalleConsultaModal').modal('show');
  }
);}

$('#detalleConsultaModal').on('hidden.bs.modal', function (e) {
  $('#detalleBaja').prop('hidden', true);
})

