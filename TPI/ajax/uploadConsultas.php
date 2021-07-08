<?php 
include('../includes/db.php');
include('../vendor/autoload.php');
include('../includes/consulta.php');
$consultasArr = array();
try{
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(in_array($_FILES["fileToUpload"]["type"],$allowedFileType)){ 
        $target_file = "../uploads/".$_FILES["fileToUpload"]["name"];
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){   
            $db =  new DB();
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
                $startDate = date("Y")."-01-01";
                $endDate = date("Y")."-12-31";
                if($registros = $db-> connect() -> query("SELECT CAST(fecha AS DATE) fecha from fechas WHERE fecha = current_date()")){
                    $row = $registros->fetch_assoc();
                    if (!isset($row)) {
                        $db-> connect() -> query("CALL filldates('$startDate','$endDate')");
                    }
                }
                //Se saltea la primer fila y segundapor ser la cabecera y el nombre de la columna
                for ($fila = 2; $fila <= $filaMasGrande; ++$fila) {
                    $consulta = new Consulta();
                    $consulta->codigo_materia =  $hojaDeTrabajo-> getCellByColumnAndRow (1, $fila) -> getValue ();
                    $consulta->legajo_profesor = $hojaDeTrabajo-> getCellByColumnAndRow (2,$fila) -> getValue ();
                    $consulta->dia =  strtoupper($hojaDeTrabajo-> getCellByColumnAndRow (3, $fila) -> getValue());
                    $consulta->horario_hora =  $hojaDeTrabajo-> getCellByColumnAndRow (4, $fila) -> getValue();
                    $consulta->horario_minuto =  $hojaDeTrabajo-> getCellByColumnAndRow (5, $fila) -> getValue();
                    //$consulta->horario = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($horario) -> format('H:i:s');
                    $consulta->cupo = $hojaDeTrabajo-> getCellByColumnAndRow (6, $fila) -> getValue();
                    // $sql = "INSERT INTO consulta (docente_id,materia_id,fecha,cupo) values ('$legajo','$materiaID','$fecha','$cupo')";
                    // $db-> connect() -> query($sql);
                    $consultasArr[] = $consulta;
                // echo "Se cargaron correctamente los registro";
                }
            }
            $dateQuery="SELECT CAST(fecha AS DATE) fecha ,WEEKDAY(fecha) as dia FROM consultas_db.fechas WHERE WEEKDAY(fecha) not in(5,6) AND fecha >= current_date() ORDER BY fecha ASC";
            if($registros = $db-> connect() ->query($dateQuery)){
                while ($row = $registros->fetch_assoc()) {
                    $current_dia = $row["dia"];
                    $current_fecha = $row["fecha"];
                    foreach ($consultasArr as &$consulta) {
                        if (getDayNumber($consulta->dia) == $current_dia) {
                            $full_date = $current_fecha." ".$consulta->horario_hora.":".$consulta->horario_minuto.":00";
                            $query = "CALL crear_consulta_excel('$consulta->codigo_materia',$consulta->legajo_profesor,'$full_date',$consulta->cupo)";
                            $db-> connect() -> query($query);
                        }
                    }
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


function getDayNumber($day) {
    switch (strtoupper($day)) {
        case "LUNES":
            return 0;
            break;
        case "MARTES":
            return 1;
            break;
        case "MIERCOLES":
            return 2;
            break;
        case "JUEVES":
            return 3;
            break;
        case "VIERNES":
            return 4;
            break;
    }
}
?>
