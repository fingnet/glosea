<?php
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
	
	private $_select;
	
	private $_where;
	
	private $_adapter;
	
	private $_data;
	
	public $id = 'id';
	
	function __construct (){
		
	}
	
	public function set(){
		return $this;
	}
	
	public function getVar(){
		
	}
	
	public function getRow(){
		
	}
	
	public function getList(){
		
	}
	
	public function select(){
		return $this;
	}
	
	public function where(){
		return $this;
	}
	
	public function whereOr(){
		return $this;
	}
	
	public function sort(){
		return $this;
	}
	
	public function create(){
		
	}
	
	public function update(){
		
	}
	
	public function remove(){
		
	}
	
	public function save(){
		
	}
}
