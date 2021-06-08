<?php require('database.php'); ?>

<?php
$sql="SELECT id,nombre,apellido FROM consultas_db.persona where docente is true";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);

?>
  