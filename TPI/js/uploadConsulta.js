function uploadConsultas(){
    var Form = new FormData($('#filesForm')[0]);
    $.ajax({
        url: "ajax/uploadConsultas.php",
        type: "post",
        data : Form,
        processData: false,
        contentType: false})
        .done(response=>{
            openToast(response,"Carga Consulta",'success');
          })
        .fail(response=>{
            openToast(response,"Carga Consulta",'error');
        });
  }
  