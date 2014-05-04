<?php
namespace glosea\framework\view;
use glosea\framework\view\Base;

class Html extends Base {
	
	protected $path;
	
	protected $layout;
	
	protected $template;
	
	protected $engine;
	
	public function path($path = null){
		if(is_null($path)){
			return $this->path;
		} 
		$this->path = $path;
		return $this;
	}
	
	public function layout($layout = null){
		if(is_null($layout)){
			return $this->layout;
		} 
		$this->layout = $layout;
		return $this;
	}
	
	public function template($template = null, $engine = null){
		if(is_null($template)){
			return $this->template;
		} 
		$this->template = $template;
		$this -> engine = $engine;
		return $this;
	}
}
