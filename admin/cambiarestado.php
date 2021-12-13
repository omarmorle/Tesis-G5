<?php

session_start();
if(isset($_SESSION["user"]))
{
  $user = $_SESSION["user"];
  include("../con_db.php");
  $consulta = "SELECT * FROM admins WHERE user = '$user'";
  $resul = mysqli_query($conex, $consulta);
  $filas = mysqli_fetch_row($resul);
}
else
{
  header("location:./../login.php");
}

//Recibir id y estado por post
$id = $_POST['id'];
$estado = $_POST['estado'];

$consulta = "UPDATE tesis SET estado='$estado' WHERE id = '$id'";
$resul = mysqli_query($conex, $consulta);

//redireccionar a propuestas.php
header("location:./propuestas.php");


?>