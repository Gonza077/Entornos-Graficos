<?php include_once('includes/user_session.php');
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
    <title>Document</title>
</head>
<body>
<?php require('navbar.php'); ?>
    <form method="post" enctype="multipart/form-data" id="filesForm">
        <div class="col-md-4 offset-md-4">
            <input class="form-control" type="file" name="fileToUpload">
            <button type="button" id="import" onclick="uploadConsultas()" class="btn btn-primary form-control" >Cargar</button>
        </div>
    </form>
</body>
<?php require('footer.php')?>
<script src="js/uploadConsulta.js"></script>
</html>
