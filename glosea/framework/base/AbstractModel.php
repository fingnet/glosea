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
	
	protected $attrs;
	
	private $_data;
	
	public $id = 'id';
	
	function __construct (){
		
	}
	
	public function set(){
		return $this;
	}
	
	public function select(){
		return $this;
	}
	
	public function create(){
		
	}
	
	abstract public function update(){}
	
	abstract public function remove(){}
	
	abstract public function save(){}
}
