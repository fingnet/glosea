<?php
namespace glosea\framework\base;
use ArrayAccess,IteratorAggregate,ArrayIterator,Countable;
/**
 * 模型抽象类定义
 * 
 * @author Zhirong Ma <fingnet@gmail.com>
 * @copyright ©2014 glosea.com
 * @license http://www.glosea.org
 * @version $Id$
 */
abstract class AbstractModel implements ArrayAccess,IteratorAggregate,Countable {
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
	
	//逻辑删除
	protected $logicDelete;
	
	function __construct ($adapter = null){
		
	}
	
	public static function on($connection){
		$instance = new static;
		$instance -> connection = $connection;
		return $instance;
	}
	
	//实现数组迭代器接口
	public function getIterator() {
        return new ArrayIterator($this -> attrs);
    }
	
	//实现数组数据访问接口
	public function offsetGet($offset) {
        return isset($this -> attrs[$offset]) ? $this -> attrs[$offset] : null;
    }
	
    public function offsetExists($offset) {
        return isset($this -> attrs[$offset]);
    }
	
	public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this -> attrs[] = $value;
        } else {
            $this -> attrs[$offset] = $value;
        }
    }
	
    public function offsetUnset($offset) {
        unset($this -> attrs[$offset]);
    }
	
	//实现数据统计接口
	public function count() {
		return count($this -> attrs);
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
	public function save(){
		
	}
	
	//拷贝
	public function copy(){}
	
	//表单
	public function form(){
		
	}
	
	public function getPk(){
		return $this -> pk;
	}
}
