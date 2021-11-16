<?php

if (isset($_POST['ingresa']))
{
	include("con_db.php");
	if (strlen($_POST['email']) >= 1 && strlen($_POST['contrasena']) >= 1) {
	    $email = trim($_POST['email']);
	    $contrasena = trim($_POST['contrasena']);
		$resul= "SELECT*FROM persona WHERE email = '$email' and contrasena = '$contrasena'";
		$final = mysqli_query($conex,$resul);

		$filas=mysqli_num_rows($final);

		if($filas)
		{
			session_start();
			$_SESSION["email"] = $email;
			?> 
			<script type="text/javascript">
				window.location.href = "./sesion/index.php";
			</script>
			<?php
		}
		else{
			//enviar alerta de error con javascript
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
			//redireccionar al login
			?>
			<script type="text/javascript">
				window.location.href = "./login.php";
			</script>
			<?php
		}
        
		mysqli_free_result($final);
		mysqli_close($conex);
}
}

