<?php

include_once ('./includes/db.php');
$query="SELECT id, nombre_turno, hora_inicio, hora_fin FROM consultas_db.horarios";
$db = new DB();
if($registros = $db-> connect() -> query($query)){
    while( $row = $registros -> fetch_assoc()) {
        echo '<option value="'.$row["id"] .'">' . $row["nombre_turno"] .' ['. $row["hora_inicio"] .'-'. $row["hora_fin"] .']</option>';
    } 
}
$db -> disconnect();
?>
  