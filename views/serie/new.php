<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src ="//cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"> </script>
<script src="../../js/func_serie.js"></script>
<head>
  <meta charset="UTF-8">
  <title>04MASW | Trabajo 01 | Crea una Serie</title>
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
        <a class="nav-link" href="../directores/lista.php">Directores</a>
		<a class="nav-link" href="#">Idiomas</a>
		<a class="nav-link" href="lista.php">Plataformas</a>
		<a class="nav-link" href="#">Series</a>
      </div>
    </div>
  </div>
</nav>
<?php
	require_once("../../controllers/serieControllers.php");
	
	$directores = listDirector();
	$plataformas = listarPlataforma();
	$actores = listActor();
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>Series</h1>
		</div>
	</div>
	<hr>
	<div>
		<form name="crear_serie" onsubmit="return false;" method="POST" >
			<div class="mb-3">
			<label class="form-label">Ingrese Titulo</label>
				<input name="Titulo" id="Titulo" type="text" placeholder="Especifique el nombre" class="form-control" required/>
			
			<label class="form-label">Seleccione Plataforma</label>
			<select name="Plataforma" id="Plataforma" class="form-select" required>
				<?php
					foreach ($plataformas as $plataforma) {
				?>
					<option value="<?php echo $plataforma['id'] ?>"><?php echo $plataforma['nombre'] ?></option>
				<?php
					}
				?>
			</select>
			<label class="form-label">Seleccione Director</label>
			<select name="Director" id="Director" class="form-select" required>
				<?php
					foreach ($directores as $director) {
				?>
					<option value="<?php echo $director['id'] ?>"><?php echo $director['nombre'].' '. $director['apellidos'] ?></option>
				<?php
					}
				?>
			</select>
			</div>
			<div>
	<div class='row g-3'>
		<div class="col-auto">
			<label class="form-label">Seleccione Actor</label>
		</div>
		<div class="col-auto">
			<select name="Actor" id="Actor" class="form-select" required>
					<?php
						foreach ($actores as $actor) {
					?>
						<option value="<?php echo $actor['id'] ?>"><?php echo $actor['nombre'].' '. $actor['apellidos'] ?></option>
					<?php
						}
					?>
			</select>
		</div>
		<div class="col-auto">
		<button class="btn btn-info" name="BotonAgregarActor" id="BotonAgregarActor">Agregar Actor</button>
		</div>
	</div><br>
	<div class="table-responsive">
		<table class="table table-bordered table-sm display" id="tabla_actores" name="tabla_actores">
			<thead>
				<th>Id</th>	
				<th>Actores</th>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
			
			<input type="submit" class="btn btn-success" value="Crear" name="BotonCrear" id="BotonCrear">
		</form>
	</div>
</div>

