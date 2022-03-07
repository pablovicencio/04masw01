<?php
	require_once("../../controllers/serieControllers.php");
	
	$conexion = cn();
	
	if(isset($_POST['BotonCrear'])){
		$sendData = true;
		
		$titulo = $_POST['Titulo'];
		$plataforma = $_POST['Plataforma'];
		$director = $_POST['Director'];
		
		$serieNueva = nuevaSerie($conexion, $titulo, $plataforma, $director);
		
		if($serieNueva){
			echo "<a href='lista.php'>volver</a>";
		}
	}
	$conexion = cn();
	$directores = listDirector($conexion);
	$conexion = cn();
	$plataformas = listarPlataforma($conexion);
	$conexion = cn();
	$actores = listActor($conexion);
?>

<div class="row">
	<div class"col-12">
		<h1>Series</h1>
	</div>
</div>
<div class="col-12">
	<form name="crear_serie" action="" method="POST">
		<div class="mb-3">
			<input name="Titulo" type="text" placeholder="Especifique el nombre" required/>
				<select name="Plataforma">
					<?php
					foreach ($plataformas as $plataforma) {
					?>
						<option value="<?php echo $plataforma->getid() ?>"><?php echo $plataforma->getnombre() ?></option>
					<?php
					}
					?>
				</select>
				<select name="Director">
					<?php
					foreach ($directores as $director) {
					?>
						<option value="<?php echo $director->getid() ?>"><?php echo $director->getnombre() ?></option>
					<?php
					}
					?>
				</select>
		</div>
		<div>
					<?php
					foreach ($actores as $actor) {
					?>
						<input type="checkbox" value="<?php echo $actor->getid() ?>"/><?php echo $actor->getnombre() ?><br>
					<?php
					}
					?>
		</div>
		<input type="submit" class="btn btn-success" value="Crear" name="BotonCrear">
	</form>
</div>
