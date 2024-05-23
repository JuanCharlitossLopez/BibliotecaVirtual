<?php
require("datos/classConnectionMySQL.php");
//////////
$id= $_GET['id'];

// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();

///Consulta a la base de datos
$query = "UPDATE prestamos1 SET Estado = '1'
WHERE idPrestamo = $id";
$result = $NewConn -> ExecuteQuery($query);

if ($result){
	$RowCount = $NewConn -> GetCountAffectedRows();
	if($RowCount > 0){
		echo "Prestamo eliminado correctamente";
		header("Location: consultarPrestamos.php");
		// header('Location: mostrarusuarios.php');		
	}
}
else {
	echo "<h1>No se pudo eliminar el registro</h1>";

}
