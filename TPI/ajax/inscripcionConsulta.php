<?php
include_once ('../includes/user_session.php');
include_once ('../includes/user.php');
$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}
include_once ('../includes/db.php');
include_once ('../includes/solicitud.php');
include_once ('../includes/consulta.php');
$errorMessage='';
$solicitudRepo = New SolicitudRepository();
$consultaRepo = New ConsultaRepository();
    if(isset($_POST['consultaId'])){
        $consultaId  = $_POST['consultaId'];
        $solicitudRepo -> altaSolicitudByPersonaAndConsulta($USER_ID,$consultaId);
        $consultaRepo -> subctractCupoToConsulta($consultaId);
        echo json_encode("Solicitud Creada",200);
    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
?>