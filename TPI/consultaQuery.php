<?php require('database.php'); ?>

<?php
$estadoSelected = $_GET['estadoSelected'];
$profesorSelected= $_GET['profesorSelected'];
$materiaSelected= $_GET['materiaSelected'];
$horarioSelected= $_GET['horarioSelected'];


$sql = "SELECT * FROM consultas_db.test WHERE test.id = 1";
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);

?>
  