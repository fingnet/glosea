<?php
namespace glosea\framework\db\pdo;
use glosea\framework\db\IQuery;
class Query{
	
	public $fields;
	
	public $form;
	
	public $joins;
	
	public $wheres;
	
	public $orders;
	
	public $groups;
	
	public $havings;
	
	public $data;
	
	protected $connection;
	
	protected $builder;
	
	protected $model;
	
	function __construct($connection, $builder){
		$this -> connection = $connection;
		$this -> builder = $builder;
	}
	
	//查询表
	public function getTables(){}
	
	//查询表字段
	public function getFields($tableName){}
	
	//创建表
	public function create($drop = false){}
	
	//清空表
	public function truncate($tableName){}
	
	//删除表
	public function drop($tableName){}
	
	public function setModel($model){
		$this -> model = $model;
		$this -> from($model -> getTable());
		return $this;
	}
	
	public function insert($data, $hasPk = false){
		return $this;
	}
	
	public function update($data, $replace = false){
		return $this;
	}
	
	public function replace($data){
		return $this;
	}
	
	public function delete(){
		return $this;
	}
	
	public function select($select = array('*')){
		$this -> fields = is_array($select) ? $select : func_get_args();
		return $this;
	}
	
	public function from($table){
		$this -> from = $table;
		return $this;
	}
	
	public function table($table){
		$this -> from($table);
		return $this;
	}
	
	public function where($name, $vale = null, $operator = '=', $type = 'AND'){
		$this -> wheres[] = compact($operator, $name, $type, $value);
		return $this;
	}
	
	public function orWhere($name, $vale = null, $operator = '='){
		$this -> wheres[] = array('OR', $name, $type, $value);
		return $this;
	}
	
	public function order($name, $type = 'ASC'){
		$this -> order[] = array($name, $type); 
		return $this;
	}
	
	public function group(){
		array_merge($this -> group, func_get_args());
		return $this;
	}
	
	public function native($shell){
		return $this;
	}
	
	public function join($table){
		return $this;
	}
	
	public function leftJoin($table){
		return $this;
	}
	
	public function rightJoin($table){
		return $this;
	}
	
	public function limit(){
		return $this;
	}
	
	public function skip($num = 0){
		return $this;
	}
	
	public function top($num = 10){
		return $this;
	}
	
	public function get(){
		return $this -> connection -> select($this -> builder -> select($this));
	}
	
	public function first(){
		
	}
	
	public function pluck(){
		
	}
	
	public function columns(){
		
	}
	
	public function max(){
		
	}
	
	public function min(){
		
	}
	
	public function sum(){
		
	}
	
	public function avg(){
		
	}
	
	public function count(){
		
	}
	
	private function _build() {
		
	}
	 
}