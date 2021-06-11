<?php

include ('./includes/db.php');

$estadoSelected   = $_GET['estadoSelected'] != NULL ? $_GET['estadoSelected'] : "NULL";
$profesorSelected = $_GET['profesorSelected'] != NULL ? $_GET['profesorSelected'] : "NULL";
$materiaSelected  = $_GET['materiaSelected'] != NULL ? $_GET['materiaSelected'] : "NULL";
$horarioSelected  = $_GET['horarioSelected'] != NULL ? $_GET['horarioSelected'] : "NULL";

$db = new DB();
$sqlQuery=<<<EOD
CALL queryConsulta($materiaSelected,$profesorSelected,$estadoSelected)
EOD;
$conn = $db->connect();
$registros = $conn ->query($sqlQuery);
#Mostramos los resultados obtenidos dentro de una tabla
while( $row = $registros -> fetch_assoc() ) {
   echo "<tr>";
   echo "<td>".$row["estado"]."</td>";
   echo "<td>".$row["materia"]."</td>";
   echo "<td>".$row["docente"]."</td>";
   echo "<td>".$row["horario"]."</td>";
   echo "<td>".$row["cupo"]."</td>";
   echo "<tr>";
};
$conn -> close();
?>