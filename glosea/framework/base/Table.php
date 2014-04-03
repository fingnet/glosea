<?php
namespace glosea\framework\base;
use glosea\framework\db\pdo\Query;
use glosea\framework\db\pdo\Builder;
class Table extends AbstractModel {
		
	protected $query;
	//数据表前缀	
	protected $tablePrefix;
	//表名称（含前缀通配）
	protected $tableName = 'test';
	//真实表名
	protected $trueTableName;
	
	protected $connection;
	
	function __construct($tableName = '', $isTrue = false, $connection = false){
		//if($isTrue){
		//	$this -> trueTableName = $tableName;
		//}else{
		//	$this -> tableName = $tableName;
		//}
		
		if($connection){
			$this -> connection = $connection;
		}
	}
	
	//设置字段 $field为数组时支持key-val定义别名
	public function field($field, $not = false){
		
	}
	
	public static function all(){
		
	}
	
	//查找
	public static function find($id){
		
	}
	
	public function getTable(){
		return $this -> tableName;
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