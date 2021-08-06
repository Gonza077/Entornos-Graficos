<?php
include_once ('../includes/db.php');
include_once('../includes/user_session.php');
include_once ('../includes/user.php');
include_once ('../includes/consulta.php');


$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}


$errorMessage='';
$db = new DB();
    if(isset($_GET['consultaId'])){
        $consulta_id  = $_GET['consultaId'];
        $consultaRepo = New ConsultaRepository();
        $consulta = $consultaRepo->getConsultaById($consulta_id);
        if (!is_null($consulta)){
            $response = new \stdClass();
            $response->consulta = $consulta;
            echo json_encode($response,200);
        } else {
            echo json_encode("No ha sido encontrado",204);
        }
        return false;  
    } else {
        echo json_encode("No ha sido ingresado un id",JSON_FORCE_OBJECT,400);
    }
?>