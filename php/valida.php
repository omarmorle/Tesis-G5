<?php

if (isset($_POST['ingresa']))
{
	include("con_db.php");
	if (strlen($_POST['name']) >= 1 && strlen($_POST['contra']) >= 1) {
	    $name = trim($_POST['name']);
	    $contra = trim($_POST['contra']);
		$resul= "SELECT*FROM sesion WHERE user = '$name' and contra = '$contra'";
		$final = mysqli_query($conex,$resul);

		$filas=mysqli_num_rows($final);

		if($filas)
		{
			header("location:mas.php");

		}
		else{
            ?>

            <h3 class="bad">ERROR AUTE</h3> 
            <?php
		}
        
		mysqli_free_result($final);
		mysqli_close($conex);
}
}

