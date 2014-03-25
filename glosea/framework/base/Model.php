<?php
class Model extends AbstractModel{
	
	function __construct($attrs = null, $entity = null, $adapter = null){
		if(!is_null($adapter)){
			$this -> setAdapter($adapter);
		}
	}
	
	//获取或设置属性
	function attr($name, $rule = null){
		
	}
	
	//删除属性
	function removeAttr($name){
		
	}
	
	//获取和设置实体名称
	function entity($name = null){
		
	}
}