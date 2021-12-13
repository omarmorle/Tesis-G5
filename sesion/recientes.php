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
    }
    else
    {
        header("location:./../login.php");
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
        <title>Recientes</title>
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

    <!--Container Main start-->
    <div class="height-100 bg-light">

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
                <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
                <p>
                    <?php
                        echo $filas[$cantidad-4]["nombre"];
                    ?>
                </p>
                <?php
                    //Boton que redirecciona a la pagina de la tesis
                    echo "<a href='".$filas[$cantidad-4]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
                ?>
                </div>
            </div>

        </div>

        <br>

        <div class="row align-items-md-stretch">

            <div class="col-md-3">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
                <p>
                    <?php
                        echo $filas[$cantidad-5]["nombre"];
                    ?>
                </p>
                <?php
                    //Boton que redirecciona a la pagina de la tesis
                    echo "<a href='".$filas[$cantidad-5]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
                ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="h-100 p-5 bg-light border rounded-3">
                <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
                <p>
                    <?php
                        echo $filas[$cantidad-6]["nombre"];
                    ?>
                </p>
                <?php
                    //Boton que redirecciona a la pagina de la tesis
                    echo "<a href='".$filas[$cantidad-6]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
                ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
                <p>
                    <?php
                        echo $filas[$cantidad-7]["nombre"];
                    ?>
                </p>
                <?php
                    //Boton que redirecciona a la pagina de la tesis
                    echo "<a href='".$filas[$cantidad-7]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
                ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="h-100 p-5 bg-light border rounded-3">
                <img src="../assets/img/tesislogo.jpg" width="200" class="img-rounded">
                <p>
                    <?php
                        echo $filas[$cantidad-8]["nombre"];
                    ?>
                </p>
                <?php
                    //Boton que redirecciona a la pagina de la tesis
                    echo "<a href='".$filas[$cantidad-8]["link"]."' class='btn btn-outline-secondary' type='button'>Léela</a>";
                ?>
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