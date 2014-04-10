<?php
namespace glosea\framework\db\schema;
class Grammar {
	
	protected $wrapper = '`%s`';
	
	public function tableExists(){
		return 'select * from information_schema.tables where table_schema = ? and table_name = ?';
	}
	
	public function columnExists(){
		return "select column_name from information_schema.columns where table_schema = ? and table_name = ?";
	}
	
	public function create(){
		
	}
	
	public function add(){
		
	}
	
	public function drop(){
		
	}
	
	public function dropcolumn(){
		
	}
	
	public function rename(){
		
	}
	
	public function typeChar($column){
		return 'char(' . $column -> length . ')';
	}
	
	public function typeString($column){
		return 'varchar(' . $column -> length . ')';
	}
	
	public function typetext($column){
		return 'text';
	}
	
	public function typeMediumText($column){
		return 'mediumtext';
	}
	
	public function typeLongText($column){
		return 'longtext';
	}
	
	public function typeInt($column){
		return 'int';
	}
	
	public function typeTinyInt($column){
		return 'tinyint';
	}
	
	public function typeSmallInt($column){
		return 'smallint';
	}
	
	public function typeMediumInt($column){
		return 'mediumint';
	}
	
	public function typeBigInt($column){
		return 'bigint';
	}
	
	public function typeFloat($column){
		return "float({$column->total}, {$column->places})";
	}
	
	public function typeDouble($column){
		if ($column->total && $column->places){
			return "double({$column->total}, {$column->places})";
		}else{
			return 'double';
		}
	}
	
	public function typeDecimal($column){
		return "decimal({$column->total}, {$column->places})";
	}
	
	public function typeBoolean($column){
		return 'tinyint(1)';
	}
	
	public function typeDate($column){
		return 'date';
	}
	
	public function typeDateTime($column){
		return 'datetime';
	}
	
	public function typeTime($column){
		return 'time';
	}
	
	public function typeTimestamp($column){
		return 'timestamp';
	}
	
	public function typeBinary($column){
		return 'blob';
	}
	
	public function typeEnum($column){
		return "enum('".implode("', '", $column->allowed)."')";
	}
	
}
