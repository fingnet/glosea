<?php
namespace glosea\framework\base;
use glosea\framework\base\Rest;
use glosea\framework\view\View;
use glosea\framework\exception\Exception;
abstract class AbstractController{
	
	protected $request;
	protected $response;
	protected $rest;
	protected $acceptType;
	protected $contentType;
	protected $view;
	protected $device;
	protected $params = array();
	protected $filters = array();
	protected $orders = array();
	protected $Model;
	protected $dataParamName;
	protected $input = false;
	public $model;
	public $app;
	
	function __construct($app, $request, $response, $params = null){
		$this->request = $request;
		$this->response = $response;
		$this->app = $app;
		if($this->rest){
			$this->rest();
		}
	}
	
	public function isAjax(){
		return $this->request->ajax;
	}
	
	public function isMobile(){
		return false;	
	}
	
	public function withJson(){
		return false;
	}
	
	public function method(){
		return $this->request->method;
	}
	
	public function ip(){
		return $this->request->ip;
	}
	
	public function param($key, $value = null){
		if(is_null($value)){
			return isset($this->params[$key]) ? $this->params[$key] : null;
		}
		
		$this->params[$key] = $value;
		return $this;
	}
	
	public function post($key){
		return isset($_POST['key']) ? : null;
	}
	
	public function get($key){
		if(isset($_POST['key'])){
			return $_POST['key'];
		}elseif(isset($_GET['key'])){
			return $_GET['key'];
		}elseif(!is_null($this->param($key))){
			return $this->param($key);
		}elseif(isset($_SESSION['key'])){
			return $_SESSION['key'];
		}else{
			return null;
		}
	}
	
	public function getInt($key){
		return intval($this->get($key));
	}
	
	public function getFloat($key){
		return floatval($this->get($key));
	}
	
	public function getBool($key){
		return is_null($this->get($key)) ? null : !!$this->get($key);
	}
	
	public function file($key = '', $allow = array()){
		
	}
	
	public function session($key, $value = null){
		
	}
	
	public function rest(){
		if(!$this->model){
			$this->model = $this->newModel();
		}
		$this->newRest();
		return $this;
	}
	
	public function view($data = array(), $template = null, $type = null, $engine = null){
		$type = is_null($type) && $this->isAjax() ? 'application' : $type;
		$this->view = $this->newView($type);
		return $this;
	}

	public function render(){
		$this->view->render();
		return $this;
	}
	
	public function renderMessage(){
		
	}
	
	public function model($model){
		$this->model = $model;
		return $this;
	}
	
	protected function newModel(){
		if(!$this->Model){
			throw new \Exception('Model Not Defined');
			return;
		}
		return new $this->Model;
	}
	
	protected function newRest(){
		return new Rest($this);
	}
	
	protected function newView($type = 'Page'){
		return new View($type, $this, $this->response);
	}
	
	public function __call($method, $parameters){
		
	}
	
	public static function __callStatic($method, $parameters){
		
	}
	
	public function __invoke(){
		
	}
	
}
