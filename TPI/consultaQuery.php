<?php

include ('./includes/db.php');
include ('./includes/user_session.php');
include ('./includes/user.php');
include ('./includes/solicitud.php');

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

$sqlQuerySolicitudes="SELECT consulta.id AS consulta_id , persona.id AS persona_id , MAX(solicitud.id)
                        FROM consultas_db.persona
                        INNER JOIN solicitud 
                        ON persona.id = solicitud.persona_id
                        INNER JOIN consulta 
                        ON solicitud.consulta_id = consulta.id
                        WHERE solicitud.fecha_baja IS NULL AND consulta.fecha >= CURDATE()
                        GROUP BY consulta_id AND persona_id";

//$solicitudes[] = $db-> connect() ->query($sqlQuerySolicitudes)->fetch_all(MYSQLI_NUM);


// $solicitudRepo = New SolicitudRepository();
// $solicitudes = $consultaRepo->getConsultaById($consulta_id);

$solicitudes = $db-> connect() ->query($sqlQuerySolicitudes);
$ids_solicitudes[] = [];
while($row = $solicitudes-> fetch_assoc())
{
   array_push($ids_solicitudes,$row['consulta_id']);
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
   echo "<tr class='".(isset($row["fecha_baja"]) ? "table-danger" : "")."'>";
   echo "<td>".$idInSolicitudes."</td>";
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