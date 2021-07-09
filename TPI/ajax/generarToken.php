<?php 

include ('./includes/db.php');
include ('mail.php');

include_once('includes/user.php');
$user = new User();


if($_POST)

{

        if(isset($_POST['email'])) 
        {
            $email = $_POST['email'];
            $user->getUserByEmail($email);
            enviarMail($email,'Recuperacion de Contraseña',generarToken($user->getId()));

        }
}

function generarToken($id_usuario){
    $id_persona = $id_usuario;
    $token = uniqid();
    $db= new DB();
    $query = "INSERT INTO password_recovery (token,persona_id) VALUES ('$token',$id_persona)";
    $stmt = $db->connect()->query($query);
    if ($db ->connect()->error == "") {
        http_response_code(200);
        echo json_encode("El mail de recuperación de contraseña fue enviado a su correo electronico.");
        return $token;
    } else {
        http_response_code(500);
        echo json_encode("Hubo un error interno en el servido, intentelo nuevamente.");
        
    }
}



?>