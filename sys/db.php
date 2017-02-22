<?php 
	namespace X\Sys;


	//La \PDO es utilitza perque es de fora del framework ja que es una clase propia del Php
	class DB extends \PDO{
		//variable per accedir a la base de dades
		static $instance;

		public function __construct(){
			//Es necesari recuperar la informacio del config.json dins la carpeta app.
			//Ja accediem en aquest arxiu en el registry.php
			$config=Registry::getInstance();
			//el array es queda dins de la variable dbconf
			$dbconf=(array)$config->dbconf;
			
			$dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
		 	$usr=$dbconf['dbuser'];
		 	$pwd=$dbconf['dbpass'];
			parent::__construct($dsn,$usr,$pwd);
			

		}
		//Nomes es fara servir una vegada, es a dir, es fa una sola conexio, si volem tornar es recupera la instancia
		static function singleton(){
			//instanceof comproba si el que hi ha a cada banda es el mateix, sino existeix la crea.
			if(!(self::$instance instanceof self)){
				self::$instance = new self();
			}
			return self::$instance;
			
		}
	}