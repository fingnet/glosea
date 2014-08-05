<?php
namespace glosea\controller;
use glosea\controller\AbstractAdmin;
use glosea\framework\view\Application;
class Rainbow extends AbstractAdmin {
	
	protected $rest = true;
	protected $actions = array(
		'create' => array(
			'id' => 'create',
			'name' => '添加',
			'legend' => '新增数据',
			'icon' => 'glyphicon-plus',
			'method' => 'post',
			'selected' =>  'none',
			'group' => '1',
			'primary' => '1',
			'mode' => 'modal'
		),
		'display' => array(
			'id' => 'display',
			'name' => '查看',
			'legend' => '查看详细内容',
			'icon' => 'glyphicon-eye-open',
			'event' => 'display',
			'selected' =>  'single',
			'group' => '1',
			'mode' => 'side'
		),
		'update' => array(
			'id' => 'update',
			'name' => '修改',
			'legend' => '修改数据',
			'icon' => 'glyphicon-pencil',
			'method' => 'put',
			'selected' =>  'single'
		),
		'delete' => array(
			'id' => 'delete',
			'name' => '删除',
			'legend' => '删除数据',
			'icon' => 'glyphicon-trash',
			'method' => 'delete',
			'selected' =>  'some'
		)
	);

	protected $tools = array(
		'refresh' => array(
			'id' => 'refresh',
			'name' => '刷新',
			'legend' => '',
			'icon' => 'glyphicon-refresh',
			'event' => 'refresh'
		)
	);
	protected $filters = array();
	protected $orders = array();
	
	protected $handle = true;
	protected $content = array(
		'body' => array()
	);
	protected $pagination = 'replace';
	protected $pageParamName = 'page';
	protected $pagesize = 15;
	
	function __construct($app, $request, $response){
		$this->view = new Application($this, $response);
		$this->view->setType('json');
		parent::__construct($app, $request, $response);
	}
	
	private function _scheme(){
		$scheme = array(
			'attributes' => $this->model->frontRoles(),
			'filters' => $this->filters,
			'idName' => $this->model->idName(),
			'orders' => $this->orders
		);
		
		if($this->pagination){
			$page = isset($_GET[$this->pageParamName]) ? intval($_GET[$this->pageParamName]) : 1;
			$page = $page ?:1;
			$this->model->skip(($page-1) * $this->pagesize)->top($this->pagesize);
			$this->content['page'] = array(
				'current' => $page,
				'count' => 0,
				'size' => $this->pagesize
			);
			$scheme['pagination'] = $this->pagination;
			$scheme['paginationName'] = $this->pageParamName;
		}
		return $scheme;
	}

	public function render(){
		$this->content['body'] = $this->model->getList();
		$this->view
			->__set('id', 1)
			->__set('name', 'Rainbow View')
			->__set('legend', '')
			->__set('icon', '')
			->__set('actions', array_values($this->actions))
			->__set('tools', array_values($this->tools))
			->__set('scheme', $this->_scheme())
			->__set('mode', 'table')
			->__set('content', $this->content)
			->__set('handle', $this->handle)
			->__set('timestamp', microtime())
			->__set('notify', array())
			->render();
		return $this;
	}

	protected function action($key, $action){
		if(is_null($action)){
			unset($this->actions[$key]);
		}else{
			$this->actions[$key] = $action;
		}
		return $this;
	}
	
	protected function filter($key, $filter){
		if(is_null($filter)){
			unset($this->filters[$key]);
		}else{
			$this->filters[$key] = $filter;
		}
		return $this;
	}
	
	protected function tool($key, $tool){
		if(is_null($tool)){
			unset($this->tools[$key]);
		}else{
			$this->tools[$key] = $tool;
		}
		return $this;
	}
	
	protected function body(array $body){
		$this->content['body'] = $body;
		return $this;
	}
	
	protected function page($size = 10, $paramName = 'page'){
		$this->pagesize = $size;
		$this->pageParamName = $paramName;
		return $this;
	}
	
	protected function extend(){
		$this->view->__set('extend', $content);
		return $this;
	}
	
	protected function handle($status = null){
		if(is_null($status)){
			return $this->handle;
		}
		$this->handle = $status;
		return $this;
	}
	
}
