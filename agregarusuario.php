<!doctype html>
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
 <html>
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <meta charset="utf-8"/>   
      <title>Inicio Doñapelos</title>
      <style>
       #titulo{
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: rgba(211, 211, 211, 0.178);
        padding: 20px;
        border-radius: 5px;
      }
        #register-form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: rgba(211, 211, 211, 0.5);
        padding: 20px;
        border-radius: 5px;
        }
        body {
        background-image: url('img/fondologin.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        background-attachment: fixed;
      }
    </style>
   </head>
   <body>
	<style> 
	.navbar {
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 1000;
	}
	</style>
   <nav class="navbar navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark" >
	<div class="container-fluid">
		<a class="navbar-brand" href="inicio.php">
			Doñapelos
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			<a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="agregarPrestamo.php">Prestamos</a>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Administrar Libros
			</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="consultarlibros.php">Consultar Libreria</a></li>
				<li><a class="dropdown-item" href="agregarlibro.php">Agregar</a></li>
				<!-- <li><a class="dropdown-item" href="#">Modificar</a></li> -->
				<li><hr class="dropdown-divider"></li>
				<!-- <li><a class="dropdown-item" href="#">Eliminar Libro</a></li> -->
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
		<form class="d-flex" role="search">
			<a class="navbar-brand" href="#">Usuario
				<?php
				echo $user
				?>
			</a>
		<?php
			echo '<a class="navbar-brand link-primary" href="cerrarsesion.php">SALIR</a>';
		?>	 	
		</form>
		</div>
	</div>
	</nav>
    <div id="titulo">
      <h1>Registrar Nuevo Usuario</h1>
    </div>
    
    <form id="register-form" method="POST" action="registrar.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" id="usuario" name="usuario" required> 
          <div id="username"  class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <!-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        <!-- <button  class="btn btn-warning">Registrar</button> -->
      </form>

    
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>