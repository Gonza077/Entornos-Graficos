<?php require('database.php'); ?>

<?php
$sql="SELECT id,codigo FROM estado_consulta";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetch_assoc();
echo json_encode($results);

?>
  