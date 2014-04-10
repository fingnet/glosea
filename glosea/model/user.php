<?php
class User extends AbstractModel{
	protected $pk = 'uid';
	protected $roles = array(
		'uid'          => array(
			'type'     => 'key'
		),
		'user_account' => array(
			'name'     => '账号',
			'type'     => 'text',
			'max'      => 20,
			'min'      => 5,
			'require'  => true,
			'unique'   => true
		),
		'firstname' => array(
			'name'     => '名',
			'type'     => 'text',
			'max'      => 20,
			'min'      => 5,
			'require'  => true
		),
		'lastname' => array(
			'name'     => '姓',
			'type'     => 'text',
			'max'      => 20,
			'min'      => 5,
			'require'  => true
		)
	);
}