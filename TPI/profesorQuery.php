<?php

include_once ('./includes/db.php');

$sql="SELECT id,nombre,apellido FROM persona where docente is true";

if(isset($_GET['materiaSelected'])){
    $materiaSelected = $_GET['materiaSelected'];
    $sql="SELECT persona.id as 'id',
    persona.nombre as 'nombre',
    persona.apellido as 'apellido'
    FROM materia 
    INNER JOIN materia_docente
    ON materia.id = materia_docente.materia_id
    INNER JOIN persona
    ON persona.id = materia_docente.docente_id
    WHERE materia.id = $materiaSelected
    ORDER BY anio ASC, nombre ASC ";
}

if(isset($_GET['docente'])){
    $docente = $_GET['docente'];
    $sql = "SELECT persona.id as 'id',
            persona.nombre as 'nombre',
            persona.apellido as 'apellido'
            FROM materia 
            INNER JOIN materia_docente
            ON materia.id = materia_docente.materia_id
            INNER JOIN persona
            ON persona.id = materia_docente.docente_id
            WHERE materia_docente.docente_id = $docente
            ORDER BY anio ASC, nombre ASC ";
 }
 
$db = new DB();
$registros = $db -> connect() -> query($sql);
while( $row = $registros -> fetch_assoc()) {
    echo '<option value="'.$row["id"]. '">' . $row["apellido"] . ", ". $row["nombre"] .'</option>';;
};
$db -> disconnect();
?>
  