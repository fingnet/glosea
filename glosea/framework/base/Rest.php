<?php
namespace glosea\framework\base;
class Rest {
	
	protected $controller;
	
	static $method = array(
		'GET'    => 'get',
		'POST'   => 'post',
		'PUT'    => 'put',
		'DELETE' => 'delete'
	);
	
	function __construct($controller){
		$method = static::$method[strtoupper($controller -> method())];
		$this -> controller = $controller;
	}
	
	//读取数据
	public function get($id = null){
		return is_null($id) ? $this->controller->model->getArray() : $this->controller->model->find($id);
	}
	
	//新增数据
	public function post($id){
		return $this->controller->model->update($id);
	}
	
	//修改数据
	public function put(){
		return $this->controller->model-> create();
	}
	
	//删除数据
	public function delete($id){
		return $this->controller->model->remove($id);
	}
}
