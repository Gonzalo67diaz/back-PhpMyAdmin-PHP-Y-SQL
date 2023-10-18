<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumno;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de alumnos</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
</head>
<body>
    <div class="campus" >
    <img src="./iniciofondo/campus.webp" alt="">
    </div>

<div class="to">

    <div class="flex" >
    <div id="logo"></div>   
    </div> 

	<div class="dire" >	<h3>Director <?php echo $_SESSION['nombre'] ?></h1></div>

	<div class="menu" >
	<a href="cerrar.php">Cerrar Sesión</a>
	</div> 

</div>
		
		
<div class="displa" >
	<div class="tablass"  >
		<table class="tabla" bgcolor="black" >
		
			<tr class="ti" bgcolor="grey">
			
				<td>Código</td>
				<td>Apellido paterno</td>
				<td>Apellido materno</td>
				<td>Nombre</td>
				<td>Parcial</td>
				<td>Final</td>
				<td>Promedio</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr class="ti" bgcolor="#eed1d1 " >
						<td ><?php echo $dato->id_alumno; ?></td>
						<td><?php echo $dato->ap_paterno; ?></td>
						<td><?php echo $dato->ap_materno; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->ex_parcial; ?></td>
						<td><?php echo $dato->ex_final; ?></td>
						<td><?php echo ($dato->ex_final + $dato->ex_parcial)/2; ?></td>
						<td ><a class="enla" href="editar.php?id=<?php echo $dato->id_alumno; ?>">Editar</a></td>
						<td><a class="enlase" href="eliminar.php?id=<?php echo $dato->id_alumno; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>d </table>

	</div>


		<!-- inicio insert -->
		

		<form class="caj" method="POST" action="insertar.php">
		<label  id="hola">Ingresar alumnos:</label>
			<table class="caja"  >
				<tr>
					<td>Apellido paterno: </td>
					<td><input class="inpu" type="text" name="txtPaterno"></td>
				</tr>
				<tr>
					<td>Apellido materno: </td>
					<td><input class="inpu"   type="text" name="txtMaterno"></td>
				</tr>
				<tr>
					<td>Nombre: </td>
					<td><input class="inpu"  type="text" name="txtNombre"></td>
				</tr>
				<tr>
					<td>Nota parcial: </td>
					<td><input class="inpu"   type="text" name="txtParcial"></td>
				</tr>
				<tr>
					<td>Nota final: </td>
					<td><input class="inpu" type="text" name="txtFinal"></td>
				</tr>
				<input class="inpu"  type="hidden" name="oculto" value="1">
				<tr>
					<td><input class="inpu"   type="reset" name=""></td>
					<td><input class="inpu"   type="submit" value="INGRESAR ALUMNO"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->
</div>
	
</body>
</html>