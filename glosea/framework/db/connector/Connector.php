<?php
namespace glosea\framework\db\connector;
use PDO;
class Connector{
	
	public static function createConnection($config){
		return new PDO($config['dsn'], $config['user'], $config['password']);
	}
	
	public static function connect($config){
		$connection = static :: createConnection($config);
		$charset = $config['charset'];
		$names = "set names '$charset'"; //. ( ! is_null($collation) ? " collate '$collation'" : '');
		$connection -> prepare($names) -> execute();
		if (isset($config['strict']) && $config['strict']){
			$connection -> prepare("set session sql_mode='STRICT_ALL_TABLES'") -> execute();
		}
		return $connection;
	}
}
