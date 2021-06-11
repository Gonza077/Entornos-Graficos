<!DOCTYPE html>

<?php include_once('includes/user_session.php');
      include_once('includes/user.php');

$user_session = new UserSession();
$user = $user_session->getCurrentUser();

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>Pagina Principal</title>
</head>
<body>
<?php require('navbar.php'); ?>
    <div class="container">
        <h1>SI PIBE SE LOGEO ESTO</h1>
        <H1>CON ESTE MAIL -> 
            <?php 
            printf("%s",$user->getNombre());?> 
        </H1>
    </div>
</body>
<?php require('footer.php'); ?>
</html>





