<?php

require_once '../config/db.php';
       

try{
        // unescape los valores de cadena en la matriz JSON
$TableData = stripcslashes ($_POST['data']);

//$form = stripcslashes ($_POST['data1']);

// Decodificar el array JSON
$TableData= json_decode($TableData,TRUE);

//$form = json_decode($form,TRUE);

// ahora $ TableData se puede acceder como una matriz PHP
//var_dump($TableData);


  
    $titulo = stripcslashes ($_POST['titulo']);
    $director = stripcslashes ($_POST['director']);
    $plataforma = stripcslashes ($_POST['plataforma']);

    $pdo = AccesoDB::getCon();

		$sql_new_serie = "INSERT INTO series 
							(Titulo, Plataforma, Director) 
							VALUES(:titulo, :plataforma, :director)";

		$stmt = $pdo->prepare($sql_new_serie);
		$stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
		$stmt->bindParam(":plataforma", $plataforma, PDO::PARAM_INT);
		$stmt->bindParam(":director", $director, PDO::PARAM_INT);
		$stmt->execute();

        $sql_id_serie = "select id from series  order by id desc LIMIT 1 ";

		$stmt = $pdo->prepare($sql_id_serie);
		$stmt->execute();

        $reg = $stmt->rowCount();

        $response = $stmt->fetchAll();

        $id_serie = $response[0]['id'];

			
    
    
        foreach ($TableData as $row) {
            $actor = $row['actor'];
            
                $sql_serie_actor = "INSERT INTO serie_actores
              (IDserie,IDActores)
              VALUES(:serie, :actor)";



$stmt = $pdo->prepare($sql_serie_actor);
      $stmt->bindParam("serie", $id_serie, PDO::PARAM_INT);
      $stmt->bindParam("actor", $actor, PDO::PARAM_INT);

$stmt->execute();




            }



      
      if ($reg<1){
      echo"Error de base de datos, comuniquese con el administrador";    
      } else {
        echo"Serie Creada"; 
  }
    
    
      

  } catch (Exception $e) {
    echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); </script>"; 



  }
?>