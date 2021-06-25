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
        $query="UPDATE solicitud  SET fecha_baja = '".date('Y-m-d H:i:s')."', update_time = '".date('Y-m-d H:i:s')."' WHERE persona_id = $USER_ID";

        $stmt = $db->connect()->query($query);
        if ($db->getError() != NULL) {
            $errorMessage = $db->getError();
            echo json_encode($errorMessage);
        } else {
            echo json_encode($query,200);
        }
        $db->disconnect();
    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
?>