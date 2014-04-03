<?php
namespace glosea\framework\base;
use glosea\framework\db\pdo\Query as BaseQuery;
use glosea\framework\base\Collection;
class Query extends BaseQuery {
	
	function __construct($connection, $builder){
		$this -> connection = $connection;
		$this -> builder = $builder;
	}
	
	public function getModels(){
		$rs = parent :: get();
		$models = array();
		foreach ($rs as $model) {
			$models[] = $model = $this -> model -> newFromQuery($model) 
							-> setConnection($this -> connection);
			
		}
		return $models;
	}
	
	public function get(array $field = array('*')){
		$models = $this -> getModels();
		return new Collection($models);
	}
	
	public function first(){
		return $this -> top(1) -> get() -> first();
	}
	
}
