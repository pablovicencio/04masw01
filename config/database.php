<?php
	class Conectar{
		public static function conexion(){
			$localhost="localhost";
			$usersdb="root";
			$passworddb="123456789";
			$namebd="04masw01";
			
			$conexion = new mysqli($localhost, $usersdb, $passworddb, $namebd);//mysqli_connect
		
			if($conexion->connect_error){
				die("Error: ".$conexion->connect_error);
			}
				
			return $conexion;
		}
	}
?>