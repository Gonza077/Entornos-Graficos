function uploadConsultas(){
    var Form = new FormData($('#filesForm')[0]);
    $.ajax({
        url: "ajax/uploadConsultas.php",
        type: "post",
        data : Form,
        processData: false,
        contentType: false,
        success: function(response){
            alert(response)
        }
    });
  }
  