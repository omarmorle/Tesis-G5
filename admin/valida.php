<?php

if (isset($_POST['ingresa']))
{
	include("../con_db.php");
	if (strlen($_POST['user']) >= 1 && strlen($_POST['contrasena']) >= 1) {
	    $user = trim($_POST['user']);
	    $contrasena = trim($_POST['contrasena']);
		$contrasena = md5($contrasena);
		$resul= "SELECT*FROM admins WHERE user = '$user' and contrasena = '$contrasena'";
		$final = mysqli_query($conex,$resul);

		$filas=mysqli_num_rows($final);

		if($filas)
		{
			session_start();
			$_SESSION["user"] = $user;
			?> 
			<script type="text/javascript">
				window.location.href = "./index.php";
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

