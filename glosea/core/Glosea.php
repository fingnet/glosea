<?php
namespace glosea\core;
use glosea\framework\db\connector\Connector;
use glosea\flight\Flight;
class Glosea extends Flight {
	
	public static function init(){
		static::response() -> header('Access-Control-Allow-Origin','http://rainbow2.hulu.io');
		static::initSession();
		static::initContainer();
		static::initApp();
	}
	
	public static function initDebug(){
		
	}
	
	public static function initSession(){
		session_start();
	}
	
	public static function initApp(){
		$apps = static::get('cfg');
		$apps = $apps['apps'];
		foreach($apps as $app){
			static::route('/' . $app['alias'] . '(/@controller(/@method))', function($name,$method,$params) use ($app){
			    $comtroller = static::getControllerInstance($name, $method, $app['alias']);
			});
		}
	}
	
	public static function initContainer(){
		static::set('db',Connector :: connect(config('connection')));
		static::set('cfg',config('apps'));
	}
	
	public static function getControllerInstance($controller, $method, $alias = null){
		$apps = static::get('cfg');
		$alias = is_null($alias) ? $apps['default'] : $alias;
		$app = $apps['apps'][$alias];
		$controller = $controller ? $controller : 'home';
		$class = explode('.', $controller);
		$className = ucfirst(array_pop($class));
		$classPath = 'apps\\' . str_replace('/', '\\', $app['app_id']) . '\\controller\\';
		$classPath =  $classPath . (empty($class) ? '' : implode($class, '\\') . '\\') ;
		$class = $classPath . $className;
		$path = GS_ROOT . str_replace('\\', '/', $classPath) . $className . '.php';
		if(is_file($path)){
			include $path;
			return new $class(null, static::request(), static::response());
		}
		static::notFound();
	}
}
