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
    if(isset($_GET['consultaId'])){
        $consulta_id  = $_GET['consultaId'];
        $query=" SELECT
        CONSULTA.id as 'id',
        CONSULTA.fecha as 'horario',
        CONSULTA.cupo as 'cupo',
        CONSULTA.descripcion_baja as 'descripcion_baja',
        CONSULTA.fecha_baja as 'fecha_baja',
        MATERIA.nombre as 'materia_nombre',
        PERSONA.nombre as 'docente_nombre',
        PERSONA.apellido as 'docente_apellido'
       
        FROM CONSULTA
        INNER JOIN PERSONA
        ON CONSULTA.docente_id = PERSONA.id
        INNER JOIN MATERIA
        ON CONSULTA.materia_id = MATERIA.id
        WHERE CONSULTA.id =$consulta_id" ;
        $stmt = $db->connect()->query($query);

        $fila = $stmt->fetch_row();
        $db->disconnect();
        if (!is_null($fila)){
            $response = new \stdClass();
            $response->id = $fila[0];
            $response->horario = $fila[1];
            $response->cupo = $fila[2];
            $response->descripcion_baja = $fila[3];
            $response->fecha_baja = $fila[4];
            $response->materia_nombre = $fila[5];
            $response->docente_nombre = $fila[6];
            $response->docente_apellido = $fila[7];
            echo json_encode($response,200);
        } else {
            echo json_encode("No ha sido encontrado",204);
        }
        return false;  
    } else {
        echo json_encode("No ha sido ingresado un id",JSON_FORCE_OBJECT,400);
    }
?>