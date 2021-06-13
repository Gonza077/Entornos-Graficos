<?php

include ('./includes/db.php');
$sqlQuery = "SELECT id,nombre FROM materia ORDER BY anio ASC, nombre ASC ";

if(isset($_GET['docente'])){
   $docente = $_GET['docente'];
   $sqlQuery = "SELECT * FROM materia 
   INNER JOIN materia_docente
   ON materia.id = materia_docente.materia_id
   WHERE materia_docente.docente_id = $docente
   ORDER BY anio ASC, nombre ASC";
}
$db = new DB();
$registros = $db-> connect() -> query($sqlQuery);
while( $row = $registros -> fetch_assoc()) {
   echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
};
$db -> disconnect();
?>
  