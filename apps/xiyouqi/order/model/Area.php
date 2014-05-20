<?php
namespace apps\xiyouqi\order\model;
use glosea\core\Table;
class Area extends Table {
	
	protected $tableName = 'gs_fo_area';
	protected $idName = 'area_id';
	protected $nodeName = 'pid';
	
	public function getList(){
		$this->order($this->nodeName);
		return $this->getTree(parent::getList());
	}
	
}