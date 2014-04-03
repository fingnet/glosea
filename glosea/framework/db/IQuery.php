<?php
namespace glosea\framework\db;
/**
 * 数据库适配器接口
 * @author MaZhirong <fingnet@gmail.com> 2014-3-14
 * @copyright ©2103 glosea.com
 * @license http://www.glosea.com
 * @version 0.1
 */
interface IQuery{
	
	public function setModel($model){}
	
	public static function table($table){}
	
	public function insert($data){}
	
	public function update($data){}
	
	public function replace($data){}
	
	public function delete(){}
	
	public function select($field){}
	
	public function where($where){}
	
	public function OrWhere($where){}
	
	public function order($order){}
	
	public function group($group){}
	
	public function get(){}
	
	public function execute($shell){}
	
}
