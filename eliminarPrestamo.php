<?php
require("datos/classConnectionMySQL.php");
//////////
$id= $_GET['id'];
// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();
// Creamos una nueva conexion
$NewConn->CreateConnection();
///Consulta a la base de datos
$query = "DELETE FROM prestamos1 WHERE idPrestamo = $id";
$result = $NewConn -> ExecuteQuery($query);
$query1 = "select * from prestamos1 where Estado=1";
$result1 = $NewConn -> ExecuteQuery($query1);

if ($result1->num_rows<=0)header("Location: consultarPrestamos.php"); 
else{
    if ($result){
        $RowCount = $NewConn -> GetCountAffectedRows();
        if($RowCount > 0){
            header("Location: recuperarPrestamo.php");
            // header('Location: mostrarusuarios.php');		
        }
    }
    else echo "<h1>No se pudo eliminar el registro</h1>";
}