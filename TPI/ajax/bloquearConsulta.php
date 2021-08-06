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
include_once ('../includes/consulta.php');
include_once ('mail.php');
$errorMessage='';
$consultaRepo = New ConsultaRepository();
    if(isset($_POST['consultaId'])){
        $consultaId  = $_POST['consultaId'];
        $descripcionBaja  = isset($_POST['descripcionBaja']) ? $_POST['descripcionBaja'] : "NULL";
        $consultaReemplazoId  = isset($_POST['consulta_reemplazo_id']) ? $_POST['consulta_reemplazo_id'] != "" ? $_POST['consulta_reemplazo_id'] : "NULL" : "NULL";
        $consultaRepo -> bloquearConsulta($consultaId,$descripcionBaja);
        if ($consultaRepo ->connect()->error == "") {
            http_response_code(200);
            echo json_encode("Consulta Bloqueada Exitosamente");
        } else {
            http_response_code(500);
            echo json_encode("La consulta no pudo ser bloqueada");
            die;
        }
        $consultaActual =$consultaRepo->getConsultaById($consultaId);

        enviarMail('moduloconsultas@gmail.com','Bloqueo de Consulta',setearCuerpoMail($consultaActual));


    }else{
        http_response_code(204);
        echo json_encode("Id de consulta inexistente");
    }
    
function setearCuerpoMail($consultaActual)
{
    $consultaActual = $consultaActual;
    $nombre_materia = $consultaActual->materia_nombre;
    $nombre_docente = $consultaActual->docente_nombre;
    $apellido_docente = $consultaActual->docente_apellido;
    $fecha = $consultaActual->fecha;
    $motivo = $consultaActual->descripcion_baja;

    $cuerpo_html='<html>         
    <body> 
    <h1>Correo enviado desde el Sistema de Consultas</h1>
    <h3>Notificación de Bloqueo de la Materia: '.$nombre_materia.' en el horario: '.$fecha.'</h3>
    <p>Docente: '.$apellido_docente.', '.$nombre_docente.'</p>
    <p>Motivo de ausencia: '.$motivo.'</p>
    </body>
    </html>
    <br />';
    return $cuerpo_html;
}
?>