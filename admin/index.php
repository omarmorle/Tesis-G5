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

    //hacer Select *from tesis;
    $consulta = "SELECT * FROM tesis";
    $resul = mysqli_query($conex, $consulta);
    //Guardar en un array todos los datos de la tabla tesis
    $filas = mysqli_fetch_all($resul, MYSQLI_ASSOC);
    //Cantidad de filas
    $cantidad = mysqli_num_rows($resul);

?>


<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Index</title>
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

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="container py-4">

        <div class="row align-items-md-stretch rounded-3 p-5 mb-4 bg-light">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Administración</h1>
            <p class="col-md-8 fs-4">
            Aqui puedes ver a los ususarios registrados, las tesis que han sido enviadas y las propuestas de tesis que han sido enviadas.
            También puedes aprobar o rechazar las propuestas de tesis.
            </p>
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
                <?php
                    echo $filas[$cantidad-1]["nombre"];
                ?>
            </p>
            <?php
                //Boton que redirecciona a la pagina de la tesis
                echo "<a href='".$filas[$cantidad-1]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
            ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 bg-light border rounded-3">
            <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
            <p>
                <?php
                    echo $filas[$cantidad-2]["nombre"];
                ?>
            </p>
            <?php
                //Boton que redirecciona a la pagina de la tesis
                echo "<a href='".$filas[$cantidad-2]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
            ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
            <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
            <p>
                <?php
                    echo $filas[$cantidad-3]["nombre"];
                ?>
            </p>
            <?php
                //Boton que redirecciona a la pagina de la tesis
                echo "<a href='".$filas[$cantidad-3]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
            ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Ultimas tesis</h2>
            <p>
                Aqui puedes checar las ultimas tesis que se han publicado en la universidad.
            </p>
            <a href="./recientes.php"><button class="btn btn-primary btn-lg btn-block" type="button">Vamos</button></a>
            </div>
        </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            &copy; G5-Corporation S.A. de C.V. <?php echo date("Y"); ?>
        </footer>
        </div>
    </div>
    
    <!--Container Main end-->
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='../js/sidevar.js'></script>
                               
    </body>
</html>