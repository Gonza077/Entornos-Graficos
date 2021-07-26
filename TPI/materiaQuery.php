<?php

include ('./includes/db.php');
include_once('includes/user_session.php');
include_once('includes/user.php');
$user_session = new UserSession();
$user = $user_session->getCurrentUser();

$query = "SELECT materia.id,materia.nombre FROM materia
         ORDER BY nombre ASC";

$db = new DB();
if($registros = $db-> connect() -> query($query)){
   while( $row = $registros -> fetch_assoc()) {
      echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
   };
}
$db -> disconnect();
?>
  