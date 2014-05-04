<?php
namespace apps\xiyouqi\order\controller\admin;
use glosea\controller\AbstractAdmin;
use apps\xiyouqi\order\model\FoodCate as Model;
class FoodCate extends AbstractAdmin {
	
	/*
	 * order/admin/food GET|POST|PUT|DELETE
	 * 
	 */
	
	protected $rest = true;
	
	function __construct($app, $request){
		$this -> model = new Model;
		parent::__construct($app, $request);
	}

}