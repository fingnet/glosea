<?php
namespace glosea\framework\base;
use AbstractModel;
abstract class AbstractTable extends AbstractModel {
	
	private $_tableName;
	
	//设置和获取表名
	public function table(){}
	
	//设置查询字段
	public function select(){}
	
	//设置查询条件
	public function where(){}
	
	//设置查询排序
	public function sort(){}
	
	//设置查询分组（需要与select配合）
	public function group(){}
	
	//获取单个字段值
	public function getVar($name){
		
	}
	
	//获取行数据(数组)
	public function getRow($id){
		
	}
	
	//获取列数据（数组）
	public function getColumn($name){
		
	}
	
	//获取数据列表（二维数组）
	public function getList($page = null, $size = 10){
		
	}
}
