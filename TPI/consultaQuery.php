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

$db = new DB();

$sqlQuerySolicitudes="SELECT consulta.id FROM consultas_db.persona
                     INNER JOIN solicitud 
                     ON persona.id = solicitud.persona_id
                     INNER JOIN consulta 
                     ON solicitud.consulta_id = consulta.id
                     WHERE consulta.fecha >= CURDATE()";

// $solicitudes[] = $db-> connect() ->query($sqlQuerySolicitudes)->fetch_all(MYSQLI_NUM);

$solicitudes = $db-> connect() ->query($sqlQuerySolicitudes);
$ids_solicitudes[] = [];
while($row = $solicitudes-> fetch_assoc())
{
   array_push($ids_solicitudes,$row['id']);
}


$sqlQuery="CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)";
$registros = $db-> connect() ->query($sqlQuery);
#Mostramos los resultados obtenidos dentro de una tabla
$bloqueadaClass="class='table-danger'";
while( $row = $registros -> fetch_assoc() ) {
   $id = $row["id"];
   $cupo = $row["cupo"];
   $docente_id = $row["docente_id"];
   $idInSolicitudes = in_array($id,$ids_solicitudes)? 1:0;
   echo "<tr class='".(TRUE == 'BLOQUEADA' ? "table-danger" : "")."'>";
   echo "<td>"."ACA VA UN ESTADO CALCULADO"."</td>";
   echo "<td>".$row["materia"]."</td>";
   echo "<td>".$row["docente_nombre"]."</td>";
   echo "<td>".$row["horario"]."</td>";
   echo "<td>".$cupo."</td>";
   echo "<td>";
   if(isset($USER)){
      if(!$USER->isDocente()){
         if ($cupo > 0 && !$idInSolicitudes ){
            echo "<button type='button' class='btn btn-success' id='inscripcion-$id' onclick='openInscripcionConsultaModal($id)'>+</button>";
         }
         if($idInSolicitudes){
            echo "<button type='button' class='btn btn-danger' id='cancelar-$id' onclick='openCancelarConsultaModal($id)'>-</button>";
         }
      }
      if ($USER_ID == $docente_id){
         echo "<button type='button' class='btn btn-danger' id='bloquear-$id' onclick='openBloquearConsultaModal($id)'>!=</button>";
      }
   }
   echo "</td>";
   echo "<tr>";
};
$db -> disconnect();
?>