<?php require('database.php'); ?>

<?php
$sql="SELECT id,codigo FROM consultas_db.estado_consulta";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);

?>
  