<?php

include_once ('db.php');


// function generarToken($id_usuario)
// {
//     $persona_id = $id_usuario;
//     $token = uniqid();
//     $db= new DB();
//     $query = "INSERT INTO password_recovery (token,persona_id) VALUES ('$token',$persona_id)";
//     $db->connect()->query($query);
//     $db->disconnect();
//     return $token;
    

// }

function setearNuevaContraseña($persona_id)
{   
    $token = uniqid();
    $passMD5=md5($token);
    $id=$persona_id;
    $db= new DB();
    $query = $query="UPDATE persona Set password = '$passMD5' where id=$id";
    $db->connect()->query($query);
    $db->disconnect();
    return $token;
}


function setearCuerpoHtml($token)
{
    $contraseña=$token;
    $cuerpo_html = '<html>  
    <body> 
    <h1>Correo enviado desde el Sistema de Consultas</h1>
    <h2>Te enviamos tu nueva contraseña: </h2>
    <p>Contraseña: '.$contraseña.'</p>
    <p>Ya puedes iniciar sesion en el sitio con tu nueva password!</p>
    </html>
    <br />';
    return $cuerpo_html;
}

?>
