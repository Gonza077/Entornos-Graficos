<?php

include ('./includes/db.php');
$query = "SELECT id,nombre FROM materia ORDER BY nombre ASC";
$db = new DB();
if($registros = $db-> connect() -> query($query)){
   while( $row = $registros -> fetch_assoc()) {
      echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
   };
}
$db -> disconnect();
?>
  