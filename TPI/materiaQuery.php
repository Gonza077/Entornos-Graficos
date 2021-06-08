<?php require('database.php'); ?>

<?php
$sql="SELECT id,nombre FROM consultas_db.materia";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);

?>
  