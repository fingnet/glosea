<?php
namespace glosea\framework\db\pdo;
use glosea\framework\db\pdo\Query;
class Builder {
	
	protected $components = array(
		//'aggregate',
		'fields',
		'from',
		//'join',
		'wheres',
		//'group',
		//'havings',
		//'order',
		'limit',
		//'skip',
		//'top',
		//'unions',
		//'lock',
	);
	
	public function select(Query $query){
		if (is_null($query -> fields)){
			$query -> fields = array('*');
		}
		return trim($this -> concatenate($this -> components($query)));
	}
	
	protected function components($query){
		$sql = array();
		foreach ($this -> components as $component){
			if (!is_null($query -> $component)){
				$sql[$component] = $this -> $component($query, $query -> $component);
			}
		}
		return $sql;
	}
	
	protected function fields($query, $fields){
		return 'SELECT ' . $this->columnize($fields);
	}
	
	protected function from($query, $table){
		return 'FROM '.$this -> wrapTable($table);
	}
	
	protected function wheres($query, $wheres){
		
		if (is_null($query -> wheres)){
			return '';
		}
		
		$sql = array();
		foreach ($wheres as $where){
			$method = "where";
			$sql[] = $where['type'] .' '. $this -> $method($query, $where);
		}

		if (count($sql) > 0){
			$sql = implode(' ', $sql);
			return 'WHERE ' . preg_replace('/AND |OR /', '', $sql, 1);
		}
		return '';
	}
	
	protected function where($query, $where){
		$value = $this -> paramter($where['value']);
		return $this -> wrap($where['name']) . ' ' . $where['operator'] . ' \'' . $value .'\'';
	}
	
	protected function groups($query, $groups){
		return 'GROUP BY '.$this -> wrapTable($table);
	}
	
	protected function orders($query, $orders){
		return 'ORDER BY '.$this -> wrapTable($table);
	}
	
	protected function limit($query, $limit){
		return 'LIMIT ' . $limit;
	}
	
	protected function wrapTable($table){
		return '`' . $table . '`';
	}
	
	protected function concatenate($segments){
		return implode(' ', array_filter($segments, function($value){
			return (string) $value !== '';
		}));
	}
	
	protected function wrap($name){
		return $name;
	}
	
	protected function paramter($value){
		return $value;
	}
	
	public function columnize(array $columns){
		return implode(', ', array_map(array($this, 'wrap'), $columns));
	}
}
