# Práctica 1: introducción / instalar Bootstrap

Importar Bootstrap en el proyecto actual, ya sea descargando Bootstrap localmente, o llamándolo de manera remota. Ver la documentación en caso de tener dudas.
Crear un div de clase container, con una fila que contenga 1 columna.
Crear un archivo CSS que se llame estilo.css, y llamarlo desde el archivo donde estemos trabajando. Crear una clase que se llame contenedor, con un color de fondo cualquiera, y añadirle esa clase al div con clase container que creamos en el ejercicio anterior.

<html>
<head>
<title>Prueba de Bootstrap 4</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
    		<div class="col" style="background-color:#ccc">
        		<h1>Columna 1</h1>
        		<p>Esto es una prueba de bootstrap.</p>
    		</div>
 	</div>   
</body>
</html>




# Práctica 2: sistema de grilla o rejillas

Utilizar la grilla de Bootstrap para crear un div de clase container, que contenga dos filas.
Para todas las resoluciones, excepto para sm, la primera fila deberá haber una columna que ocupe el 100% del ancho, y en la segunda deberá haber 2 columnas que ocupen el 50% del ancho cada una. Para sm y resoluciones más pequeñas, deberán haber 3 filas con 1 columna que ocupe el 100% del ancho en cada una.




