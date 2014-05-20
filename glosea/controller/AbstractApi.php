<?php
namespace glosea\controller;
use glosea\framework\base\AbstractController;
use glosea\framework\view\Application;
abstract class AbstractApi extends AbstractController {
	
	protected $rest = true;
	protected $pagination = true;
	protected $pageParamName = 'page';
	protected $pagesize = 10;
	protected $content;
	
	function __construct($app, $request, $response){
		$this->authorized();
		$this->view = new Application($this, $response);
		$this->view->setType('json');
		parent::__construct($app, $request, $response);
	}
	
	public function render(){
		if(!is_null($this->param('id'))){
			$this->renderContent();
		}else{
			$this->renderList();
		}
		
		$this->view
			->__set('content', $this->content)
			->__set('timestamp', microtime())
			->render();
		return $this;
	}
	
	public function renderList(){
		if($this->pagination){
			$this->pagination();
		}
		$this->content['body'] = $this->model->getList();
		//$this->content['count'] = $this->model->count();
	}
	
	public function renderContent(){
		$this->content = $this->model->find($this->param('id'))->toArray();
	}
	
	public function pagination(){
		$page = $this->getInt($this->pageParamName);
		$page = $page ?:1;
		$this->model->skip(($page-1) * $this->pagesize)->top($this->pagesize);
		$this->content['page'] = array(
			'current' => $page,
			'count' => 0,
			'size' => $this->pagesize
		);
		return $this;
	}
	
	public function authorized(){
		
	}
	
}
