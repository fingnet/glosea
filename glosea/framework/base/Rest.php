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
		$action = static::$method[strtoupper($controller->method())];
		$this->controller = $controller;
		$this->$action();
	}
	
	public function get($id = null){
		$this->controller->render();
	}
	
	public function post(){
		$message = $this->controller->model->create();
		$this->controller->renderMessage();
	}
	
	public function put($id = null){
		$message = $this->controller->model->update();
		$this->controller->renderMessage();
	}
	
	public function delete($ids){
		$message = $this->controller->model->delete($id);
		$this->controller->renderMessage();
	}
}
