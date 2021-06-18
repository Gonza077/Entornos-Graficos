<?php  
/*
if(isset($_POST["submit"])){
    $excel = $_FILES["fileToUpload"];
    $contenidoExcel= file_get_contents($excel["tmp_name"]); 
}*/
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require('includes/db.php');
require_once('includes/user.php');
require_once('includes/user_session.php');
$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($_POST["submit"])){
    $target_dir = "uploads/"; 
    $uploadOk = 1;
    $filename = $_FILES["fileToUpload"]["name"];
    $ext = substr($filename,-4);    
    $target_file = $target_dir . $filename;
    // Chequeo de existencia de archivo
    if (file_exists($target_file) && $uploadOk != 0 ) {
        echo "El archivo ya fue cargado.";
        $uploadOk = 0;
    }

    // Permitir solo el tipo de archivo xlsx
    if( $ext != "xlsx" && $uploadOk != 0) {
        echo "Solo los archivos de tipo xlsx son permitidos";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "El archivo no fue cargado.";
        // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars( basename( $filename )). "fue cargado.";
    } else {
        echo "Hubo un error al cargar el archivo.";
    }
    }
}
?>