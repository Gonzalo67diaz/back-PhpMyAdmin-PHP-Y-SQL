<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
</head>
<body>
    <div class="a">
	<h1> Instituto politecnico</h1>
	</div>

		<form class="form-login"   method="POST" action="loginProceso.php">
		<h2>Bien venido director</h2>
			<label>Usuario: </label>
			<input class="controls"  type="text" name="txtUsu">
			<br>
			<label>Password: </label>
			<input class="controls"  type="password" name="txtPass">
			<br>
			<input class="buttons"  type="submit" value="Iniciar sesión">
		</form>
		</div>
		<video muted autoplay loop   src="./fondologin/Fondo.mp4"></video>
	
	
</body>
</html>