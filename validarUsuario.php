<?php
session_start();

require("datos/classConnectionMySQL.php");

$user = $_POST['usuario'];
$pass = $_POST['pass'];

"<h1 >El usuario es: ".$user."y su password es: ".$pass."</h1>";


// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();

///Realiza la insecion de datos a la base de datos
$query="SELECT * FROM usuarios WHERE usuario='$user' AND pass='$pass'";
$result=$NewConn->ExecuteQuery($query);
    if($result){
        $RowCount =  $NewConn->GetCountAffectedRows();
        if($RowCount > 0){
            // echo "Query ejecutado exitosamente<br/>";
			header("Location: inicio.php");
			$_SESSION['user'] = $user;
        }else{
         echo "<h3>El usuario o la contraseña son incorrectos</h3>";
			header("Location: index.php");
        }
    }
?>