<!doctype html>
 <html>
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <meta charset="utf-8"/>   
      <title>Agregar Libro Doñapelos</title>
      <style>
        #padre{
          margin: 15px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -48%);
          background-color: rgba(211, 211, 211, 0.178);
          text-align: center;
          border-radius: 5px;
          padding:20px;
        }
        body {
          background-image: url('img/fondologin.jpg');
          background-size: cover;
          background-position: center;
          height: 50vh;
          margin: 0;
          background-attachment: fixed;
        }
        #titulo{
          height: 50px;
          background-color:lightblue;
          border-radius: 15px;
        }
        input{
          text-align: center;
        }
        label{
          font-size: 20px;
          font-weight: bold;
        }
      </style>
      <?php
        include('menu.php')
      ?>
   </head>
  <body>
    <div id="padre">
      <div id="titulo">
        <h2>Agregar Nuevo Libro</h2>
      </div>
      <br>
      <form id="registerlibro-form" method="POST" action="rlibro.php">
        <div class="mb-3">
          <label for="" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="tituloLibro" name="tituloLibro" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Genero</label>
            <input type="text" class="form-control" id="genero" name="genero" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Sinopsis</label>
            <input type="text" class="form-control" id="sinopsis" name="sinopsis" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Año Publicacion</label>
            <input type="text" class="form-control" id="publicacion" name="publicacion" required>
          </div>
          <button type="submit" class="btn btn-primary">Registrar Libro</button>
        </div>  
      </form>  
    </body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </html>