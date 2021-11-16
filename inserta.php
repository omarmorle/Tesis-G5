<?php 

if (isset($_POST['register'])) {
	include("con_db.php");
    if (strlen($_POST['nombre']) >= 1 
			&& strlen($_POST['email']) >= 1
			&& strlen($_POST['contrasena']) >= 1
			&& strlen($_POST['selector']) >= 1
			&& strlen($_POST['numerobol']) >= 1) 
	{
	    $nombre = trim($_POST['nombre']);
	    $email = trim($_POST['email']);
		$contrasena = trim($_POST['contrasena']);
	    $selector = trim($_POST['selector']);
		$numerobol = trim($_POST['numerobol']);
		$consulta = "INSERT INTO persona(nombre, email, contrasena, num_boleta, rol) VALUES ('$nombre','$email','$contrasena','$numerobol', '$selector')";
	    
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
			<script type="text/javascript">
				window.location.href = "login.php";
			</script>
           <?php
	    } else {
	    	?> 
			echo'<script languaje="javascript">alert("Mori");</script>';
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }
}


?>