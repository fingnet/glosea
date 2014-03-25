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
	
	//移除的数据
	protected $remove = array();
	
	//关联模型
	protected $join = array();
	
	//子模型
	protected $child = array();
	
	//父模型
	protected $parent = null;
	
	//属性映射
	protected $map = array();
	
	//IO适配器
	protected $adapter;
	
	//主键名称
	public $pk = 'id';
	
	//外键名称
	public $fk;
	
	//父级ID
	public $pid;
	
	function __construct ($adapter = null){
		
	}
	
	public function setAdapter($adapter){
		$this -> adapter = $adapter;
		return $this;
	}
	
	public function __set($name,$value){
		$this -> data[$name] = $value;
		return $this;
	}
	
	public function __get($name){
		return isset($this -> data[$name]) ? $this -> data[$name] : null;
	}
	
	public function __isset($name){
		return isset($this -> data[$name]);
	}
	
	public function __unset($name){
		unset($this -> data[$name]);
		return $this;
	}
	
	public function select(){
		return $this;
	}
	
	public function data(){
		return $this -> data;
	}
	
	public function toJson(){
		return json_encode($this -> data);
	}
	
	//创建数据对象
	public function create($data = null){
		$this -> data = !is_null($data) ? $data : $this -> data;
		if(is_null($this -> data)){
			
		}
		return $this;
	}
	
	//新增数据
	public function add($data = null){
		if(!is_null($data)){
			$this -> create($data);
		}
		return $this -> adapter -> insert($this -> data);
	}
	
	//删除数据
	public function delete($id = null){
		
	}
	
	//更新数据
	public function update($data = null){
		if(!is_null($data)){
			$this -> create($data);
		}
		return $this -> adapter -> update($this -> data, $this -> pk);
	}
	
	//存储 同时包含批量的新增|更新|删除
	public function save($data = null){}
	
	//拷贝
	public function copy(){}
}
