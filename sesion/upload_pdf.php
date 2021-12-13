<?php

  session_start();
  if(isset($_SESSION["email"]))
  {
    $email = $_SESSION["email"];
    include("../con_db.php");
    $consulta = "SELECT * FROM persona WHERE email = '$email'";
    $resul = mysqli_query($conex, $consulta);
    $filas = mysqli_fetch_row($resul);
  }
  else
  {
    header("location:./../login.php");
  }


//recibir parametros del formulario de subir tesis y guardarlos en variables
$titulo = $_POST['titulo'];
$anio = $_POST['anio'];
$escuela = $_POST['escuela'];
$anio = $_POST['anio'];
$fecha = $_POST['fecha'];
$numeroBoleta1 = $_POST['numeroBoleta1'];
$numeroBoleta2 = $_POST['numeroBoleta2'];
$numeroBoleta3 = $_POST['numeroBoleta3'];
$numeroBoleta4 = $_POST['numeroBoleta4'];
$prof1 = $_POST['prof1'];
$prof2 = $_POST['prof2'];
$cita = $_POST['cita'];
$clasificacion = $_POST['clasificacion'];

//checar la clasificacion
if($clasificacion == "protocolo")
{
  $estado = "En revision";
}
else
{
  $estado = NULL;
}

$uno = 1;

//Pasar a mayusculas los nombres de los profesores y el titulo de la tesis
$prof1 = strtoupper($prof1);
$prof2 = strtoupper($prof2);
$titulo = strtoupper($titulo);

//get the name of pdf file
$pdf_name = $_FILES['documento']['name'];

//change spaces to underscores
$pdf_name_new = str_replace(' ', '-', $pdf_name);

/* 
print the name of pdf file
echo $pdf_name;
echo "<br>";
echo $clasificacion;
*/

if(isset($_FILES['documento']) && $_FILES['documento']['type']=='application/pdf'){
	move_uploaded_file ($_FILES['documento']['tmp_name'] , '../tesis/'.$_FILES['documento']['name']);
}

//obtener la direccion actual
$url = "http://".$_SERVER['HTTP_HOST']."/niws/tesis/".$pdf_name_new;
//$url = "http://20.124.194.182/niws/tesis/".$pdf_name_new;

//insertar en la tabla tesis
$consulta = "INSERT INTO tesis(nombre, escuela, anio, fecha, boleta1, boleta2, boleta3, boleta4, profe1, profe2, cita, clasificacion, estado, link) VALUES ('$titulo', '$escuela', '$anio', '$fecha', '$numeroBoleta1', '$numeroBoleta2', '$numeroBoleta3', '$numeroBoleta4', '$prof1', '$prof2', '$cita', '$clasificacion', '$estado', '$url')";
$resultado = mysqli_query($conex,$consulta);
if ($resultado) {
    //renombrar el archivo subido
    rename('../tesis/'.$pdf_name, '../tesis/'.$pdf_name_new);
} else {
    ?> 
    echo'<script languaje="javascript">alert("Mori");</script>';
    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
    <?php
}

//Consultar si existe el profesor en la tabla profestesis
$consulta = "SELECT * FROM profestesis WHERE nombre = '$prof1'";
$resul = mysqli_query($conex, $consulta);
$filas = mysqli_fetch_row($resul);
//si no existe, insertarlo
if ($filas == 0) {
    $consulta = "INSERT INTO profestesis(nombre, numtesis) VALUES ('$prof1', '$uno')";
    $resultado = mysqli_query($conex,$consulta);
}
else if($filas != 0) {
    //si existe, actualizar el numero de tesis
    $consulta = "UPDATE profestesis SET numtesis = numtesis + 1 WHERE nombre = '$prof1'";
    $resultado = mysqli_query($conex,$consulta);
}

//Consultar si la variable prof2 no esta vacia
if ($prof2 != "") {
    //Consultar si existe el profesor en la tabla profestesis
    $consulta = "SELECT * FROM profestesis WHERE nombre = '$prof2'";
    $resul = mysqli_query($conex, $consulta);
    $filas = mysqli_fetch_row($resul);
    //si no existe, insertarlo
    if ($filas == 0) {
        $consulta = "INSERT INTO profestesis(nombre, numtesis) VALUES ('$prof2', '$uno')";
        $resultado = mysqli_query($conex,$consulta);
    }
    else if($filas != 0) {
        //si existe, actualizar el numero de tesis
        $consulta = "UPDATE profestesis SET numtesis = numtesis + 1 WHERE nombre = '$prof2'";
        $resultado = mysqli_query($conex,$consulta);
    }
}

//mandar alerta de que se subio correctamente la teesis con el titulo $titulo
echo "<script>alert('Se subio correctamente la tesis con el nombre $pdf_name');</script>";

//Consultar el id de la tesis que se acaba de subir
$consulta = "SELECT * FROM tesis WHERE nombre = '$titulo' AND boleta1 = '$numeroBoleta1'";
$resul = mysqli_query($conex, $consulta);
$filas = mysqli_fetch_row($resul);
$id = $filas[0];

//Enviar variable via post
echo '<script>window.location.href="./pdf.php?id='.$id.'";</script>';

?>