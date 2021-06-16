<html>
<head>
<title>Alta Usuario</title>
</head>
<body>
<?php
include("conexion.inc");

//Captura datos desde el Form anterior
$nombre = $_POST['Nombre'];
$pais = $_POST['Pais'];
$super = $_POST['Superficie'];
$tieneMetro = isset($_POST["tieneMetro"])? 1:0;

//Arma la instrucción SQL y luego la ejecuta

$vSql = "SELECT Count(nombre) as canti FROM ciudades WHERE nombre='$nombre'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantUsuarios = mysqli_fetch_assoc($vResultado);
//$vCantUsuarios = mysqli_result($vResultado, 0);
if ($vCantUsuarios ['canti']!=0){
 echo ("La capital ya existe<br>");
 echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
}
else {
$vSql = "INSERT INTO ciudades (nombre, pais, superficie, tieneMetro)
values ('$nombre','$pais', '$super', '$tieneMetro')";
mysqli_query($link, $vSql) or die (mysqli_error($link));
echo("Capital cargada con exito<br>");
echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
}
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>