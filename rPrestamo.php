<?php
  require("datos/classConnectionMySQL.php");
  $Solicitante = $_POST['nombre'];
  $Titulo = $_POST['Titulo'];
  $FechaPre = $_POST['fechaPre'];
  $FechaDev = $_POST['fechaDev'];

  // Creamos una nueva instancia
  $NewConn = new ConnectionMySQL();

  // Creamos una nueva conexion
  $NewConn->CreateConnection();

  $query = "INSERT INTO prestamos1 (nombreLibro, solicitante, fechaPrestamo, fechaDevolucion)
  VALUES ('$Titulo', '$Solicitante','$FechaPre','$FechaDev')";

  if (($result=$NewConn)->ExecuteQuery($query) === TRUE) {
      ?>
      <script>
        alert('Register success');
        window.location.href = 'consultarPrestamos.php';
      </script>
      <?php
  } else {
    echo "Error: ". $result. "<br>". $NewConn->CloseConnection();
  }
  // $conn->close();
?>