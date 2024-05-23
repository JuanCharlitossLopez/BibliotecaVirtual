<?php
    require("datos/classConnectionMySQL.php");
    $id = $_POST['id'];
    $Titulo = $_POST['Titulo'];
    $Nombre = $_POST['nombre'];
    $FechaPre = $_POST['fechaPre'];
    $FechaDev = $_POST['fechaDev'];
    $NewConn = new ConnectionMySQL();
    $NewConn->CreateConnection();
    echo $query="UPDATE prestamos1 SET nombreLibro = '$Titulo', solicitante = '$Nombre', fechaPrestamo = '$FechaPre', fechaDevolucion='$FechaDev' WHERE idPrestamo = $id";
    $result=$NewConn->ExecuteQuery($query);
    if($result){
        $RowCount =  $NewConn->GetCountAffectedRows();
        if($RowCount > 0){
            echo "Query ejecutado exitosamente<br/>";
            header("Location: consultarPrestamos.php");
             // header('Location: mostrar.php');
        }
    }
    else echo "<h3>Error al ejecutar la consulta</h3>";