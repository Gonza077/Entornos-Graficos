<?php

include ('./includes/db.php');
$sql="SELECT id,nombre,apellido FROM persona where docente is true";
//echo json_encode($sql)
$db = new DB();
$stmt = $db->connect()->query($sql);
$results = $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($results);

?>
  