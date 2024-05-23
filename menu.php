<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION["user"])){
    $user = $_SESSION['user'];
    // echo "El usuario es: $user";
    require("datos/classConnectionMySQL.php");
    // Creamos una nueva instancia
    $NewConn = new ConnectionMySQL();
    // Creamos una nueva conexion
    $NewConn->CreateConnection();
    }else{
        echo"<script type='text/javascript'>
                window.location='index.php';
            </script>";
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark" >
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php">Doñapelos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar Prestamos</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="consultarPrestamos.php">Consultar Prestamos</a></li>
                    <li><a class="dropdown-item" href="agregarPrestamo.php">Agregar Prestamos</a></li>
                    <?php
                        if($user=="ADMIN"){
                            echo"
                            <li class='nav-item'>
                                <a class='dropdown-item' href='recuperarPrestamo.php'>Restaurar Prestamo</a>
                            </li>
                            ";
                        }
                    ?>
                    <!-- <li><a class="dropdown-item" href="#">Modificar</a></li> -->
                    <li><hr class="dropdown-divider"></li>
                </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar Libros</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="consultarlibros.php">Consultar Libreria</a></li>
                    <li><a class="dropdown-item" href="agregarlibro.php">Agregar</a></li>
                    <!-- <li><a class="dropdown-item" href="#">Modificar</a></li> -->
                    <li><hr class="dropdown-divider"></li>
                </ul>
                <?PHP
                    if($user=="ADMIN"){
                        echo"
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link enable' href='agregarusuario.php'>Agregar Usuario</a>
                        </li>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link enable' href='mostrarusuarios.php'>Ver Usuario</a>
                        </li>
                        ";
                    }
			    ?>
            </ul>
            <a class="navbar-brand" href="#">Usuario
				<?php
				echo $user
				?>
			</a>
	    	<?php
			    echo '<a class="navbar-brand link-primary" href="cerrarsesion.php">SALIR</a>';
		    ?>	
            <form class="d-flex" role="search">
                <a class="navbar-brand" href="#">Usuario	
            </form>
            </div>
        </div>
        </li>
        </nav>
    </body>
</html>