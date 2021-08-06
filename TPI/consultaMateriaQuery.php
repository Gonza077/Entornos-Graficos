<?php

include_once ('./includes/db.php');
$query = "SELECT id,nombre FROM materia ORDER BY nombre ASC";

if(isset($_GET['docente'])){
   $docente = $_GET['docente'];
   $query = "SELECT materia.id as 'id' , materia.nombre as 'nombre' FROM materia 
   INNER JOIN materia_docente
   ON materia.id = materia_docente.materia_id
   WHERE materia_docente.docente_id = $docente
   ORDER BY nombre ASC";
}
$db = new DB();
if($registros = $db-> connect() -> query($query)){
   while( $row = $registros -> fetch_assoc()) {
      echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
   };
}
$db -> disconnect();
?>
  