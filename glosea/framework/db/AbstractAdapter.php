<?php
namespace glosea\framework\db;
/**
 * 数据库适配器接口抽象
 * @author MaZhirong <fingnet@gmail.com> 2014-3-14
 * @copyright ©2103 glosea.com
 * @license http://www.glosea.com
 * @version 0.1
 */
abstract class AbstractAdapter{
	
	private $_model;
	
	abstract function insert(){}
	
	abstract function update(){}
	
	abstract function delete(){}
	
	abstract function replace(){}
	
	abstract function select(){}
	
	abstract function query(){}
	
}
