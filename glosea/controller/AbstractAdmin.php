<?php
namespace glosea\controller;
use glosea\framework\base\AbstractController;
class AbstractAdmin extends AbstractController {
	
	function __construct($app, $request){
		parent::__construct($app, $request);
	}
	
	//角色认证
	public function authRole(){
		
	}
	
	public function __call($method, $parameters){
		$this -> authRole();
	}
	
}