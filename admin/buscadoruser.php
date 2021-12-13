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

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Buscador</title>
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
 <h4 class="mt-5">Buscador de usuarios  </h4>
 <hr>

<div class="row">
  <div class="col-12 col-md-12">
<!-- Contenido -->   



<ul class="list-group">
  <li class="list-group-item">
<form method="post">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese palabra clave">  
      <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
    </div>
   
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Buscar Ahora</button>
    </div>
  </div>
</form>
  </li>

</ul>


<?php
 
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);

      //$query ="SELECT * FROM tesis WHERE nombre like '%" . $aKeyword[0] . "%' OR anio like '%" . $aKeyword[0] . "%'";

      $query ="SELECT * FROM persona WHERE nombre like '%".$aKeyword[0]."%' OR num_boleta LIKE '%".$aKeyword[0]."%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query ="SELECT * FROM persona WHERE nombre like '%".$aKeyword[0]."%' OR num_boleta LIKE '%".$aKeyword[0]."%'";
        }
      }
     
     $result = $conex->query($query);
     //$result = mysqli_query($conex,$query);
     echo "<br>Criterio de busqueda:<b> ". $_POST['PalabraClave']."</b>";
     
     //saber el numero de filas
    if($result->num_rows > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
        ?>
        <tr>
          <td>Numero de coincidencias</td>
          <td>Nombre</td>
          <td>Rol</td>
          <td>Número dentificador</td>
          <td>Email</td>
          <td>Opciones</td>
        </tr>
        <?php
        
        While($row = $result->fetch_assoc()) {   
            $row_count++;
            ?>
            <tr>
              <td><?php echo $row_count; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['rol']; ?></td>
              <td><?php echo $row['num_boleta']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td>
              <?php 
                  //boton de borrar
                  echo "<form method='post' action='modifica.php'>";
                  echo "<input type='hidden' name='num_boleta' value='".$row['num_boleta']."'>";
                  //radio button modificar y borrar
                  echo "<input type='radio' name='modificar' value='modificar'>Modificar";
                  echo "<br>";
                  echo "<input type='radio' name='modificar' value='borrar'>"."Borrar";
                  echo "<br>";
                  echo "<button type='submit' class='btn btn-primary'>Modificar</button>";
                  echo "</form>";
              ?>
              </td>
            </tr>
            <?php
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Resultados encontrados: Ninguno";
		
    }
}
 
?>




<!-- Fin Contenido --> 
</div>
</div><!-- Fin row -->
</div><!-- Fin container -->
<br>
<footer class="pt-3 mt-4 text-muted border-top">
            &copy; G5-Corporation S.A. de C.V. <?php echo date("Y"); ?>
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