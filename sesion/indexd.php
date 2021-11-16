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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Inicio</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>

    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="jquery/jquery.js"></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/style.css" />
    <link href="css/bootstrap.css" rel="stylesheet">  
    <link href="css/side.css" rel="stylesheet">

    
</head>

<body id="body-pd">
    
<main>
  
  <div class="container py-4">

    <div class="row align-items-md-stretch rounded-3 p-5 mb-4 bg-light">
      <div class="col-md-6">
        <h1 class="display-5 fw-bold">Repositorio de tesis</h1>
        <p class="col-md-8 fs-4">
          En este repositorio podrás encontrar todas las tesis que se han publicado en la universidad.
          Este proyecto está enfocado a la búsqueda de tesis de la carrera de Ingeniería en Sistemas Computacionales.
        </p>
        <button class="btn btn-primary btn-lg btn-block" type="button">Sube tu tesis</button>
      </div>
      <div class="col-md-6"> 
        <img src="../assets/img/img.png" width="500" class="img-rounded">
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-3">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
          <p>
            Titulo de tesis 1.
          </p>
          <button class="btn btn-outline-light" type="button">Léela</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="h-100 p-5 bg-light border rounded-3">
          <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
          <p>
            Titulo de tesis 2.
          </p>
          <button class="btn btn-outline-secondary" type="button">Léela</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
          <p>
            Titulo de tesis 3.
          </p>
          <button class="btn btn-outline-light" type="button">Léela</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Ultimas tesis</h2>
          <p>
            Aqui puedes checar las ultimas tesis que se han publicado en la universidad.
          </p>
          <button class="btn btn-primary btn-lg btn-block" type="button">Vamos</button>
        </div>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</main>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
                integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
    <!--Ionic-->
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <script type="text/javascript" src="js/sidevar.js"> </script>
    
  </body>
</html>
