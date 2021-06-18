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
    <form action="ajax/uploadConsultas.php" id=filesForm method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" aria-describedby="fileToUpload" required>
                <label class="custom-file-label" for="fileToUpload">  Seleccione el archivo a cargar.</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" onclick="uploadConsultas()" id="fileToUpload">Cargar</button>
            </div>
        </div>
    </form>
</body>
<?php require('footer.php')?>
<script src="js/uploadConsultas.js"></script>
</html>
