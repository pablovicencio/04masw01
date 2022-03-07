<?php
	class Idioma{
		private $id;
		private $nombre;
		private $isocode;
		
		public function __construct($idIdioma,$nombreIdioma, $isocodeIdioma)
		{
			$this->ID = $idIdioma;
			$this->Nombre = $nombreIdioma;
			$this->ISO_code = $isocodeIdioma;
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
		public function getisocode()
		{
			return $this->ISO_code;
		}
		
		public function setisocode($isocode)
		{
			$this->ISO_code = $isocode;
		}
	}
?>