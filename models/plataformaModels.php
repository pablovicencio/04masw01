<?php
	class Plataforma{
		private $id;
		private $nombre;
		
		public function __construct($idplataforma,$nombreplataforma)
		{
			$this->ID = $idplataforma;
			$this->Nombre = $nombreplataforma;
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
	}
?>