<?php
namespace glosea\core;
use glosea\framework\base\Table as BaseTable;
use glosea\framework\db\pdo\Connection;
class Table extends BaseTable{
	
	function __construct(array $attrs = array()){
		parent :: __construct($attrs);
		$this -> setConnection(new Connection(Glosea::get('db')));
	}
}
