<!-- Bloquear Consulta Modal -->
<div class="modal fade" id="bloquearConsultaModal" tabindex="-1" aria-labelledby="bloquearConsultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form>
      <input type="text" name="idBloquearConsulta" id="idBloquearConsulta" hidden aria-hidden="true">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Volver">Volver</button>
          <button type="button" class="btn btn-danger" aria-label="Bloquear" id="bloquearConsulta" disabled>Bloquear</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
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

</script>