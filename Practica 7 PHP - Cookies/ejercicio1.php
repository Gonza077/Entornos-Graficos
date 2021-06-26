<?php
//Veo si recibo datos del formulario por parte del usuario
if(isset($_POST["estilo"])){
    //Estoy recibiendo un estilo nuevo, lo capturo con $_POST
    $estilo = $_POST["estilo"];
    // Lo agrego a la cookie
    setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
}else{
    //No he recibido el estilo que desea el usuario, miro si hay una cookie anteriormente creada
    if (isset($_COOKIE["estilo"])){
        // Asigno al estilo la información guardada en la cookie
        $estilo = $_COOKIE["estilo"];
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Cookies en PHP</title>
<?php
// Verifico su tengo un estilo definido, para cargar la correspondiente hoja de estilos
if (isset($estilo)){
    if($estilo == 'cerulean'){
        echo '<link rel="stylesheet" type="text/css" href="bootswatch/cerulean-bootstrap.min.css">';
    };
    if($estilo == 'ciborg'){
        echo '<link rel="stylesheet" type="text/css" href="bootswatch/ciborg-bootstrap.min.css">';
    };
    if($estilo == 'lux'){
        echo '<link rel="stylesheet" type="text/css" href="bootswatch/lux-bootstrap.min.css">';
    };
    if($estilo == 'minty'){
        echo '<link rel="stylesheet" type="text/css" href="bootswatch/minty-bootstrap.min.css">';
    };
}
?>
</head>
<body>
<div class="container">
    <div class="row justify-content-center" >
      <div class="col-12 col-sm-10">
    <h1>
    Ejemplo de uso de cookies en PHP para almacenar la hoja de estilos css que queremos
    utilizar para definir el aspecto de la página.
    </h1>
<p>
<form class="form-signin" action="ejercicio1.php" method="post"> 
    <h2>
        Aquí puedes seleccionar el estilo que prefieres en la página:
    </h2>
<br>
<div class="form-group">
    <select class="dropdown form-control" name="estilo">
        <option value="cerulean">Cerulean
        <option value="ciborg">Ciborg
        <option value="lux">Lux
        <option value="minty">Minty
    </select>
</div>
<br>
<div class="from-group">
    <input class="form-control btn btn-primary" type="submit" value="Actualizar el estilo">
</div>
<br>
</form>
</div>
</div>
</div>
<div class="container">
    
    <h2>Navbar</h2>
    <hr>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <br>
    <h2>Botones</h2>
    <hr>
    
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-light">Light</button>
    <button type="button" class="btn btn-dark">Dark</button>
    <button type="button" class="btn btn-link">Link</button>
    
    <br>
    <h2>Tabla</h2>
    <hr>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-active">
                <th scope="row">Active</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Primary</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-secondary">
                <th scope="row">Secondary</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-success">
                <th scope="row">Success</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-danger">
                <th scope="row">Danger</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-warning">
                <th scope="row">Warning</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-info">
                <th scope="row">Info</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-light">
                <th scope="row">Light</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
            <tr class="table-dark">
                <th scope="row">Dark</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
            </tr>
        </tbody>
    </table>
    
    <br>
    <h2>Barra de progreso</h2>
    <hr>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <br>
    
</div>
    

</body>
</html>

