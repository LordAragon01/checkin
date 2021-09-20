<?php

namespace Source\Models;

abstract class Model{

	private $values = [];
	
	public function __call($name, $args){
//__call -> dividiu em partes o método da função
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		//var_dump($method, $fieldName);
		//exit;
		
		switch($method){
		
			case "get":
				return (isset($this->values[$fieldName]))? $this->values[$fieldName] : NULL;
			break;
			
			case "set":
				$this->values[$fieldName] = $args[0];
			break;
		
		
		}
	}
	
	
	public function setData($data = array()){
		
		foreach($data as $key => $value){
		
			$this->{"set".$key}($value);
		
		}
		
	}

	public function getValues(){

		return $this->values;
	
	}
}
