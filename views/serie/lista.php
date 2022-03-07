<div class="col-12">
	<a class="btn btn-success" href="new.php">Nuevo</a>
	<?php
	require_once("../../controllers/serieControllers.php");
	$conexion=cn();
	$serieList = listarSerie($conexion);

	if (count($serieList) > 0) {
	?>
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Titulo</th>
				<th>PLataforma</th>
				<th>Director</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?php
				foreach ($serieList as $serie) {
				?>
					<tr>
						<td><?php echo $serie->getid() ?></td>
						<td><?php echo $serie->gettitulo() ?></td>
						<td><?php echo $serie->getplataforma() ?></td>
						<td><?php echo $serie->getdirector() ?></td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic example">
								<a class="btn btn-success" href="editar.php?ID=<?php echo $serie->getid();?>">Editar</a>
								
								<form name="delete_director" action="delete.php" method="POST" style="...">
									<input type="hidden" name="directorid" value="<?php echo $serie->getid();?>"/>
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
			Aun no existen Plataformas creadas.
		</div>
	<?php
	}
	?>
<div/>