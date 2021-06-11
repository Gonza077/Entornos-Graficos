<?php

include ('./includes/db.php');
$sqlQuery = "SELECT id,nombre FROM materia ORDER BY anio ASC, nombre ASC ";
$db = new DB();
$registros = $db-> connect() -> query($sqlQuery);
while( $row = $registros -> fetch_assoc()) {
   echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
};
$db -> disconnect();
?>
  