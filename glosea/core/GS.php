<?php
namespace glosea\core;
use glosea\framework\db\connector\Connector;
use glosea\core\Table;
class GS{
	
	static $db;
	static $container = array();
	static $framework;
	
	public static function init(){
		static :: initSession();
		static :: initContainer();
		$t = Table :: table('t');
		$rs = $t -> get();
		print_r($rs);
		echo "<p>Glosea App Init  中文支持</p> \n";
	}
	
	public static function initFramework(){
		
	}
	
	public static function initDebug(){
		
	}
	
	public static function initSession(){
		session_start();
	}
	
	public static function initConfig(){
		
	}
	
	public static function initContainer(){
		static :: $container['db'] = Connector :: connect(config('database'));
	}
	
	public static function application(){
		
	}
	
	public static function regAdminMenu($name, $action, $appId){
		
	}
	
	public static function import($class, $appId = null){
		
	}
}
