<?php
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
	
	function listActor(){
		$conexion = cn();
		$actorList = $conexion->query(query:"SELECT * FROM actores");
		
		$actorArray = [];
		foreach($actorList as $actorItem){
			$actorObj = new actor($actorItem["ID"],$actorItem["Nombre"],$actorItem["Apellidos"],$actorItem["Fecha"],$actorItem["Nacionalidad"]);
			array_push($actorArray,$actorObj);
		}
		$conexion->close();
		
		return $actorArray;
	}
	
	function newActor($actorNombre, $actorApellidos, $actorFecha, $actorNacionalidad){
		$conexion=cn();
		
		$actorNuevo = false;
		
		if($resultadoInsert = $conexion->query(query:"INSERT INTO actores (Nombre, Apellidos, Fecha, Nacionalidad) VALUES('$actorNombre', '$actorApellidos', '$actorFecha', '$actorNacionalidad')")){
			$actorNuevo = true;
		}
		$conexion->close();
		
		return $actorNuevo;
	}
	
	function listUno($actorID){
		$conexion=cn();
		
		$actorList = $conexion->query(query:"SELECT * FROM actores WHERE ID=$actorID");
		
		foreach($actorList as $actorItem){
			$actorObj = new actor($actorItem["ID"],$actorItem["Nombre"],$actorItem["Apellidos"],$actorItem["Fecha"],$actorItem["Nacionalidad"]);
		}
		
		$conexion->close();
		
		return $actorObj;
	}
	
	function editActor($actorID, $actorNombre, $actorApellidos, $actorFecha, $actorNacionalidad){
		$conexion=cn();
		
		$actorEditar = false;
		
		if($resultadoUpdate = $conexion->query(query:"UPDATE actores SET Nombre='$actorNombre', Apellidos='$actorApellidos', Fecha='$actorFecha', Nacionalidad='$actorNacionalidad' WHERE ID='$actorID'")){
			$actorEditar = true;
		}
		$conexion->close();
		
		return $actorEditar;
	}
	
	function borrarActor($actorID){
		$conexion = cn();
		
		$actorDel = false;
		
		if($resultado = $conexion->query(query:"DELETE FROM actores WHERE ID=$actorID")){
			$actorDel = true;
		}
		
		$conexion->close();
		
		return $actorDel;
	}
?>