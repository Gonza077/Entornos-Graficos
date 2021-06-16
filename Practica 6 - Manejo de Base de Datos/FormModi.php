<title>Modificacion</title>
</head>
<boby>
<?php
include ("conexion.inc");
//Captura datos desde el Form anterior
$nombre = $_POST['Nombre'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT * FROM ciudades WHERE nombre ='$nombre' ";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$fila = mysqli_fetch_array($vResultado);
if(mysqli_num_rows($vResultado) == 0) {
 echo ("Ciudad Inexistente...!!! <br>");
 echo ("<A href='FormModiIni.html'>Continuar</A>");
}
else{
?>
<FORM action="Modi.php" method="POST" name="FormModi">
<input type="text" name="id" hidden=true value= " <?php echo($fila['id']); ?> ">
<table width="356">
<tr>
 <td width="103"> Nombre: </td>
 <td width="243"> <input type="text" name="Nombre" value="<?php echo($fila['nombre']); ?>">
 </td>
</tr>
<tr>
 <td width="103"> Pais: </td>
 <td width="243"> <input type="TEXT" name="Pais" size="20" maxlength="20"
 value="<?php echo($fila['pais']); ?>">
 </td>
 </tr>
 <tr>
 <td width="103"> Superficie: </td>
 <td width="243"> <input type="TEXT" name="Superficie" size="20" maxlength="20"
 value="<?php echo($fila['superficie']); ?>">
 </td>
</tr>
<tr>
 <td width="103"> tieneMetro: </td>
 <td width="243"> <input type="checkbox" name="tieneMetro" size="20" maxlength="40"
 value="<?php $fila['tieneMetro']?>">
 </td>
 </tr>
 <tr>
 <td colspan="2" align="center"> <input type="SUBMIT" name="Submit" value="Modificar">
 </td>
 </tr>
</table>
</FORM>
<?php
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>