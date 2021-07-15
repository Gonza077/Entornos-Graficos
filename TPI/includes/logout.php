<?php
    include_once 'user_session.php';
    include_once 'user.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    $user= new User();

    header("Location: ../consultas.php");
?>