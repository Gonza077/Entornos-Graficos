<?php

include_once ('../includes/db.php');
include_once ('../includes/user_session.php');
include_once ('../includes/user.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}

// $estadoSelected   = $_GET['estadoSelected'] != NULL ? $_GET['estadoSelected'] : "NULL";
// $profesorSelected = $_GET['profesorSelected'] != NULL ? $_GET['profesorSelected'] : "NULL";
// $materiaSelected  = $_GET['materiaSelected'] != NULL ? $_GET['materiaSelected'] : "NULL";
// $horarioSelected  = $_GET['horarioSelected'] != NULL ? $_GET['horarioSelected'] : "NULL";
// $fechaDesdeSelected  = formatDate($_GET['fechaDesdeSelected']);
// $fechaHastaSelected  = formatDate($_GET['fechaHastaSelected']);

$db = new DB();


$query=" SELECT solicitud.id, solicitud.consulta_id,consulta.fecha,consulta.fecha_baja,materia.nombre AS materia_nombre,persona.nombre,persona.apellido
            FROM solicitud
            INNER JOIN
            (SELECT solicitud.consulta_id AS consulta_id , persona.id AS persona_id , MAX(solicitud.id) as solicitud_id
               FROM persona
               INNER JOIN solicitud 
               ON persona.id = solicitud.persona_id
               INNER JOIN consulta 
               ON solicitud.consulta_id = consulta.id
               WHERE consulta.fecha >= CURDATE() AND persona.id = $USER_ID
               GROUP BY solicitud.consulta_id ,solicitud.persona_id) as groupedByPersona
               ON solicitud.id = groupedByPersona.solicitud_id
            INNER JOIN consulta
            ON groupedByPersona.consulta_id = consulta.id
            INNER JOIN persona
            ON consulta.docente_id = persona.id
            INNER JOIN materia
            ON consulta.materia_id = materia.id
            WHERE solicitud.fecha_baja IS NULL";

#Mostramos los resultados obtenidos dentro de una tabla

if($registros = $db-> connect() ->query($query)){
   while ($row = $registros->fetch_assoc()) {
      $id = $row["consulta_id"];
      $bloqueada = isset($row["fecha_baja"]);
      echo "<tr class='".($bloqueada ? "table-danger" : "")."'>";
      echo "<td>".($bloqueada ? "CANCELADA" : "CONFIRMADA")."</td>";
      echo "<td>".$row["materia_nombre"]."</td>";
      echo "<td>".$row["nombre"].", ".$row["apellido"]."</td>";
      echo "<td>".date("d-m-Y",strtotime($row["fecha"]))."</td>";
      echo "<td>".date("H:i:s",strtotime($row["fecha"]))."</td>";
      echo "<td>";
      if(isset($USER)){
            echo "<button type='button' class='btn btn-danger' id='cancelar-$id' onclick='openCancelarConsultaModal($id)' title='Cancelar inscripcion a consulta'>
               <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-x-fill' viewBox='0 0 16 16'>
                  <path d='M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM6.854 8.146 8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z'/>
               </svg>
            </button>";
      }
      echo "</td>";
      echo "<tr>";
   };
}
$db -> disconnect();


function formatDate($fecha){
   if($fecha != null ){
      $fechaArr = explode("/", $fecha);
      $fechaFormatted = '"'.$fechaArr[2]."/".$fechaArr[1]."/".$fechaArr[0].'"';
      return $fechaFormatted;
   }
   return "NULL";
}
?>