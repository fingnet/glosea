<?php
namespace keelkit\base;
use Closure,ArrayAccess,IteratorAggregate,ArrayIterator,Countable;
class Object implements  ArrayAccess,IteratorAggregate,Countable{
	protected $attributes;
	
	//实现数组迭代器接口
	public function getIterator() {
		return new ArrayIterator($this -> attributes);
	}
	
	//实现数组数据访问接口
	public function offsetGet($offset) {
		return isset($this -> attributes[$offset]) ? $this -> attributes[$offset] : null;
	}
	
	public function offsetExists($offset) {
		return isset($this -> attributes[$offset]);
	}
	
	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this -> attributes[] = $value;
		} else {
			$this -> attributes[$offset] = $value;
		}
	}
	
	public function offsetUnset($offset) {
		unset($this -> attributes[$offset]);
	}
	
	//实现数据统计接口
	public function count() {
		return count($this -> attributes);
	}
	
	public function __set($key, $value){
		$this -> attributes[$key] = $value;
		return $this;
	}
	
	public function __get($key){
		return isset($this -> attributes[$key]) ? $this -> attributes[$key] : null;
	}
	
	public function __isset($key){
		return isset($this -> attributes[$key]);
	}
	
	public function __unset($key){
		unset($this -> attributes[$key]);
		return $this;
	}
}
