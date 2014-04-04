<?php
namespace glosea\framework\base;
use Closure;
class Collection {
	
	protected $items;
	
	//protected $model;
	
	function __construct(array $items, $model = null){
		$this -> items = $items;
		//$this -> model = $model ?: $this ->model;
	}
	
	public function add(array $items, $merge = true){
		if($merge){
			$this -> items = array_merge($items, $this -> items);
		}else{
			$this -> items = $items;
		}
		return $this;
	}
	
	public function all(){
		return $this -> items;
	}
	
	public function first(){
		return count($this -> items) > 0 ? reset($this -> items) : null;
	}
	
	public function last(){
		return count($this -> items) > 0 ? end($this -> items) : null;
	}
	
	public function each(Closure $callback){
		array_map($callback, $this->items);
		return $this;
	}
	
	public function size(){
		return count($this -> items);
	}
	
	public function isEmpty(){
		return ! count($this -> items) > 0;
	}
	
	public function reset(){
		unset($this -> items);
	}
	
}
