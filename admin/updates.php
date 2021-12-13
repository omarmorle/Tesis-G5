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
      header("location:./login.php");
    }
  
    $num_boletaoriginal = $_POST['num_boletaoriginal'];
    $num_boleta = $_POST['num_boleta'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $contra = $_POST['contrasena'];

    $consultaupdate = "UPDATE persona SET num_boleta = '$num_boleta', nombre = '$nombre', email = '$email', rol = '$rol', contrasena = '$contra' WHERE num_boleta = '$num_boletaoriginal'";
    $resultadoupdate = mysqli_query($conex, $consultaupdate);
    if($resultadoupdate)
    {
      echo "<script>alert('Se ha actualizado el usuario correctamente');</script>";
      echo "<script>window.location.href='./index.php';</script>";
    }
    else
    {
      echo "<script>alert('No se ha podido actualizar el usuario');</script>";
      echo "<script>window.location.href='./index.php';</script>";
    }



?>