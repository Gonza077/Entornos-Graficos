<?php
include ('../includes/db.php');
include ('../includes/user_session.php');
include ('../includes/user.php');
include ('../includes/consulta.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}


$errorMessage='';
$consultaRepo = New ConsultaRepository();
    if(isset($_POST['consultaId'])){
        $consultaId  = $_POST['consultaId'];
        $descripcionBaja  = isset($_POST['descripcionBaja']) ? $_POST['descripcionBaja'] : "NULL";
        $consultaReemplazoId  = isset($_POST['consulta_reemplazo_id']) ? $_POST['consulta_reemplazo_id'] != "" ? $_POST['consulta_reemplazo_id'] : "NULL" : "NULL";
        $consultaRepo -> bloquearConsulta($consultaId,$descripcionBaja);
        echo json_encode("Consulta Bloqueada Exitosamente",200);
    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
?>