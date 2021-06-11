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
//echo json_encode($sql)
$stmt = $db->connect()->query($sqlQuery);
$results = $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($results);

?>
  