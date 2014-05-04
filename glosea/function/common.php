<?php
include __DIR__ . '/../config/glosea.php';

spl_autoload_register(function ($class) {
    spl_autoload(str_replace("\\", "/", $class));
});
 
function getIp(){
	return '127.0.0.1';
}

function config($path, $appId = '', $format = null){
	static $_cache;
	if(!isset($_cache[$appId.$path])){
		$_cache[$appId.'path'] = include GS_ROOT . 'data/config/'.$path.'.php';
	}
	return $_cache[$appId.'path'];
}

function console($log,$exit = false){
	$log = str_replace('\'', '\\\'', $log);
	echo '<script>console.log(\'Glosea Server: ' . $log . '\');</script>';
	$exit && exit();
}
