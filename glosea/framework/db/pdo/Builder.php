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
		//'limit',
		//'offset',
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
	
	protected function fields($query, $field){
		return 'SELECT ' . $this->columnize($field);
	}
	
	protected function from($query, $table){
		return 'FROM '.$this -> wrapTable($table);
	}
	
	protected function wheres($query, $where){
		$sql = array();
		if (is_null($query -> wheres)){
			return '';
		}
		
		foreach ($query -> wheres as $where){
			$method = "where{$where['type']}";
			$sql[] = $where['boolean'] .' '. $this -> $method($query, $where);
		}
	
		if (count($sql) > 0){
			$sql = implode(' ', $sql);
			return 'WHERE ' . preg_replace('/AND |OR /', '', $sql, 1);
		}
		return '';
	}
	
	protected function whereBasic($query, $where){
		$value = $this -> paramter($where['value']);
		return $this -> wrap($where['name']) . ' ' . $where['operator'] . ' ' . $value;
	}
	
	protected function groups($query, $group){
		return 'GROUP BY '.$this -> wrapTable($table);
	}
	
	protected function orders($query, $order){
		return 'ORDER BY '.$this -> wrapTable($table);
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
