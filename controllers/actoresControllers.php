<?php
	require_once("../../models/actorModels.php");

	require_once '../../config/db.php';
	
	function listActor(){

		$pdo = AccesoDB::getCon();

            $sql_list_act = "SELECT * FROM actores";

            $stmt = $pdo->prepare($sql_list_act);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function newActor($actorNombre, $actorApellidos, $actorFecha, $actorNacionalidad){

		$pdo = AccesoDB::getCon();

                $sql_new_act = "INSERT INTO actores 
									(Nombre, Apellidos, Fecha, Nacionalidad, Vigencia) 
									VALUES(:nombre, :ape, :fecha, :nac, 1)";

                $stmt = $pdo->prepare($sql_new_act);
                $stmt->bindParam(":nombre", $actorNombre, PDO::PARAM_STR);
                $stmt->bindParam(":ape", $actorApellidos, PDO::PARAM_STR);
                $stmt->bindParam(":fecha", $actorFecha, PDO::PARAM_STR);
				$stmt->bindParam(":nac", $actorNacionalidad, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->rowCount();
	}
	
	function listUno($actorID){

		$pdo = AccesoDB::getCon();

            $sql_sel_act = "SELECT * FROM actores WHERE ID=:id";

            $stmt = $pdo->prepare($sql_sel_act);
			$stmt->bindParam(":id", $actorID, PDO::PARAM_INT);
            $stmt->execute();

			$response = $stmt->fetchAll();
            return $response;
	}
	
	function editActor($actorID, $actorNombre, $actorApellidos, $actorFecha, $actorNacionalidad){
		
		$pdo = AccesoDB::getCon();

                $sql_upd_act = "UPDATE actores SET
								Nombre = :nombre,
								Apellidos = :ape,
								Fecha = :fecha,
								Nacionalidad = :nac
								WHERE ID = :id";

                $stmt = $pdo->prepare($sql_upd_act);
                $stmt->bindParam(":nombre", $actorNombre, PDO::PARAM_STR);
                $stmt->bindParam(":ape", $actorApellidos, PDO::PARAM_STR);
                $stmt->bindParam(":fecha", $actorFecha, PDO::PARAM_STR);
				$stmt->bindParam(":nac", $actorNacionalidad, PDO::PARAM_STR);
				$stmt->bindParam(":id", $actorID, PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->rowCount();
	}
	
	function borrarActor($actorID){

		$pdo = AccesoDB::getCon();

				$sql_del_act = "UPDATE actores SET
								Vigencia = 0
								WHERE ID = :id";

						$stmt = $pdo->prepare($sql_del_act);
						$stmt->bindParam(":id", $actorID, PDO::PARAM_INT);
						$stmt->execute();

						return $stmt->rowCount();
	}
?>