<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<head>
  <meta charset="UTF-8">
  <title>04MASW | Trabajo 01 | Edita Idioma</title>
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
		<a class="nav-link" href="lista.php">Idiomas</a>
		<a class="nav-link" href="../plataforma/lista.php">Plataformas</a>
		<a class="nav-link" href="#">Series</a>
      </div>
    </div>
  </div>
</nav>
<?php
	require_once("../../controllers/idiomasControllers.php");
	
	if(isset($_GET['ID'])){
		$idiomaID = $_GET['ID'];
		
		$idioma = listUno($idiomaID);
		
?>
<div class="row">
	<div class"col-12">
		<h1>idiomaes</h1>
	</div>
</div>
<div class="col-12">
	<form name="crear_idioma" action="" method="POST">
		<div class="mb-3">
			<input name="Nombre" type="text" placeholder="Especifique nombre" value="<?php echo $idioma->Nombre?>" required/>
			<input name="Codigo" type="text" placeholder="Especifique codigo" value="<?php echo $idioma->ISO_code?>" required/>
		</div>
		<input type="submit" class="btn btn-success" value="Crear" name="BotonEditar">
	</form>
</div>
<?php
	}
	if(isset($_POST['BotonEditar'])){
		$nombre = $_POST['Nombre'];
		$codigo = $_POST['Codigo'];
		
		$idiomaNuevo = editidioma($idiomaID,$nombre, $codigo);
		
		if($idiomaNuevo){
			echo "<a href='lista.php'>volver</a>";
		}
	}
	
?>
<footer>
	<h12>04MASW | Trabajo 01</h12>
	<p>Martín Martorell & Cristian Acuña</p>
</footer>
</body>
</html>

