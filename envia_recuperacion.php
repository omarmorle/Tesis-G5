<?php
    include("con_db.php");
    
    $paracorreo = trim($_POST['email']);
	$resul= "SELECT contrasena FROM persona WHERE email = '$paracorreo'";
	$final = mysqli_query($conex,$resul);

	$filas=mysqli_num_rows($final);
    if($filas==0){
        echo '<script>alert("Correo no registrado");</script>';
        //recargar pagina
        echo '<script>window.location="recuperar.php";</script>';
    }
    else{
        //imprime la contraseña
        $row = mysqli_fetch_array($final);
        $titulo = "Recuperación de contraseña";
        $mensaje = "Su contraseña es: " . $row['contrasena'] . ".";
        $tucorreo = "from: danimontescruz41@gmail.com";
        if(mail($paracorreo, $titulo, $mensaje, $tucorreo)){
            //enviar alerta con javascript
            echo '<script>alert("Se ha enviado la contraseña a su correo");</script>';
            //redireccionar a la pagina de login
            echo '<script>window.location.href="login.php";</script>';

        }
}
?>