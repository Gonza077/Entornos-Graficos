<?php
include ('../includes/db.php');
include ('../includes/user_session.php');
include ('../includes/user.php');
include ('../includes/solicitud.php');
include ('../includes/consulta.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}


$errorMessage='';
$solicitudRepo = New SolicitudRepository();
$consultaRepo = New ConsultaRepository();
    if(isset($_POST['consultaId'])){
        $consultaId  = $_POST['consultaId'];
        $solicitudRepo -> bajaSolicitudByPersonaAndConsulta($USER_ID,$consultaId);
        $consultaRepo -> subctractCupoToConsulta($consultaId);
    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
?>