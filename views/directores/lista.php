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
		<a class="nav-link" href="../plataforma/lista.php">Plataformas</a>
		<a class="nav-link" href="#">Series</a>
      </div>
    </div>
  </div>
</nav>
<div class="col-12">
	<a class="btn btn-success" href="new.php">Nuevo</a>
	<?php
	require_once("../../controllers/directoresControllers.php");

	$directorList = listdirector();

	if (count($directorList) > 0) {
	?>
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Fecha</th>
				<th>Nacionalidad</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php
				foreach ($directorList as $director) {
				?>
					<tr>
						<td><?php echo $director->getid() ?></td>
						<td><?php echo $director->getnombre() ?></td>
						<td><?php echo $director->getapellidos() ?></td>
						<td><?php echo $director->getfecha() ?></td>
						<td><?php echo $director->getnacionalidad() ?></td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic example">
								<a class="btn btn-success" href="editar.php?ID=<?php echo $director->getid();?>">Editar</a>
								
								<form name="delete_director" action="delete.php" method="POST" style="...">
									<input type="hidden" name="directorid" value="<?php echo $director->getid();?>"/>
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>								
							</div>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	<?php
	} else {
	?>
		<div class="alert alert-warning" role="alert">
			Aun no existen directores.
		</div>
	<?php
	}
	?>
</div>
<footer>
	<h12>04MASW | Trabajo 01</h12>
	<p>Mart??n Martorell & Cristian Acu??a</p>
</footer>
</body>
</html>