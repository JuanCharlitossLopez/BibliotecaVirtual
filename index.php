<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doñapelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       #titulo{
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: rgba(211, 211, 211, 0.178);
        padding: 20px;
        border-radius: 5px;
      }
        #register-form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: rgba(211, 211, 211, 0.5);
        padding: 20px;
        border-radius: 5px;
        }
        body {
        background-image: url('img/fondologin.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        background-attachment: fixed;
      }
    </style>
</head>
<body>
    <div id="titulo">
      <h1>Biblioteca Doñapelos</h1>
    </div>
    <form id="register-form" method="POST" action="validarUsuario.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" id="usuario" name="usuario" required> 
          <div id="username"  class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <!-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <!-- <button  class="btn btn-warning">Registrar</button> -->
      </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>