<?php
//Verificar si recibo datos del formulario por parte del usuario
if (isset($_POST['submit'])) {
    $selectRadio = $_POST["selectRadio"];
    setcookie("selectRadio", $selectRadio, time() + (60 * 60 * 24 * 90));
    header("Location: ejercicio4.php");
}
if (isset($_POST['borrar'])) {
    setcookie("selectRadio", '', time() + (60 * 60 * 24 * 90));
    header("Location: ejercicio4.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <title>Cookies en PHP</title>
    <link rel="stylesheet" type="text/css" href="bootswatch/minty-bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-12 col-sm-10">
                <?php
                $selectRadio = $_COOKIE["selectRadio"] ?? "";
                if($selectRadio == ''){
                    echo "<h1>Diario La Capital de Rosario</h1>";
                ?>

                    <h2>¿Que tipo de noticias prefiere?</h2>
                    <form class="form-signin" action="ejercicio4.php" method="POST">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectRadio" id="Política" value='Política'>
                            <label class="form-check-label" for="Política">
                                Política
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectRadio" id="Economía" value='Economía'>
                            <label class="form-check-label" for="Economía">
                                Economía
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectRadio" id="Deportes" value='Deportes'>
                            <label class="form-check-label" for="Deportes">
                                Deportes
                            </label>
                        </div>    
                        
                        <div class="form-group">
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Mostrar noticias</button>
                        </div>
                    </form>

                <?php
                }else{
                    echo "<h1>Diario La Capital - Seccion: $selectRadio</h1>";
                    //Mostrar según lo que selecciono: "Noticias de Política", "Noticias de Deportes"
                }
                ?>

                <form class="form-signin" action="ejercicio4.php" method="POST">
                <div class="form-group">
                    <br>
                    <button class="btn btn-lg btn-warning btn-block" type="submit" name="borrar">Borrar Cookie</button>
                </div>
                </form>
                        

            </div>
        </div>
    </div>

    
    
</body>
</html>