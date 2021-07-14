<?php

include ('./includes/db.php');
include_once('includes/user_session.php');
include_once('includes/user.php');
$user_session = new UserSession();
$user = $user_session->getCurrentUser();

if (is_null($user)){
   $profesorSelected   = isset($_GET['profesorSelected']) ? $_GET['profesorSelected'] : "NULL";
   $query = "SELECT materia.id,materia.nombre FROM materia
            ORDER BY nombre ASC";
}
else{
   if (!$user -> isDocente()){
      $profesorSelected   = isset($_GET['profesorSelected']) ? $_GET['profesorSelected'] : "NULL";
      $query = "SELECT materia.id,materia.nombre FROM materia
                  INNER JOIN materia_docente 
                  ON materia.id = materia_docente.materia_id
                  WHERE isnull($profesorSelected) OR (NOT isnull($profesorSelected) AND materia_docente.docente_id = $profesorSelected)
                  ORDER BY nombre ASC";
      }
      else{
         $idUser = $user->getId();
         $query = "SELECT materia.id,materia.nombre FROM materia
                  INNER JOIN materia_docente 
                  ON materia.id = materia_docente.materia_id and materia_docente.docente_id = '$idUser'
                  ORDER BY nombre ASC";
      }
}
$db = new DB();
if($registros = $db-> connect() -> query($query)){
   while( $row = $registros -> fetch_assoc()) {
      echo '<option value="'.$row["id"] .'">' . $row["nombre"] . '</option>';
   };
}
$db -> disconnect();
?>
  