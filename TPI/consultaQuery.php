<?php

include ('./includes/db.php');
include ('./includes/user_session.php');
include ('./includes/user.php');

$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
$USER_ID = $USER->getId();

$estadoSelected   = $_GET['estadoSelected'] != NULL ? $_GET['estadoSelected'] : "NULL";
$profesorSelected = $_GET['profesorSelected'] != NULL ? $_GET['profesorSelected'] : "NULL";
$materiaSelected  = $_GET['materiaSelected'] != NULL ? $_GET['materiaSelected'] : "NULL";
$horarioSelected  = $_GET['horarioSelected'] != NULL ? $_GET['horarioSelected'] : "NULL";

$db = new DB();
$sqlQuery="CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)";
$registros = $db-> connect() ->query($sqlQuery);
#Mostramos los resultados obtenidos dentro de una tabla
$contador=1;
while( $row = $registros -> fetch_assoc() ) {
   $id = $row["id"];
   $docente_id = $row["docente_id"];
   echo "<tr>";
   echo "<td>".$row["estado"]."</td>";
   echo "<td>".$row["materia"]."</td>";
   echo "<td>".$row["docente_nombre"]."</td>";
   echo "<td>".$row["horario"]."</td>";
   echo "<td>".$row["cupo"]."</td>";
   echo "<td>";
   echo "<button type='button' class='btn btn-success' data-toggle='modal' id='inscripcion-$id' data-target='#inscripcionConsultaModal'>+</button>";
   echo "<button type='button' class='btn btn-danger' data-toggle='modal' id='cancelar-$id' data-target='#cancelarConsultaModal'>-</button>";
   if ($USER_ID == $docente_id){
      echo "<button type='button' class='btn btn-danger' data-toggle='modal' id='bloquear-$id' data-target='#bloquearConsultaModal'>!=</button>";
   }
   echo "</td>";
   echo "<tr>";
   $contador = $contador + 1;
};
$db -> disconnect();
?>