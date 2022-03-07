<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<head>
  <meta charset="UTF-8">
  <title>04MASW | Trabajo 01</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
        <a class="nav-link" href="actorView.php">Actores</a>
        <a class="nav-link" href="../directores/lista.php">Directores</a>
		<a class="nav-link" href="../idiomas/lista.php">Idiomas</a>
		<a class="nav-link" href="../plataforma/lista.php">Plataformas</a>
		<a class="nav-link" href="#">Series</a>
      </div>
    </div>
  </div>
</nav>
<?php
	require_once("../../controllers/actoresControllers.php");
	
	if(isset($_GET['ID'])){
		$idActor = $_GET['ID'];
		
		$actor = listUno($idActor);
		
		//var_dump($actor);
?>
<div class="col-md-4 col-lg-2">
	<div class="row">
		<div class="col-12">
			<h1>Actores</h1>
		</div>
	</div>
	<div class="col-12">
		<form name="crear_actor" action="" method="POST">
			<div class="row g-3">
				<input name="Nombre" type="text" class="form-control" placeholder="Especifique el nombre del actor" value="<?php echo $actor->Nombre?>" required/>
				<input name="Apellidos" type="text" class="form-control" placeholder="Especifique los apellidos del actor" value="<?php echo $actor->Apellidos?>" required/>
				<input name="Fecha" type="text" class="form-control" placeholder="yyyy/mm/dd" value="<?php echo $actor->Fecha?>" required/>
				<input name="Nacionalidad" type="text" class="form-control" placeholder="Especifique nacionalidad" value="<?php echo $actor->Nacionalidad?>" required/>
			</div>
			<br>
			<input type="submit" class="btn btn-success" value="Crear" name="BotonEditar">
		</form>
	</div>
</div>
<?php
	}
	if(isset($_POST['BotonEditar'])){
		$nombre = $_POST['Nombre'];
		$apellidos = $_POST['Apellidos'];
		$fecha = $_POST['Fecha'];
		$nacionalidad = $_POST['Nacionalidad'];
		
		$actorNuevo = editActor($idActor,$nombre, $apellidos, $fecha, $nacionalidad);
		
		if($actorNuevo){
			echo "<a href='actorView.php'>volver</a>";
		}
	}
?>
<footer class="bd-footer text-muted bg-dark">
	<h12>04MASW | Trabajo 01</h12>
	<p>Martín Martorell & Cristian Acuña</p>
</footer>
</body>
</html>

