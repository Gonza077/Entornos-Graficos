<html>
<head>
<title> Listados completo </title>
</head>
<body>
<?php
include("conexion.inc");
$vSql = "SELECT * FROM ciudades";
$vResultado = $link -> query ($vSql);
$total_registros= mysqli_num_rows($vResultado);
?>
<table border=1 style="width:100%">
<tr>
<td><b>Nombre</b></td>
<td><b>Pais</b></td>
<td><b>Superficie</b></td>
<td><b>tieneMetro</b></td>
</tr>
<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
 <td><?php echo ($fila['nombre']); ?></td>
 <td><?php echo ($fila['pais']); ?></td>
 <td><?php echo ($fila['superficie']); ?></td>
 <td><?php echo ($fila['tieneMetro']); ?></td>
</tr>
<tr>
 <td colspan="5">
<?php
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
 </td>
</tr>
</table>
<p>&nbsp;</p>
<p align="center"><a href="Menu.html">Volver al menu del ABM</a></p>
</body>
</html>