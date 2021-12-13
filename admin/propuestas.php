<!--
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

?>
-->

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Propuestas</title>
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
                    <a href="./buscador.php" class="nav_link"> <i class='bx bx-search-alt'></i> <span class="nav_name">Buscar Tesis</span> </a> 
                    <a href="./buscadoruser.php" class="nav_link"> <i class='bx bxs-search'></i> <span class="nav_name">Buscar Usuario</span> </a>  
                    <a href="./recientes.php" class="nav_link"> <i class='bx bxs-time'></i> <span class="nav_name">Ultimas Tesis</span> </a>
                    <a href="./propuestas.php" class="nav_link"> <i class='bx bxs-message-alt-edit'></i> <span class="nav_name">Propuestas</span> </a>    
            </div> <a href="./cerrarSesion.php?nombreSesion=user" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesión</span> </a>
        </nav>
    </div>

    <!-- Begin page content -->

<div class="container">
 <h4 class="mt-5">Propuestas</h4>
 <hr>
 
 <!--AQUI VA LA PARTE DE LAS CONSULTAS LO BORRE PERDON <3 TQM-->

 <?php

$aKeyword = explode(" ", "protocolo");

$query ="SELECT * FROM tesis WHERE clasificacion like '%".$aKeyword[0]."%' ";

for($i = 1; $i < count($aKeyword); $i++) {
  if(!empty($aKeyword[$i])) {
      $query ="SELECT * FROM tesis WHERE clasificacion like '%".$aKeyword[0]."%'";
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
    <td>Identificador</td>
    <td>Nombre</td>
    <td>Alumno(s)</td>
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
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td>
          <?php 
            echo $row['boleta1']; 
            if($row['boleta2'] != 0){
              ?><br><?php

              echo $row['boleta2'];
            }
            if($row['boleta3'] != 0){
              ?><br><?php
              echo $row['boleta3'];
            }
            if($row['boleta4'] != 0){
              ?><br><?php
              echo $row['boleta4'];
            }
          ?></td>
        <td><?php echo $row['profe1']; ?> <br> <?php echo  $row['profe2']; ?></td>
        <td>
            <?php
                if($row['estado'] == NULL)
                  echo "No requiere";
                else
                  echo $row['estado'];

                if($row['estado'] == "En revision")
                {
                  ?>
                    <form action="./cambiarestado.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <select name="estado">
                        <option value="Aceptado">Aceptar</option>
                        <option value="Rechazado">Rechazar</option>
                      <input type="submit" value="Enviar" class="btn btn-primary">
                  <?php
                }
                
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
