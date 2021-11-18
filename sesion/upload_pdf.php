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
$titulo = strtoupper($titulo);
$anio = $_POST['anio'];
$escuela = $_POST['escuela'];
$numeroBoleta1 = $_POST['numeroBoleta1'];
$numeroBoleta2 = $_POST['numeroBoleta2'];
$numeroBoleta3 = $_POST['numeroBoleta3'];
$numeroBoleta4 = $_POST['numeroBoleta4'];
$numeroEmpleado1 = $_POST['numeroEmpleado1'];
$numeroEmpleado2 = $_POST['numeroEmpleado2'];

//get the name of pdf file
$pdf_name = $_FILES['documento']['name'];

//change spaces to underscores
$pdf_name_new = str_replace(' ', '-', $pdf_name);

//print the name of pdf file
echo $pdf_name;

if(isset($_FILES['documento']) && $_FILES['documento']['type']=='application/pdf'){
	move_uploaded_file ($_FILES['documento']['tmp_name'] , '../tesis/'.$_FILES['documento']['name']);
}

//obtener la direccion actual
$url = "http://".$_SERVER['HTTP_HOST']."/niws/tesis/".$pdf_name_new;

//insertar en la tabla tesis
$consulta = "INSERT INTO tesis(nombre, escuela, anio, boleta1, boleta2, boleta3, boleta4, profe1, profe2, link) VALUES ('$titulo', '$escuela', '$anio', '$numeroBoleta1', '$numeroBoleta2', '$numeroBoleta3', '$numeroBoleta4', '$numeroEmpleado1', '$numeroEmpleado2', '$url')";
$resultado = mysqli_query($conex,$consulta);
if ($resultado) {
    ?> 
    <script type="text/javascript">
        window.location.href = "./index.php";
    </script>
    <?php
    //renombrar el archivo subido
    rename('../tesis/'.$pdf_name, '../tesis/'.$pdf_name_new);
} else {
    ?> 
    echo'<script languaje="javascript">alert("Mori");</script>';
    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
    <?php
}

//mandar alerta de que se subio correctamente la teesis con el titulo $titulo
echo "<script>alert('Se subio correctamente la tesis con el nombre $pdf_name');</script>";

//redireccionar a la pagina de inicio
echo '<script>window.location.href="./index.php";</script>';

?>