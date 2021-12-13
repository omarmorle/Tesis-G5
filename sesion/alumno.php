<?php
session_start();
if(isset($_SESSION["email"]))
{
  $email = $_SESSION["email"];
  include("../con_db.php");
  $consulta = "SELECT * FROM persona WHERE email = '$email'";
  $resul = mysqli_query($conex, $consulta);
  $filas = mysqli_fetch_row($resul);
  $rol = $filas[3];
  $boleta = $filas[0];
}
else
{
  header("location:./../login.php");
}

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Mi perfil</title>
<!-- Bootstrap core CSS -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
        <link href='../css/side.css' rel='stylesheet'>

  </head>

  <body oncontextmenu='return false' class='snippet-body'>
    <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="../assets/img/user.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="./index.php" class="nav_logo"> <i class='bx bx-home nav_logo-icon'></i> <span class="nav_logo-name">Inicio</span> </a>
                <div class="nav_list"> 
                    <a href="./subirtesis.php" class="nav_link"> <i class='bx bx-upload'></i> <span class="nav_name">Sube Tesis</span> </a> 
                    <a href="./buscador.php" class="nav_link"> <i class='bx bx-search-alt'></i> <span class="nav_name">Buscar Tesis</span> </a> 
                    <a href="./recientes.php" class="nav_link"> <i class='bx bxs-time'></i> <span class="nav_name">Ultimas Tesis</span> </a>
                    <?php
                    if($rol == "Alumno")
                      echo '<a href="alumno.php" class="nav_link"> <i class="bx bxs-contact"></i> <span class="nav_name">Mi Perfil</span> </a>';
                    else
                      echo '<a href="ProfesorTesis.php" class="nav_link"> <i class="bx bxs-contact"></i> <span class="nav_name">Mis tesis</span> </a>';
                    ?>
                    <a href="./propuestas.php" class="nav_link"> <i class='bx bxs-message-alt-edit'></i> <span class="nav_name">Propuestas</span> </a>    
            </div> <a href="./cerrarSesion.php?nombreSesion=email" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesión</span> </a>
        </nav>
    </div>

    <!-- Begin page content -->

<div class="container">
 <h4 class="mt-5">Mis Avances</h4>
 <hr>

 <!--AQUI VA LA PARTE DE LAS CONSULTAS LO BORRE PERDON <3 TQM-->

 <?php

$aKeyword = explode(" ", $boleta);

$query ="SELECT * FROM tesis WHERE boleta1 like '%".$aKeyword[0]."%' OR boleta2 LIKE '%".$aKeyword[0]."%' OR boleta3 LIKE '%".$aKeyword[0]."%' OR boleta4 LIKE '%".$aKeyword[0]."%'";

for($i = 1; $i < count($aKeyword); $i++) {
  if(!empty($aKeyword[$i])) {
      $query ="SELECT * FROM tesis WHERE boleta1 like '%".$aKeyword[0]."%' OR boleta2 LIKE '%".$aKeyword[0]."%' OR boleta3 LIKE '%".$aKeyword[0]."%' OR boleta4 LIKE '%".$aKeyword[0]."%'";
  }
}

$result = $conex->query($query);


//saber el numero de filas
if($result->num_rows > 0) {
  $row_count=0;
  echo "<br><br>Resultados encontrados: ";
  echo "<br><table class='table table-striped'>";
  ?>
  <tr>
    <td>Versión</td>
    <td>Tipo</td>
    <td>Nombre</td>
    <td>Año</td>
    <td>Director (es)</td>
    <td>Estado</td>
    <td>Descarga</td>
  </tr>
  <?php
  
  While($row = $result->fetch_assoc()) {   
      $row_count++;
      $descarga = $row['link'];   
      ?>
      <tr>
        <td><?php echo $row_count; ?></td>
        <td><?php echo $row['clasificacion']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['anio']; ?></td>
        <td><?php echo $row['profe1']; ?> <br> <?php echo  $row['profe2']; ?></td>
        <td>
            <?php
                if($row['estado'] == NULL)
                echo "No requiere";
                else
                echo $row['estado'];
            ?>
        </td>
        <td><a href="<?php echo $descarga; ?>" target="_blank"><img src='../assets/img/pdfdown.png' width="75px"></a></td>
      </tr>
      <?php
  }
  echo "</table>";

}
else {
  echo "<br>Resultados encontrados: Ninguno";

}

?>



</div><!-- Fin container -->
<br>
<footer class="pt-3 mt-4 text-muted border-top">
            &copy; G5-Corporation S.A. de C.V. <!-- <?php echo date("Y"); ?> -->
</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='../js/sidevar.js'></script>
    </body>
</html>