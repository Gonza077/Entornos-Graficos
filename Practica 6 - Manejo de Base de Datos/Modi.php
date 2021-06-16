<?php
include ("conexion.inc");
//Captura datos desde el Form anterior
$id=$_POST['id'];
$nombre = $_POST['Nombre'];
$pais = $_POST['Pais'];
$superficie = $_POST['Superficie'];
$tieneMetro = is_null($_POST['tieneMetro']) ? 1:0;
//Arma la instrucción SQL y luego la ejecuta
$vSql = "UPDATE ciudades set nombre='$nombre', pais='$pais', superficie='$superficie, tieneMetro='$tieneMetro' 
where id=$id";
mysqli_query($link,$vSql) or die (mysqli_error($link));
echo("Ciudad modificada con exito<br>");
echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
// Cerrar la conexion
mysqli_close($link);
?>
