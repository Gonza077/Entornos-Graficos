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
    </body>
    <?php
    $target_dir = "uploads/";
    $uploadOk = 1;
    if(isset($_POST["submit"])) {

        $filename = $_FILES["fileToUpload"]["name"];
        $ext = substr($filename,-4);    
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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

    <?php require('footer.php'); ?>

    <script type="text/javascript">
        $(document).ready(function () {
        bsCustomFileInput.init()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //     $.ajax({
            //         type: "GET",
            //         url: 'files.php',
            //         data: data,
            //         success: function(response)
            //         {
            //             console.log("jeje")
            //    })
            //  }
            $.ajax({
                type: "GET",
            url: 'files.php'
        });
            });
    </script>
</html>