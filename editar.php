<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM alumno WHERE id_alumno = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Editar Alumno</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="dita" ><img id="ci"  src="./edifondo/dita.jpg" alt="">
		
			
		<form  class="ca" method="POST" action="editarProceso.php">
		    <h4>Editar alumno:</h4> 
			<label>Apellido paterno:  </label>
			<input class="in"  type="text" name="txt2Paterno" value="<?php echo $persona->ap_paterno; ?>">
			<br>
			<label>Apellido materno:</label>
			<input class="in"   type="text" name="txt2Materno" value="<?php echo $persona->ap_materno; ?>">
			<br>
			<label>Nombre:</label>
			<input class="in"  type="text" name="txt2Nombre" value="<?php echo $persona->nombre; ?>">
			<br>
			<label>Examen parcial:</label>
			<input class="in"   type="text" name="txt2Parcial" value="<?php echo $persona->ex_parcial; ?>">
			<br>
			<label>Examen parcial:</label>
			<input class="in"  type="text" name="txt2Final" value="<?php echo $persona->ex_final; ?>">
			<br>
			<input class="in" type="hidden" name="oculto">
					<input class="in" type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">

					<input class="buttons" type="submit" value="EDITAR ALUMNO">
					
		</form>
	




		</div>
</body>
</html>