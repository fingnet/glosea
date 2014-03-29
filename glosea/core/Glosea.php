<?php
namespace glosea\core;
use glosea\framework\db\pdo\PdoAdapter;
class Glosea{
	
	static $db;
	static $container = array();
	
	public static function init(){
		
	}
	
	public static function initDebug(){
		
	}
	
	public static function initSession(){
		session_start();
	}
	
	public static function initConfig(){
		
	}
	
	public static function initContainer(){
		self :: $container['db'] = new PdoAdapter(config('database'));
	}
	
	public static function application(){
		
	}
}
