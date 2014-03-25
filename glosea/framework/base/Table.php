<?php
namespace glosea\framework\base;
class Table extends AbstractModel {
	//数据表前缀	
	protected $tablePrefix;
	//表名称（含前缀通配）
	protected $tableName;
	//真实表名
	protected $trueTableName;
}
