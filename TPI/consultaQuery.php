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
$sqlQuery="CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)";
$registros = $db-> connect() ->query($sqlQuery);
#Mostramos los resultados obtenidos dentro de una tabla
$bloqueadaClass="class='table-danger'";
while( $row = $registros -> fetch_assoc() ) {
   $id = $row["id"];
   $cupo = $row["cupo"];
   $estado = $row["estado"];
   $docente_id = $row["docente_id"];
   echo $estado;
   echo "<tr class='".($estado == 'BLOQUEADA' ? "table-danger" : "")."'>";
   echo "<td>".$estado."</td>";
   echo "<td>".$row["materia"]."</td>";
   echo "<td>".$row["docente_nombre"]."</td>";
   echo "<td>".$row["horario"]."</td>";
   echo "<td>".$cupo."</td>";
   echo "<td>";
   if(isset($USER)){
      if(!$USER->isDocente()){
         if ($cupo > 0){
            echo "<button type='button' class='btn btn-success' id='inscripcion-$id' onclick='openInscripcionConsultaModal($id)'>+</button>";
         }
         echo "<button type='button' class='btn btn-danger' id='cancelar-$id' onclick='openCancelarConsultaModal($id)'>-</button>";
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