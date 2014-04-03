<?php
namespace glosea\core;
use glosea\framework\base\Table as BaseTable;
use glosea\framework\db\pdo\Connection;
class Table extends BaseTable{
	function __construct($tableName = null, $isTrue = false, $connection = false){
		parent :: __construct($tableName, $isTrue, $connection);
		if(false === $connection){
			$this -> connection = new Connection(GS :: $container['db']);
		}
	}
}
