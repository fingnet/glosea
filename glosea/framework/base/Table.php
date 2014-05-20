<?php
namespace glosea\framework\base;
use glosea\framework\base\Query;
use glosea\framework\db\pdo\Builder;
use glosea\framework\support\Collection;
class Table extends AbstractModel {
		
	protected $query;
	//数据表前缀	
	protected $tablePrefix;
	//表名称（含前缀通配）
	protected $tableName;
	//真实表名
	protected $trueTableName;
	
	protected $idName = 'id';
	
	protected $orders;
	
	function __construct(array $attrs){
		$this->setAttrs($attrs);
	}
	
	public function setTable($table){
		$this->tableName = $table;
		return $this;
	}
	
	public function getTable(){
		return $this->trueTableName ? $this->trueTableName : $this->tablePrefix . $this->tableName;
	}
	
	public function setConnection($connection){
		$this->connection = $connection;
		return $this;
	}
	
	public function getConnection($connection){
		return $this->connection;
	}
	
	public function fetch(){
		$this->query->find($this->id);
		return $this;
	}
	
	public function save($fetch = true){
		if($this->id) {
			$this->query->where($this->idName,$this->id)->update();
		}else{
			$this->id = $this->query->insert();
		}
		
		if($fetch){
			$this->fetch();
		}
		return $this;
	}
	
	public function delete($ids){
		$ids = is_array($ids) ? $ids : explode(',', $ids);
	}
	
	public function newInstance($attrs = array(), $exists = false){
		$model = new static($attrs);
		$model->exists = $exists;
		return $model;
	}
	
	public function newFromQuery($attrs = array()){
		$instance = $this->newInstance((array) $attrs, true);
		return $instance;
	}
	
	public function newQuery(){
		$this->query = new Query($this->connection, new Builder());
		$this->query->setModel($this);
		return $this->query;
	}
	
	public function newCollection(array $models = array()){
		return new Collection($models);
	}
	
	public function __call($method, $parameters){
		$this->query = $this->query ? $this->query : $this->newQuery();
		return call_user_func_array(array($this->query, $method), $parameters);
	}
	
	public static function __callStatic($method, $parameters){
		$instance = new static;
		return call_user_func_array(array($instance, $method), $parameters);
	}
}