<?php
	require_once("../../models/plataformaModels.php");

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
	
	function listarPlataforma(){
		$conexion = cn();
		$plataformaList = $conexion->query(query:"SELECT * FROM plataformas");
		
		$plataformaArray = [];
		foreach($plataformaList as $plataformaItem){
			$plataformaObj = new plataforma($plataformaItem["ID"],$plataformaItem["Nombre"]);
			array_push($plataformaArray,$plataformaObj);
		}
		$conexion->close();
		
		return $plataformaArray;
	}
	
	function nuevaPlataforma($plataformaNombre){
		$conexion=cn();
		
		$plataformaNuevo = false;
		
		if($resultadoInsert = $conexion->query(query:"INSERT INTO plataformas (Nombre) VALUES('$plataformaNombre')")){
			$plataformaNuevo = true;
		}
		$conexion->close();
		
		return $plataformaNuevo;
	}
	
	
	function listUno($ID){
		$conexion=cn();
		
		$plataformaList = $conexion->query(query:"SELECT * FROM plataformas WHERE ID=$ID");
		
		foreach($plataformaList as $plataformaItem){
			$plataformaObj = new plataforma($plataformaItem["ID"],$plataformaItem["Nombre"]);
		}
		
		$conexion->close();
		
		return $plataformaObj;
	}
	
	function editPlataforma($ID, $plataformaNombre){
		$conexion=cn();
		
		$directorEditar = false;
		
		if($resultadoUpdate = $conexion->query(query:"UPDATE plataformas SET Nombre='$plataformaNombre' WHERE ID='$ID'")){
			$directorEditar = true;
		}
		$conexion->close();
		
		return $directorEditar;
	}
	
	function borrarPlataforma($ID){
		$conexion = cn();
		
		$plataformaDel = false;
		
		if($resultado = $conexion->query(query:"DELETE FROM plataformas WHERE ID='$ID'")){
			$plataformaDel = true;
		}
		
		$conexion->close();
		
		return $plataformaDel;
	}
?>