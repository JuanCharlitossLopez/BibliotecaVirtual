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
			<a class="nav-link active" aria-current="page" href="agregarPrestamo.php">Prestamos</a>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Administrar Libros
			</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="consultarlibros.php">Consultar Libreria</a></li>
				<li><a class="dropdown-item" href="agregarlibro.php">Agregar</a></li>
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
		<a class="navbar-brand" href="#">Usuario
				<?php
				echo $user
				?>
			</a>
		<?php
			echo '<a class="navbar-brand link-primary" href="cerrarsesion.php">SALIR</a>';
		?>	 
		</div>
	</div>
	</nav>

	<style> 
		.carousel-item {
			width: 100%;
			height: 100vh;
		}
	</style>	
	<div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active" data-bs-interval="10000">
		<img src="img/1.jpg" class="d-block w-100" alt="IMG_NOFOUND">
		</div>
		<div class="carousel-item" data-bs-interval="2000">
		<img src="img/2.jpg" class="d-block w-100" alt="IMG_NOFOUND">
		</div>
		<div class="carousel-item">
		<img src="img/3.jpg" class="d-block w-100" alt="IMG_NOFOUND">
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
	</div>
	<div class="text-center">
	<h1 class="display-2 m-3">CONOCENOS</h1>
	<p class="p-5">Bienvenidos a la presentación del proyecto de gestión y control de libros prestados para la Biblioteca de la Universidad del ITSUR. Esta iniciativa tiene como objetivo principal mejorar la eficiencia y la experiencia de nuestros usuarios al acceder y administrar los recursos bibliográficos disponibles en nuestra institución.</p>
	<h3 class="display-3 m-5">CONTACTANOS</h1>
	<p class="display-6">Juan Daniel Jimenez Lopez</p>
	<p class="text-decoration-underline link-primary">s20120175@alumnos.itsur.edu.mx</p>
	<p class="display-6">Juan Carlos Lopez Leon</p>
	<p class="text-decoration-underline link-primary">s20120201@alumnos.itsur.edu.mx</p>
	</div>
	
	
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>