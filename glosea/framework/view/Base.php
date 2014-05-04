<?php
namespace glosea\framework\view;
use glosea\framework\support\Model;
class Base extends Model {
	
	protected $controller;
	protected $response;
	
	function __construct($controller, $response){
		
	}
	
	public function render($file, $data = null){
		extract($this->attrs);
	}
	
	public function fetch($file, $data){
		ob_start();
        $this->render($file, $data);
        $output = ob_get_clean();
        return $output;
	}
}
