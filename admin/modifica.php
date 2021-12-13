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

    //Recibir por post modificar y num_boleta
    $modificar = $_POST['modificar'];
    $num_boleta = $_POST['num_boleta'];

    if($modificar == "borrar"){
        $consultinha = "DELETE FROM persona WHERE num_boleta = '$num_boleta'";
        $resultado = mysqli_query($conex, $consultinha);
        if($resultado){
            //redireccionar a buscadoruser.php
            header("location:./buscadoruser.php");
        }
        else{
            echo "alert('Error al borrar');";
        }
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
<title>Modifica</title>
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
 <h4 class="mt-5">Modifica usuario</h4>
 <hr>

<div class="row">
  <div class="col-12 col-md-12">
<!-- Contenido -->   

    <form action="updates.php" method="post">
        <input type="hidden" name="num_boletaoriginal" value="<?php echo $num_boleta; ?>">
        <div class="form-group">
            <label for="num_boleta">Numero identificador</label>
            <input type="text" class="form-control" id="num_boleta" name="num_boleta" placeholder="Numero identificador" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Apellido paterno Apellido Materno Nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="text" class="form-control" id="rol" name="rol" placeholder="Rol" required>
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contrasena" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>

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