<?php
	require_once("../../models/directorModels.php");

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
	
	function listDirector(){
		$conexion = cn();
		$directorList = $conexion->query(query:"SELECT * FROM directores");
		
		$directorArray = [];
		foreach($directorList as $directorItem){
			$directorObj = new director($directorItem["ID"],$directorItem["Nombre"],$directorItem["Apellidos"],$directorItem["Fecha"],$directorItem["Nacionalidad"]);
			array_push($directorArray,$directorObj);
		}
		$conexion->close();
		
		return $directorArray;
	}
	
	function newDirector($directorNombre, $directorApellidos, $directorFecha, $directorNacionalidad){
		$conexion=cn();
		
		$directorNuevo = false;
		
		if($resultadoInsert = $conexion->query(query:"INSERT INTO directores (Nombre, Apellidos, Fecha, Nacionalidad) VALUES('$directorNombre', '$directorApellidos', '$directorFecha', '$directorNacionalidad')")){
			$directorNuevo = true;
		}
		$conexion->close();
		
		return $directorNuevo;
	}
	
	function listUno($directorID){
		$conexion=cn();
		
		$directorList = $conexion->query(query:"SELECT * FROM directores WHERE ID=$directorID");
		
		foreach($directorList as $directorItem){
			$directorObj = new director($directorItem["ID"],$directorItem["Nombre"],$directorItem["Apellidos"],$directorItem["Fecha"],$directorItem["Nacionalidad"]);
		}
		
		$conexion->close();
		
		return $directorObj;
	}
	
	function editDirector($directorID, $directorNombre, $directorApellidos, $directorFecha, $directorNacionalidad){
		$conexion=cn();
		
		$directorEditar = false;
		
		if($resultadoUpdate = $conexion->query(query:"UPDATE directores SET Nombre='$directorNombre', Apellidos='$directorApellidos', Fecha='$directorFecha', Nacionalidad='$directorNacionalidad' WHERE ID='$directorID'")){
			$directorEditar = true;
		}
		$conexion->close();
		
		return $directorEditar;
	}
	
	function borrarDirector($directorID){
		$conexion = cn();
		
		$directorDel = false;
		
		if($resultado = $conexion->query(query:"DELETE FROM directores WHERE ID=$directorID")){
			$directorDel = true;
		}
		
		$conexion->close();
		
		return $directorDel;
	}
?>