<?php

include ('./includes/db.php');
$sql="SELECT id,nombre FROM materia ORDER BY anio ASC, nombre ASC ";
//echo json_encode($sql)

$db = new DB();
$stmt = $db->connect()->query($sql);
$results = $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($results);

?>
  