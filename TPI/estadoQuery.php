<?php

include ('database.php');
$sql="SELECT id,codigo FROM estado_consulta";
//echo json_encode($sql)
$stmt = $conn->query($sql);
$results = $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($results);

?>
  