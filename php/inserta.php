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
		if (strcmp ($selector , "Alumno" ) == 0) 
			$consulta = "INSERT INTO alumno(nombre, email, contrasena, num_boleta) VALUES ('$nombre','$email','$contrasena','$numerobol')";
		else
			$consulta = "INSERT INTO trabajador(nombre, email, contrasena, num_boleta) VALUES ('$nombre','$email','$contrasena','$numerobol')";
	    
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
			alert("SI");
	    	<h3 class="ok">¡Registro creado correctamente!</h3>
           <?php
	    } else {
	    	?> 
			echo'<script languaje="javascript">alert("Mori");</script>';
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
		   mysqli_close($conex);
    }
}


?>