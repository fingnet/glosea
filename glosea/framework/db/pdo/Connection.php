<?php
namespace glosea\framework\db\pdo;
use Closure;
use PDO;
use glosea\framework\db\IConnection;
/**
 * PDO数据库连接器
 * @author MaZhirong <fingnet@gmail.com> 2014-3-14
 * @copyright ©2103 glosea.com
 * @license http://www.glosea.com
 * @version 0.1
 */
class Connection implements IConnection {
	
	protected $pdo;
	
	function __construct($pdo){
		$this -> pdo = $pdo;
	}
	
	public function select($query, $bindings = array()){
		return $this -> run($query, $bindings, function($me, $query, $bindings){
			$statement = $me -> pdo -> prepare($query);
			$statement -> execute($bindings);
			return $statement -> fetchAll(PDO :: FETCH_ASSOC);
		});
	}
	
	public function insert(){
		
	}
	
	public function update(){
		
	}
	
	public function replace(){
		
	}
	
	public function free(){
		
	}
	
	public function run($query, $bindings, Closure $callback){
		$start = microtime();
		try{
			$result = $callback($this, $query, $bindings);
		}catch(Exception $e){
			throw $e;
		}
		return $result;
	}
	
	public function transaction(Closure $callback){
		$this->beginTransaction();
		try{
			$result = $callback($this);
			$this->commit();
		}catch (Exception $e){
			$this->rollBack();
			throw $e;
		}
		return $result;
	}
	
	public function beginTransaction(){
		
	}
	
	public function conmit(){
		
	}
	
	public function rollBack(){
		
	}
	
	public function getFields(){
		
	}
	
	public function getTables(){
		
	}
	
	public function escape(){
		
	}
	
	protected function parseKey(&$key) {
        $key = trim($key);
		if(!preg_match('/[,\'\"\*\(\)`.\s]/',$key)) {
           $key = '`'.$key.'`';
		}
        return $key;
    }
	
}