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
    <script type="text/javascript">
        $(document).ready(function () {
        bsCustomFileInput.init()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: 'ajax/uploadConsultas.php'
        });
            });
    </script> 
