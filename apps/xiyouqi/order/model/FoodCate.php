<?php
namespace apps\xiyouqi\order\model;
use glosea\core\Table;
class FoodCate extends Table {
	
	protected $tableName = 'gs_fo_food_cate';
	protected $pk = 'cate_id';
	protected $roles = array(
		array(
			'id' => 'cate_id',
			'name' => 'cate_id',
			'alias' => 'ID',
			'create' => false,
			'update' => false,
			'hidden' => false,
			'type' => 'key',
			'metaType' => 'string',
			'control' => 'text',
			'controlParams' => null,
			'group' => '',
			'remind' => '',
			'style' => '',
			'show' => null,
			'ifShow' => null,
			'required' => true,
			'unique' => true,
			'value' => '',
			'system' => null,
			'template' => '',
			'typeObject' => null,
			'ifReuired' => '',
			'updateReuired' => false,
			'confirm' => '',
			'minLength' => 0,
			'maxLength' => 0,
			'between' => array(),
			'include' => array(),
			'list' => array(),
			'ignore' => false,
			'regex' => ''
		),
		array(
			'id' => 'cate_name',
			'name' => 'cate_name',
			'alias' => '分类名称',
			'create' => true,
			'update' => true,
			'hidden' => false,
			'type' => 'key',
			'metaType' => 'string',
			'control' => 'text',
			'controlParams' => null,
			'group' => '',
			'remind' => '',
			'required' => true,
			'unique' => true,
			'value' => '',
			'template' => '',
			'typeObject' => null,
			'ifReuired' => '',
			'updateReuired' => false,
			'confirm' => '',
			'minLength' => 0,
			'maxLength' => 0,
			'between' => array(),
			'include' => array(),
			'ignore' => false,
			'filter' => null,
			'regex' => ''
		)
	);
	
}
