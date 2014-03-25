<?php
namespace glosea\framework\base;
abstract class AbstractController{
	
	protected $view;
	
	public function __construct(){
		
	}
	
	public function setView($view){
		$this -> view = $view;
	}
	
}
