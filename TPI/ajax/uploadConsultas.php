<?php 
include_once('../includes/db.php');
include_once('../vendor/autoload.php');
include_once('../includes/consulta.php');
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
                    $consulta->dia = $hojaDeTrabajo-> getCellByColumnAndRow (3,$fila) -> getValue ();
                    $consulta->hora = $hojaDeTrabajo -> getCellByColumnAndRow(4,$fila) ->getValue();
                    $consulta->hora = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($consulta->hora) ->format("H:i:s");
                    $consulta->cupo = $hojaDeTrabajo-> getCellByColumnAndRow (5, $fila) -> getValue();
                    $consultasArr[] = $consulta;                                     
                }
                #Hasta aca se cargan el arreglo con las consultas que posteriormente deberan incluirse en la BD
            }
            $endDate = date("Y",time())."-12-31"; 
            function dame_el_dia ($fecha)
            {
                $array_dias['Sunday'] = "Domingo";
                $array_dias['Monday'] = "Lunes";
                $array_dias['Tuesday'] = "Martes";
                $array_dias['Wednesday'] = "Miercoles";
                $array_dias['Thursday'] = "Jueves";
                $array_dias['Friday'] = "Viernes";
                $array_dias['Saturday'] = "Sabado";
                return $array_dias[date('l', strtotime($fecha))];
            }
            foreach($consultasArr as $consulta){
                $fechaConsulta = date('Y-m-d');
                while(1){
                    $fechaConsulta = strtotime('+1 days',strtotime($fechaConsulta)); #Devuelve un timeStap, hay que castearlo a DateTime
                    $fechaConsulta = date('Y-m-d', $fechaConsulta); 
                    if (dame_el_dia($fechaConsulta) == $consulta->dia){                
                        while( strtotime($fechaConsulta) <= strtotime($endDate) ){             
                            $fechaFormato= $fechaConsulta." ".$consulta->hora;                      
                            $query = "CALL crear_consulta_excel('$consulta->codigo_materia','$consulta->legajo_profesor','$fechaFormato','$consulta->cupo')";
                            $db -> connect() -> query($query);              
                            #Se va a repetir el proceso cada semana, durante todo el año
                            $fechaConsulta = strtotime('+7 days',strtotime($fechaConsulta)); #Devuelve un timeStap, hay que castearlo a DateTime
                            $fechaConsulta = date('Y-m-d', $fechaConsulta);                                     
                        }
                    break; 
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
?>
