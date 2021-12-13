<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign in</title>

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

        <link href="css/style_login.css" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />

        <link href="./js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
        <link href="./js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
        <script src="./js/jquery-3.5.1.min.js"></script>
        <script src="./materialize/js/materialize.min.js"></script>
        <script src="./js/plugins/validetta/dist/validetta.min.js"></script>
        <script src="./js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
        <script src="./js/plugins/confirm/dist/jquery-confirm.min.js"></script>

</head>


<body>

    <div class="container">

        <div id="elcontenedor">
            <form id="formLogin" autocomplete="off" method="post" action="inserta.php" onsubmit="return validate()">
                <fieldset class="clearfix">
            
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <p>
                            <span class="fa fa-user"></span>
                            <input type="text" id="nombre" name="nombre" data-validetta="required,minLength[6],maxLength[99]" placeholder="Ap Paterno, Materno, Nombre" required>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            <span class="fa fa-envelope"></span>
                            <input type="text" id="email" name="email" data-validetta="required,minLength[6],maxLength[99]" placeholder="Correo" required>
                        </p>
                    </div>
                    <div class="col"></div>
                    </div>
            
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <p>
                                <span class="fa fa-lock"></span>
                                <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6],maxLength[16]" placeholder="Contraseña" required>
                            </p>
                        </div>
                        <div class="col">
                            <p>
                                <span class="fa fa-check"></span>
                                <input type="password" id="confcontrasena" name="confcontrasena" data-validetta="required,minLength[6],maxLength[19]" placeholder="Confirmar Contraseña" required>
                            </p>
                        </div>
                        <div class="col"></div>
                    </div>
            
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <p>
                                <select class="form-control form-control-lg" name="selector" required>
                                    <option disabled selected>Elige una opcion</option>
                                    <option>Alumno</option>
                                    <option>Trabajador</option>
                                </select>
                            </p>
                        </div>
                        <div class="col">
                            <p>
                                <span class="fa fa-graduation-cap"></span>
                                <input type="text" id="numerobol" name="numerobol" data-validetta="required,minLength[6],maxLength[19]" placeholder="Boleta/Num. Empleado" required>
                            </p>
                        </div>
                        <div class="col"></div>
                    </div>
            
                    <div class="row">
                        <div class="col"></div>
                         <div class="col-2">
                                <input type="submit" name="register" class="register" value="Registrar">
                            </div>
                        <div class="col"></div>
                    </div>

                </fieldset>
            <div class="clearfix"></div>
        </form>
        <div class="clearfix"></div>

    </div>

    <script>
        
        function validate() {
            if(validateEmail() == true && validatePassword() == true ){
                return true;
            }
            else{
                return false;
            }
        }
        //function to validate that contrasena and confcontrasena are the same
        function validatePassword() {
            var password = document.getElementById("contrasena").value;
            var confirmPassword = document.getElementById("confcontrasena").value;
            if (password != confirmPassword) {
                alert("Las contraseñas no coinciden");
                return false;
            }
            return true;
        }

        //function to validate email
        function validateEmail() {
            var email = document.getElementById("email").value;
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(String(email).toLowerCase())) {
                alert("Correo invalido");
                    return false;
            }
            return true;
        }
    </script>
    
</body>

</html>