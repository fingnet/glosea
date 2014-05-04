<?php
namespace apps\xiyouqi\order\controller\admin;
use glosea\controller\AbstractAdmin;
use apps\xiyouqi\order\model\Area as Model;
class Area extends AbstractAdmin {
	
	function __construct($app, $request){
		parent::__construct($app, $request);
		$this -> model = new Model;
	}
	
}