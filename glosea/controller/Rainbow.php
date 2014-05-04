<?php
namespace glosea\controller;
use glosea\controller\AbstractAdmin;
use glosea\framework\view\Application;
class Rainbow extends AbstractAdmin {
	
	protected $actions = array(
		array(
			'id' => "create",
			'name' => "添加",
			'primary' => "",
			'selected' =>  "none",
			'sort' => 0,
			'type' => "post",
			'desc' => "新增数据",
			'event' => "create",
			'controls' => '',
			'object' => "",
			'group' => "1",
			'primary' => '',
			'iconUrl' => "icon-plus",
			'action' => '',
			'params' => '',
			'modal' => ''
		),
		array(
			'id' => "view",
			'name' => "查看",
			'primary' => "1",
			'selected' =>  "one",
			'type' => "get",
			'desc' => "详细内容",
			'event' => "view",
			'controls' => '',
			'object' => "",
			'group' => "1",
			'primary' => '',
			'iconUrl' => "icon-eye-open",
			'action' => '',
			'params' => '',
			'modal' => ''
		),
		array(
			'id' => "update",
			'name' => "修改",
			'primary' => "",
			'selected' =>  "one",
			'type' => "put",
			'desc' => "修改数据",
			'event' => "edit",
			'controls' => '',
			'object' => "",
			'group' => "",
			'iconUrl' => "icon-edit",
			'action' => '',
			'params' => '',
			'modal' => ''
		),
		array(
			'id' => "remove",
			'name' => "删除",
			'primary' => "",
			'selected' =>  "some",
			'type' => "delete",
			'desc' => "删除数据",
			'event' => "remove",
			'controls' => '',
			'object' => "",
			'group' => "",
			'iconUrl' => "icon-tracet",
			'action' => '',
			'params' => '',
			'modal' => ''
		)
	);

	protected $tools = array(
		array(
			'id' => "refresh",
			'name' => "刷新",
			'primary' => "",
			'selected' =>  "",
			'type' => "get",
			'desc' => "刷新数据",
			'event' => "refresh",
			'controls' => '',
			'object' => "",
			'group' => "",
			'iconUrl' => "icon-refresh",
			'action' => '',
			'params' => '',
			'modal' => ''
		),
		array(
			'id' => "setting",
			'name' => "设置",
			'primary' => "",
			'selected' =>  "",
			'type' => "setting",
			'desc' => "视图设置",
			'event' => "setting",
			'controls' => '',
			'object' => "",
			'group' => "",
			'iconUrl' => "icon-setting",
			'action' => '',
			'params' => '',
			'modal' => ''
		)
	);
	protected $filters = array();
	protected $rest = true;
	protected $orders = array();
	protected $titles = array();
	
	public function __construct(){
		$this->view = new Application;
		$this->view->setType('json');
	}

	public function setBasic(){
		$this->view->__set('name', 'Rainbow View')
			->__set('desc', '')
			->__set('remote', '')
			->__set('type', 'list')
			->__set('mode', 'list')
			->__set('actions', $this->actions)
			->__set('filters', $this->filters)
			->__set('tools', $this->tools)
			->__set('roles', $this->model->getRoles())
			->__set('orders', $this->orders)
			->__set('titles', $this->titles)
			->__set('params', null)
			->__set('template', '')
			->__set('extend', '');
			
		return $this;
	}

	public function action(){
		
	}
	
	public function filter(){
		
	}
	
	public function tool(){
		
	}
	
	public function content($content){
		$this->view->__set('content', $content);
		return $this;
	}
	
	public function extend(){
		$this->view->__set('extend', $content);
		return $this;
	}

	public function restGet(){
		
	}
	
	public function restPost(){
		
	}
	
	public function restPut(){
		
	}
	
	public function restDelete(){
		
	}
}
