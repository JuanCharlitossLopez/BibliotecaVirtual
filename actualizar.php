<?php
//require_once("datos/datos.php");
require("datos/classConnectionMySQL.php");


// $nom = $_POST['nom'];
// // $edad = $_POST['edad'];
// echo "<h1 >El nombre es: ".$nom."   y su edad es: ".$edad."</h1>";
echo $id = $_POST['id'];
$Titulo = $_POST['titulo'];
$Autor = $_POST['autor'];
$ISBN = $_POST['isbn'];
$Genero = $_POST['genero'];
$Sinopsis = $_POST['sinopsis'];
$Publicacion = $_POST['publicacion'];

// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();

///Realiza la insecion de datos a la base de datosx|x|x 
echo $query="UPDATE Libros SET titulo = '$Titulo', autor = '$Autor', isbn = '$ISBN', genero='$Genero', sinopsis ='$Sinopsis', publicacion = '$Publicacion' WHERE ID_Libro = $id";
$result=$NewConn->ExecuteQuery($query);
    if($result){
        $RowCount =  $NewConn->GetCountAffectedRows();
        if($RowCount > 0){
            echo "Query ejecutado exitosamente<br/>";
			header("Location: consultarlibros.php");
			// header('Location: mostrar.php');
        }
    }else{
        echo "<h3>Error al ejecutar la consulta</h3>";
    }
?>