<?php
namespace apps\xiyouqi\order\controller\admin;
use glosea\controller\AbstractAdmin;
use apps\xiyouqi\order\model\Food as Model;
class Food extends AbstractAdmin {
	
	/*
	 * order/admin/food GET|POST|PUT|DELETE
	 * 
	 */
	 
	 protected $rest = true;
	
	function __construct($app, $request){
		parent::__construct($app, $request);
		$this -> model = new Model;
	}
	
	public function show(){
		return $this -> model -> get();
	}
	
}
