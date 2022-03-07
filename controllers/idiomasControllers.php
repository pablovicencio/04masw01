<?php
	require_once("../../models/idiomaModels.php");

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
	
	function listIdioma(){
		$conexion = cn();
		$idiomaList = $conexion->query(query:"SELECT * FROM idiomas");
		
		$idiomaArray = [];
		foreach($idiomaList as $idiomaItem){
			$idiomaObj = new idioma($idiomaItem["ID"],$idiomaItem["Nombre"],$idiomaItem["ISO_code"]);
			array_push($idiomaArray,$idiomaObj);
		}
		$conexion->close();
		
		return $idiomaArray;
	}
	
	function newidioma($idiomaNombre, $idiomaISO_code){
		$conexion=cn();
		
		$idiomaNuevo = false;
		
		if($resultadoInsert = $conexion->query(query:"INSERT INTO idiomas (Nombre, ISO_code) VALUES('$idiomaNombre', '$idiomaISO_code')")){
			$idiomaNuevo = true;
		}
		$conexion->close();
		
		return $idiomaNuevo;
	}
	
	function listUno($ID){
		$conexion=cn();
		
		$idiomaList = $conexion->query(query:"SELECT * FROM idiomas WHERE ID=$ID");
		
		foreach($idiomaList as $idiomaItem){
			$idiomaObj = new idioma($idiomaItem["ID"],$idiomaItem["Nombre"],$idiomaItem["ISO_code"]);
		}
		
		$conexion->close();
		
		return $idiomaObj;
	}
	
	function editidioma($idiomaID, $idiomaNombre, $idiomaISO_code){
		$conexion=cn();
		
		$idiomaEditar = false;
		
		if($resultadoUpdate = $conexion->query(query:"UPDATE idiomas SET Nombre='$idiomaNombre', ISO_code='$idiomaISO_code' WHERE ID='$idiomaID'")){
			$idiomaEditar = true;
		}
		$conexion->close();
		
		return $idiomaEditar;
	}
	
	function borraridioma($ID){
		$conexion = cn();
		
		$idiomaDel = false;
		
		if($resultado = $conexion->query(query:"DELETE FROM idiomas WHERE ID=$ID")){
			$idiomaDel = true;
		}
		
		$conexion->close();
		
		return $idiomaDel;
	}
?>