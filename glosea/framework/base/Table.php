<?php
namespace glosea\framework\base;
use glosea\framework\base\Query;
use glosea\framework\db\pdo\Builder;
class Table extends AbstractModel {
		
	protected $query;
	//数据表前缀	
	protected $tablePrefix;
	//表名称（含前缀通配）
	protected $tableName = 't';
	//真实表名
	protected $trueTableName;
	
	function __construct(array $attrs){
		$this -> setAttrs($attrs);
	}
	
	public static function all(array $fields = array('*')){
		$instance = new static;
		return $instance -> newQuery() -> get($fields);
	}
	
	public function getTable(){
		return $this -> tableName;
	}
	
	public function setConnection($connection){
		$this -> connection = $connection;
		return $this;
	}
	
	public function newInstance($attrs = array(), $exists = false){
		$model = new static((array) $attrs);
		$model -> exists = $exists;
		return $model;
	}
	
	public function newFromQuery($attrs = array()){
		$instance = $this -> newInstance(array(), true);
		$instance -> setAttrs((array) $attrs);
		return $instance;
	}
	
	public function newQuery(){
		$this -> query = new Query($this -> connection, new Builder());
		$this -> query -> setModel($this);
		return $this -> query;
	}
	
	public function __call($method, $parameters){
		$query = $this -> newQuery();
		return call_user_func_array(array($query, $method), $parameters);
	}
	
	public static function __callStatic($method, $parameters){
		$instance = new static;
		return call_user_func_array(array($instance, $method), $parameters);
	}
}