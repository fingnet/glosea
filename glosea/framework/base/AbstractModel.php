<?php
namespace glosea\framework\base;
/**
 * 模型抽象类定义
 * 
 * @author Zhirong Ma <fingnet@gmail.com>
 * @copyright ©2014 glosea.com
 * @license http://www.glosea.org
 * @version $Id$
 * @package base
 */
abstract class AbstractModel {
	//属性列表
	protected $attrs;
	
	//模型数据对象
	private $_data = null;
	
	//移除的数据
	private $_remove = null;
	
	//关联模型
	private $_join = null;
	
	//子模型
	private $_child = null;
	
	//父模型
	private $_parent = null;
	
	//属性映射
	private $_map = null;
	
	//IO适配器
	private $_adapter;
	
	//主键名称
	public $pkName = 'id';
	
	//外键名称
	public $fkName;
	
	//父级ID
	public $pid;
	
	function __construct (){
		
	}
	
	public function __set($name,$value){
		return $this;
	}
	
	public function __get($name){
		return isset($this -> _data[$name]) ? $this -> _data[$name] : null;
	}
	
	public function __isset($name){
		return isset($this -> _data[$name]);
	}
	
	public function __unset($name){
		unset($this -> _data[$name]);
		return $this;
	}
	
	public function select(){
		return $this;
	}
	
	//创建数据对象
	public function create($data = null){
		$this -> _data = !is_null($data) ? $data : $this ->_data;
		if(is_null($this -> _data)){
			
		}
		return $this;
	}
	
	//新增数据
	public function add($data = null){
		if(!is_null($data)){
			$this -> create($data);
		}
		return $this -> _adapter -> insert($this -> _data);
	}
	
	//删除数据
	public function delete($id = null){
		
	}
	
	//更新数据
	public function update($data = null){
		if(!is_null($data)){
			$this -> create($data);
		}
		return $this -> _adapter -> update($this -> _data, $this -> pkName);
	}
	
	//存储 同时包含批量的新增|更新|删除
	public function save($data = null){}
	
	//拷贝
	public function copy(){}
}
