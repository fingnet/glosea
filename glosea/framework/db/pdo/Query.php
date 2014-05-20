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
	
	public $limit;
	
	public $skip = 0;
	
	public $top;
	
	public $data;
	
	protected $connection;
	
	protected $builder;
	
	protected $model;
	
	function __construct($connection, $builder){
		$this->connection = $connection;
		$this->builder = $builder;
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
		$this->model = $model;
		$this->from($model->getTable());
		return $this;
	}
	
	public function select($fields = array('*')){
		$this->fields = $this->field($fields, func_get_args());
		return $this;
	}
	
	public function from($table){
		$this->from = $table;
		return $this;
	}
	
	public function table($table){
		$this->from($table);
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
	
	public function where($name, $value = null, $operator = '=', $type = 'AND'){
		$this->wheres[] = compact('type', 'name', 'operator', 'value');
		return $this;
	}
	
	public function orWhere($name, $value = null, $operator = '='){
		$this->wheres[] = array('OR', $name, $type, $value);
		return $this;
	}
	
	public function order($name, $type = 'ASC'){
		$this->orders[] = array($name, $type); 
		return $this;
	}
	
	public function group(){
		array_merge($this->group, func_get_args());
		return $this;
	}
	
	public function limit($limit){
		$this->limit = $limit;
		return $this;
	}
	
	public function skip($num = 0){
		$this->skip = $num;
		$this->limit = $num . ',' . $this->top;
		return $this;
	}
	
	public function top($num = 10){
		$this->top = $num;
		$this->limit = $this->skip . ',' . $num;
		return $this;
	}
	
	public function save(){
		
	}
	
	public function insert(array &$values = null){
		$values = is_null($values) ? $this->model->toArray() : $values;
		$sql = $this->builder->insert($this, $values);
		return $this->connection->insert($sql);
	}
	
	public function update(array &$values){
		$sql = $this->builder->update($this, $values);
		return $this->connection->update($sql);
	}
	
	public function replace($data){
		return $this;
	}
	
	public function delete($id){
		return $this;
	}
	
	//还原软删除
	public function restore(){
		
	}
	
	public function get($fields = array('*')){
		if(!$this->from){
			throw new \Exception('Table is not defined');
		}
		$this->select($this->field($fields, func_get_args()));
		$sql = $this->builder->select($this);
		return $this->connection->select($sql);
	}
	
	public function all($fields = array('*')){
		return $this->get($this->field($fields, func_get_args()));
	}
	
	public function first($fields = array('*')){
		return $this->top(1) 
						-> get($this->field($fields, func_get_args())) 
						-> first();
	}
	
	public function last($fields = array('*')){
		return $this->get($this->field($fields, func_get_args()))->last();
	}
	
	public function pluck($field){
		
	}
	
	public function max($field){
		
	}
	
	public function min($field){
		
	}
	
	public function sum($field){
		
	}
	
	public function avg($field){
		
	}
	
	public function count($field = '*'){
		
	}
	
	protected function field($fields, $args) {
		return is_array($fields) ? $fields : $args;
	}
	 
}
