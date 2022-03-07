<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<head>
  <meta charset="UTF-8">
  <title>04MASW | Trabajo 01 | Lista de Directores</title>
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
        <a class="nav-link active" aria-current="page" href="/04MASW01/index.php">Home</a>
        <a class="nav-link" href="../actores/actorView.php">Actores</a>
        <a class="nav-link" href="lista.php">Directores</a>
		<a class="nav-link" href="#">Idiomas</a>
		<a class="nav-link" href="#">Plataformas</a>
		<a class="nav-link" href="#">Series</a>
      </div>
    </div>
  </div>
</nav>
<?php
	require_once("../../controllers/directoresControllers.php");
	
	if(isset($_POST['BotonCrear'])){
		$sendData = true;
		
		$nombre = $_POST['Nombre'];
		$apellidos = $_POST['Apellidos'];
		$fecha = $_POST['Fecha'];
		$nacionalidad = $_POST['Nacionalidad'];
		
		$directorNuevo = newdirector($nombre, $apellidos, $fecha, $nacionalidad);
		
		if($directorNuevo){
			echo "<a href='lista.php'>volver</a>";
		}
	}
?>

<div class="row">
	<div class"col-12">
		<h1>Directores</h1>
	</div>
</div>
<div class="col-12">
	<form name="crear_director" action="" method="POST">
		<div class="mb-3">
			<input name="Nombre" type="text" placeholder="Especifique el nombre del director" required/>
			<input name="Apellidos" type="text" placeholder="Especifique los apellidos del director" required/>
			<input name="Fecha" type="text" placeholder="Especifique fecha de nacimiento" required/>
			<input name="Nacionalidad" type="text" placeholder="Especifique nacionalidad" required/>
		</div>
		<input type="submit" class="btn btn-success" value="Crear" name="BotonCrear">
	</form>
</div>
<footer>
	<h12>04MASW | Trabajo 01</h12>
	<p>Martín Martorell & Cristian Acuña</p>
</footer>
</body>
</html>