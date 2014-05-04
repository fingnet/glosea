<?php
namespace glosea\framework\base;
use glosea\framework\base\Rest;
abstract class AbstractController{
	
	protected $request;
	
	protected $rest;
	
	//接收内容类型
	protected $acceptType;
	
	//响应内容类型
	protected $contentType;
	
	//默认视图对象
	protected $view;
	
	//视图类型 page/block/data/message/file
	protected $viewType;
	
	//设备
	protected $device;
	
	//控制器参数
	protected $param;
	
	//默认模型
	public $model;
	
	//所属应用
	public $app;
	
	function __construct($app, $request){
		$this -> request = $request;
		$this -> app = $app;
		if($this -> rest){
			$this -> rest();
		}
	}
	
	//是否Ajax请求
	public function isAjax(){
		return $this -> request -> ajax;
	}
	
	public function isMobile(){
		return false;	
	}
	
	//使用JSON
	public function withJson(){
		return false;
	}
	
	public function method(){
		return $this -> request -> method;
	}
	
	public function ip(){
		return $this -> request -> ip;
	}
	
	public function param($key){
		
	}
	
	//获取$_GET/$_POST/$_COOKIE/$_SESSION参数/_CONTENT_
	public function getVal($key){
		intval($var);
		floatval($var);
		doubleval($var);
		strval($var);
	}
	
	//获取$_POST参数
	public function postVal($key){
		
	}
	
	//获取FORM表单对象
	public function form(){
		
	}
	
	//获取$_FILE参数
	public function file($key = '', $allow = array()){
		
	}
	
	public function session($key, $value = null){
		
	}
	
	//设置HTTP头
	public function header($name, $value){
		return $this;
	}
	
	public function rest(){
		
	}
	
	public function view(){
		
	}

	public function render(){
		
	}
	
	//设置视图
	public function setView($view){
		$this -> view = $view;
		return $this;
	}
	
	//设置模型
	public function setModel($model){
		$this -> model = $model;
		return $this;
	}
	
	public function newView(){
		
	}
	
	public function __call($method, $parameters){
		
	}
	
	public static function __callStatic($method, $parameters){
		
	}
	
	public function __invoke(){
		
	}
	
}
