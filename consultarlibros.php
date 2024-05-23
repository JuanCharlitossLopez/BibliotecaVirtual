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
    <title>Usuarios Doñapelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<style> 
	.navbar {
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 1000;
	}
    
    table {
    position: fixed;
    top: 30%;
    left: 50%;
    width: 10%;
    transform: translate(-50%, -50%);
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

    <table class="table ">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">TITULO</th>
		<th scope="col">AUTOR</th>
        <th scope="col">ISBN</th>
        <th scope="col">GENERO</th>
        <th scope="col">PUBLICACION</th>
		<th scope="col">DISPONIBILIDAD</th>
        <?php
        if($user=="ADMIN"){
            echo"
            <th scope='col'>ELIMINA</th>
			<th scope='col'>ACTUALIZAR</th>";
			
        }
        ?>
        </tr>
    </thead>
    <tbody>
    <?php
			///Consulta a la base de datos
			$query = "select * from Libros";
			$result = $NewConn -> ExecuteQuery($query);
			if($result){
					while($row=$NewConn -> GetRows($result)){
						echo"<tr>
									<td>".$row[0]."</td>
									<td>".$row[1]."</td>
									<td>".$row[2]."</td>
									<td>".$row[3]."</td>
									<td>".$row[4]."</td>
									<td>".$row[6]."</td>
									<td>".$row[7]."</td>
							";

                            if($user=='ADMIN'){echo"<td><a href = 'borrarLibro.php?id=$row[0]'>Eliminar</a></td>
							<td><a href = 'actualizarLibro.php?id=$row[0]'>Actualizar</a></td></tr>";};
					}
					$NewConn -> SetFreeResult($result);
				}else{
					echo "<h1>Error a cnectar a la base de datos o el registro no existe</h1>";
				}
			?>
    </tbody>
    </table>

    
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>