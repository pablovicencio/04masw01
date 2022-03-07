<?php
	class Actor{
		private $id;
		private $nombre;
		private $apellidos;
		private $fecha;
		private $nacionalidad;
		
		public function __construct($idActor,$nombreActor,$apellidosActor,$fechaActor,$nacionalidadActor)
		{
			$this->ID = $idActor;
			$this->Nombre = $nombreActor;
			$this->Apellidos = $apellidosActor;
			$this->Fecha = $fechaActor;
			$this->Nacionalidad = $nacionalidadActor;
		}
		
		public function getid()
		{
			return $this->ID;
		}
		
		public function setid($id)
		{
			$this->ID = $id;
		}
		
		public function getnombre()
		{
			return $this->Nombre;
		}
		
		public function setnombre($nombre)
		{
			$this->Nombre = $nombre;
		}
		
		public function getapellidos()
		{
			return $this->Apellidos;
		}
		
		public function setapellidos($apellidos)
		{
			$this->Apellidos = $apellidos;
		}
		
		public function getfecha()
		{
			return $this->Fecha;
		}
		
		public function setfecha($fecha)
		{
			$this->Fecha = $fecha;
		}
		
		public function getnacionalidad()
		{
			return $this->Nacionalidad;
		}
		
		public function setnacionalidad($nacionalidad)
		{
			$this->Nacionalidad = $nacionalidad;
		}
	}
?>