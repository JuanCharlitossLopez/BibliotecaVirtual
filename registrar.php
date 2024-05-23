<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "soporte";

require("datos/classConnectionMySQL.php");

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: ". $conn->connect_error);
// }
$username = $_POST['usuario'];
$pass = $_POST['pass'];

// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();



$query = "INSERT INTO usuarios (usuario, pass)
VALUES ('$username', '$pass')";

if (($result=$NewConn)->ExecuteQuery($query) === TRUE) {
    ?>
    <script>
      alert('User registered successfully');
      window.location.href = 'agregarusuario.php';
    </script>
    <?php
} else {
  echo "Error: ". $result. "<br>". $NewConn->error;
}

// $conn->close();
?>