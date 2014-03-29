<?php
include '../config/glosea.php';
function getIp(){
	return '';
}

function config($path, $appId = '', $format = null){
	static $_cache;
	if(!isset($_cache[$appId.'path'])){
		$_cache[$appId.'path'] = GS_ROOT . 'data/config/'.$path.'.php';
	}
	return $_cache[$appId.'path'];
}
