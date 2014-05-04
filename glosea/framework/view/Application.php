<?php
namespace glosea\framework\view;
use glosea\framework\view\Base;

class Application extends Base {
	
	protected $type;
	
	public function setType($type){
		$this->type = $type;
		return $this;
	}
}