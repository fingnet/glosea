<?php
namespace glosea\framework\base;
use glosea\framework\support\Model;
/**
 * 模型抽象类定义
 * 
 * @author Zhirong Ma <fingnet@gmail.com>
 * @copyright ©2014 glosea.com
 * @license http://www.glosea.org
 * @version $Id$
 */
abstract class AbstractModel extends Model{
	
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
	
	protected $endRole = array(
		'create','update','type','metaType','required','updateReuired','unique','ifRequire',
		'min','max','confirm','between','include','ignore','filter'
	);
	
	protected $frontRole = array();
	
	//逻辑删除
	protected $logicDelete;
	
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
		$this -> attrs = array_merge((array) $this -> attrs, $attrs);
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
	
	public function setRoles(array $roles){
		$this -> roles = array_merge((array) $this -> roles, $roles);
		return $this;
	}
	
	public function clearRoles(){
		$this -> roles = null;
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
		if(is_null($this -> roles)){
			
		}
		return true;
	}
	
	//删除数据
	public function destroy($id){}
	
	
	//存储 同时包含批量的新增|更新|删除
	public function save(){
		if(! $this -> validate() ){
			
		}
	}
	
	public function pk(){
		return $this -> pk;
	}
}
