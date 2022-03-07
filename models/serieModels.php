<?php
	class Serie{
		private $id;
		private $titulo;
		private $idPlataforma;
		private $idDirector;
		
		public function __construct($idSerie,$tituloSerie, $idPlataformaSerie, $idDirectorSerie)
		{
			$this->ID = $idSerie;
			$this->Titulo = $tituloSerie;
			$this->Plataforma = $idPlataformaSerie;
			$this->Director = $idDirectorSerie;
		}
		
		public function getid()
		{
			return $this->ID;
		}
		
		public function setid($id)
		{
			$this->ID = $id;
		}
		
		public function gettitulo()
		{
			return $this->Titulo;
		}
		
		public function settitulo($titulo)
		{
			$this->Titulo = $titulo;
		}
		
		public function getplataforma()
		{
			return $this->Plataforma;
		}
		
		public function setplataforma($idPlataforma)
		{
			$this->Plataforma = $idPlataforma;
		}
		
		public function getdirector()
		{
			return $this->Director;
		}
		
		public function setdirector($idDirector)
		{
			$this->Director = $idDirector;
		}
	}
?>