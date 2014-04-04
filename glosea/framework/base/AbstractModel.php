<?php
namespace glosea\framework\base;
/**
 * 模型抽象类定义
 * 
 * @author Zhirong Ma <fingnet@gmail.com>
 * @copyright ©2014 glosea.com
 * @license http://www.glosea.org
 * @version $Id$
 */
abstract class AbstractModel {
	//属性列表
	protected $attrs;
	
	//模型数据对象
	protected $data = null;
	
	//数据是否存在
	protected $exists = false;
	
	//移除的数据
	protected $remove = array();
	
	//关联模型
	protected $join = array();
	
	//子模型
	protected $child = array();
	
	//父模型
	protected $parent = array();
	
	//属性映射
	protected $map;
	
	protected $hidden;
	
	protected $visible;
	
	//主键名称
	protected $pk = 'id';
	
	//外键名称
	protected $fk;
	
	//父级ID
	protected $pid;
	
	protected $connection;
	
	protected $roles;
	
	function __construct ($adapter = null){
		
	}
	
	public static function on($connection){
		$instance = new static;
		$instance -> connection = $connection;
		return $instance;
	}
	
	public function setAttrs(array &$attrs = array()){
		$this -> attrs = $attrs;
		return $this;
	}
	
	public function add(array $attrs){
		$this -> attrs = array_merge($this -> attrs, $attrs);
		return $this;
	}
	
	public function create(array $attrs){
		$this -> add($attrs);
		$this -> save();
	}
	
	public function addRole($key, $role){
		$this -> roles[$key] = $role;
		return $this; 
	}
	
	public function removeRole($key){
		unset($this -> roles[$key]);
		return $this;
	}
	
	public function setRoles($roles){
		
	}
	
	public function __set($key,$value){
		$this -> attrs[$key] = $value;
		return $this;
	}
	
	public function __get($key){
		return isset($this -> attrs[$key]) ? $this -> attrs[$key] : null;
	}
	
	public function __isset($key){
		return isset($this -> attrs[$key]);
	}
	
	public function __unset($key){
		unset($this -> attrs[$key]);
		return $this;
	}
	
	public function escape($key){
		return isset($this -> attrs[$key]) ? $this -> attrs[$key] : null;
	}
	
	public function toArray(){
		return clone $this -> attrs;
	}
	
	public function toJson(){
		return json_encode($this -> attrs);
	}
	
	//模型校验
	public function validate(){
		
	}
	
	//删除数据
	public function destroy($id){}
	
	
	//存储 同时包含批量的新增|更新|删除
	public function save(){}
	
	//拷贝
	public function copy(){}
	
	//表单
	public function form(){
		
	}
	
	public function getPk(){
		return $this -> pk;
	}
}
