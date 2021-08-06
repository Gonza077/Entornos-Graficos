<?php
include_once ('../includes/db.php');
include_once ('../includes/user_session.php');
include_once ('../includes/user.php');
include_once ('../includes/solicitud.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}


$errorMessage='';
$solicitudRepo = New SolicitudRepository();
$suscripciones = [];
    if(isset($_GET['consultaId'])){
        $consultaId  = $_GET['consultaId'];
        $suscripciones = $solicitudRepo -> queryByConsultaId($consultaId);
        $response = new \stdClass();
        $response->suscripciones = $suscripciones;
        http_response_code(200);
        echo json_encode($response);
    }else{
        http_response_code(204);
        echo json_encode("Id de consulta inexistente");
    }
    
?>