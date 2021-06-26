<?php
//Verifico si cookie existe
if(!isset($_COOKIE["contador"])){
    // Como no existe, inicializo la cookie en 0
    setcookie("contador", 0, time() + (60 * 60 * 24 * 90));
    echo "<h1>Bienvenido a la página.</h1>";
    echo "<p>Haremos uso de una cookie en su navegador para contar la cantidad de visitas a esta página</p>";
}else{
    $cantVisitas = $_COOKIE["contador"] + 1;
    setcookie("contador", $cantVisitas, time() + (60 * 60 * 24 * 90));
    echo "<h2>Ha visitado la página $cantVisitas veces</h2>";
    // echo "<form><button type="submit" name="borrar">Borrar coookie</button></form>";
}
// if(isset($_POST["borrar"])){
//     setcookie("contador", 0,time() + (60 * 60 * 24 * 90));
// }
?>