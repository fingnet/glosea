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
		'orders',
		'limit',
		//'unions',
		//'lock',
	);
	
	public function select(Query $query){
		if (is_null($query->fields)){
			$query->fields = array('*');
		}
		return trim($this->concatenate($this->components($query)));
	}
	
	public function insert(Query $query, array $values){
		$table = $this->wrapTable($query->from);
		if ( ! is_array(reset($values))){
			$values = array($values);
		}

		$columns = $this->columnize(array_keys(reset($values)));
		$parameters = $this->parameterize(reset($values));
		$value = array_fill(0, count($values), "($parameters)");
		$parameters = implode(', ', $value);
		return "INSERT INTO $table ($columns) VALUES $parameters";
	}
	
	public function update($query, $values){
		$table = $this->wrapTable($query->from);
		$columns = array();

		foreach ($values as $key => $value)
		{
			$columns[] = $this->wrap($key).' = '.$this->parameter($value);
		}

		$columns = implode(', ', $columns);

		if (isset($query->joins)){
			$joins = ' ' . $this->joins($query, $query->joins);
		}else{
			$joins = '';
		}
		
		$where = $this->wheres($query, $query->wheres);

		$sql = trim("UPDATE {$table}{$joins} SET $columns $where");

		if (isset($query->orders)){
			$sql .= ' '.$this->orders($query, $query->orders);
		}

		if (isset($query->limit)){
			$sql .= ' '.$this->limit($query, $query->limit);
		}

		return rtrim($sql);
	}
	
	protected function components($query){
		$sql = array();
		foreach ($this->components as $component){
			if (!is_null($query->$component)){
				$sql[$component] = $this->$component($query, $query->$component);
			}
		}
		return $sql;
	}
	
	protected function fields($query, $fields){
		return 'SELECT ' . $this->columnize($fields);
	}
	
	protected function from($query, $table){
		return 'FROM '.$this->wrapTable($table);
	}
	
	protected function wheres($query, $wheres){
		
		if (is_null($query->wheres)){
			return '';
		}
		
		$sql = array();
		foreach ($wheres as $where){
			$method = "where";
			$sql[] = $where['type'] .' '. $this->$method($query, $where);
		}

		if (count($sql) > 0){
			$sql = implode(' ', $sql);
			return 'WHERE ' . preg_replace('/AND |OR /', '', $sql, 1);
		}
		return '';
	}
	
	protected function where($query, $where){
		$value = $this->parameter($where['value']);
		return $this->wrap($where['name']) . ' ' . $where['operator'] .  $value ;
	}
	
	protected function groups($query, $groups){
		return 'GROUP BY '.$this->wrapTable($table);
	}
	
	protected function orders($query, $orders){
		$sql = $fix = '';
		foreach ($orders as $order) {
			$sql .= $fix . $order[0] . ' ' . $order[1];
			$fix = ',';
		}
		return 'ORDER BY '.$sql;
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
		return $name === '*' ? $name : '`' . $name . '`';
	}
	
	protected function parameter($value){
		return '\''. $value . '\'';
	}
	
	public function columnize(array $columns){
		return implode(', ', array_map(array($this, 'wrap'), $columns));
	}
	
	public function parameterize(array $values){
		return implode(', ', array_map(array($this, 'parameter'), $values));
	}
}
