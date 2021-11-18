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

?>

<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Subir</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
        <link href='../css/side.css' rel='stylesheet'>
        <link rel="stylesheet" href="../css/upload.css">
 
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
                    <a href="#" class="nav_link"> <i class='bx bxs-book'></i> <span class="nav_name">Ve tus Tesis</span> </a> 
                    <a href="#" class="nav_link"> <i class='bx bxs-time'></i> <span class="nav_name">Ultimas Tesis</span> </a> 
            </div> <a href="./cerrarSesion.php?nombreSesion=email" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesión</span> </a>
        </nav>
    </div>

    <!--Container Main start-->
    <section>
        <form action="upload_pdf.php" method="POST" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label"><b>Llena todos los campos necesarios de acuerdo a tu tesis. 
                                                En caso de solo necesitar los mínimos, dejar en blanco el resto</b></label>
                  <br><br>
                  <label class="control-label">Titulo de tesis</label>
                  <input type="text" class="form-control" name="titulo" placeholder="Titulo de tesis" required>
                  <label class="control-label">Escuela de procedencia</label>
                  <input type="text" class="form-control" name="escuela" placeholder="Escuela de procedencia" required>
                  <label class="control-label">Numero de boleta 1</label>
                  <input type="text" class="form-control" name="numeroBoleta1" placeholder="Ingresa tu numero de boleta" required>
                  <label class="control-label">Numero de boleta 2</label>
                  <input type="text" class="form-control" name="numeroBoleta2" placeholder="Ingresa tu numero de boleta" >
                  <label class="control-label">Numero de boleta 3</label>
                  <input type="text" class="form-control" name="numeroBoleta3" placeholder="Ingresa tu numero de boleta" >
                  <label class="control-label">Numero de boleta 4</label>
                  <input type="text" class="form-control" name="numeroBoleta4" placeholder="Ingresa tu numero de boleta" >
                  <label class="control-label">Numero de empleado del director 1</label>
                  <input type="text" class="form-control" name="numeroEmpleado1" placeholder="Ingresa tu numero de empleado" required>
                  <label class="control-label">Numero de empleado del director 2</label>
                  <input type="text" class="form-control" name="numeroEmpleado2" placeholder="Ingresa tu numero de empleado" >
                  <br>
                  <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Vista Previa</b></div>
                  <div class="box-tools pull-right">
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="glyphicon glyphicon-download-alt"></i>
                <p>Elige o arrastra tu tesis dentro del recuadro (Archivo PDF).</p>
              </div>
              <input type="file" name="documento" class="dropzone">
            </div>
          </div>
        </div>
      </div>
       
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Subir</button>
              </div>
            </div>
          </div>
        </form>
      </section>
      <footer class="pt-3 mt-4 text-muted border-top">
            &copy; G5-Corporation S.A. de C.V. <?php echo date("Y"); ?>
</footer>
    
    <!--Container Main end-->
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='../js/sidevar.js'></script>
        <script type='text/javascript' src='../js/upload.js'></script>
                               
    </body>
</html>