<?php
namespace glosea\framework\db\pdo;
use glosea\framework\db\AbstractAdapter;
class AbstractPdoAdapter extends AbstractAdapter {
	
	//查询表
	abstract function getTables(){}
	
	//查询字段
	abstract function getFields($tableName){}
	
	//创建表
	abstract function create($drop = false){}
	
	//清空表
	abstract function truncate($tableName){}
	
	//删除表
	abstract function drop($tableName){}
	
	//开启事务
	
	//提交
	
	//回滚
	
	//行级锁
	
}
