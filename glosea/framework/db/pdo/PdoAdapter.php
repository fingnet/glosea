<?php
namespace glosea\framework\db\pdo;
use glosea\framework\db\IAdapter;
/**
 * PDO数据库适配器
 * @author MaZhirong <fingnet@gmail.com> 2014-3-14
 * @copyright ©2103 glosea.com
 * @license http://www.glosea.com
 * @version 0.1
 */
class PdoAdapter extends PDO implements IAdapter {
		
	protected $model;
	
	protected $field;
	
	protected $where;
	
	protected $order;
	
	protected $group;
	
	protected $table;
	
	function __construct($config = null){
		if(isset($config)){
			parent :: __construct($config['dsn'], $config['user'], $config['password']);
		}
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
		return $this;
	}
	
	public function setTable($name, $true = false){
		$this -> table = $name;
		return $this;
	}
	
	public function table($name, $true = false){
		$this -> setTable($name, $true = false);
		return $this;
	}
	
	public function insert($data){
		
	}
	
	public function update($data){
		
	}
	
	public function replace($data){
		
	}
	
	public function delete(){
		
	}
	
	public function select($field){
		
	}
	
	public function where($where){
		
	}
	
	public function orWhere($where){
		
	}
	
	public function order($order){
		
	}
	
	public function group($group){
		
	}
	
	public function execute($shell){
		
	}
	
	public function join($join){
		
	}
	
	public function leftJoin($join){
		
	}
	
	public function rightJoin($join){
		
	}
	
	public function get(){
		
	}
	
	public function max(){
		
	}
	
	public function min(){
		
	}
	
	public function sum(){
		
	}
	
	public function count(){
		
	}
	
}