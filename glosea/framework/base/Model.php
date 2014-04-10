<?php
namespace glosea\framework\base;
use AbstractModel;
class Model extends AbstractModel{
	
	function __construct($attrs = null, $entity = null){
		if(!is_null($attrs)){
			$this -> setAttrs($attrs);
		}
	}
	
}