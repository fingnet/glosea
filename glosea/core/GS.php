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
		$t = Table :: find('张三');
		//$t -> email = 'fingnet@gmail.com';
		print_r($t);
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
	
	//导入类
	public static function import($class, $appId = null){
		
	}
	
	//载入类对象实例
	public static function load($class, $appId = null){
		
	}
}
