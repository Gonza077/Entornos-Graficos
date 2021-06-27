<?php

ob_start("ob_gzhandler");

// ini_set("session.use_trans_sid",true);
// session_start(['use_only_cookies'=>0]);
// $_SESSION['cookie_support']=1;
// if(isset($_COOKIE['session_name'])){
//     ini_set("session.use_trans_sid",false);
//     session_start();
//     ///////////////////
//     //any hard tracking code or hard work goes here
//     // like $_SESSION['msisdn']="9455366212";
//     ///////////////////
//     $_SESSION['cookie_support']=1;
// }else{
//     ini_set("session.use_trans_sid",true);
//     session_start();
//     $_SESSION['cookie_support']=0;
// }
session_start();


include('conexion.inc');

//Rescatamos los valores guardados en la variable de sesión y los asignamos a $carro. Si
// no existen valores, ponemos a false en el valor de $carro
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else$carro=false;
//y hacemos la consulta
$qry=mysqli_query($link, "select * from catalogo order by producto asc");
?>

<html>
<head>
    <title>CAT&Aacute;LOGO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" type="text/css" href="../bootswatch/minty-bootstrap.min.css">
    <style type="text/css">
        <!--
            .catalogo {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 9px;
                color: #333333;
            }
        -->
    </style>
</head>
<body>
    <table width="272" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;">
    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo">
        <td width="170"><strong>Producto</strong></td>
        <td width="77"><strong>Precio</strong></td>
        <td width="25" align="right"><a href="vercarrito.php"
            title="Ver el contenido del carrito"><img src="vercarrito.gif" width="25" height="21" border="0"></a></td>
        </tr>
        <?php
        //mostramos todos nuestros artículos, viendo si han sido agregados o no a nuestro carro de compra
        while($row=mysqli_fetch_assoc($qry)){
            ?>
            <tr valign="middle" class="catalogo">
                <td><?php echo $row['producto'] ?></td>
                <td><?php echo $row['precio'] ?></td>
                <td align="center"><?php
                if(!$carro || !isset($carro[md5($row['idCatalogo'])]['identificador']) || $carro[md5($row['idCatalogo']['identificador'])] != md5($row['idCatalogo'])){
                //si el producto no ha sido agregado, mostramos la imagen de no agregado, linkeada
                // a nuestra página de agregar producto y transmitíéndole a dicha página el id del artículo
                // y el identificador de la sesión
                ?><a href="agregacar.php?id=<?php echo $row['idCatalogo'];
                    ?>"><img src="productonoagregado.gif" border="0" title="Agregar al Carrito"></a><?php }
                    else
                    //en caso contrario mostramos la otra imagen linkeada., a la página que sirve para borrar
                    //el artículo del carro.
                    {?><a href="borracar.php?id=<?php echo $row['idCatalogo'];
                        ?>"><img src="productoagregado.gif" border="0" title="Quitar del Carrito">Borrar</a><?php
                    } ?></td>
                </tr><?php } ?>
        </table>
                </body>
                </html>
                <?php
                ob_end_flush();
                ?>
                
                