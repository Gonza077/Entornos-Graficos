<?php require('database.php'); ?>

<?php
$sql="SELECT id,nombre,apellido FROM persona where docente is true";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetch_assoc();
echo json_encode($results);

?>
  