<?php
namespace apps\xiyouqi\order\model;
use glosea\core\Table;
use apps\xiyouqi\order\model\Food;
class Order extends Table {
	
	protected $tableName = 'gs_fo_order_food';
	protected $idName = 'id';
	
}