<?php
namespace apps\xiyouqi\order\model;
use glosea\core\Table;
class FoodCate extends Table {
	
	protected $tableName = 'gs_fo_food_cate';
	protected $idName = 'cate_id';
	protected $roles = array(
		array(
			'name' => 'cate_id',
			'alias' => 'ID',
			'type' => 'key',
			'metaType' => 'string'
		),
		array(
			'name' => 'cate_code',
			'alias' => '编码',
			'create' => true,
			'update' => true,
			'type' => 'sstr',
			'metaType' => 'string',
			'control' => 'text',
			'unique' => true
		),
		array(
			'name' => 'cate_name',
			'alias' => '名称',
			'create' => true,
			'update' => true,
			'type' => 'sstr',
			'metaType' => 'string',
			'control' => 'text',
			'unique' => true,
			'required' => true
		),
		array(
			'name' => 'cate_alias',
			'alias' => '别名',
			'create' => true,
			'update' => true,
			'type' => 'sstr',
			'metaType' => 'string',
			'control' => 'text'
		),
		array(
			'name' => 'icon_sign',
			'alias' => '图标',
			'create' => true,
			'update' => true,
			'type' => 'lstr',
			'metaType' => 'string',
			'control' => 'text'
		),
		array(
			'name' => 'describe',
			'alias' => '描述',
			'create' => true,
			'update' => true,
			'type' => 'text',
			'metaType' => 'text',
			'control' => 'textarea'
		),
		array(
			'name' => 'sort_no',
			'alias' => '序号',
			'create' => true,
			'update' => true,
			'type' => 'int',
			'metaType' => 'int',
			'control' => 'text',
			'value' => 50
		),
		array(
			'name' => 'created',
			'alias' => '创建时间',
			'hidden' => true,
			'type' => 'time',
			'metaType' => 'time'
		),
		array(
			'name' => 'updated',
			'alias' => '更新时间',
			'type' => 'time',
			'metaType' => 'time',
		)
	);
	
	protected $auto = array(
		'cate_id' => 'uniqid',
		'created' => 'time',
		'updated' => 'time',
	);
	
}
