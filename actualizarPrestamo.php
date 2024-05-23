<!doctype html>
 <html>
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <meta charset="utf-8"/>   
      <title>Modificar Prestamo Doñapelos</title>
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
   </head>
    <?php
      include('menu.php')
    ?>
   <body>
   <div id="titulo">
    <label id="pr">Modificar Prestamo</label>
  </div>    
  <div class="content">
    <form id="actualizarlibro-form" method="POST" action="actualizarP.php">      
      <?php
        $id= $_GET['id'];
        $query1 = "select nombreLibro, solicitante, fechaPrestamo, fechaDevolucion from prestamos1 WHERE idPrestamo = $id";
        $result1 = $NewConn -> ExecuteQuery($query1);
        $query ='select Titulo from Libros';
        $result = $NewConn -> ExecuteQuery($query);
        if($result1){
          while($row1=$NewConn -> GetRows($result1)){
            echo "
            <div class='form-group floating-label'>
              <label for=''class='form-label'>Nombre del solicitante</label>
              <input class='form-control form-control-lg' type='text' name='nombre' id='nombre' value='$row1[1]' required minlength='10' maxlength='20'>
            </div>  
            ";
            $r=$row1[0];
            $r1=$row1[2];
            $r2=$row1[3];
          }
          $NewConn -> SetFreeResult($result1);
        }
        if($result){
          echo "
          <div class='form-group floating-label'>
              <label for=''class='form-label'>Libro</label>
              <select class='form-control form-control-lg' size='1' name='Titulo' id='Titulo'>";
              echo "<ul><option id='titulo' name='titulo'>$r</option>";
              while($row = mysqli_fetch_array($result)){
                if($row[0]!=$r){
                  $Titulo = $row[0];
                  echo "<ul><option id='titulo' name='titulo'>$Titulo</option>";
                }
              }
          echo '</select></ul></label></div>';
          echo "
            <div class='form-group floating-label'>
              <label for=''class='form-label'>Fecha prestamo</label>
              <input id='fechaPre' name='fechaPre' class='form-control form-control-lg' type='date' value='$r1' required>
            </div>
            <div class='form-group floating-label'>
              <label for=''class='form-label'>Devolucion prestamo</label>
              <input id='fechaDev' name='fechaDev' class='form-control form-control-lg' type='date' value='$r2'required>
            </div>
          ";
          $NewConn -> SetFreeResult($result);
        }
        echo "
          <input for=''class='form-label' id='id' name='id' value=".$id." hidden></input>
        ";
        ?>
        <br>
      <button type="submit" class="btn btn-primary">modificar</button>
    </form>
  </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>