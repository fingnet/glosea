<?php
namespace glosea\framework\base;
use Closure;
class Collection {
	
	protected $items;
	
	function __construct(array $items = array()){
		$this -> items = $items;
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
	
}
