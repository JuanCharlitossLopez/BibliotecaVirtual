<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
        background-image: url('img/fondologin.jpg');
      } 
      button{
        height: 60px;
        width: 100px;
      }
      .content{
        margin-top: 5%;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40%;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 70vh;
        border-radius: 5px;
        background-color: rgba(211, 211, 211, 0.178);
      }
      #titulo{
        margin-top: 2%;
        font-size: x-large;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
      }
      #pr{
        margin-top: 10px;    
        background-color: rgba(211, 211, 211, 0.178);
        color: black;
        width: 40%;
        border-radius: 5px;
      }
      label,#pr{
        font-weight: bold;
        font-size: x-large;
      }
      select,input{
        text-align: center;
        font-size: 32px;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <?php
      include('menu.php')
    ?>
<body>
  <div id="titulo">
    <label id="pr">Agregar Prestamo</label>
  </div>    
  <div class="content">
    <form id="registerlibro-form" method="POST" action="rPrestamo.php">
      <div class="form-group floating-label">
        <label for=""class="form-label">Nombre del solicitante</label>
        <input class="form-control form-control-lg" type="text" name="nombre" id="nombre" required minlength="10" maxlength="20">
      </div>  
      <div class="form-group floating-label">
        <label for=""class="form-label">Libro</label>
          <?php
            $query ="SELECT Titulo FROM Libros";
            $result = $NewConn -> ExecuteQuery($query);
            if($result){
              echo '<select class="form-control form-control-lg" size="1" name="Titulo">';
              while($row = mysqli_fetch_array($result)){
                $Titulo = $row[0];
                echo "<ul><option id='titulo' name='titulo'>$Titulo</option>";
              }
              echo '</select></ul>';
            }
          ?>
        </div>
      <div class="form-group floating-label">
        <label for=""class="form-label">Fecha prestamo</label>
        <input id="fechaPre" name="fechaPre" class="form-control form-control-lg" type="date" required>
      </div>
      <div class="form-group floating-label">
        <label for=""class="form-label">Devolucion prestamo</label>
        <input id="fechaDev" name="fechaDev" class="form-control form-control-lg" type="date" required>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>