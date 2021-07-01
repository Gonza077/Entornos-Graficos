<?php 
include('../includes/db.php');
include('../vendor/autoload.php');
//Se definen que tipos de archivos se aceptan,
try{
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(in_array($_FILES["fileToUpload"]["type"],$allowedFileType)){ 
        $target_file = "../uploads/".$_FILES["fileToUpload"]["name"];
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){   
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx') -> setReadDataOnly(true);
            $hojaDeCalculo = $reader-> load ($target_file); // Cargar hoja de Excel
            $hojaDeTrabajo = $hojaDeCalculo->getActiveSheet();
            $filaMasGrande = $hojaDeTrabajo-> getHighestRow (); // número total de filas -> devuevle un entero
            $columnaMasGrande = $hojaDeTrabajo-> getHighestColumn(); // número total de columnas -> devuelve una cadena
            $columnaMasGrande = PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnaMasGrande); // e.g. 5
            $lines = $filaMasGrande - 1; //Cantidad de lineas, sacando la cabecera
            if ($lines <= 0) {
                echo('No hay datos en la hoja de Excel');
            }
            else{
                $db =  new DB();
                //Se saltea la primer fila y segundapor ser la cabecera y el nombre de la columna
                for ($fila = 2; $fila <= $filaMasGrande; ++$fila) {
                    $legajo =  $hojaDeTrabajo-> getCellByColumnAndRow (1, $fila) -> getValue (); // 
                    $materiaID = $hojaDeTrabajo-> getCellByColumnAndRow (2,$fila) -> getValue (); // apellido
                    $fecha =  $hojaDeTrabajo-> getCellByColumnAndRow (3, $fila) -> getValue();// email
                    $fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fecha) -> format('Y-m-d H:i:s');
                    $cupo = $hojaDeTrabajo-> getCellByColumnAndRow (4, $fila) -> getValue();// cupo
                    $sql = "INSERT INTO consulta (docente_id,materia_id,fecha,cupo) values ('$legajo','$materiaID','$fecha','$cupo')";
                    $db-> connect() -> query($sql);
                echo "Se cargaron correctamente los registro";
                }
            }
        }
    }
        else{
            echo "Formato ingresado incorrecto";
        }
}
catch(Exception $e){
    throw $e ->getMessage();
}
finally{
    $db -> disconnect();
}

?>
