<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>Document</title>
</head>
<body>
<?php require('navbar.php'); ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" aria-describedby="fileToUpload" required>
                <label class="custom-file-label" for="fileToUpload">  Seleccione el archivo a cargar.</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit" id="fileToUpload">Cargar</button>
            </div>
        </div>
    </form>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
</body>
<?php require('footer.php')?>
</html>

<?php  
require('includes/db.php');
//require_once('compoer/vendor/php-excel-reader/excel_reader2.php');
require_once('includes/user.php');
require_once('includes/user_session.php');
$USER_SESSION = new UserSession();
$USER = new User();
$USER = $USER_SESSION->getCurrentUser();
//ACA HABIA QUE VERIFICAR QUE SEA EL ADMIN O PROFESOR EN FORMATO PDF QUE SBUA SUS HORARIOS?
if(isset($_POST["submit"])) {

    
    $target_dir = "uploads/"; 
    $uploadOk = 1;
    $filename = $_FILES["fileToUpload"]["name"];
    $ext = substr($filename,-4);    
    $target_file = $target_dir . $filename;
    // Chequeo de existencia de archivo
    if (file_exists($target_file) && $uploadOk != 0 ) {
        echo "El archivo ya fue cargado.";
        $uploadOk = 0;
    }

    // Permitir solo el tipo de archivo xlsx
    if( $ext != "xlsx" && $uploadOk != 0) {
        echo "Solo los archivos de tipo xlsx son permitidos";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "El archivo no fue cargado.";
        // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars( basename( $filename )). "fue cargado.";
    } else {
        echo "Hubo un error al cargar el archivo.";
    }
    }
}
?>
    <script type="text/javascript">
        $(document).ready(function () {
        bsCustomFileInput.init()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: "GET",
            url: 'files.php'
        });
            });
    </script>
