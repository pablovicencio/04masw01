<?php
	require_once("../../models/serieModels.php");
	
	require_once("../../models/directorModels.php");
	
	require_once("../../models/plataformaModels.php");

	require_once("../../models/actorModels.php");
	
	function cn(){
		$localhost="localhost";
		$usersdb="root";
		$passworddb="123456789";
		$namebd="04masw01";
		
		$conexion = @new mysqli($localhost, $usersdb, $passworddb, $namebd);//mysqli_connect
		
		if($conexion->connect_error){
			die("Error: ".$conexion->connect_error);
		}
		
		return $conexion;
	}
	
	function listarSerie($conexion){
		
		$serieList = $conexion->query(query:"SELECT * FROM series");
		
		$serieArray = [];
		foreach($serieList as $serieItem){
			$serieObj = new Serie($serieItem["ID"],$serieItem["Titulo"],$serieItem["Plataforma"],$serieItem["Director"]);
			array_push($serieArray,$serieObj);
		}
		$conexion->close();
		
		return $serieArray;
	}
	
	function nuevaSerie($conexion, $titulo, $plataforma, $director){
		
		$serieNuevo = false;
		
		if($resultadoInsert = $conexion->query(query:"INSERT INTO series (Titulo, Plataforma, Director) VALUES('$titulo','$plataforma','$director')")){
			$serieNuevo = true;
		}
		$conexion->close();
		
		return $serieNuevo;
		
	}
	
	function listDirector($conexion){
		$directorList = $conexion->query(query:"SELECT * FROM directores");
		
		$directorArray = [];
		foreach($directorList as $directorItem){
			$directorObj = new director($directorItem["ID"],$directorItem["Nombre"],$directorItem["Apellidos"],$directorItem["Fecha"],$directorItem["Nacionalidad"]);
			array_push($directorArray,$directorObj);
		}
		$conexion->close();
		
		return $directorArray;
	}
	
	function listarPlataforma($conexion){
		$plataformaList = $conexion->query(query:"SELECT * FROM plataformas");
		
		$plataformaArray = [];
		foreach($plataformaList as $plataformaItem){
			$plataformaObj = new plataforma($plataformaItem["ID"],$plataformaItem["Nombre"]);
			array_push($plataformaArray,$plataformaObj);
		}
		$conexion->close();
		
		return $plataformaArray;
	}
	
	function listActor($conexion){
		$actorList = $conexion->query(query:"SELECT * FROM actores");
		
		$actorArray = [];
		foreach($actorList as $actorItem){
			$actorObj = new actor($actorItem["ID"],$actorItem["Nombre"],$actorItem["Apellidos"],$actorItem["Fecha"],$actorItem["Nacionalidad"]);
			array_push($actorArray,$actorObj);
		}
		$conexion->close();
		
		return $actorArray;
	}
?>