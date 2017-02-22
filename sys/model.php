<?php

	namespace X\Sys;

	class Model{

		protected $db;
		protected $stmt;

		public function __construct(){
			//conseguim acces a la base de dades, amb nomes un nou acces
			$this->db=DB::singleton();
			//$this->db=new DB();


		}

		public function query($sql){
			$this->stmt=$this->db->prepare($sql);
			
		}
		
		public function bind($param,$value,$type=null){
			
				if(is_null($type)){
					if(is_bool($value)){
					$type = \PDO::PARAM_BOOL;
					}else if(is_string($value)){
						$type = \PDO::PARAM_STR;
					}else if(is_int($value)){
						$type = \PDO::PARAM_INT;
					}else{
						$type = \PDO::PARAM_STR;
					}
				}
				$this->stmt->bindValue($param, $value, $type);
		}

		public function execute(){
			return $this->stmt->execute();
		}
		//retorna tot el contingut del array
		public function resultset(){
			return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
		//nomes realitzara una unica sortida de dades. 
		public function single(){
			return $this->stmt->fetch(\PDO::FETCH_ASSOC);
		}
		//retorna el numero de files que hi ha en la consulta a la base de dades.
		public function rowCount(){
			return $this->stmt->rowCount();
		}
		//retorna la ultima id agregada
		public function lastInsertId(){
			return $this->db->lastInsertId();
		}
		//començar una transaccio de la base de dades.
		public function beginTransaction(){
	    return $this->db->beginTransaction();
		}
		//finalitzar la transaccio.
		public function endTransaction(){
	    return $this->db->commit();
		}
		//cancela la transacció.
		public function cancelTransaction(){
	    return $this->db->rollBack();
		}
		//depuracio de sentencies preparades.
		public function debugDumpParams(){
	    return $this->stmt->debugDumpParams();
		}

	}