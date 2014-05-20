<?php
namespace glosea\framework\base;
use glosea\framework\support\Object;
/**
 * 模型抽象类定义
 * 
 * @author Zhirong Ma <fingnet@gmail.com>
 * @copyright ©2014 glosea.com
 * @license http://www.glosea.org
 * @version $Id$
 */
abstract class AbstractModel extends Object{
	
	protected $exists = false;
	
	protected $remove = array();
	
	protected $join = array();
	
	protected $child = array();
	
	protected $parent = array();
	
	protected $map;
	
	protected $hidden;
	
	protected $visible;
	
	protected $idName = 'id';
	
	protected $id;
	
	protected $parentName;
	
	protected $nodeName;
	
	protected $roles;
	
	protected $endRoles = array(
		'create','update','type','metaType','required','unique','value','system','typeObject'
		,'ifRequired','updateReuired','confirm','minLength','maxLength','between',
		'include','list','ignore','filter'
	);
	
	protected $frontRoles = array(
		'id','name','alias','create','update','hidden','type','metaType',
		'display','control','controlParams','group','remind','style','ifShow',
		'required','unique','value','system','template','typeObject',
		'ifReuired','confirm','minLength','maxLength','between','list','regex'
	);
	
	public function setAttrs(array &$attrs = array()){
		$this->attrs = $attrs;
		return $this;
	}
	
	public function add(array $attrs){
		$this->attrs = array_merge((array) $this->attrs, $attrs);
		return $this;
	}
	
	public function role($key, $role = null){
		if(is_null($role)){
			return isset($this->roles[$key]) ? $this->roles[$key] : null;
		}
		
		if(false === $role){
			unset($this->roles[$key]);
			return $this;
		}
		
		$this->roles[$key] = $role;
		return $this;
	}
	
	public function roles($roles = null){
		if(is_null($roles)){
			return $this->roles;
		}
		
		if(false === $roles){
			$this->roles = null;
			return $this;
		}
		
		$this->roles = array_merge((array) $this->roles, $key);
		return $this;
	}
	
	public function frontRoles(){
		return $this->roles;
	}
	
	public function &toArray(){
		return $this->attrs;
	}
	
	private function toTree(&$nodes, &$list){
		foreach ($nodes as &$node) {
			foreach($list as $key => $value){
				if($node[$this->idName] === $value[$this->nodeName]){
					$node['_childs'][] = $value;
					unset($list[$key]);
				}
			}
			
			if(isset($node['_childs'])){
				$this->toTree($node['_childs'], $list);
			}
		}
		return $nodes;
	}
	
	public function getTree($list){
		if(!$this->nodeName){
			throw new \Exception('Node name is not defined');
		}
		$nodes = array();
		foreach($list as $key => $value){
			if(!$value[$this->nodeName]){
				$nodes[] = $value;
				unset($list[$key]);
			}
		}
		$this->toTree($nodes, $list);
		return $nodes;
	}
	
	public function toJson(){
		return json_encode($this->attrs);
	}
	
	public function validate(){
		if(is_null($this->roles)){
			
		}
		return true;
	}
	
	public function create(array $attrs = null){
		if(!is_null($attrs)){
			$this->add($attrs);
		}
		$this->id = $this->save();
		return $this;
	}
	
	public function update($id, array $attrs = null){
		if(!is_null($attrs)){
			$this->add($attrs);
		}
		$this->id = $id;
		$this->save();
		$this->get();
		return $this;
	}
	
	abstract public function delete($ids);
	abstract public function save();
	
	public function idName($name = null){
		if(!is_null($name)){
			$this->idName = $name;
			return $this;
		}
		return $this->idName;
	}
	
	public function id(){
		return $this->id;
	}
	
}
