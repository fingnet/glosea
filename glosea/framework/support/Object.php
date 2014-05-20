<?php
namespace glosea\framework\support;
use Closure,ArrayAccess,IteratorAggregate,ArrayIterator,Countable;
class Object implements  ArrayAccess,IteratorAggregate,Countable{
	protected $attrs;
	
	//实现数组迭代器接口
	public function getIterator() {
		return new ArrayIterator($this -> attrs);
	}
	
	//实现数组数据访问接口
	public function offsetGet($offset) {
		return isset($this -> attrs[$offset]) ? $this -> attrs[$offset] : null;
	}
	
	public function offsetExists($offset) {
		return isset($this -> attrs[$offset]);
	}
	
	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this -> attrs[] = $value;
		} else {
			$this -> attrs[$offset] = $value;
		}
	}
	
	public function offsetUnset($offset) {
		unset($this -> attrs[$offset]);
	}
	
	//实现数据统计接口
	public function count() {
		return count($this -> attrs);
	}
	
	public function __set($key, $value){
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
}
