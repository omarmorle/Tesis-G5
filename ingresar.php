<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <form method="post">
    <div class="ro">
</br>
			<h4>Página Principal</h4>
            <h3><a HREF="index.php" style="color:black;">Pagina principal</a></h3>		</div>
		<section class="form-login">
    		<h5>Ingrese al sistema</h5>
    		<input type="text" class="controls" name="name" placeholder="Nombre completo">
    		<input type="password" class="controls" name="contra" placeholder="Password">
    		<input type="submit" class="button" name="ingresa">
    </form>
        <?php 
        include("valida.php");
        ?>
		<section>
</body>
</html>