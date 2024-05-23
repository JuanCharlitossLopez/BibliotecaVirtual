<?php
    require("datos/classConnectionMySQL.php");
    //////////
    echo $_GET['id'];
    $id= $_GET['id'];
    // Creamos una nueva instancia
    $NewConn = new ConnectionMySQL();
    // Creamos una nueva conexion
    $NewConn->CreateConnection();
    ///Consulta a la base de datos
    $query = "UPDATE prestamos1 SET Estado = '0'
    WHERE idPrestamo = $id";
    $result = $NewConn -> ExecuteQuery($query);
    if ($result){
        $RowCount = $NewConn -> GetCountAffectedRows();
        if($RowCount > 0){
            header("Location: consultarPrestamos.php");
            // header('Location: mostrarusuarios.php');		
        }
    }
    else echo "<h1>No se pudo eliminar el registro</h1>";
