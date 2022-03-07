<?php
	require_once("../../controllers/actoresControllers.php");
	$idActor = $_POST["actorid"];
	$actorDelete = borrarActor($idActor);
	
	if($actorDelete){
	?>
		<div class="row">
			<div class="alert alert-success" role="alert">
				Actor borrado correctamente,<a href="actorView.php"> regresar al listado de actores</a>
			</div>
		</div>
	<?php	
	}else{
		?>
		<div class="row">
			<div class="alert alert-success" role="alert">
				Actor no se a borrado correctamente,<a href="actorView.php"> volver a intentarlo</a>
			</div>
		</div>
		<?php
	}
?>