<?php
include ('../includes/db.php');
include ('../includes/user_session.php');
include ('../includes/user.php');
include ('../includes/consulta.php');
include ('mail.php');


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
        $consultaActual =$consultaRepo->getConsultaById($consultaId);

        enviarMail('jpdok98@gmail.com','Bloqueo de Consulta',setearCuerpoMail($consultaActual));


    }else{
        echo json_encode("Id de consulta inexistente",204);
    }
    
function setearCuerpoMail($consultaActual)
{
    $consultaActual = $consultaActual;
    $nombre_materia = $consultaActual->materia_nombre;
    $nombre_docente = $consultaActual->docente_nombre;
    $apellido_docente = $consultaActual->docente_apellido;
    $horario = $consultaActual->horario;
    $motivo = $consultaActual->descripcion_baja;

    $cuerpo_html='<html>         
    <body> 
    <h1>Correo enviado desde el Sistema de Consultas</h1>
    <h3>Notificación de Bloqueo de la Materia: '.$nombre_materia.' en el horario: '.$horario.'</h3>
    <p>Docente: '.$apellido_docente.', '.$nombre_docente.'</p>
    <p>Motivo de ausencia: '.$motivo.'</p>
    </body>
    </html>
    <br />';
    return $cuerpo_html;
}
?>