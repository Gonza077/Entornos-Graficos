<?php 
  include_once('includes/user_session.php');
  include_once('includes/user.php');
  $user_session = new UserSession();
  $user = $user_session->getCurrentUser();
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <link rel="icon" href="./assets/Icono.ico">
    <title>Calendario Academico</title>
</head>
<body>
<?php include('navbar.php'); ?>
  <div class="container-fluid">
    <div class="row" style="height: 60em">
      <iframe src="./assets/calendario-academico-2021-2022-a3.pdf" width="100%" height="100%">
        Este navegador no soporta PDFs. Porfavor descarga el PDF para verlo: 
        <a href="./assets/calendario-academico-2021-2022-a3.pdf">Download PDF</a></iframe>
    </div>
<?php include('footer.php');?>
<script src="js/miConsultaScripts.js"> </script>
  <?php if ($user != null && $user->isDocente()){
    $userId= $user->getId();
    echo "<script>var profesorId = $userId;</script>";
  } else {
    echo "<script>var profesorId = undefined;</script>";
  } ?>
<?php include('components/toast.php');?>
</html>

