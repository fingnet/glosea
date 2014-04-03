<?php
/*
 * Framework Application Define
 * copyright Copyright (c) 2014
 * author Zhirong <fingnet@gmail.com>
 * */
return array(
	'framework_root' => GS_ROOT . 'framework/',
	//应用文件数据存储路径
	'data_path' => '../../data/',
	//日志存储目录
	'logo_path' => 'log',
	//默认适配器类型
	'adapter'   => 'pdo',
	//默认数据库类型
	'driver'    => 'mysql',
	'conn'      => Glosea :: $container['db']
);
