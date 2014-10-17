<?php
namespace keelkit\model;
use keelkit\base\Object;
use Query;
abstract class AbstractModel extends Object{
	protected $connection;
	protected $tableName;
	protected $types;
	protected $autoPk = false;
	protected $autoCreatedAt = false;
	protected $autoUpdatedAt = false;
	protected $guarded;
	protected $hidden;
	protected $visible;
	protected $exist = false;
	
	public function	find(){
		
	}
	
	public function	findOne(){
		
	}
	
	public function	findOrCreate(){
		
	}
	
	public function findOrFail(){
		
	}
	
	public function findBy(){
		
	}
	
	public function findOneBy(){
		
	}
	
	public function	count(array $object){
		
	}
	
	public function countBy(){
		
	}
	
	public function	batch(){
		
	}
	
	public function	save(){
		
	}
	
	public function	toArray(){
		
	}
	
	public function	toJSON(){
		
	}
	
	public function	on(){
		
	}
	
	public function	id(){
		
	}
}
