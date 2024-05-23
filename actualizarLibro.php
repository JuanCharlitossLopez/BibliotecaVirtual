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
      <title>Agregar Libro Doñapelos</title>
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
        #actlibro-form {
        position: absolute;
        top: 60%;
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
			<a class="nav-link" href="#">Prestamos</a>
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
      <h1>Actualizar Libro</h1>
    </div>
    
    <form id="actlibro-form" method="POST" action="actualizar.php">
        <?php
        // require("datos/classConnectionMySQL.php");

        // Creamos una nueva instancia
        $NewConn = new ConnectionMySQL();

        // Creamos una nueva conexion
        $NewConn->CreateConnection();
        /////////
        $id= $_GET['id'];
        
        ///Consulta a la base de datos
        $query = "select * from Libros WHERE ID_Libro = $id";
        $result = $NewConn -> ExecuteQuery($query);
        if($result){
                while($row=$NewConn -> GetRows($result)){
                    echo "
                    <div class='mb-3'>
                      <label class='form-label'>Titulo</label>
                      <input type='text' class='form-control' id='titulo' name='titulo' value=".$row[1]." >
                    </div>
                    <div class='mb-3'>
                      <label class='form-label'>Autor</label>
                      <input type='text' class='form-control' id='autor' name='autor' value=".$row[2]." >
                    </div>
                    <div class='mb-3'>
                      <label  class='form-label'>ISBN</label>
                      <input type='text' class='form-control' id='isbn' name='isbn' value=".$row[3].">
                    </div>
                    <div class='mb-3'>
                      <label  class='form-label'>Genero</label>
                      <input type='text' class='form-control' id='genero' name='genero' value=".$row[4].">
                    </div>
                    <div class='mb-3'>
                      <label  class='form-label'>Sinopsis</label>
                      <input type='text' class='form-control' id='sinopsis' name='sinopsis' value=".$row[5].">
                    </div>
                    <div class='mb-3'>
                      <label  class='form-label'>Año Publicacion</label>
                      <input type='text' class='form-control' id='publicacion' name='publicacion' value=".$row[6]." >
                    </div>
                    <input name='id' value='$row[0]'></input><br>
                    ";
                }
                $NewConn -> SetFreeResult($result);
            }
        else{
			echo "<h1>Error a cnectar a la base de datos o el registro no existe</h1>";
		}
        ?>
        <button type="submit" class="btn btn-primary">Actualizar Libro</button>
        <!-- <button  class="btn btn-warning">Registrar</button> -->
      </form>

    
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>