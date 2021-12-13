<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="main">

        <link href="../css/style_login.css" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />

        <link href="../js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
        <link href="../js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../materialize/js/materialize.min.js"></script>
        <script src="../js/plugins/validetta/dist/validetta.min.js"></script>
        <script src="../js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
        <script src="../js/plugins/confirm/dist/jquery-confirm.min.js"></script>


</head>


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
                    <form id="formLogin" autocomplete="off" method="post" action="valida.php">
                        <fieldset class="clearfix">

                            <p>
                                <span class="fa fa-user"></span>
                                <input type="text" id="user" name="user"
                                    data-validetta="required,minLength[6],maxLength[99]" placeholder="Usuario" required>
                            </p>
                            <!-- "Username" -->

                            <p>
                                <span class="fa fa-lock"></span>
                                <input type="password" id="contrasena" name="contrasena"
                                    data-validetta="required,minLength[6],maxLength[16]" placeholder="Contraseña" required>
                            </p>
                            <!--  "Password" -->

                            <div>

                                <span style="width:50%; text-align:right;  display: inline-flexbox;"><input
                                        type="submit" class="btn blue" style="width: 100%;"
                                        value="Iniciar sesión" name="ingresa"></span>
                            </div>
                        </fieldset>

                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div>

                <!-- fin login -->

                <div class="logo">
                    <div class="clearfix"></div>
                    <img src="../assets/img/escudoESCOM.png" height="175px">
                </div>

            </div>
        </center>
    </div>

    </div>


</body>

</html>

</html>