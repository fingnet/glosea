<?php
return array(
	'apps' => array(
		'site' => array(
			'app_id'   => 'site',
			'app_name' => '网站管理',
			'alias'    => 'site'
		),
		'admin' => array(
			'app_id'   => 'site/admin',
			'app_name' => '网站管理系统',
			'alias'    => 'admin'
		),
		'api' => array(
			'app_id'   => 'site/api',
			'app_name' => '接口引擎',
			'alias'    => 'api'
		),
		'order' => array(
			'app_id'   => 'xiyouqi/order',
			'app_name' => '订餐平台',
			'alias'    => 'order'
		),
		'train' => array(
			'app_id'   => 'perpetual/train',
			'app_name' => '培训门户',
			'alias'    => 'train'
		)
	),
	'default' => 'site'
);
