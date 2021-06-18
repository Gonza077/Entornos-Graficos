function uploadConsultas(){
    var Form = new FormData($('filesForm ')[0]);
    $.ajax({
        URL: "ajax/uploadConsultas.php",
        type: "post",
        data: Form,
        processData: false,
        contentType: false,
        success: function(data){
            alert("Registros cargados con exito");
        },
        fail: function(data){
            alert("ERROR no se cargaron los regisatros");
        }
    })
}