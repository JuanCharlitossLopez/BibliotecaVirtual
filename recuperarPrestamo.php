<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
    <style>
		td{
			text-align: center;
		}
		tr{
			text-align: center;
		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include('menu.php')
    ?>
</body>
<table class="table">
    <thead>
        <tr>
			<th scope="col">IDPRESTAMO</th>
			<th scope="col">LIBRO</th>
			<th scope="col">SOLICITANTE</th>
			<th scope="col">FECHA PRESTAMO</th>
			<th scope="col">FECHA DEVOLUCION</th>
			<th scope="col">RESTAURAR</th>
			<?php
				if($user=='ADMIN')
				echo 
			'<th scope="col">ELIMINAR</th>';
			?>		
		</tr>
	</thead>
	<tbody>
		<?php
			///Consulta a la base de datos
			$query = "select * from prestamos1 where Estado=1";
			$result = $NewConn -> ExecuteQuery($query);
			if($result){
				while($row=$NewConn -> GetRows($result)){
					echo"<tr>
					<td>".$row[0]."</td>
					<td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td><a href='restaurar.php?id=$row[0]'>Activar</a></td>
					";
					if($user=='ADMIN')
					echo"
						<td>
							<a href = 'eliminarPrestamo.php?id=$row[0]'>Eliminar</a>
						</td>
						";
					};
				$NewConn -> SetFreeResult($result);
			}
			else echo "<h1>Error a cnectar a la base de datos o el registro no existe</h1>";
		?>
		<?php
		
		?>
	</tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>