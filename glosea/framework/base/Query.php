<?php
namespace glosea\framework\base;
use glosea\framework\db\pdo\Query as BaseQuery;
use glosea\framework\base\Collection;
class Query extends BaseQuery {
	
	function __construct($connection, $builder){
		$this -> connection = $connection;
		$this -> builder = $builder;
	}
	
	public function getModels(array $fields){
		$rs = parent :: get($fields);
		$models = array();
		foreach ($rs as $model) {
			$models[] = $model = $this -> model -> newFromQuery($model) 
							-> setConnection($this -> connection);
			
		}
		return $models;
	}
	
	public function get($fields = array('*')){
		$models = $this -> getModels((array) $this -> field($fields, func_get_args()));
		return new Collection($models);
	}
	
	public function find($id){
		return $this -> where($this -> model -> getPk(), $id) -> first();
	}
	
}
