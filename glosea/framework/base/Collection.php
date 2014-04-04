<?php
namespace glosea\framework\base;
use Closure,ArrayAccess,IteratorAggregate,ArrayIterator,Countable;
class Collection implements ArrayAccess,IteratorAggregate,Countable {
	
	protected $items;
	
	//protected $model;
	
	function __construct(array $items, $model = null){
		$this -> items = $items;
		//$this -> model = $model ?: $this ->model;
	}
	
	public function getIterator() {
		return new ArrayIterator($this -> items);
	}
	
	public function offsetGet($offset) {
		return isset($this -> items[$offset]) ? $this -> items[$offset] : null;
	}
	
	public function offsetExists($offset) {
		return isset($this -> items[$offset]);
	}
	
	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this -> items[] = $value;
		} else {
			$this -> items[$offset] = $value;
		}
	}
	
	public function offsetUnset($offset) {
		unset($this -> items[$offset]);
	}
	
	public function count() {
		return count($this -> items);
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
