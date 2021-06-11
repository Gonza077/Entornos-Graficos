<?php

include ('./includes/db.php');
$sql="SELECT id,codigo FROM estado_consulta";
$db = new DB();
$registros = $db->connect()->query($sql);
while( $row = $registros -> fetch_assoc()) {
    echo '<option value="'.$row["id"] .'">' . $row["codigo"] . '</option>';
};
$db -> disconnect();
?>
  