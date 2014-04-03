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
	protected $map = array();
	
	protected $hidden = array();
	
	protected $visible = array();
	
	//主键名称
	protected $pk = 'id';
	
	//外键名称
	protected $fk;
	
	//父级ID
	protected $pid;
	
	protected $connection;
	
	function __construct ($adapter = null){
		
	}
	
	public static function on($connection){
		$instance = new static;
		$instance -> connection = $connection;
		return $instance;
	}
	
	public function setAttrs(array $attrs = array()){
		$this -> attrs = $attrs;
		return $this;
	}
	
	public function getAttrs(){
		return $this -> attrs;
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
	
	public function toJson(){
		return json_encode($this -> attrs);
	}
	
	//查找
	public static function find($id){
		$instance = new static;
		return $instance -> adapter -> where($id);
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
	
	//
	public function destroy($id){}
	
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
	
	//表单
	public function form(){
		
	}
	
	public function getPk(){
		return $this -> pk;
	}
}
