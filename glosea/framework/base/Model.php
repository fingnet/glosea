<?php
class Model extends AbstractModel{
	
	function __construct($attrs = null, $entity = null, $adapter = null){
		if(!is_null($adapter)){
			$this -> setAdapter($adapter);
		}
	}
	
	//获取和设置实体名称
	function entity($name = null){
		
	}
}