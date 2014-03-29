<?php
namespace glosea\framework\base;
use glosea\framework\db\pdo\PdoAdapter;
class Table extends AbstractModel {
	//数据表前缀	
	protected $tablePrefix;
	//表名称（含前缀通配）
	protected $tableName;
	//真实表名
	protected $trueTableName;
	
	protected $where;
	
	protected $order;
	
	function __construct($tableName, $isTrue = false, $adapter = false){
		if($isTrue){
			$this -> trueTableName = $tableName;
		}else{
			$this -> tableName = $tableName;	
		}
		
		if($adapter){
			$this -> adapter = $adapter;
		}
	}
	
	//设置字段 $field为数组时支持key-val定义别名
	public function field($field, $not = false){
		
	}
	
	//查找
	public function find($id){
		
	}
	
	public function newQuery(){
		return new PdoAdapter;
	}
	
	public function __call($method, $parameters){
		$this -> adapter = $this -> newQuery();
		$this -> adapter -> setModel($this);
		return call_user_func_array(array($this -> adapter, $method), $parameters);
	}
	
	public static function __callStatic($method, $parameters){
		$instance = new static;
		return call_user_func_array(array($instance, $method), $parameters);
	}
}