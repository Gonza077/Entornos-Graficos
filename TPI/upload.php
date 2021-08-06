<?php 
include_once('includes/user_session.php');
include_once('includes/user.php');
$user_session = new UserSession();
$user = $user_session->getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="./css/toast.css">
    <link rel="stylesheet" href="./css/footerFixed.css">
    <title>Subir Consultas</title>
</head>
<body>
<?php require('navbar.php'); ?>
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" id="filesForm">
            <div class="col-md-4 offset-md-4" style="margin-top: 50px;">
                <input class="form-control" type="file" name="fileToUpload">
                <button type="button" id="import" onclick="uploadConsultas()" class="btn btn-primary form-control" >Cargar</button>
            </div>
        </form>
    </div>
    <?php require_once('footer.php')?>
    <?php require_once('./components/toast.php');?>
    <script src="js/uploadConsulta.js"></script>
</body>
</html>
