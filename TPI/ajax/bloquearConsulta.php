<?php
include ('../includes/db.php');
include ('../includes/user_session.php');
include ('../includes/user.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}


$errorMessage='';
$db = new DB();
    if(isset($_POST['consultaId'])){
        $consulta_id  = $_POST['consultaId'];
        $descripcion_baja  = isset($_POST['descripcionBaja']) ? $_POST['descripcionBaja'] : "NULL";
        $consulta_reemplazo_id  = isset($_POST['consulta_reemplazo_id']) ? $_POST['consulta_reemplazo_id'] != "" ? $_POST['consulta_reemplazo_id'] : "NULL" : "NULL";
        $query="UPDATE consulta SET fecha_baja ='".date('Y-m-d H:i:s')."', descripcion_baja ='".$descripcion_baja."', consulta_reemplazo_id =".$consulta_reemplazo_id." ,update_time ='".date('Y-m-d H:i:s')."'WHERE id =".$consulta_id."";



        $stmt = $db->connect()->query($query);
        if ($db->getError() != NULL) {
            $errorMessage = $db->getError();
        }
        echo json_encode("Consulta bloqueada exitosamente",200);
        $db->disconnect();
    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
?>