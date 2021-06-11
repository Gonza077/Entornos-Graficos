<?php

include ('./includes/db.php');
$sql="SELECT id,nombre,apellido FROM persona where docente is true";
$db = new DB();
$registros = $db -> connect() -> query($sql);
while( $row = $registros -> fetch_assoc()) {
    echo '<option value="'.$row["id"]. '">' . $row["apellido"] . ", ". $row["nombre"] .'</option>';;
};
$db -> disconnect();
?>
  