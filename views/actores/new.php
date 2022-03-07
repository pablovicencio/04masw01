<?php
	require_once("../../controllers/actoresControllers.php");
	
	if(isset($_POST['BotonCrear'])){
		$sendData = true;
		
		$nombre = $_POST['Nombre'];
		$apellidos = $_POST['Apellidos'];
		$fecha = $_POST['Fecha'];
		$nacionalidad = $_POST['Nacionalidad'];
		
		$actorNuevo = newActor($nombre, $apellidos, $fecha, $nacionalidad);
		
		if($actorNuevo){
			echo "<a href='actorView.php'>volver</a>";
		}
	}
?>

<div class="row">
	<div class"col-12">
		<h1>Actores</h1>
	</div>
</div>
<div class="col-12">
	<form name="crear_actor" action="" method="POST">
		<div class="mb-3">
			<input name="Nombre" type="text" placeholder="Especifique el nombre del actor" required/>
			<input name="Apellidos" type="text" placeholder="Especifique los apellidos del actor" required/>
			<input name="Fecha" type="date" required/>
			<input name="Nacionalidad" type="text" placeholder="Especifique nacionalidad" required/>
		</div>
		<input type="submit" class="btn btn-success" value="Crear" name="BotonCrear">
	</form>
</div>