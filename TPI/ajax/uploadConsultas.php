<?php 
include('../includes/db.php');
include('../vendor/autoload.php');
//Se definen que tipos de archivos se aceptan,
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
if(in_array($_FILES["fileToUpload"]["type"],$allowedFileType)){ 
    $target_file = "uploads/".$_FILES["fileToUpload"]["name"];
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx') -> setReadDataOnly(true);
        $hojaDeCalculo = $reader-> load ($target_file); // Cargar hoja de Excel
        $hojaDeTrabajo = $hojaDeCalculo->getActiveSheet();
        $filaMasGrande = $hojaDeTrabajo-> getHighestRow (); // número total de filas -> devuevle un entero
        $columnaMasGrande = $hojaDeTrabajo-> getHighestColumn(); // número total de columnas -> devuelve una cadena
        $columnaMasGrande = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnaMasGrande); // e.g. 5
        $lines = $columnaMasGrande - 1; //Cantidad de lineas, sacando la cabecera
        if ($lines <= 0) {
            echo('No hay datos en la hoja de Excel');
        }
        else{
        $sql = "INSERT INTO persona (nombre,apellido,email,password,docente) values ";
        //Se saltea la primer fila y segundapor ser la cabecera y el nombre de la columna
        for ($fila = 2; $fila <= $filaMasGrande; $fila++) {
            $nombre =  $hojaDeTrabajo-> getCellByColumnAndRow (1, $fila) -> getValue (); // Nombre
            $apellido = $hojaDeTrabajo-> getCellByColumnAndRow (2,$fila) -> getValue (); // apellido
            $email =   $hojaDeTrabajo-> getCellByColumnAndRow (3, $fila) -> getValue (); // email
            $password = $hojaDeTrabajo-> getCellByColumnAndRow (4, $fila) -> getValue (); // contraseña
            $docente = $hojaDeTrabajo-> getCellByColumnAndRow (5, $fila) -> getValue (); // esDocente
            $sql .= "('$nombre','$apellido','$email','$password','$docente'),";
        }
        $sql = rtrim ($sql, ","); // Eliminar el la coma final     
        $db=  new DB();
        $db-> connect() -> query($sql);
        $db -> disconnect();
        //ACA HAY QUE VER COMO DEVOLVER EL MENSAJE0
        echo "Se cargaron correctamente los registro";
        }
    }
} 
else{
    echo "Formato ingresado incorrecto";
}
?>