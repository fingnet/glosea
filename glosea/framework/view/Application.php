<?php
namespace glosea\framework\view;
use glosea\framework\view\Base;

class Application extends Base {
	
	protected $type;
	
	public function setType($type){
		$this->type = $type;
		return $this;
	}
	
	public function render($file = null, $data = null){
		$this->response
		->header('Content-Type', 'application/'.$this->type)
		->write(json_encode($this->attrs))->send();
	}
}