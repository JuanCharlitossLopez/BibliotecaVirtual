<?php
require("datos/classConnectionMySQL.php");

$Titulo = $_POST['tituloLibro'];
$Autor = $_POST['autor'];
$ISBN = $_POST['isbn'];
$Genero = $_POST['genero'];
$Sinopsis = $_POST['sinopsis'];
$Publicacion = $_POST['publicacion'];

// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();

$query = "INSERT INTO Libros (Titulo,Autor,ISBN,Genero,Sinopsis,Publicacion,Disponibilidad)
VALUES ('$Titulo', '$Autor','$ISBN','$Genero','$Sinopsis','$Publicacion',true)";

if (($result=$NewConn)->ExecuteQuery($query) === TRUE) {
    ?>
    <script>
      alert('Book registered successfully');
      window.location.href = 'agregarlibro.php';
    </script>
    <?php
} else {
  echo "Error: ". $result. "<br>". $NewConn->CloseConnection();
}
// $conn->close();
?>