<?php
	class Conexion{
		public function cn()
		{
				$localhost="localhost";
				$usersdb="root";
				$passworddb="123456789";
				$namebd="04masw01";
				
				$conexion=mysqli_connect($localhost, $usersdb, $passworddb, $namebd);
				
				return $conexion;
		}
	}
	
	//$resultado = mysqli_query($conexion,'SELECT * FROM actores;');
	
	//while ($fila = mysqli_fetch_assoc($resultado)) {
    //echo $fila['ID'];
    //echo $fila['Nombre'];
?>