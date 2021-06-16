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
        $query="INSERT INTO solicitud (persona_id, consulta_id, update_time) VALUES ($USER_ID, $consulta_id,'".date('Y-m-d H:i:s')."')";

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