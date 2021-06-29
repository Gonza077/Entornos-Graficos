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
    if(isset($_POST['docenteId']) && isset($_POST['materiaId']) && isset($_POST['fecha']) && isset($_POST['horarioHora']) && isset($_POST['horarioMinutos'])){
        $docente = $_POST['docenteId'];
        $materia = $_POST['materiaId'];
        $fecha = $_POST['fecha'];
        $fechaArr = explode("/", $fecha);
        $hora = $_POST['horarioHora'];
        $minutos = $_POST['horarioMinutos'];
        $fechaFormatted = $fechaArr[2]."/".$fechaArr[1]."/".$fechaArr[0]." ".$hora.":".$minutos.":00";
        $descripcionBaja  = isset($_POST['descripcionBaja']) ? $_POST['descripcionBaja'] : "NULL";
        if ($consultaRepo -> crearConsulta($docente,$materia,$fechaFormatted,4,'NULL')){
            echo json_encode("Consulta creada exitosamente",200);
        } else {
            echo json_encode("La consulta no pudo ser creada",500);
        }
    } else {
        echo json_encode("Error al ingresar datos de nueva Consulta",204);
    }
?>