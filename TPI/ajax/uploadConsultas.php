<?php 
include('../includes/db.php');
include('../vendor/autoload.php');
include('../includes/consulta.php');
try{
    $db =  new DB();
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
                exit('No hay datos en la hoja de Excel');
            }
            else{
                $consultasArr = array();
                //Se saltea la primer fila por ser la cabecera de la hoja de excel
                for ($fila = 2; $fila <= $filaMasGrande; ++$fila) {
                    $consulta = new Consulta();
                    $consulta->codigo_materia =  $hojaDeTrabajo-> getCellByColumnAndRow (1, $fila) -> getValue ();
                    $consulta->legajo_profesor = $hojaDeTrabajo-> getCellByColumnAndRow (2,$fila) -> getValue ();
                    $consulta->fecha = $hojaDeTrabajo -> getCellByColumnAndRow(3,$fila) ->getValue();
                    $consulta->fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($consulta->fecha) ->format("Y/m/d H:i:s");
                    $consulta->cupo = $hojaDeTrabajo-> getCellByColumnAndRow (4, $fila) -> getValue();
                    $consultasArr[] = $consulta;                                     
                }
                #Hasta aca se cargan el arreglo con las consultas que posteriormente deberan incluirse en la BD
            }
            $endDate = date("Y",time())."-12-31"; 
            foreach($consultasArr as $consulta){
                $fechaConsulta = date('Y-m-d H:i:s', strtotime($consulta-> fecha));
                while( strtotime($fechaConsulta) <= strtotime($endDate) ){                   
                    $query = "CALL crear_consulta_excel('$consulta->codigo_materia','$consulta->legajo_profesor','$fechaConsulta','$consulta->cupo')";
                    $db -> connect() -> query($query);
                    #Se va a repetir el proceso cada semana, durante todo el año
                    $fechaConsulta = strtotime('+7 days',strtotime($fechaConsulta)); #Devuelve un timeStap, hay que castearlo a DateTime
                    $fechaConsulta = date('Y-m-d H:i:s', $fechaConsulta);
                }
            }
            http_response_code(200);
            echo json_encode("Consultas cargadas exitosamente");
        }
    }
    else{
        http_response_code(204);
        echo json_encode("Formato ingresado incorrecto");
    }
}
catch(Exception $e){
    throw $e ->getMessage();
}
finally{
    $db -> disconnect();
}
?>
