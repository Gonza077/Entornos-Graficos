<?php

include ('./includes/db.php');
include ('./includes/user_session.php');
include ('./includes/user.php');
$user_session = new UserSession();
$user = $user_session->getCurrentUser();
if ($user != null){
    if ( $user->isDocente() && !$user->isAdmin()){
        $userId= $user->getId();
        $query = "SELECT id,nombre,apellido FROM persona WHERE id = $userId AND docente = 1";
    } else if($user->isAdmin()) {
        $query="SELECT id,nombre,apellido FROM persona WHERE docente = 1 ";
    }
    $db = new DB();
    $registros = $db -> connect() -> query($query);
    while( $row = $registros -> fetch_assoc()) {
        echo '<option value="'.$row["id"]. '">' . $row["apellido"] . ", ". $row["nombre"] .'</option>';;
    };
    $db -> disconnect();
}
?>
  