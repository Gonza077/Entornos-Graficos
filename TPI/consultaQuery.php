<?php

include ('./includes/db.php');
include ('./includes/user_session.php');
include ('./includes/user.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
if(isset($USER)){
   $USER_ID = $USER->getId();
}

$estadoSelected   = $_GET['estadoSelected'] != NULL ? $_GET['estadoSelected'] : "NULL";
$profesorSelected = $_GET['profesorSelected'] != NULL ? $_GET['profesorSelected'] : "NULL";
$materiaSelected  = $_GET['materiaSelected'] != NULL ? $_GET['materiaSelected'] : "NULL";
$horarioSelected  = $_GET['horarioSelected'] != NULL ? $_GET['horarioSelected'] : "NULL";
$fechaDesdeSelected  = formatDate($_GET['fechaDesdeSelected']);
$fechaHastaSelected  = formatDate($_GET['fechaHastaSelected']);

$db = new DB();

$sqlQuerySolicitudes="SELECT solicitud.consulta_id AS consulta_id , persona.id AS persona_id , MAX(solicitud.id)
                     FROM persona
                     INNER JOIN solicitud 
                     ON persona.id = solicitud.persona_id
                     INNER JOIN consulta 
                     ON solicitud.consulta_id = consulta.id
                     WHERE solicitud.fecha_baja IS NULL AND consulta.fecha >= CURDATE()
                     GROUP BY solicitud.consulta_id ,solicitud.persona_id ";

//$solicitudes[] = $db-> connect() ->query($sqlQuerySolicitudes)->fetch_all(MYSQLI_NUM);


// $solicitudRepo = New SolicitudRepository();
// $solicitudes = $consultaRepo->getConsultaById($consulta_id);

// $solicitudes = $db-> connect() ->query($sqlQuerySolicitudes);
$ids_solicitudes[] = [];
// while($row = $solicitudes-> fetch_assoc())
// {
//    array_push($ids_solicitudes,$row['consulta_id']);
// }
if($result = $db-> connect() ->query($sqlQuerySolicitudes)){
   while ($row = $result->fetch_assoc()) {
        array_push($ids_solicitudes,$row['consulta_id']);
   }
}


// $sqlQuery="CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)";

$sqlQuery=" SELECT
            consulta.id as 'id',
            materia.nombre as 'materia',
            persona.nombre as 'docente_nombre',
            persona.id as 'docente_id',
            consulta.fecha as 'horario',
            consulta.cupo as 'cupo',
            consulta.fecha_baja as 'fecha_baja'
            FROM consulta
            INNER JOIN persona
            ON consulta.docente_id = persona.id
            INNER JOIN materia
            ON consulta.materia_id = materia.id
            WHERE   (  materia_id = IFNULL($materiaSelected,materia_id) )
            AND     (  docente_id = IFNULL($profesorSelected,docente_id) )
            AND (isnull($estadoSelected)
               OR (NOT isnull($estadoSelected) AND $estadoSelected = 1 AND fecha_baja is null )
               OR (NOT isnull($estadoSelected) AND $estadoSelected = 2 AND fecha_baja is not null)  
               )
            AND (isnull($horarioSelected)
               OR (NOT isnull($horarioSelected) AND $horarioSelected = 1 AND CAST(fecha as time)  between '07:30:00' and '12:49:59')
				   OR (NOT isnull($horarioSelected) AND $horarioSelected = 2 AND CAST(fecha as time)  between '12:50:00' and '18:44:59')
				   OR (NOT isnull($horarioSelected) AND $horarioSelected = 3 AND CAST(fecha as time)  between '18:45:00' and '24:00:00')
               )
            AND (isnull($fechaDesdeSelected)
               OR (NOT isnull($fechaDesdeSelected) AND CAST(fecha as date) >= $fechaDesdeSelected))
            AND (isnull($fechaHastaSelected)
               OR (NOT isnull($fechaHastaSelected) AND CAST(fecha as date) <= $fechaHastaSelected))";

#Mostramos los resultados obtenidos dentro de una tabla

if($registros = $db-> connect() ->query($sqlQuery)){
   while ($row = $registros->fetch_assoc()) {
      $id = $row["id"];
      $cupo = $row["cupo"];
      $docente_id = $row["docente_id"];
      $bloqueada = isset($row["fecha_baja"]);
      $idInSolicitudes = in_array($id,$ids_solicitudes)? 1:0;
      echo "<tr class='".($bloqueada ? "table-danger" : "")."'>";
      echo "<td>".($bloqueada ? "BLOQUEADA" : "")."</td>";
      echo "<td>".$row["materia"]."</td>";
      echo "<td>".$row["docente_nombre"]."</td>";
      echo "<td>".$row["horario"]."</td>";
      echo "<td>".$cupo."</td>";
      echo "<td>";
      if(isset($USER)){
         if(!$USER->isDocente() && !$USER->isAdmin() && !$bloqueada ){
            if ($cupo > 0 && !$idInSolicitudes ){
               echo "<button type='button' class='btn btn-success' id='inscripcion-$id' onclick='openInscripcionConsultaModal($id)' title='Inscribirse a consulta'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-plus-fill' viewBox='0 0 16 16'>
                     <path d='M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0z'/>
                  </svg>
               </button>";
            }
            if($idInSolicitudes){
               echo "<button type='button' class='btn btn-danger' id='cancelar-$id' onclick='openCancelarConsultaModal($id)' title='Cancelar inscripcion a consulta'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-x-fill' viewBox='0 0 16 16'>
                     <path d='M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM6.854 8.146 8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z'/>
                  </svg>
               </button>";
            }
         }
         if (($USER_ID == $docente_id || $USER->isAdmin())  && !$bloqueada){
            echo "<button type='button' class='btn btn-danger' id='bloquear-$id' onclick='openBloquearConsultaModal($id)' title='Bloquear Consulta'>
               <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-lock-fill' viewBox='0 0 16 16'>
                  <path d='M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z'></path>
               </svg>
            </button>"; 
         }
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