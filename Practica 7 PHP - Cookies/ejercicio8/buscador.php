<!DOCTYPE html PUBLIC "‐//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1‐transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http‐equiv="Content‐Type" content="text/html; charset=utf‐8" />
    <title>Untitled Document</title>
</head>
<body>
    <?php
    include("conexion.inc");
    $pal=$_POST['Palabra'];
    if($pal){
        $resp = mysqli_query($link, "select * from Buscador where Canciones LIKE '%".$pal."%'") or die(mysqli_error($link));
        if(mysqli_num_rows($resp) == "0") {
            echo "No hay resultados respecto a la palabra que busca.";
        } else {
            echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><hr>";
            ?>
            <table>
                <tr>
                    <th>IdCancion</th>
                    <th>Autor/Nombre</th>
                    <th>Duración</th>
                </tr>
            <?php
            while($cat = mysqli_fetch_array($resp)) {?>
                <tr>
                    <td><?php echo ($cat['IdCancion']); ?></td>
                    <td><?php echo ($cat['Canciones']); ?></td>
                    <td><?php echo ($cat['Duracion']); ?></td>
                </tr>
                <!-- <td colspan="5"> -->
                    <?php
                }
            }
            ?>
            </table>
            <?php
        }else{
            echo "<form name='FormBuscador' method='post' action=''><input name='Palabra' type='text'
                id='Palabra'><input type='submit' name='Submit' value='Buscar!'></form>";
            }?>
        </body>
        </html>
            