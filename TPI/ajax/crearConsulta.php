<?php
include ('../includes/db.php');
include ('../includes/user_session.php');
include ('../includes/user.php');
include ('../includes/consulta.php');
include ('mail.php');


$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}
// docenteId: 1
// materiaId: 1
// fecha: 30/06/2021
// horarioHora: 7
// horarioMinutos: 0

$errorMessage='';
$consultaRepo = New ConsultaRepository();
    if(isset($_POST['docenteId']) && isset($_POST['materiaId']) && isset($_POST['fecha']) 
    && isset($_POST['horarioHora']) && isset($_POST['horarioMinutos']) && isset($_POST['cupo'])){
        $docente = $_POST['docenteId'];
        $materia = $_POST['materiaId'];
        $fecha = $_POST['fecha'];
        $cupo = $_POST['cupo'];
        $fechaArr = explode("/", $fecha);
        $hora = $_POST['horarioHora'];
        $minutos = $_POST['horarioMinutos'];
        $fechaFormatted = $fechaArr[2]."/".$fechaArr[1]."/".$fechaArr[0]." ".$hora.":".$minutos.":00";
        $descripcionBaja  = isset($_POST['descripcionBaja']) ? $_POST['descripcionBaja'] : "NULL";
        $consultaRepo -> crearConsulta($docente,$materia,$fechaFormatted,$cupo,'NULL');
        if ($consultaRepo ->connect()->error == "") {
            http_response_code(200);
            echo json_encode("Consulta creada exitosamente");
        } else {
            http_response_code(500);
            echo json_encode("La consulta no pudo ser creada",500);
        }
    } else {
        http_response_code(204);
        echo json_encode("Error al ingresar datos de nueva Consulta",204);
    }
?>