<!DOCTYPE html>
<html>

<head>
    <meta charset="euc-jp">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Reestablecer</title>




    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="main">

        <link href="css/style_login.css" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />

        <!------ final script validacion ---------->
        <link href="./js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
        <link href="./js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
        <script src="./js/jquery-3.5.1.min.js"></script>
        <script src="./js/plugins/validetta/dist/validetta.min.js"></script>
        <script src="./js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
        <script src="./js/plugins/confirm/dist/jquery-confirm.min.js"></script>

</head>
<!------ RECUPERAR CONTRASEÑA CON CORREO---------->

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-md">
            <a class="navbar-brand" href="#"></a>
        </div>
    </nav>
    <div class="container">
        <center>
            <div class="middle">
                <div id="login">
                    <form id="datosAlumno" method="post" action="envia_recuperacion.php">
                        <fieldset class="clearfix">
                            <h1>
                                <small class="text-light">Recuperar contraseña</small>
                            </h1>


                            <!------ CORREO ---------->
                            <p>
                                <span class="fa fa-user"></span>
                                <input type="text" id="email" name="email"
                                    data-validetta="required,minLength[6],maxLength[99]" placeholder="Correo">
                            </p>
                            <p>
                                <!------ BOTON RECUPERAR CONTRASEÑA ---------->
                            <div>

                                <button style="display: inline-block;" type="submit" value="submit"
                                    class="btn blue">Reestablecer contrasena</button>
                            </div>
                        </fieldset>

                        <!------ FUNCION PARA LIMPIAR RECUADRO---------->
                        <div class="clearfix"></div>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <!------ ESCUDO ESCUELA UT ---------->
                <div class="logo">
                    <div class="clearfix"></div>
                    <img src="assets/img/escudoESCOM.png" height="175px" px>
                </div>

            </div>
        </center>
    </div>

    </div>
</body>

</html>