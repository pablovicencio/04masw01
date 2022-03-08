<?php
	require_once("../../models/serieModels.php");
	
	require_once("../../models/directorModels.php");
	
	require_once("../../models/plataformaModels.php");

	require_once("../../models/actorModels.php");

	require_once '../../config/db.php';
	
	function listarSerie(){

		$pdo = AccesoDB::getCon();

			$sql_list_serie = "SELECT a.id,a.titulo,
			 b.nombre plataforma_nombre, concat(c.nombre,' ',c.apellidos) director_nombre
			FROM series a inner join plataformas b on a.plataforma = b.id
			inner join directores c on a.director = c.id";

            $stmt = $pdo->prepare($sql_list_serie);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function listUno($id){

		$pdo = AccesoDB::getCon();

			$sql_sel_serie = "SELECT a.id,a.titulo,
			 b.nombre plataforma_nombre, concat(c.nombre,' ',c.apellidos) director_nombre
			FROM series a inner join plataformas b on a.plataforma = b.id
			inner join directores c on a.director = c.id where a.id = :id";

            $stmt = $pdo->prepare($sql_sel_serie);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function listDirector(){

		$pdo = AccesoDB::getCon();

            $sql_list_dir = "SELECT * FROM directores";

            $stmt = $pdo->prepare($sql_list_dir);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function listarPlataforma(){

		$pdo = AccesoDB::getCon();

            $sql_list_plataformas = "SELECT * FROM plataformas";

            $stmt = $pdo->prepare($sql_list_plataformas);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function listActor(){
		$pdo = AccesoDB::getCon();

            $sql_list_act = "SELECT * FROM actores WHERE Vigencia = 1";

            $stmt = $pdo->prepare($sql_list_act);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
?>