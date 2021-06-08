<?php require('database.php'); ?>

<?php
$sql="SELECT id,nombre FROM materia";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetch_assoc();
echo json_encode($results);

?>
  